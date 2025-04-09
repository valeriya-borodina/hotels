<?php
session_start();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Отмена бронирования отеля">
    <title>Отмена бронирования</title>
    <link rel="stylesheet" href="../Бронированиеотелей/styles.css">
</head>
<body>
    <header>
        <h1>Отмена бронирования</h1>
        <nav>
            <a href="../Бронированиеотелей/index.php">Главная</a>
            <a href="../Бронированиеотелей/cancel.php">Отмена бронирования</a>
        </nav>
    </header>
    <main>
        <section id="cancelBooking">
            <h2>Отмена вашего бронирования</h2>
            <p>Введите информацию для отмены бронирования:</p>
            <form id="cancelForm">
                <label for="hotelName">Название отеля:</label>
                <input type="text" id="hotelName" required>
                
                <label for="bookingDate">Дата бронирования:</label>
                <input type="date" id="bookingDate" required>
                
                <button type="button" onclick="cancelBooking()">Отменить бронирование</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Система бронирования отелей</p>
    </footer>
    <script>
        function cancelBooking() {
            const hotelName= document.getElementById('hotelName').value;
            const bookingDate = document.getElementById('bookingDate').value;

            // Логика отмены бронирования
            // Здесь можно добавить код для обработки отмены, например, удаление из localStorage
            localStorage.removeItem('hotelName');
            localStorage.removeItem('location');
            localStorage.removeItem('bookingDate');
            localStorage.removeItem('roomNumber');
            localStorage.removeItem('cost');

            alert(`Бронирование в ${hotelName} на ${bookingDate} отменено.`);
            // Перенаправление на главную страницу или страницу подтверждения
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>

