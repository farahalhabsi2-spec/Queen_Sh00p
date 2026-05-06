<?php
require "../config.php";

if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

$orders = $db->query("SELECT * FROM orders ORDER BY id DESC")->fetchAll();
?>

<h2>📦 الطلبات</h2>

<?php foreach($orders as $o): ?>
<div style="background:#fff;margin:10px;padding:15px;border-radius:12px;font-family:tahoma">
  <b>رقم الطلب:</b> <?= $o["order_code"] ?><br>
  <b>العميل:</b> <?= $o["customer_name"] ?><br>
  <b>الهاتف:</b> <?= $o["phone"] ?><br>
  <b>الإجمالي:</b> <?= $o["total"] ?> ر.ع<br>
  <b>الدفع:</b> <?= $o["payment_status"] ?><br>
  <b>الحالة:</b> <?= $o["order_status"] ?><br>
</div>
<?php endforeach; ?>
