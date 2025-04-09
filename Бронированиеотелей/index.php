<?php
session_start();
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Система бронирования отелей">
    <title>Система бронирования отелей</title>
    <link rel="stylesheet" href="../Бронированиеотелей/styles.css">
</head>
<body>
    <header>
        <h1>Система бронирования отелей</h1>
        <nav>
            <a href="../Бронированиеотелей/index.php">Главная</a>
            <a href="../Бронированиеотелей/cancel.php">Отмена бронирования</a>
        </nav>
    </header>
    <main>
        <section id="search">
            <h2>Поиск отелей</h2>
            <form id="searchForm" onsubmit="return handleSearch(event)">
                <input type="text" placeholder="Город" name="city" required>
                <label for="stars">Количество звезд:</label>
                <select name="stars" id="stars">
                    <option value="">Все</option>
                    <option value="1">1 звезда</option>
                    <option value="2">2 звезды</option>
                    <option value="3">3 звезды</option>
                    <option value="4">4 звезды</option>
                    <option value="5">5 звезд</option>
                </select>
                <button type="submit">Поиск</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Система бронирования отелей</p>
    </footer>

    <script>
        function handleSearch(event) {
            event.preventDefault(); // Предотвращаем стандартное поведение формы
            const cityInput = event.target.city.value;
            const starsInput = event.target.stars.value;
            // Перенаправление на страницу результатов с параметрами города и звезд
            window.location.href = `results.php?city=${encodeURIComponent(cityInput)}&stars=${encodeURIComponent(starsInput)}`;
        }
    </script>
</body>
</html>
