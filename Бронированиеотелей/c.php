<?php
session_start();

require_once('dbcon.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $location = $_POST['location'];
    $star_rating = $_POST['star_rating'];
    

    $error='';

    if(empty($error)){

        $query = "INSERT INTO hotels (name, location, star_rating) VALUES ($1, $2, $3)";

        $result = pg_query_params($conn, $query, array( $name, $location, $star_rating));

        if ($result){
            header('Location: index.php');
        } else {
            $error = "Ошибка: " . pg_last_error($conn);
        }
    }
    if (!empty($error)) {
        echo "<p>$error</p>";
    }

}
pg_close($conn);
?>