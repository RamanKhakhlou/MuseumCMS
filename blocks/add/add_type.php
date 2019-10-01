<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			if($nameRus != "" && $nameLat != "")
			{
				$result = AddType($idKingdom, $nameRus, $nameLat);
				
				if(isset($result) && $result != false)
				{
				
					AddSuccessMessage("Запись о типе успешно добавлена.");
				}
			}
			AddErrors($nameRus, $nameLat);
			
			echo "<script>museum.redirect('Add', 'add_type');</script>";
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: добавить тип</span></td>
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
		$sql = "SELECT id, namerus, namelat FROM carstva";
		$result = mysql_query($sql) or die(mysql_error());
?>
		<form name = "addType" action = "index.php?actionAdd=add_type" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
				<legend><span class='form__legend'>Добавление экспонат</span></legend>
				<table>
					<tr class='form__row'>
						<td class='form__label'>Царство</td>
						<td><select name = "kingdom" class='form__input'>
					<?
					while($rowKingdom = mysql_fetch_assoc($result))
					{
						echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
					}
					?>
						</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Русское название<span class='form__star'>*</span></td>
						<td><input type = "text" name = "nameRus" class='form__input' required></p></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Латинское название<span class='form__star'>*</span></td>
						<td><input type = "text" name = "nameLat" class='form__input' required></p></td>
					</tr>
				</table>
				</fieldset>
				<input type = "submit" value = "Добавить" name = "add" class="form__button">
			
		</form>
		</div>
<?
	}
?>