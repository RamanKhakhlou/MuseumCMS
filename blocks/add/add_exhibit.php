<?
	if(isset($_SESSION['name']))
	{
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
				if($_FILES['photo']['size'] != 0 && $_FILES['photo']['size'] <= 1024000)
				{
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
						move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
						
						$result = AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight, $findHistory, $makeMethod, $makePlace, $author, $history, $passport, $photoName);
						
						if(isset($result) && $result != false)
						{
							AddSuccessMessage('Запись об экспонате успешно добавлена.');
						}
					}
				}
				if($_FILES['photo']['name'] == "")
				{
					$result = AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight, $findHistory, $makeMethod, $makePlace, $author, $history, $passport);
					
					if(isset($result) && $result != false)
					{
						AddSuccessMessage('Запись об экспонате успешно добавлена.');
					}
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
?>
			<script>museum.redirect("Add", "add_exhibit")</script>
<?
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: добавить экспонат</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] != "POST")
		{
			ShowErrors();
			ShowSuccessMessage();
		}
		$sqlSpecies = "SELECT id, namerus, namelat FROM vid";
		$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
?>
		<form action = "index.php?actionAdd=add_exhibit" method = "POST" name = "addition" enctype = "multipart/form-data">
				<div class='form'>
				<fieldset class='form__fieldset'>
				<legend><span class='form__legend'>Добавление экспоната</span></legend>
				<table>
					<tr class='form__row'>
						<td class='form__label'>Вид</td>
						<td><select name = "selectedSpecies" class='form__input'>
							<?
								while($rowSpecies = mysql_fetch_assoc($resultSpecies))
								{
									echo "<option value = {$rowSpecies['id']}>{$rowSpecies['namerus']} | {$rowSpecies['namelat']}";
								}
							?>

							</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Количество<span class='form__star'>*</span></td>
						<td><input type = "text" name = "count" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Инвентарный номер<span class='form__star'>*</span></td>
						<td><input type = "text" name = "inventoryNumber" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Дата поступления<span class='form__star'>*</span></td>
						<td><input type = "text" name = "dateAct" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Размер<span class='form__star'>*</span></td>
						<td><input type = "text" name = "size" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Вес<span class='form__star'>*</span></td>
						<td><input type = "text" name = "weight" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Паспортный номер<span class='form__star'>*</span></td>
						<td><input type = "text" name = "passport" class='form__input' required pattern="\d{1,6}"></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Автор</td>
						<td><input type = "text" name = "author" class='form__input'></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Где и как обнаружен или пойман</td>
						<td><input type = "text" name = "findHistory" class='form__input'></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Методика изготовления</td>
						<td><textarea name = "makeMethod" class='form__area form__area--small'></textarea></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Место изготовления</td>
						<td><textarea name = "makePlace" class='form__area form__area--small'></textarea></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>История экспоната</td>
						<td><textarea name = "history" class='form__area form__area--small'></textarea></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Изображение</td>
						<td><input type = "file" name = "photo" class='form__input'></td>
					</tr>
				</table>
				</fieldset>
					<input type = "submit" value = "Добавить" name = "add" class='form__button'>
				</form>
				</div>
<?
	}
?>	