<?php
session_start();
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Форма бронирования отеля">
    <title>Создать бронирование</title>
    <link rel="stylesheet" href="../Бронированиеотелей/styles.css">
</head>
<body>
    <header>
        <h1>Создать бронирование</h1>
        <nav>
            <a href="../Бронированиеотелей/index.php">Главная</a>
            <a href="../Бронированиеотелей/cancel.php">Отмена бронирования</a>
        </nav>
    </header>
    <main>
        <section id="bookingForm">
            <h2>Форма бронирования</h2>
            <form id="form" onsubmit="return handleBooking(event)">
                <input type="text" id="hotelName" placeholder="Название отеля" readonly>
                <input type="text" id="hotelLocation" placeholder="Расположение" readonly>
                <input type="number" id="hotelStars" placeholder="Количество звезд" readonly>
                <input type="number" id="hotelPrice" placeholder="Цена за ночь" readonly>
                <label for="checkIn">Дата заезда:</label>
                <input type="date" id="checkIn" required>
                <label for="checkOut">Дата выезда:</label>
                <input type="date" id="checkOut" required>
                <label for="guests">Количество человек:</label>
                <input type="number" id="guests" min="1" required>
                <label for="roomNumber">Номер комнаты:</label>
                <input type="text" id="roomNumber" required>
                <button type="submit">Забронировать</button>
            </form>
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

        function populateForm() {
            const params = getQueryParams();
            document.getElementById('hotelName').value = params.name || '';
            document.getElementById('hotelLocation').value = params.location || '';
            document.getElementById('hotelStars').value = params.stars || '';
            document.getElementById('hotelPrice').value = params.price || '';
        }

        function handleBooking(event) {
            event.preventDefault();

            const hotelName = document.getElementById('hotelName').value;
            const hotelLocation = document.getElementById('hotelLocation').value;
            const hotelStars = document.getElementById('hotelStars').value;
            const hotelPrice = document.getElementById('hotelPrice').value;
            const checkIn = document.getElementById('checkIn').value;
            const checkOut = document.getElementById('checkOut').value;
            const guests = document.getElementById('guests').value;
            const roomNumber = document.getElementById('roomNumber').value;

            // Создаем URL для перенаправления на страницу подтверждения
            const confirmationUrl = `confirmation.php?name=${encodeURIComponent(hotelName)}&location=${encodeURIComponent(hotelLocation)}&stars=${hotelStars}&price=${hotelPrice}&checkIn=${checkIn}&checkOut=${checkOut}&guests=${guests}&roomNumber=${roomNumber}`;

            // Перенаправляем на страницу подтверждения
            window.location.href = confirmationUrl;
        }

        // Заполнение формы при загрузке страницы
        window.onload = populateForm;
    </script>
</body>
</html>
