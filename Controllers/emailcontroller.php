<?php
/**
 * Created by PhpStorm.
 * User: eduardoaugusto
 * Date: 29/10/18
 * Time: 14:53
 */

use SendGrid\Mail\Mail;


class EmailController extends Controller
{
    public function sendEmail()
    {

        $params = implode(',', $this->getRequest());

        $email = new \SendGrid\Mail\Mail();


        $email->setFrom('duuh-l@hotmail.com', "Testando");
        $email->setSubject("Seus Parametros digitados");
        $email->addHeader('duuh-l@hotmail.com', 'X-confirm-reading-to');
        $email->addTo("duugplays@gmail.com");

        $email->addContent(
            "text/plain",
            "Esse são seus parametros : ".$params
        );

        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);

            $data = [
                "msg"          => "email enviado com sucesso",
                "send"         => true,
                "status_error" => false

            ];

            return $this->response_json($data);
        } catch (Exception $e) {
            echo json_encode('Caught exception: ',  $e->getMessage(), "\n");
            exit;
        }



    }

}