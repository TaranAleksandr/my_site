<?php

$name = $_POST['name']; // получаем имя клиента
$tel = $_POST['tel']; // получаем телефон клиента
$email = $_POST['email']; // получаем почту клиента
$message = $_POST['description']; // получаем сообщение клиента

// воодим между кавычек токен бота, который прислал @botfater
$token = "5821684718:AAHagLjWLkcI5P7bxuaZgJ1mCm6HttKIZcE"; 
// вставляем номер чата, который можно найти на странице 
// api.telegram.org/botXXXXXXXXX/getUpdates — где XXX это токен бота
$chat_id = "416433718";

// Собираем данные в один массив 
$arr = array(
  'Клиент: ' => $name,
  'Телефон' => $tel,
  'Email: ' => $email,
  'Сообщение: ' => $message
);

// составляем сообщение из данных массива
foreach($arr as $key => $value) {
  $txt .= $key."<b> ". urlencode($value)."</b> "."%0A";
};

// даем команду боту отправить сообщение с текстом
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) { 
  return true; // если прошло успешно, возвращаем ответ true
} else {
  return false; // если ошибка, возвращаем false
}
?>