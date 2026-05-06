<?php
require "config.php";

$orderId = intval($_GET["order_id"]);

$db->prepare("UPDATE orders SET payment_status='paid', order_status='paid' WHERE id=?")
   ->execute([$orderId]);

$stmt = $db->prepare("SELECT * FROM orders WHERE id=?");
$stmt->execute([$orderId]);
$order = $stmt->fetch();

$items = $db->prepare("SELECT * FROM order_items WHERE order_id=?");
$items->execute([$orderId]);
$products = $items->fetchAll();
?>

<h2>✅ تم الدفع بنجاح</h2>
<p>رقم الطلب: <?= $order["order_code"] ?></p>

<script>
localStorage.removeItem("cart");

let msg = "✅ تم دفع طلب جديد من كوين شوب%0A";
msg += "رقم الطلب: <?= $order["order_code"] ?>%0A";
msg += "الاسم: <?= $order["customer_name"] ?>%0A";
msg += "الهاتف: <?= $order["phone"] ?>%0A";
msg += "الإجمالي: <?= $order["total"] ?> ر.ع";

window.open("https://wa.me/<?= WHATSAPP_NUMBER ?>?text=" + msg);
</script>
