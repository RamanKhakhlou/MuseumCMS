<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{			
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$idType = CleanData($_POST['type'], 'i');
			$idClass = CleanData($_POST['class'], 'i');
			$idDetachment = CleanData($_POST['detachment'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			if($nameRus != "" && $nameLat != "")
			{
				$result = AddFamily($idKingdom, $idType, $idClass, $idDetachment, $nameRus, $nameLat);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о семействе успешно добавлена.");
				}
			}
			AddErrors($nameRus, $nameLat);
			
?>
			<script>museum.redirect("Add", "add_family")</script>
<?
		}
	}
?>

<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: добавить семейство</span></td>
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
		$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";
		$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
		$sqlType = "SELECT id, namerus, namelat FROM tip";
		$resultType = mysql_query($sqlType) or die(mysql_error());
		$sqlClass = "SELECT id, namerus, namelat FROM klass";
		$resultClass = mysql_query($sqlClass) or die(mysql_error());
		$sqlDetachment = "SELECT id, namerus, namelat FROM otrjad";
		$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());
?>
		<form name = "addDetachment" action = "index.php?actionAdd=add_family" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
				<legend><span class='form__legend'>Добавление семейства</span></legend>
				<table>
					<tr class='form__row'>
						<td class='form__label'>Царство</td>
						<td><select name = "kingdom" class='form__input'>
				<?
					while($rowKingdom = mysql_fetch_assoc($resultKingdom))
					{
						echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Тип</td>
						<td><select name = "type" class='form__input'>
				<?
					while($rowType = mysql_fetch_assoc($resultType))
					{
						echo "<option value = {$rowType['id']}>{$rowType['namerus']} | {$rowType['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Класс</td>
						<td><select name = "class" class='form__input'>
				<?
					while($rowClass = mysql_fetch_assoc($resultClass))
					{
						echo "<option value = {$rowClass['id']}>{$rowClass['namerus']} | {$rowClass['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Отряд</td>
						<td><select name = "detachment" class='form__input'>
				<?
					while($rowDetachment = mysql_fetch_assoc($resultDetachment))
					{
						echo "<option value = {$rowDetachment['id']}>{$rowDetachment['namerus']} | {$rowDetachment['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Русское название<span class='form__star'>*</span></td>
						<td><input type = "text" name = "nameRus" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label' >Латинское название<span class='form__star'>*</span></td>
						<td><input type = "text" name = "nameLat" class='form__input' required></td>
					</tr>
				</table>
				</fieldset>
				<input type = "submit" name = "add" value = "Добавить" class="form__button">
		</form>
		</div>
<?
	}
?>