<?
	//Извлечение всех пользователей из БД
	$resultUsers = mysql_query("SELECT login, pass, stat FROM user") or die("Не удалось считать данные из базы");

	//Проверяет, переданы ли данные из формы
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Войти" && !isset($_SESSION['name']))
	{
		$name = CleanData($_POST['name']);
		$password = CleanData($_POST['password']);
		while($rowUser = mysql_fetch_assoc($resultUsers))
		{
			//Проверка совпадения пользователя и его пароля
			if($rowUser['login'] == $name && $rowUser['pass'] == $password)
			{
				//Создание переменных в сессии
				$_SESSION['name'] = $name;
				$_SESSION['privileges'] = $rowUser['stat'];	
				header("LOCATION:".$_SERVER['PHP_SELF']);
			}
		}
	}
	//Осуществляет выход из учетной записи пользователя
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Exit'] == "Выйти" && isset($_SESSION['name']))
	{
		session_unset();
		header("LOCATION: {$_SERVER['PHP_SELF']}");
	}
?>