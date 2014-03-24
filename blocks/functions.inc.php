<?
	//Очистка данных
	function CleanData($data, $value = 's')
	{
		switch($value)
		{
			case 's':
				$data = htmlspecialchars(mysql_real_escape_string(stripslashes(strip_tags(trim($data)))));
				break;
			case 'i':
				$data = intval((int)$data);
				break;
		}
		return $data;
	}
	//Обработка ошибок
	function AddErrors($nameRus, $nameLat, $photoSize = 1, $photoType = 'image/jpeg')
	{
		$_SESSION['error'] = "";
		if($nameRus == "")
		{
			$_SESSION['error'] .= "Не введено русское название.<br>";
		}
		if($nameLat == "")
		{
			$_SESSION['error'] .= "Не введено латинское название.<br>";
		}
		if($photoSize == 0 || $photoSize > 1024000)
		{
			$_SESSION['error'] .= "Размер изображения не должен превышать 1Мб.<br>";
		}
		if($photoType != "image/jpeg")
		{
			$_SESSION['error'] .= "Изображение должно иметь формат .jpg.<br>";
		}
	}
	function AddErrorsForExhibit($count, $inventoryNumber, $dateAct, $size, $weight, $passport, $photoSize = 1, $photoType = 'image/jpeg')
	{
		$_SESSION['error'] = "";
		if(!isset($count))
		{
			$_SESSION['error'] .= "Не указано количество экспонатов данного вида.<br>";
		}
		if($inventoryNumber == "")
		{
			$_SESSION['error'] .= "Не введен инвентарный номер.<br>";
		}
		if($dateAct == "")
		{
			$_SESSION['error'] .= "Не введена дата получения.<br>";
		}
		if($size == "")
		{
			$_SESSION['error'] .= "Не введен размер экспоната.<br>";
		}
		if($weight == "")
		{
			$_SESSION['error'] .= "Не введен вес экспоната.<br>";
		}
		if($passport == "")
		{
			$_SESSION['error'] .= "Не введен паспортный номер экспоната.<br>";
		}
		if($photoSize == 0 || $photoSize > 1024000)
		{
			$_SESSION['error'] .= "Размер изображения не должен превышать 1Мб.<br>";
		}
		if($photoType != "image/jpeg")
		{
			$_SESSION['error'] .= "Изображение должно иметь формат .jpg.<br>";
		}
	}
	
	function AddSuccessMessage($success)
	{
		$_SESSION['success'] = "";
		$_SESSION['success'] .= $success;
	}
	
	//Выводит ошибку в блоке
	function ShowErrors()
	{
		if(isset($_SESSION['error']) && $_SESSION['error'] != "")
		{
			printf("
				<div class='errors'>
				<h2>Не удалось добавить запись из-за ошибок:</h2>
					<p>{$_SESSION['error']}</p>
				</div>
			");
			
			unset($_SESSION['error']);
		}
	}
	
	//Вывод сообщения об успешном завершении операции
	function ShowSuccessMessage()
	{
		if(isset($_SESSION['success']))
		{
			printf("<div class='success'><p>{$_SESSION['success']}</p></div>");
				
			unset($_SESSION['success']);
		}
	}
	
	//Удаление по id из заданной таблицы
	function DeleteFromTableById($table, $id)
	{
		$sql = "DELETE FROM {$table} WHERE id = {$id}";
		mysql_query($sql) or die("Удаление не удалось. Попробуйте снова.");
	}
	//Добавление царства
	function AddKingdom($nameRus, $nameLat, $description)
	{
		$sql = "INSERT INTO carstva(namerus, namelat, opisanie) 
							VALUES('{$nameRus}', '{$nameLat}', '{$description}')";
		return mysql_query($sql) or die("Не удалось добавить царство.");
	}
	
	//Изменение царства
	function ChangeKingdom($id, $nameRus, $nameLat, $description)
	{
		$sql = "UPDATE carstva SET namerus = '{$nameRus}', 
								   namelat = '{$nameLat}', 
								   opisanie = '{$description}' 
							 WHERE id = {$id}";
		return mysql_query($sql) or die("Не удалось внести изменения.");
	}
	
	//Добавление типа(отряда)
	function AddType($idKingdom, $nameRus, $nameLat)
	{
		$sql = "INSERT INTO tip (idcar, namerus, namelat) VALUES ({$idKingdom}, '{$nameRus}', '{$nameLat}')";
		return mysql_query($sql) or die("Не удалось добавить тип.");
	}
	
	//Изменение типа
	function ChangeType($id, $idKingdom, $nameRus, $nameLat)
	{
		$sql = "UPDATE tip SET idcar = {$idKingdom}, namerus = '{$nameRus}', namelat = '{$nameLat}' WHERE id = {$id}";
		return mysql_query($sql) or die("Не удалось внести изменения.");
	}
	
	//Добавление класса
	function AddClass($idKingdom, $idType, $nameRus, $nameLat)
	{
		$sql = "INSERT INTO klass (idcar, idtip, namerus, namelat) VALUES ({$idKingdom}, {$idType}, '{$nameRus}', '{$nameLat}')";
		return mysql_query($sql) or die("Не удалось добавить класс.");
	}
	
	//Изменение класса
	function ChangeClass($id, $idKingdom, $idType, $nameRus, $nameLat)
	{
		$sql = "UPDATE klass SET idcar = {$idKingdom}, idtip = {$idType}, namerus = '{$nameRus}', namelat = '{$nameLat}' WHERE id = {$id}";
		return mysql_query($sql) or die("Не удалось изменить класс.");
	}
	
	//Добавление отряда
	function AddDetachment($idKingdom, $idType, $idClass, $nameRus, $nameLat, $photoName = "noimage.jpg")
	{
		$sql = "INSERT INTO otrjad(idcar, idtip, idklass, namerus, namelat, photoname) VALUES({$idKingdom}, {$idType}, {$idClass}, '{$nameRus}', '{$nameLat}', '{$photoName}')";
		return mysql_query($sql) or die ("Не удалось добавить отряд.");
	}
	//Изменение отряда
	function ChangeDetachment($id, $idKingdom, $idType, $idClass, $nameRus, $nameLat, $photoName = "noimage.jpg")
	{
		$sql = "UPDATE otrjad SET idcar = {$idKingdom}, idtip = {$idType}, idklass = {$idClass}, namerus = '{$nameRus}', namelat = '{$nameLat}', photoname = '{$photoName}' WHERE id = {$id}";
		mysql_query($sql) or die("Не удалось изменить отряд.");
	}
	//Добавление семейства
	function AddFamily($idKingdom, $idType, $idClass, $idDetachment, $nameRus, $nameLat)
	{
		$sql = "INSERT INTO semejstva(idcar, idtip, idklass, idotr, namerus, namelat) VALUES({$idKingdom}, {$idType}, {$idClass}, {$idDetachment}, '{$nameRus}', '{$nameLat}')";
		return mysql_query($sql) or die("Не удалось добавить семейство.");
	}
	//Изменение семейства
	function ChangeFamily($id, $idKingdom, $idType, $idClass, $idDetachment, $nameRus, $nameLat)
	{
		$sql = "UPDATE semejstva SET idcar = {$idKingdom}, idtip = {$idType}, idklass = {$idClass}, idotr = {$idDetachment}, namerus = '{$nameRus}', namelat = '$nameLat' WHERE id = {$id}";
		mysql_query($sql) or die("Не удалось изменить семейство.");
	}
	//Добавление вида
	function AddSpecies($idKingdom, $idType, $idClass, $idDetachment, $idFamily, $nameRus, $nameLat)
	{
		$sql = "INSERT INTO vid(idcar, idtip, idklass, idotr, idsem, namerus, namelat) VALUES({$idKingdom}, {$idType}, {$idClass}, {$idDetachment}, {$idFamily}, '{$nameRus}', '{$nameLat}')";
		return mysql_query($sql) or die("Не удалось добавить вид.");
	}
	//Изменение вида
	function ChangeSpecies($id, $idKingdom, $idType, $idClass, $idDetachment, $idFamily, $nameRus, $nameLat)
	{
		$sql = "UPDATE vid SET idcar = {$idKingdom}, idtip = {$idType}, idklass = {$idClass}, idotr = {$idDetachment}, idsem = {$idFamily}, namerus = '{$nameRus}', namelat = '{$nameLat}' WHERE id = {$id}";
		mysql_query($sql) or die("Не удалось изменить вид.");
	}
	//Добавление экспоната
	function AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight,	$findHistory, $makeMethod, $makePlace, $author, $history, $passport, $photoName = "noimage.jpg")
	{
		$sql = "INSERT INTO eksponat(vid, kol, invnom, datpost, razm, ves, ist, mtizg, mvizg, autor, hisexp, pasport, photoname) 
							  VALUES({$idSpecies}, '{$count}', '{$inventoryNumber}', '{$dateAct}', '{$size}', '{$weight}',	'{$findHistory}', '{$makeMethod}', '{$makePlace}', '{$author}', '{$history}', {$passport}, '{$photoName}')";
		return mysql_query($sql) or die("Не удалось добавить экспонат.");
	}
	//Изменение экспоната
	function ChangeExhibit($id, $idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight,	$findHistory, $makeMethod, $makePlace, $author, $history, $passport, $photoName = "noimage.jpg")
	{
		$sql = "UPDATE eksponat 
				SET vid = {$idSpecies}, kol = '{$count}', invnom = '{$inventoryNumber}', datpost = '{$dateAct}', razm = '{$size}', ves = '{$weight}', ist = '{$findHistory}', mtizg = '{$makeMethod}', mvizg = '{$makePlace}', autor = '{$author}', hisexp = '{$history}', pasport = {$passport}, photoname = '{$photoName}' WHERE id = {$id}";
		mysql_query($sql) or die("Не удалось изменить экспонат");
	}
?>