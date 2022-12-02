<?php 
    session_start();
?>
<html lang="ru">
<head>
    <title>Книга</title>
    <?php 
        if(isset($_SESSION['light'])){
            if($_SESSION['light'] == 1){?>
                <link rel="stylesheet" type="text/css" href="styles/lightStyle.css">
    <?php
            }
            else{?>
                <link rel="stylesheet" type="text/css" href="styles/darkStyle.css">
    <?php
            }
        }
        else{?>
            <link rel="stylesheet" type="text/css" href="styles/lightStyle.css">

    <?php
            $_SESSION['light'] = 1;
        }
    ?>
</head>
<body>
    <header><a href="/index.html">Главная</a> <a href="/">Список книг</a> <a href="/info.html">Информация о библиотеке</a>
        <a href="/newFile.php">Добавить файл</a></header>
<?php
    $mysqli = new mysqli("db", "Roslov", "root", "libDB");
    $method = $_SERVER['REQUEST_METHOD'];
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            $mysqli->set_charset("utf8");
            $result = $mysqli->query("SELECT * FROM books WHERE ID = '{$_GET['id']}'");
            if ($result == NULL){
                echo "<h1>Ошибка запроса, попробуйте ещё раз</h1>";
            }
            foreach ($result as $row){
                echo "<h1>{$row['name']}:</h1>";
                echo "<h2>{$row['description']}</h2>";
                echo "<h3 style='float: left'>{$row['writer']}</h3>";
            }
            break;  
        case 'POST':
            echo "<h1>Тут будет добавление данных в бд</h1>";
            echo "<h3>Это POST</h3>";
            break;
        case 'UPDATE':
            $result = $mysqli->query("SELECT * FROM books while id='{$_GET['id']}'");
            foreach ($result as $row) {
                echo "<h1>Тут будет обновление данных</h1>";
                
            }
            echo "<h3>Это UPDATE</h3>";
            break;
        case 'DELETE':
            $result = mysqli_query("SELECT * FROM books while id='{$_GET['id']}'", $mysqli);
            foreach ($result as $row) {
                echo "<h1>Тут будет удаление книги с id/h1>";
            }
            echo "<h3>Это DELETE</h3>";
            break;
        default:
?>
    <h1>Ошибка запроса, попробуйте ещё раз</h1>
<?php
    }
?>
</body>
</html>

