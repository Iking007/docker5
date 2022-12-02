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
	<title>Добавление файла</title>
</head>
<body>
	<header><a href="/index.html">Главная</a> <a href="/">Список книг</a> <a href="/info.html">Информация о библиотеке</a>
		<a href="/newFile.php">Добавить файл</a></header>
	<form method="post" action="newFile.php" enctype="multipart/form-data">
		<label for="inputfile">Загрузить файл</label>
		<input type="file" id="inputfile" name="inputfile"></br>
		<input type="submit" value="Нажмите для загрузки">
	</form>
	<?php
		error_reporting(E_ERROR);
		if(isset($_FILES) && $_FILES['inputfile']['error'] == 0){ // Проверяем, загрузил ли пользователь файл
			$destiation_dir = dirname(__FILE__) .'/inputFiles/'.$_FILES['inputfile']['name']; // Директория для размещения файла
			move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
			echo 'Файл Загружен'; // Оповещаем пользователя об успешной загрузке файла
		}
		else{?>
	<form method="post" action="newFile.php" enctype="multipart/form-data">
		<label for="inputfile">Загрузить файл</label>
		<input type="file" id="inputfile" name="inputfile"></br>
		<input type="submit" value="Нажмите для загрузки">
	</form>
	<?php
		}
	?>
</body>
</html>