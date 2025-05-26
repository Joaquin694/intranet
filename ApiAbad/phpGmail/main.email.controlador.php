<?php

//PENDIENTER DE VALIDAR RECAPCHA NO ROBOT
// isset($_SESSION["recaptcha_secretkey"])
if (password_verify($_POST['key'], "$2y$10$1Yv2k77iUhwMTjYqD5nPUOQ.L/gKZFWDLF930wUOAYUR2FfWXCPMi")) {
    # code...
    require_once "extensiones/sendEmail/ControladorCorreoMultiple.php";
    switch ($_POST['laaction']) {
        case 'send___email_gmail_masivo':
            # code...
            /* --------------------------------- send email */
            // $sendEmailMultiple = new ControladorCorreoMultiple($_POST['txtEmailCliente'], $_POST['txtNameRemit'], $_POST['txtNameCliente'], $_POST['txtAsunto'], $_POST['txtContenido']), $sendEmailMultiple->enviarEmail($_POST['txtEmailRemite'], $_POST['txtPasswordRemite']);
            break;
        default:
            # code...
            echo "Ooops...Error Switch 404";
            break;
    }
} else {echo "Ooops...Error 404";}
