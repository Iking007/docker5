<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<title>Настройки</title>
</head>
<body>
	<header><a href="/index.html">Главная</a> <a href="/">Список книг</a> <a href="/info.html">Информация о библиотеке</a>
		<a href="/newFile.php">Добавить файл</a></header>
	<?php
		if($_GET['light'] != null){
			switch ($_GET['light']) {
				case '0':
					echo "<h1>Теперь тут темно<h1>";
					$_SESSION['light'] = 0;
					break;
				case '1':
					echo "<h1>Кто включил свет?!<h1>";
					$_SESSION['light'] = 1;
					break;
				default:
					echo "<h1>Ошибка, нет такого положения света</h1>";
					break;		
			}
		}
	?>
</body>
</html>