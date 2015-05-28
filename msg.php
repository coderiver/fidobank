<?php
if ($_POST) {
    $to_email = "arturmorozv@gmail.com"; //Recipient email, Replace with own email here
    
    //check if its an ajax request, exit if not
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } 
    
    //Sanitize input data using PHP filter_var().
    $user_name   = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $user_code   = filter_var($_POST["user_code"], FILTER_SANITIZE_STRING);
    $user_phone  = filter_var($_POST["user_phone"], FILTER_SANITIZE_STRING);
    $user_day    = filter_var($_POST["user_day"], FILTER_SANITIZE_STRING);
    $user_month  = filter_var($_POST["user_month"], FILTER_SANITIZE_STRING);
    $user_status = filter_var($_POST["user_status"], FILTER_SANITIZE_STRING);
    $user_money  = filter_var($_POST["user_money"], FILTER_SANITIZE_STRING);
    
    //email body
    $message_body = "Спасибо! Ваша заявка успешно отправлена. Менеджер по выдаче кредитов свяжется с вами в ближайшее время.";

    // subject
    $subject = "FIDOBANK";
    
    //proceed with PHP email.
    $headers = 'From: '.$subject.'' . "\r\n" .
    'Reply-To: '.$subject.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    
    if (!$send_mail) {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }
    else{
        $output = json_encode(array('type'=>'message', 'text' => 'Спасибо! Ваша заявка успешно отправлена. Менеджер по выдаче кредитов свяжется с вами в ближайшее время.'));
        die($output);
    }
}
?>