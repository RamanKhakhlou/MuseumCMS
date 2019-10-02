<?	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$id = CleanData($_POST['id'], 'i');
			if($nameRus != "" && $nameLat != "")
			{
				$result = ChangeType($id, $idKingdom, $nameRus, $nameLat);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о типе успешно изменена.");
				}
			}
			
			AddErrors($nameRus, $nameLat);
?>
			<script>museum.redirect('Change', 'change_type_all');</script>
<?
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить тип</span></td>
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
			$id = CleanData($_POST["typeSelected"], 'i');
			$sqlType = "SELECT id, idcar, namerus, namelat FROM tip WHERE id = {$id}";
			$resultType = mysql_query($sqlType) or die(mysql_error());	
			$type = mysql_fetch_assoc($resultType);	
?>
			<form name = "changeType" action = "index.php?actionChange=change_type_form" method = "POST">
				<div id='form'>
					<fieldset class='form__fieldset'>
						<legend><span class='form__legend'>Изменение типа</span></legend>
						<table>	
							<tr class='form__row'>
								<td class='form__label'>Царство</td>
								<td>
									<select name = "kingdom" class='form__input'>
									<?
										while($rowKingdom = mysql_fetch_assoc($resultKingdom))
										{
											if($type['idcar'] == $rowKingdom['id'])
											{
												echo "<option value = {$rowKingdom['id']} selected>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
											}
											else
											{
												echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
											}
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Русское название типа<span class='form__star'>*</span></td>
								<td><input type = "text" name = "nameRus" value = "<?=$type['namerus']?>" class='form__input' required></td>
							</tr>
							<tr class='form__rowrowrow'>
								<td class='form__label'>Латинское название типа<span class='form__star'>*</span></td>
								<td><input type = "text" name = "nameLat" value = "<?=$type['namelat']?>" class='form__input' required></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?=$id?>">
					<input type = "submit" name = "Ok" value = "Изменить" class="form__button">
					<input type = "button" name = "back" value = "Назад" class="form__button" onclick = "museum.redirect('Change', 'change_type_all')">
				</div>
			</form>
<?
		}
	}
?>