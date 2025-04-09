<?php
session_start();
require_once('db.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Результаты поиска отелей">
    <title>Результаты поиска отелей</title>
    <link rel="stylesheet" href="../Бронированиеотелей/styles.css">
</head>
<body>
    <header>
        <h1>Результаты поиска</h1>
        <nav>
            <a href="../Бронированиеотелей/index.php">Главная</a>
            <a href="../Бронированиеотелей/cancel.php">Отмена бронирования</a>
        </nav>
    </header>
    <main>
        <section id="hotelResults">
            <!-- Здесь будет отображаться список отелей -->
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Система бронирования отелей</p>
    </footer>

    <script>
        const hotels = [
            { name: "Senator", location: "Москва", stars: 4, price: 5350 },
            { name: "Mys Hotel", location: "Москва", stars: 5, price: 18500 },
            { name: "Бета Измайлово", location: "Москва", stars: 3, price: 4700 },
            { name: "Гранд отель Европа", location: "Санкт-Петербург", stars: 5, price: 16000 },
            { name: "AKYAN", location: "Санкт-Петербург", stars: 4, price: 4675 },
            { name: "Geleon", location: "Санкт-Петербург", stars: 3, price: 3600 },
            { name: "Crystal House Suite Hotel", location: "Калиниград", stars: 5, price: 17500 },
            { name: "Radisson Blu Hotel Kaliningrad", location: "Калинград", stars: 4, price: 6900 },
            { name: "Мартон Олимпик", location: "Калинград", stars: 3, price: 2200 },
        ];

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

        function displayHotels(filteredHotels) {
            const container = document.getElementById('hotelResults');
            container.innerHTML = ''; // Очищаем контейнер
            if (filteredHotels.length === 0) {
                container.innerHTML = '<p>Отели не найдены в этом городе.</p>';
            } else {
                filteredHotels.forEach(hotel => {
                    const hotelDiv = document.createElement('div');
                    hotelDiv.classList.add('hotel');
                    hotelDiv.innerHTML = `
                        <h3>${hotel.name}</h3>
                        <p>Расположение: ${hotel.location}</p>
                        <p>Количество звезд: ${hotel.stars}</p>
                        <p>Стоимость: ${hotel.price} руб./ночь</p>
                        <a href="booking.php?name=${encodeURIComponent(hotel.name)}&location=${encodeURIComponent(hotel.location)}&stars=${hotel.stars}&price=${hotel.price}">Забронировать</a>
                    `;
                    container.appendChild(hotelDiv);
                });
            }
        }

        // Основная логика
        const params = getQueryParams();
        const city = params.city ? params.city : '';
        const filteredHotels = hotels.filter(hotel => hotel.location.toLowerCase() === city.toLowerCase());
        displayHotels(filteredHotels);
    </script>
</body>
</html>
