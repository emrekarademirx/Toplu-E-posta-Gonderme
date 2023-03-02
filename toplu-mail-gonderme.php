<?php

$to = "info@emrekarademir.com, destek@emrekarademir.com, iletisim@example.com";
$subject = "Toplu E-posta Gönderme";

// HTML içeriği
$message = '
<html>
<head>
  <title>Toplu E-posta Gönderme</title>
</head>
<body>
  <p>Merhaba,</p>
  <p>Bu bir toplu e-posta örneğidir.</p>
  <p>İyi günler!</p>
</body>
</html>
';

// HTML içeriği için Content-type başlığı
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Dosya eki
$filename = "example.pdf";
$file = fopen($filename,"rb");
$data = fread($file,filesize($filename));
fclose($file);
$headers .= "Content-Type: application/octet-stream; name=".$filename."\r\n";
$headers .= "Content-Disposition: attachment; filename=".$filename."\r\n";
$headers .= "Content-Transfer-Encoding: base64\r\n";
$headers .= "X-Attachment-Id: ".rand(1000,9000)."\r\n\r\n";
$headers .= chunk_split(base64_encode($data));

// Gönderme işlemi
mail($to, $subject, $message, $headers);

?>
