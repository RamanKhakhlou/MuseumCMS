<?
	if(isset($_SESSION['name']))
	{
		//Выполняется после отправки формы
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			//Обработка введенных данных
			$id = CleanData($_POST["id"], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			//Внесение изменений в БД
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
<div id='titlesus'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='titlesus_h'>Менеджер экспонатов: изменить царство</span></td>
		</tr>
	</table>
</div>

<?
	if(isset($_SESSION['name']))
	{
		//Вывод формы заполнения
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$id = CleanData($_POST["selectedKingdom"], 'i');
			$sqlKingdom = "SELECT id, namerus, namelat, opisanie FROM carstva WHERE id = {$id}";
			$resaultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
			$rowKingdom = mysql_fetch_assoc($resaultKingdom);
?>
			<form action = "index.php?actionChange=change_kingdom_form" method = "POST" name = "changeKingdom">
				<div id='cont'>
					<fieldset class='fs'>
						<legend><span class='legend'>Изменение царства</span></legend>
						<table>
							<tr class='asdasd'>
								<td class='number1'>Русское название царства<span class='star'>*</span></td>
								<td><input type = "text" name = "nameRus" class='ttext' value = "<?= $rowKingdom["namerus"]?>"></td>
							</tr>
							<tr class='asdasd'>
								<td class='number1'>Латинское название царства<span class='star'>*</span></td>
								<td><input type = "text" name = "nameLat" class='ttext' value = "<?= $rowKingdom["namelat"]?>"></td>
							</tr>
							<tr class='asdasd'>
								<td class='number1'>Описание царства</td>
								<td><input type = "text" name = "description" class='ttext' value = "<?$rowKingdom["opisanie"]?>"></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?= $rowKingdom['id']?>" class="buttonw">
					<input type = "submit" name = "Ok" value = "Изменить" class="buttonw">
					<input type = "button" name = "back" value = "Назад" class="buttonw" onclick = "museum.redirect('Change', 'change_kingdom_all')">
				</div>
			</form>
<?
		}
	}
?>