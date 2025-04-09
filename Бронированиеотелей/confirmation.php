<?php
session_start();
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Подтверждение бронирования отеля">
    <title>Подтверждение бронирования</title>
    <link rel="stylesheet" href="../Бронированиеотелей/styles.css">
</head>
<body>
    <header>
        <h1>Подтверждение бронирования</h1>
        <nav>
            <a href="../Бронированиеотелей/index.php">Главная</a>
            <a href="../Бронированиеотелей/cancel.php">Отмена бронирования</a>
        </nav>
    </header>
    <main>
        <section id="confirmation">
            <h2>Ваше бронирование</h2>
            <p><strong>Название отеля:</strong> <span id="confirmedHotelName"></span></p>
            <p><strong>Расположение:</strong> <span id="confirmedHotelLocation"></span></p>
            <p><strong>Количество звезд:</strong> <span id="confirmedHotelStars"></span></p>
            <p><strong>Цена за ночь:</strong> <span id="confirmedHotelPrice"></span></p>
            <p><strong>Дата заезда:</strong> <span id="confirmedCheckIn"></span></p>
            <p><strong>Дата выезда:</strong> <span id="confirmedCheckOut"></span></p>
            <p><strong>Количество человек:</strong> <span id="confirmedGuests"></span></p>
            <p><strong>Номер комнаты:</strong> <span id="confirmedRoomNumber"></span></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Система бронирования отелей</p>
    </footer>

    <script>
        function getQueryParams() {
            const params = {};
            const queryString = window.location.search.substring(1);
            const regex = /([^&=]+)=([^&]*)/g;
            let m;
            while (m = regex.exec(queryString)) {
                params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
            }
            return params;
        }

        function populateConfirmation() {
            const params = getQueryParams();
            document.getElementById('confirmedHotelName').textContent = params.name || 'Не указано';
            document.getElementById('confirmedHotelLocation').textContent = params.location || 'Не указано';
            document.getElementById('confirmedHotelStars').textContent = params.stars || 'Не указано';
            document.getElementById('confirmedHotelPrice').textContent = params.price ? `${params.price} ₽` : 'Не указано';
            document.getElementById('confirmedCheckIn').textContent = params.checkIn || 'Не указано';
            document.getElementById('confirmedCheckOut').textContent = params.checkOut || 'Не указано';
            document.getElementById('confirmedGuests').textContent = params.guests || 'Не указано';
            document.getElementById('confirmedRoomNumber').textContent = params.roomNumber || 'Не указано';
        }

        // Заполнение страницы подтверждения при загрузке
        window.onload = populateConfirmation;
    </script>
</body>
</html>
