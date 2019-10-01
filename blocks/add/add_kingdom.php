<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			if($nameRus != "" && $nameLat != "")
			{
				$result = AddKingdom($nameRus, $nameLat, $description);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о царстве успешно добавлена.");
				}
			}
			AddErrors($nameRus, $nameLat);
			
			echo "<script>museum.redirect('Add', 'add_kingdom');</script>";
		}
	}
?>
<div class='info'>
<table>
	<tr>
		<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
		<td><span class='info__title'>Менеджер экспонатов: добавить царство</span></td>
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
?>
		<form action = "index.php?actionAdd=add_kingdom" method = "POST" name = "addition">
			<div class='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Добавление царства</span></legend>
					<table>
						<tr tr class='form__row'>
							<td class='form__label'>Русское название царства<span class='form__star'>*</span></td>
							<td><input type = "text" name = "nameRus" class='form__input' required></td>
						</tr>
						<tr tr class='form__row'>
							<td class='form__label'>Латинское название царства<span class='form__star'>*</span></td>
							<td><input type = "text" name = "nameLat" class='form__input' required></td>
						</tr>
						<tr tr class='form__row'>
							<td class='form__label'>Краткое описание<</td>
							<td><input type = "text" name = "description" class='form__input'></td>
						</tr>
					</table>
				</fieldset>
			<input type = "submit" value = "Добавить" name = "add" class='form__button'>
		</form>
		</div>
<?	
	}
?>