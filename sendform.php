<?php
$contacts = array("maria@texo.by", "info@aqts.by", "sales@aqts.by");
$name = trim($_POST['name']);
$phone = trim($_POST['phone_number']);
$email = trim($_POST['email']);
$city = trim($_POST['city']);
$message = trim($_POST['message']);
$hidden = trim($_POST['title']);
$fromMail = 'info@cleanol.by'; //Почта отправителя (в домене почты должен быть адрес вашего сайта)
$fromName = 'Поступила заявка с сайта'; //Заголовок письма
$emailTo = implode(',', $contacts); //Ваша почта
$subject = 'Форма обратной связи cleanol.by';
$subject = '=?utf-8?b?' . base64_encode($subject) . '?=';
$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
$headers .= "From: " . $fromName . " <" . $fromMail . "> \r\n";

// Содержимое письма 
$body = "Получено письмо с сайта cleanol.by \n Имя: $name\nТелефон: $phone\nПочта: $email\nГород: $city\nСообщение: $message\nС какой формы: $hidden";

// сообщение будет отправлено в случае, если поле с номером телефона не пустое 
if (strlen($phone) > 0) {
    $mail = mail($emailTo, $subject, $body, $headers, '-f' . $fromMail);
    return;
}
