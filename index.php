<?php
/*
* Файл являет собой эдиную точку входа на сайт со списком студентов
*/
	session_start(); 
    header("Content-Type:text/html;charset=utf-8");
	
	/*
	*Подключаем конфигурационный файл и классы которые содаржат основные свойства и методы используемы в работе сайта
	*/
	require_once("config.php");
	require_once("classes/TMCore.php");
	require_once("classes/TMCore_Admin.php");
	
	/*
	* Механизм принятия GET параметров. Определение класса, значение которого хранится в ячейке option
	*/
	if ($_GET['option']) {								
		$class = trim(strip_tags($_GET['option']));		
	}
	else
	{
		$class = 'main';								
	}
	
	/*
	* Механизм подгрузки нужного класса
	*/
	if (file_exists("classes/".$class.".php")) {	/*Проверяем существует ли файл с данным именем*/
		include("classes/".$class.".php");
		if (class_exists($class)) {					/*Проверяем существует ли данный класс*/
			$obj = new $class;						/*Создание объекта данного класса*/
			$obj->get_body();						/*Создание общего метода, который выводит данные на страничке*/
		}
		else
		{
			exit("<p>Не правильные данные для входа</p>");
		}
	}
	else
	{
		exit("<p>Не правильный адрес</p>");
	}
	

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Тестовое задание - Зеленский Вадим</title>
</head>

<body>
	
		
	
	
	
</body>
</html>