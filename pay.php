<?php

$MID = "163200";
$TID = "721684";

?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>تحويل للدفع</title>
</head>
<body>

<h2>جاري التحويل إلى الدفع...</h2>

<form method="POST" action="https://test.amwalpg.com/SmartApi/smartbox">
<input type="hidden" name="mid" value="<?php echo $MID; ?>">
<input type="hidden" name="tid" value="<?php echo $TID; ?>">
<input type="hidden" name="amount" value="1.000">
<input type="hidden" name="currency" value="OMR">

<button type="submit">
الدفع الآن
</button>

</form>

</body>
</html>
