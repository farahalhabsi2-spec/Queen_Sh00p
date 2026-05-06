<?php require "config.php"; ?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إتمام الطلب | كوين شوب</title>
<style>
body{font-family:tahoma;background:#ffe6f2;padding:20px}
.box{background:white;max-width:500px;margin:auto;padding:20px;border-radius:15px}
input,textarea,select,button{width:100%;padding:12px;margin:8px 0;border-radius:10px;border:1px solid #ddd}
button{background:#b30059;color:white;font-weight:bold;border:0}
</style>
</head>
<body>

<div class="box">
<h2>👑 إتمام الطلب</h2>

<form method="POST" action="create_order.php">
  <input name="customer_name" placeholder="الاسم" required>
  <input name="phone" placeholder="رقم الهاتف" required>
  <textarea name="address" placeholder="العنوان" required></textarea>

  <select name="payment_method" required>
    <option value="cod">الدفع عند الاستلام</option>
    <option value="card">الدفع بالبطاقة</option>
  </select>

  <input type="hidden" name="cart_data" id="cartData">

  <button type="submit">تأكيد الطلب</button>
</form>
</div>

<script>
document.getElementById("cartData").value = localStorage.getItem("cart") || "[]";
</script>

</body>
</html>
