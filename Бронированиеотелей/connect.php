<?php
session_start();
require_once('db.php');
$host = 'localhost'; // Хост базы данных
$dbname = 'postgres'; // Имя вашей базы данных
$user = 'postgres'; // Имя пользователя базы данных
$password = '12345'; // Пароль пользователя базы данных

try {
    // Создаем новое подключение с использованием PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$postgres", $user, $password);
    
    // Устанавливаем режим обработки ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Успешное подключение
    // echo "Подключение к базе данных успешно!"; // Можно закомментировать или убрать в продакшене
} catch (PDOException $e) {
    // Обработка ошибок подключения
    echo "Ошибка подключения: " . $e->getMessage();
}
?>