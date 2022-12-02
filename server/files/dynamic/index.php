<?php 
    session_start();
?>
<html lang="ru">
<head>
<title>Список книг</title>
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
<h1>Таблица книг</h1>
<table>
    <tr><th>Название</th><th>Автор</th></tr>
<?php
$mysqli = new mysqli("db", "Roslov", "root", "libDB");
//$mysqli->set_charset("utf8");
$result = $mysqli->query("SELECT * FROM books");
foreach ($result as $row){
    echo "<tr><td><a href='book.php?id={$row['ID']}'>{$row['name']}</a></td><td>{$row['writer']}</td></tr>";
}
?>
</table>
</body>
</html>

