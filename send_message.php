<?php
    // Получаем данные из формы
    $bot_token = $_POST['bot_token'];
    $chat_id = $_POST['chat_id'];
    $message = $_POST['message'];

    // Формируем URL для отправки сообщения
    $api_url = 'https://api.telegram.org/bot' . $bot_token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message);

    // Отправляем запрос на сервер Telegram
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // Выводим сообщение о результате отправки
    if ($result) {
        echo 'Message sent successfully!';
    } else {
        echo 'Error sending message.';
    }
?> 
