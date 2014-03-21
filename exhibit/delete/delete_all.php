<?
	session_start();
	//Подключение к БД
	include("../../blocks/connection.inc.php");
	//Подключение имеющихся функций
	include("../../blocks/functions.inc.php");
	//Производит авторизацию
	include("../../blocks/autorisation.inc.php");
?>
<html>
	<head>
		<title>Панель администрации - Удаление</title>
	</head>
	<body>
		<?
			if(!isset($_SESSION['name']))
			{			
				//Вызывает форму для авторизации
				include("../../blocks/autorisation_form.inc.php");				
			}			
			//Вызывается, если пользователь авторизовался
			elseif(isset($_SESSION['name']))
			{				
				//Вывод текущего пользователя
				include("../../blocks/show_user.inc.php");
		?>
				<p>Удалить</p>
				<a href = "delete_kingdom.php">Царство</a>
				<br>
				<a href = "delete_type.php">Тип</a>
				<br>
				<a href = "delete_class.php">Класс</a>
				<br>
				<a href = "delete_detachment.php">Отряд</a>
				<br>
				<a href = "delete_family.php">Семейство</a>
				<br>
				<a href = "delete_species.php">Вид</a>
				<br>
				<a href = "delete_exhibit.php">Экспонат</a>
		<?
			}
			mysql_close();
		?>
	</body>
</html>