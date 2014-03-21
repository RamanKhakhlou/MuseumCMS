<?
	//Выполняется добавление при передаче методом Post	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			//Если основные поля заполнены
			if($nameRus != "" && $nameLat != "")
			{
				//Добавление нового царства в БД
				AddKingdom($nameRus, $nameLat, $description);	
				//Перезагрузка страницы
				header("LOCATION: index.php?actionAdd=add_kingdom");
			}			
			//Вывод ошибок
			AddErrors($nameRus, $nameLat);
		}
	}
?>