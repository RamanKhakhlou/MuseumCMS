<?
	if(isset($_SESSION['name']))
	{
		//Обработка данных и добавление их в БД
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{		
			$idSpecies = CleanData($_POST['selectedSpecies'], 'i');
			$count = CleanData($_POST['count'], 'i');
			$inventoryNumber = CleanData($_POST['inventoryNumber']);
			$dateAct = CleanData($_POST['dateAct']);
			$size = CleanData($_POST['size']);
			$weight = CleanData($_POST['weight']);
			$findHistory = CleanData($_POST['findHistory']);
			$makeMethod = CleanData($_POST['makeMethod']);
			$makePlace = CleanData($_POST['makePlace']);
			$author = CleanData($_POST['author']);
			$history = CleanData($_POST['history']);
			$passport = CleanData($_POST['passport']);
			if(isset($count) && $inventoryNumber != "" && $dateAct != "" && $size != "" && $weight != "" && isset($passport))
			{
				//Проверка размера изображения и типа изображения
				if($_FILES['photo']['size'] != 0 && $_FILES['photo']['size'] <= 1024000)
				{				
					//Проверка типа изображения
					if($_FILES['photo']['type'] == "image/jpeg")
					{
						$sqlSpecies = "SELECT namelat FROM vid WHERE id = {$idSpecies}";
						$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
						$species = mysql_fetch_assoc($resultSpecies);
						$sqlExhibitId = "SELECT id FROM eksponat ORDER BY id DESC LIMIT 1";
						$resultExhibitId = mysql_query($sqlExhibitId);
						$exhibitId = mysql_fetch_assoc($resultExhibitId);
						$photoName = "[" . ++$exhibitId['id'] . "]{$species['namelat']}.jpg";
						$uploaddir = 'image/exhibits/';
						$uploadfile = $uploaddir . $photoName;
						//Копирование изображения
						move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);		
						AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight,	$findHistory, $makeMethod, $makePlace, $author, $history, $passport, $photoName);
					header("Location: index.php?action=add_exhibit");
					}
				}
				if($_FILES['photo']['name'] == "")
				{
					AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight,	$findHistory, $makeMethod, $makePlace, $author, $history, $passport);
					header("Location: index.php?actionAdd=add_exhibit");
				}
			}
			if($_FILES['photo']['name'] == "")
			{
				AddErrorsForExhibit($count, $inventoryNumber, $dateAct, $size, $weight, $passport);
			}
			else
			{
				AddErrorsForExhibit($count, $inventoryNumber, $dateAct, $size, $weight, $passport, $_FILES['photo']['size'], $_FILES['photo']['type']);
			}
		}
	}
?>