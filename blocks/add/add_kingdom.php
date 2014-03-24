<?
	//Выполняется добавление при передаче методом Post
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			//Если основные поля заполнены
			if($nameRus != "" && $nameLat != "")
			{
				//Добавление нового царства в БД
				$result = AddKingdom($nameRus, $nameLat, $description);
				
				if($result != false)
				{
					ShowSuccess("Запись о царстве успешно добавлена.");
				}
			}
			//Вывод ошибок
			AddErrors($nameRus, $nameLat);
		}
	}
?>
<div id='titlesus'>
<table>
	<tr>
		<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
		<td><span class='titlesus_h'>Менеджер экспонатов: добавить царство</span></td>
	</tr>
</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowErrors($errors);
?>
		<form action = "index.php?actionAdd=add_kingdom" method = "POST" name = "addition">
			<div id='cont'>
				<fieldset class='fs'>
				<legend><span class='legend'>Добавление царства</span></legend>
				<table>
				<tr tr class='asdasd'>
					<td class='number1'>Русское название царства<span class='star'>*</span></td>
					<td><input type = "text" name = "nameRus" class='ttext'></td>
				</tr>
				<tr tr class='asdasd'>
					<td class='number1'>Латинское название царства<span class='star'>*</span></td>
					<td><input type = "text" name = "nameLat" class='ttext'></td>
				</tr>
				<tr tr class='asdasd'>
					<td class='number1'>Краткое описание</td>
					<td><input type = "text" name = "description" class='ttext'></td>
				</tr>
			</table>
				</fieldset>
			<input type = "submit" value = "Добавить" name = "add" class="buttonw">
		</form>
		</div>
<?	
	}
?>