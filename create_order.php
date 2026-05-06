<?php
require "config.php";

$name = $_POST["customer_name"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$payment = $_POST["payment_method"];
$cart = json_decode($_POST["cart_data"], true);

if (!$cart || count($cart) == 0) {
  die("السلة فارغة");
}

$total = 0;
foreach ($cart as $item) {
  $total += floatval($item["price"]);
}

$orderCode = "QS" . time();

$stmt = $db->prepare("INSERT INTO orders 
(order_code, customer_name, phone, address, total, payment_method)
VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$orderCode, $name, $phone, $address, $total, $payment]);

$orderId = $db->lastInsertId();

foreach ($cart as $item) {
  $stmt = $db->prepare("INSERT INTO order_items 
  (order_id, product_name, price, quantity)
  VALUES (?, ?, ?, ?)");
  $stmt->execute([
    $orderId,
    $item["name"],
    $item["price"],
    1
  ]);
}

if ($payment === "card") {
  header("Location: pay.php?order_id=" . $orderId);
  exit;
}

$message = "👑 طلب جديد من كوين شوب%0A";
$message .= "رقم الطلب: $orderCode%0A";
$message .= "الاسم: $name%0A";
$message .= "الهاتف: $phone%0A";
$message .= "العنوان: $address%0A%0A";
$message .= "المنتجات:%0A";

foreach ($cart as $item) {
  $message .= "- " . $item["name"] . " - " . $item["price"] . " ر.ع%0A";
}

$message .= "%0Aالإجمالي: " . number_format($total, 3) . " ر.ع";

header("Location: https://wa.me/" . WHATSAPP_NUMBER . "?text=" . $message);
exit;
