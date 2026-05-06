<?php
require "../config.php";

if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

$ordersCount = $db->query("SELECT COUNT(*) c FROM orders")->fetch()["c"];
$paidCount = $db->query("SELECT COUNT(*) c FROM orders WHERE payment_status='paid'")->fetch()["c"];
$totalSales = $db->query("SELECT SUM(total) s FROM orders WHERE payment_status='paid'")->fetch()["s"] ?? 0;
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>لوحة تحكم كوين شوب</title>
<style>
body{font-family:tahoma;margin:0;background:#f5f5f5}
header{background:#b30059;color:#fff;padding:18px;text-align:center;font-size:22px;font-weight:bold}
.container{padding:20px}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:15px}
.card{background:#fff;padding:20px;border-radius:16px;box-shadow:0 3px 12px #ddd}
.card h3{color:#b30059}
.nav a{display:inline-block;background:#b30059;color:#fff;padding:10px 14px;border-radius:10px;text-decoration:none;margin:6px}
</style>
</head>
<body>

<header>👑 لوحة تحكم كوين شوب</header>

<div class="container">
  <div class="grid">
    <div class="card"><h3>📦 الطلبات</h3><p><?= $ordersCount ?></p></div>
    <div class="card"><h3>✅ المدفوع</h3><p><?= $paidCount ?></p></div>
    <div class="card"><h3>💰 المبيعات</h3><p><?= number_format($totalSales,3) ?> ر.ع</p></div>
  </div>

  <div class="nav">
    <a href="orders.php">إدارة الطلبات</a>
    <a href="products.php">إدارة المنتجات</a>
  </div>
</div>

</body>
</html>
