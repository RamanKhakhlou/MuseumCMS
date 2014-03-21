<?
	if(isset($_SESSION['name']))
	{		
		//Выполняется после отправки формы
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'] == "Отправить")
		{
			//Обработка введенных данных
			$id = CleanData($_POST["id"], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			//Внесение изменений в БД
			if($nameRus != "" && $nameLat != "")
			{
				ChangeKingdom($id, $nameRus, $nameLat, $description);							
				//Переход на предыдущую страницу
				header("LOCATION: index.php?actionChangeAll=change_kingdom");
			}			
			AddErrors($nameRus, $nameLat);
			header("LOCATION: index.php?actionChangeAll=change_kingdom");
		}
	}
?>