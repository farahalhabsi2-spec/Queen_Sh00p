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

header("Location: https://wa.me/96896036550?text=" . $message);
exit;
