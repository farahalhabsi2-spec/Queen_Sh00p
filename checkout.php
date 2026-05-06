<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إتمام الطلب | Queen Shop</title>

<style>
body{
  font-family:tahoma;
  background:#ffe6f2;
  padding:20px;
}

.box{
  background:#fff;
  max-width:500px;
  margin:auto;
  padding:20px;
  border-radius:15px;
  box-shadow:0 2px 10px rgba(0,0,0,.1);
}

h2{
  text-align:center;
  color:#b30059;
}

input, textarea, select{
  width:100%;
  padding:12px;
  margin:8px 0;
  border-radius:10px;
  border:1px solid #ddd;
  box-sizing:border-box;
}

button{
  width:100%;
  padding:14px;
  background:#25D366;
  color:#fff;
  border:none;
  border-radius:12px;
  font-size:16px;
  font-weight:bold;
  cursor:pointer;
}
</style>
</head>
<body>

<div class="box">
  <h2>👑 إتمام الطلب</h2>

  <input type="text" id="name" placeholder="الاسم الكامل">
  <input type="text" id="phone" placeholder="رقم الهاتف">
  <textarea id="address" placeholder="العنوان"></textarea>

  <select id="paymentMethod">
    <option value="cod">الدفع عند الاستلام</option>
    <option value="card">الدفع بالبطاقة</option>
  </select>

  <button onclick="sendOrder()">📩 تأكيد الطلب</button>
</div>

<script>
function sendOrder(){

  let name = document.getElementById("name").value;
  let phone = document.getElementById("phone").value;
  let address = document.getElementById("address").value;
  let payment = document.getElementById("paymentMethod").value;

  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  if(cart.length === 0){
    alert("السلة فارغة");
    return;
  }

  let total = 0;

  let msg = "👑 طلب جديد من كوين شوب %0A%0A";
  msg += "👤 الاسم: " + name + "%0A";
  msg += "📞 الهاتف: " + phone + "%0A";
  msg += "📍 العنوان: " + address + "%0A";
  msg += "💳 الدفع: " + payment + "%0A%0A";
  msg += "🛍️ المنتجات:%0A";

  cart.forEach(item => {
    total += Number(item.price);
    msg += "- " + item.name + " - " + item.price + " ر.ع %0A";
  });

  msg += "%0A💰 الإجمالي: " + total.toFixed(2) + " ر.ع";

  window.open("https://wa.me/96896036550?text=" + msg);

  localStorage.removeItem("cart");
}
</script>

</body>
</html>
