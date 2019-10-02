<?	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$idType = CleanData($_POST['type'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$id = CleanData($_POST['id'], 'i');
			if($nameRus != "" && $nameLat != "")
			{
				$result = ChangeClass($id, $idKingdom, $idType, $nameRus, $nameLat);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о классе успешно изменена.");
				}
			}
			AddErrors($nameRus, $nameLat);
?>
			<script>museum.redirect('Change', 'change_class_all');</script>
<?
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить класс</span></td>
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
			$id = CleanData($_POST["classSelected"], 'i');
			$sqlClass = "SELECT id, idcar, idtip, namerus, namelat FROM klass WHERE id = {$id}";
			$resultClass = mysql_query($sqlClass) or die(mysql_error());
			$class = mysql_fetch_assoc($resultClass);	
?>
			<form name = "changeType" action = "index.php?actionChange=change_class_form" method = "POST">
				<div id='form'>
					<fieldset class='form__fieldset'>
						<legend><span class='form__legend'>Изменение класса</span></legend>
						<table>	
							<tr class='form__row'>
								<td class='form__label'>Царство</td>
								<td>
									<select name = "kingdom"class='form__input'>
									<?
										while($rowKingdom = mysql_fetch_assoc($resultKingdom))
										{
											echo "<option value = {$rowKingdom['id']}" . ($class['idcar'] == $rowKingdom['id'] ? "selected>" : ">") . "{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Тип</td>
								<td>
									<select name = "type"class='form__input'>
									<?
										while($rowType = mysql_fetch_assoc($resultType))
										{
											echo "<option value = {$rowKingdom['id']}" . ($class['idtip'] == $rowType['id'] ? "selected>" : ">") . "{$rowType['namerus']} | {$rowType['namelat']}";
										}
									?>
									</select>
								</td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Русское название типа<span class='form__star'>*</span></td>
								<td><input type = "text"  class='form__input'name = "nameRus" value = "<?=$class['namerus']?>" required></td>
							</tr>
							<tr class='form__row'>
								<td class='form__label'>Латинское название типа<span class='form__star'>*</span></td>
								<td><input type = "text"  class='form__input'name = "nameLat" value = "<?=$class['namelat']?>" required></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?=$id?>">
					<input type = "submit" name = "Ok" value = "Изменить" class="form__button">
					<input type = "button" name = "back" value = "Назад" class="form__button" onclick = "museum.redirect('Change', 'change_class_all')">
				</div>
			</form>
<?
		}
	}
?>