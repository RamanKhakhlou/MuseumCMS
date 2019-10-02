<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			$id = CleanData($_POST["id"], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);

			if($nameRus != "" && $nameLat != "")
			{
				$result = ChangeKingdom($id, $nameRus, $nameLat, $description);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о царстве успешно изменена.");
				}
			}
			AddErrors($nameRus, $nameLat);
?>
			<script>museum.redirect('Change', 'change_kingdom_all');</script>
<?
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить царство</span></td>
		</tr>
	</table>
</div>

<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$id = CleanData($_POST["selectedKingdom"], 'i');
			$sqlKingdom = "SELECT id, namerus, namelat, opisanie FROM carstva WHERE id = {$id}";
			$resaultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
			$rowKingdom = mysql_fetch_assoc($resaultKingdom);
?>
			<form action = "index.php?actionChange=change_kingdom_form" method = "POST" name = "changeKingdom">
				<div class='form'>
					<fieldset class='form__fieldset'>
						<legend><span class='form__legend'>Изменение царства</span></legend>
						<table>
							<tr class='form__row'>
								<td class='form__label'>Русское название царства<span class='form__star'>*</span></td>
								<td><input type = "text" name = "nameRus" class='form__input' value = "<?= $rowKingdom["namerus"]?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Латинское название царства<span class='form__star'>*</span></td>
								<td><input type = "text" name = "nameLat" class='form__input' value = "<?= $rowKingdom["namelat"]?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Описание царства</td>
								<td><input type = "text" name = "description" class='form__input' value = "<?$rowKingdom["opisanie"]?>"></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?= $rowKingdom['id']?>" class='form__button'>
					<input type = "submit" name = "Ok" value = "Изменить" class='form__button'>
					<input type = "button" name = "back" value = "Назад" class='form__button' onclick = "museum.redirect('Change', 'change_kingdom_all')">
				</div>
			</form>
<?
		}
	}
?>