<?php
/**
 * Created by PhpStorm.
 * User: eduardoaugusto
 * Date: 29/10/18
 * Time: 14:53
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


class EmailController extends Controller
{

    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendEmail()
    {
        $params = $this->getRequest();
        $open = $params["open"];

        $params = implode(',', $params);

        if($open === null or empty($open)){
            try{

            $body = file_get_contents(__DIR__ . '/email.html');
                //Server settings
                $this->mail->isSMTP();
                $this->mail->SMTPDebug  = 1;
                $this->mail->Host       = 'smtp.gmail.com';
                $this->mail->SMTPAuth   = true;
                $this->mail->SMTPSecure = "tls";
                $this->mail->Username   = 'eduardoaugusto.mangue3@gmail.com';
                $this->mail->Password   = 'secret';
                $this->mail->SMTPSecure = 'tls';
                $this->mail->Port       = 587;
                $this->mail->CharSet    = 'UTF-8';
                $this->mail->setFrom('eduardoaugusto.mangue3@gmail.com', 'Eduardo Augusto');
                $this->mail->addAddress('duuh-l@hotmail.com', 'Eduardo 2');
                $this->mail->addReplyTo('eduardoaugusto.mangue3@gmail.com', 'Eduardo Augusto');
                $this->mail->isHTML(true);                                  // Set email format to HTML
                $this->mail->Subject = 'Chega aqui jhow';
                $this->mail->Body    =  $body;
                $this->mail->send();

                return $this->response_json(["status" => ["msg" => "E-mail enviado com sucesso", "send" => true, "status_error" => false,]]);

            }catch(\Exception $exception){
                return $this->response_json($exception->getMessage());
            }
        } else {
            try{
                //Server settings
                $this->mail->isSMTP();
                $this->mail->SMTPDebug  = 1;
                $this->mail->Host       = 'smtp.gmail.com';
                $this->mail->SMTPAuth   = true;
                $this->mail->SMTPSecure = "tls";
                $this->mail->Username   = 'eduardoaugusto.mangue3@gmail.com';
                $this->mail->Password   = 'petronila212530';
                $this->mail->SMTPSecure = 'tls';
                $this->mail->Port       = 587;
                $this->mail->CharSet    = 'UTF-8';
                $this->mail->setFrom('eduardoaugusto.mangue3@gmail.com', 'Eduardo Augusto');
                $this->mail->addAddress('eduardoaugusto.mangue3@gmail.com', 'Eduardo Augusto');
                $this->mail->addReplyTo('eduardoaugusto.mangue3@gmail.com', 'Eduardo Augusto');
                $this->mail->isHTML(true);                                  // Set email format to HTML
                $this->mail->Subject = 'Confirmação de abertura de email';
                $this->mail->Body    = "O email enviado foi aberto";
                $this->mail->send();

                return $this->response_json(["status" => ["msg" => "E-mail de confirmação enviado com sucesso", "send" => true, "status_error" => false]]);

            }catch(\Exception $exception){
                return $this->response_json($exception->getMessage());
            }
        }









    }

}