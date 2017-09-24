<?php
/**
 * Send mail
 * Convenient function to send mail with requires headers and transformed to UTF-8 charset string
 * @deprecated
 * @return void
 */
function sendMail($from, $subject, $message, $to = false, $contentType = 'text/plain', $charset = 'utf-8')
{
    $settings = require BASE_DIR . '/config/settings.php';
    if ($to === false) {
        $to = $settings['admin_email'];
    }
    $subject = '=?utf-8?B?' . base64_encode($subject) . '?=';
    $headers = "From: $from\r\nReply-to: $from\r\nContent-type: $contentType; charset=$charset\r\n";

    mail($to, $subject, $message, $headers);
}
