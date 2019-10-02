<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$idType = CleanData($_POST['type'], 'i');
			$idClass = CleanData($_POST['class'], 'i');
			$idDetachment = CleanData($_POST['detachment'], 'i');
			$idFamily = CleanData($_POST['family'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$id = CleanData($_POST['id'], 'i');
			if($nameRus != "" && $nameLat != "")
			{
				$result = ChangeSpecies($id, $idKingdom, $idType, $idClass, $idDetachment, $idFamily, $nameRus, $nameLat);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о виде успешно изменена.");
				}
			}
			AddErrors($nameRus, $nameLat);
?>
			<script>museum.redirect('Change', 'change_species_all');</script>
<?
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить вид</span></td>
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
			$sqlDetachment = "SELECT id, namerus, namelat FROM otrjad";
			$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());
			$sqlFamily = "SELECT id, namerus, namelat FROM semejstva";
			$resultFamily = mysql_query($sqlFamily) or die(mysql_error());
			$id = CleanData($_POST["speciesSelected"], 'i');
			$sqlSpecies = "SELECT id, idcar, idtip, idklass, idotr, idsem, namerus, namelat FROM vid WHERE id = {$id}";
			$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
			$species = mysql_fetch_assoc($resultSpecies);	
?>
			<form name = "changeSpecies" action = "index.php?actionChange=change_species_form" method = "POST">
				<div id='form'>
					<fieldset class='form__fieldset'>
						<legend><span class='form__legend'>Изменение вида</span></legend>
						<table>	
							<tr class='form__row'>
								<td class='form__label'>Царство</td>
								<td>
									<select name = "kingdom" class='form__input'>
									<?
										while($rowKingdom = mysql_fetch_assoc($resultKingdom))
										{
											echo "<option value = {$rowKingdom['id']}" . ($species['idcar'] == $rowKingdom['id'] ? "selected>" : ">") . "{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
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
											echo "<option value = {$rowType['id']}" . ($species['idtip'] == $rowType['id'] ? "selected>" : ">") . "{$rowType['namerus']} | {$rowType['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Клас</td>
								<td>
									<select name = "class" class='form__input'>
									<?
										while($rowClass = mysql_fetch_assoc($resultClass))
										{
											echo "<option value = {$rowClass['id']}" . ($species['idklass'] == $rowClass['id'] ? "selected>" : ">") . "{$rowClass['namerus']} | {$rowClass['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Отряд</td>
								<td>
									<select name = "detachment" class='form__input'>
									<?
										while($rowDetachment = mysql_fetch_assoc($resultDetachment))
										{
											echo "<option value = {$rowDetachment['id']}" . ($species['idotr'] == $rowDetachment['id'] ? "selected>" : ">") . "{$rowDetachment['namerus']} | {$rowDetachment['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Семейство</td>
								<td>
								<select name = "family" class='form__input'>
									<?
										while($rowFamily = mysql_fetch_assoc($resultFamily))
										{
											echo "<option value = {$rowFamily['id']}" . ($species['idsem'] == $rowFamily['id'] ? "selected>" : ">") . "{$rowFamily['namerus']} | {$rowFamily['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
									<td class='form__label'>Русское название типа<span class='form__star'>*</span></td>
									<td><input type = "text" name = "nameRus" class='form__input' value = "<?=$species['namerus']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Латинское название типа<span class='form__star'>*</span></td>
								<td><input type = "text" name = "nameLat" class='form__input_input' value = "<?=$species['namelat']?>" required></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?=$id?>">
					<input type = "submit" name = "Ok" value = "Изменить" class="form__button">
					<input type = "button" name = "back" value = "Назад" class="form__button" onclick = "museum.redirect('Change', 'change_species_all')">
				</div>
			</form>
<?
		}
	}
?>