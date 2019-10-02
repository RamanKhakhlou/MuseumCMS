<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$idType = CleanData($_POST['type'], 'i');
			$idClass = CleanData($_POST['class'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$id = CleanData($_POST['id'], 'i');
			if($nameRus != "" && $nameLat != "")
			{
				if($_FILES['photo']['size'] != 0 && $_FILES['photo']['size'] <= 1024000)
				{
					if($_FILES['photo']['type'] == "image/jpeg")
					{
						$photoName = $nameLat.".jpg";
						$uploaddir = 'image/detachments/';
						$uploadfile = $uploaddir . $photoName;
						move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);	
						$result = ChangeDetachment($id, $idKingdom, $idType, $idClass, $nameRus, $nameLat, $photoName);
						if(isset($result) && $result != false)
						{
							AddSuccessMessage("Запись об отряде успешно изменена.");
						}
					}
				}
				if($_FILES['photo']['name'] == "")
				{
					$result = ChangeDetachment($id, $idKingdom, $idType, $idClass, $nameRus, $nameLat);
					
					if(isset($result) && $result != false)
					{
						AddSuccessMessage("Запись об отряде успешно изменена.");
					}
				}
			}	
			if($_FILES['photo']['name'] == "")
			{
				AddErrors($nameRus, $nameLat);
			}
			else
			{
				AddErrors($nameRus, $nameLat, $_FILES['photo']['size'], $_FILES['photo']['type']);
			}
?>
			<script>museum.redirect('Change', 'change_detachment_all');</script>
<?
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить отряд</span></td>
		</tr>
	</table>
</div>
<?	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Выбрать")
		{
			$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";
			$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
			$sqlType = "SELECT id, namerus, namelat FROM tip";
			$resultType = mysql_query($sqlType) or die(mysql_error());
			$sqlClass = "SELECT id, namerus, namelat FROM klass";
			$resultClass = mysql_query($sqlClass) or die(mysql_error());
			$id = CleanData($_POST["detachmentSelected"], 'i');
			$sqlDetachment = "SELECT id, idcar, idtip, idklass, namerus, namelat, photoname FROM otrjad WHERE id = {$id}";
			$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());	
			$detachment = mysql_fetch_assoc($resultDetachment);	
?>
			<form name = "changeType" action = "index.php?actionChange=change_detachment_form" method = "POST" enctype = "multipart/form-data">
				<div id='form'>
					<fieldset class='form__fieldset'>
						<legend><span class='form__legend'>Изменение отряда</span></legend>
						<table>	
							<tr class='form__row'>
								<td class='form__label'>Царство</td>
								<td>
									<select name = "kingdom" class='form__input'>
									<?
										while($rowKingdom = mysql_fetch_assoc($resultKingdom))
										{
											echo "<option value = {$rowKingdom['id']}" . ($detachment['idcar'] == $rowKingdom['id'] ? "selected>" : ">") . "{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Тип</td>
								<td>
									<select name = "type" class='form__input'>
									<?
										while($rowType = mysql_fetch_assoc($resultType))
										{
											echo "<option value = {$rowType['id']}" . ($detachment['idtip'] == $rowType['id'] ? "selected>" : ">") . "{$rowType['namerus']} | {$rowType['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Класс</td>
								<td>
									<select name = "class" class='form__input'>
									<?
										while($rowClass = mysql_fetch_assoc($resultClass))
										{
											echo "<option value = {$rowClass['id']}" . ($detachment['idklass'] == $rowClass['id'] ? "selected>" : ">") . "{$rowClass['namerus']} | {$rowClass['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Русское название типа<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "nameRus" value = "<?=$detachment['namerus']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Латинское название типа<span class='form__star'>*</span></td>
								<td><input type = "text" class='form__input' name = "nameLat" value = "<?=$detachment['namelat']?>" required></td>
							</tr>
							<tr class='form__row'>
							<td align='center' colspan="2"><img src = "image/detachments/<?= $detachment['photoname']?>" alt = "<?= $detachment['namelat']?>" width = "200" height = "150"></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Новое изображение</td>
								<td><input type = "file" name = "photo"></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?=$id?>">
					<input type = "submit" name = "Ok" value = "Изменить" class="form__button">
					<input type = "button" name = "back" value = "Назад" class="form__button" onclick = "museum.redirect('Change', 'change_detachment_all')">
				</div>
			</form>
<?
		}
	}
?>