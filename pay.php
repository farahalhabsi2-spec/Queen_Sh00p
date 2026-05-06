<?php
require "config.php";

$orderId = intval($_GET["order_id"]);

$stmt = $db->prepare("SELECT * FROM orders WHERE id=?");
$stmt->execute([$orderId]);
$order = $stmt->fetch();

if (!$order) {
  die("الطلب غير موجود");
}

$amount = number_format($order["total"], 3, ".", "");

// في UAT البطاقة التجريبية حدها 1 ريال
// للتجربة فقط:
$amount = "1.000";

$currency = "OMR";
$orderCode = $order["order_code"];

$data = AMWAL_MID . AMWAL_TID . $amount . $currency . AMWAL_SECRET;
$hash = hash("sha256", $data);
?>

<form method="POST" action="<?= AMWAL_URL ?>">
  <input type="hidden" name="mid" value="<?= AMWAL_MID ?>">
  <input type="hidden" name="tid" value="<?= AMWAL_TID ?>">
  <input type="hidden" name="amount" value="<?= $amount ?>">
  <input type="hidden" name="currency" value="OMR">
  <input type="hidden" name="order_id" value="<?= $orderCode ?>">
  <input type="hidden" name="return_url" value="<?= SITE_URL ?>/success.php?order_id=<?= $orderId ?>">
  <input type="hidden" name="cancel_url" value="<?= SITE_URL ?>/cancel.php?order_id=<?= $orderId ?>">
  <input type="hidden" name="hash" value="<?= $hash ?>">
</form>

<script>
document.forms[0].submit();
</script>
