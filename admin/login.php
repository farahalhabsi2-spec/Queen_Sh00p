<?php
require "../config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $db->prepare("SELECT * FROM admins WHERE username=?");
  $stmt->execute([$username]);
  $admin = $stmt->fetch();

  if ($admin && password_verify($password, $admin["password"])) {
    $_SESSION["admin"] = $admin["id"];
    header("Location: dashboard.php");
    exit;
  }

  $error = "بيانات الدخول غير صحيحة";
}
?>

<form method="POST" style="max-width:350px;margin:80px auto;font-family:tahoma">
<h2>👑 دخول الإدارة</h2>
<input name="username" placeholder="اسم المستخدم" style="width:100%;padding:12px;margin:8px">
<input name="password" type="password" placeholder="كلمة المرور" style="width:100%;padding:12px;margin:8px">
<button style="width:100%;padding:12px;background:#b30059;color:white;border:0">دخول</button>
<p><?= $error ?? "" ?></p>
</form>
