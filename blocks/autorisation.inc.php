<?
	//Проверяет, переданы ли данные из формы
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Войти" && !isset($_SESSION['name']))
	{
		$name = CleanData($_POST['name']);
		$password = md5(CleanData($_POST['password']));
		
		$sql = "SELECT COUNT(*) FROM user WHERE login = '{$name}' AND pass = '{$password}'" or die("Не удалось извлечь пользователей.");;
		$count = mysql_query($sql);
		
		if(mysql_result($count, 0) > 0)
		{
			$_SESSION['name'] = $name;
			header("LOCATION:".$_SERVER['PHP_SELF']);
		}
	}
	//Осуществляет выход из учетной записи пользователя
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Exit'] == "Выйти" && isset($_SESSION['name']))
	{
		session_unset();
		header("LOCATION: {$_SERVER['PHP_SELF']}");
	}
?>