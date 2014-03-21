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
		<link href="../../css/style.css" type="text/css" rel="stylesheet">
		<title>Панель администрации - Добавление</title>
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
				//include("../../blocks/show_user.inc.php");	
				include("../../blocks/header.inc.php");
		?>
				<p>Добавить</p>
				<a href = "add_kingdom.php">Царства</a>
				<br>
				<a href = "add_type.php">Тип</a>
				<br>
				<a href = "add_class.php">Класс</a>
				<br>
				<a href = "add_detachment.php">Отряд</a>
				<br>
				<a href = "add_family.php">Семейство</a>
				<br>
				<a href = "add_species.php">Вид</a>
				<br>
				<a href = "add_exhibit.php">Экспонат</a>
		<?
			}
			mysql_close();
		?>	
	</body>
</html>