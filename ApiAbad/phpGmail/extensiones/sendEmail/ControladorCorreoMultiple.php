<?php
/**
 * DISPARADOR DE CORREOS ADAPTATION API Abad Esquen Leyner
 */
require 'PHPMailer.php';require 'SMTP.php';require 'Exception.php';require 'OAuth.php';
/*NOTA Activar SMTP DEBUDING -> 0= off para produccion ; 1= client message ; 2= client and server message */
class ControladorCorreoMultiple
{
    /*ATRIBUTOS*/
    public $EmailReceptor;
    public $NombreRemitente;
    public $NombreReceptor;
    public $Asunto;
    public $CuerpoEmail;

    /*METODO MAIN*/
    /* -----------------------------------------------------------------------------------------*/
    public function __construct($EmailRecepto, $NombreRemitent, $NombreRecepto, $Asunt, $CuerpoEmai, $email_remitente, $password_remitente)
    {
        # code...
        $this->EmailReceptor      = $EmailRecepto;
        $this->NombreRemitente    = $NombreRemitent;
        $this->NombreReceptor     = $NombreRecepto;
        $this->Asunto             = $Asunt;
        $this->CuerpoEmail        = $CuerpoEmai;
        $this->email_remitente    = $email_remitente;
        $this->password_remitente = $password_remitente;

    }

    /* ----------------------------------------------------------------*/
    public function enviarEmail()
    {
        // echo '<p>'.$this->EmailReceptor.'</p>';
        /* ---------------------------------------------------------------------------------*/
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        /* ---------------------------------------------------------------------------------*/
        $mail->SMTPDebug  = 0;
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth   = true;
        $mail->Username   = $this->email_remitente;
        $mail->Password   = $this->password_remitente;
        /* ---------------------------------------------------------------------------------*/
        $mail->setFrom($this->EmailReceptor, $this->NombreRemitente);
        $mail->addAddress($this->EmailReceptor, $this->NombreReceptor);
        $mail->Subject = $this->Asunto;
        $mail->Body    = $this->CuerpoEmail;
        /* ---------------------------------------------------------------------------------*/
        $mail->isHTML(true);

        // Activo condificacción utf-8
        $mail->CharSet = 'UTF-8';

        if (!$mail->send()) {
            # code...
            $respuestaDeEnvio = "error al enviar" . $mail->ErrorInfo;
        } else {
            $respuestaDeEnvio = "Email enviado";
        }
    }
    /* ----------------------------------------------------------------*/
}
/* ---------------------------------------------------------------------------------*/

/* ---------------------------------------------------------------------------------*/
// $sendEmail= new  ControladorCorreoMultiple('soporte2@inppares.org','Leyner','SOPORTE','Asunto del correo','Cuerpo email');
// $sendEmail->enviarEmail();
