<?	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
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
			$passport = CleanData($_POST['passport'], 'i');
			$id = CleanData($_POST['id'], 'i');
			if(isset($count) && $inventoryNumber != "" && $dateAct != "" && $size != "" && $weight != "" && isset($passport))
			{
				if($_FILES['photo']['size'] != 0 && $_FILES['photo']['size'] <= 1024000)
				{
					if($_FILES['photo']['type'] == "image/jpeg")
					{
						$sqlSpecies = "SELECT namelat FROM vid WHERE id = {$idSpecies}";
						$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
						$species = mysql_fetch_assoc($resultSpecies);
						$photoName = "[". $id . "]{$species['namelat']}.jpg";
						$uploaddir = 'image/exhibits/';
						$uploadfile = $uploaddir . $photoName;
						move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
						
						$result = ChangeExhibit($id, $idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight,	$findHistory, $makeMethod, $makePlace, $author, $history, $passport, $photoName);
						
						if(isset($result) && $result != false)
						{
							AddSuccessMessage("Запись об экспонате успешно изменена.");
						}
					}
				}
				if($_FILES['photo']['name'] == "")
				{
					$result = ChangeExhibit($id, $idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight, $findHistory, $makeMethod, $makePlace, $author, $history, $passport);
					
					if(isset($result) && $result != false)
					{
						AddSuccessMessage("Запись об экспонате успешно изменена.");
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
			<script>museum.redirect('Change', 'change_exhibit_all');</script>
<?
		}
	}
?>

<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__titlee'>Менеджер экспонатов: изменить экспонат</span></td>
		</tr>
	</table>
</div>
<?	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Выбрать")
		{
			$sqlSpecies = "SELECT id, namerus, namelat FROM vid";
			$resultSpecies = mysql_query($sqlSpecies);
			$id = CleanData($_POST["exhibitSelected"], 'i');
			$sqlExhibit = "SELECT id, vid, kol, invnom, datpost, razm, ves, ist, mtizg, mvizg, autor, hisexp, pasport, photoname FROM eksponat WHERE id = {$id}";
			$resultExhibit = mysql_query($sqlExhibit) or die(mysql_error());
			$exhibit = mysql_fetch_assoc($resultExhibit);
?>
			<form name = "changeExhibit" action = "index.php?actionChange=change_exhibit_form" method = "POST" enctype = "multipart/form-data">
				<div id='form'>
					<fieldset class='form__fieldsetrm__fieldset'>
						<legend><span class='form__legend'>Изменение экспоната</span></legend>
						<table>	
							<tr class='form__row'>
								<td class='form__label'>Вид</td>
								<td>
									<select name = "selectedSpecies" class='form__input'>
									<?
										while($rowSpecies = mysql_fetch_assoc($resultSpecies))
										{
											echo "<option value = {$rowSpecies['id']} " . ($rowSpecies['id'] == $exhibit['vid'] ? "selected>" : ">") . "{$rowSpecies['namerus']} | {$rowSpecies['namelat']}\n";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Количество<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "count" value = "<?=$exhibit['kol']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Инвентарный номер<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "inventoryNumber" value = "<?=$exhibit['invnom']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Дата поступления<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input_input' name = "dateAct" value = "<?=$exhibit['datpost']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Размер<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "size" value = "<?=$exhibit['razm']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Вес<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "weight" value = "<?=$exhibit['ves']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Где и как обнаружен или пойман</td>
								<td><input type = "text" class='form__input' name = "findHistory" value = "<?=$exhibit['ist']?>"></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Автор</td>
								<td><input type = "text" class='form__input' name = "author" value = "<?=$exhibit['autor']?>"></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Паспортный номер<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "passport" value = <?=$exhibit['pasport']?> required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Методика изготовления</td>
								<td><textarea class='form__area' name = "makeMethod"><?=$exhibit['mtizg']?></textarea></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Место изготовления</td>
								<td><textarea class='form__area' name = "makePlace"><?=$exhibit['mvizg']?></textarea></td>
							</tr>
							
							<tr class='form__row'>
								<td class='form__label'>История данного экспоната, до поступления в музей</td>
								<td><textarea  class='form__area' name = "history"><?=$exhibit['hisexp']?></textarea></td>
							</tr>
							
							<tr class='form__row'>
								<td align='center' colspan="2"><img src = "image/exhibits/<?= $exhibit['photoname']?>" alt = "<?= $exhibit['namelat']?>" width = "200" height = "150"></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Новое изображение</td>
								<td><input type = "file" name = "photo"></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?=$id?>">
					<input type = "submit" name = "Ok" value = "Изменить" class="form__button">
					<input type = "button" name = "back" value = "Назад" class="form__button" onclick = "museum.redirect('Change', 'change_exhibit_all')">
				</div>
			</form>
<?
		}
	}
?>