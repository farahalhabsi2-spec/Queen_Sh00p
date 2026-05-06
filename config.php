<?php
session_start();

$db = new PDO(
  "mysql:host=localhost;dbname=queen_shop;charset=utf8mb4",
  "DB_USERNAME",
  "DB_PASSWORD",
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
);

define("WHATSAPP_NUMBER", "96896036550");

// AmwalPay UAT
define("AMWAL_MID", "ضع MID هنا");
define("AMWAL_TID", "ضع TID هنا");
define("AMWAL_SECRET", "ضع SECURE HASH هنا");
define("AMWAL_URL", "https://test.amwalpg.com/SmartBox/Process");

// غيّري هذا إلى دومين موقعك
define("SITE_URL", "https://yourdomain.com");
