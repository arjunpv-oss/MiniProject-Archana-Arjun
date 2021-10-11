<?php


if (isset($_POST['submit'])) {
    $to_email = 'archanaas2016@gmail.com';
    $subject = 'Testing PHP Mail';
    $message = 'This mail is sent using the PHP mail function';
    $headers = 'From: noreply @ company . com';
    mail($to_email,$subject,$message,$headers);

}
?>



