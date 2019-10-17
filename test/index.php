<?php

require_once __DIR__ . "/../_app/lib_ext/autoload.php";

use Notification\Email;

$mail = new Email(
    2,
    'mail.host.com.br',
    'user@host.com.br',
    'pass',
    'PHPMailer::ENCRYPTION_STARTTLS',
    '587',
    'mail@host.com.br',
    'André Camargo'
);

$mail->sendEmail(
    'E-mail de teste',
    '<p>Testando envio de <em>E-mail</em> com <b>phpMailer</b> .</p>',
    'andre.camargo@msn.com',
    'André Camargo',
    'website@liderbalancas.com.br',
    'Web site líder'
);
