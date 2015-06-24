<?php
if (!empty($_POST)) {
    if(empty($_POST['name']) || empty($_POST['email'])|| empty($_POST['phone'])  ){
        $arrayMsj['success'] = FALSE;
        $arrayMsj['message'] = 'Todos los campos son requeridos';
        echo (json_encode($arrayMsj));
        exit;
    }
    require '/home4/llenitas/mailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->FromName ='Formulario llenitas' ;
    $mail->CharSet = 'UTF-8';
    $mail->From = 'webmaster@simonsein.com';
    $mail->Subject = 'Mensaje llenitas';
    $mail->MsgHTML('Mensaje con HTML');
    $template = '<h1>Mensaje enviado desde el formulario de Llenitas</h1><br><br>';
    $template .= 'Nombre: ' . $_POST['name'] . '<br>';
    $template .= 'Email: ' . $_POST['email'] .'<br>';
    $template .= 'telefono: ' . $_POST['phone'] .'<br>';

    $mail->Body = $template;
    $mail->AddAddress('webmaster@simonsein.com', '');
    if($mail->Send()){
        $arrayMsj['success'] = TRUE;
        $arrayMsj['message'] = 'Felicitaciones, su mensaje a sido enviado con éxito!!';
    }else{
        $arrayMsj['success'] = false;
        $arrayMsj['message'] = 'Su mensaje no a sido enviado con éxito!!';
    }

    echo (json_encode($arrayMsj));
    exit;
}else{
    echo "Error al intentar acceder";
}