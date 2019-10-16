<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email{

    private $mail = \stdClass::class;

    public function __construct($stmpDebug, $host, $user, $pass, $smptSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);

        // Server settings
        $this->mail->SMTPDebug = $stmpDebug;                // Enable verbose debug output || Ativar saída de depuração detalhada
        $this->mail->isSMTP();                              // Send using SMTP || Enviar usando SMTP
        $this->mail->Host       = $host;                    // Set the SMTP server to send through || Defina o servidor SMTP para enviar através
        $this->mail->SMTPAuth   = true;                     // Enable SMTP authentication || Ativar autenticação SMTP
        $this->mail->Username   = $user;                    // SMTP username || Nome de usuário SMTP
        $this->mail->Password   = $pass;                    // SMTP password || Senha SMTP
        $this->mail->SMTPSecure = $smptSecure;              // Enable TLS encryption: || Ativar criptografia TLS : `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $this->mail->Port       = $port;                    // TCP port to connect to || Porta TCP à qual se conectar

        // Settings additional
        $this->mail->CharSet    = 'utf-8';                  // Special characters || Caracteres especiais
        $this->mail->setLanguage('pt');            // Default language || Idioma padrão
        $this->mail->isHTML(true);

        $this->mail->setFrom($setFromEmail, $setFromName);
    }

    public function sendEmail($subject, $body,  $addressEmail, $addressName, $replayEmail, $replayName)
    {

        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;

        $this->mail->addAddress("{$addressEmail}", "{$addressName}");     // Add a recipient || Adicionar destinatário
        $this->mail->addReplyTo("$replayEmail", "$replayName");

        try{
            $this->mail->send();
        }catch (Exception $e){
            echo "Error ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }

}