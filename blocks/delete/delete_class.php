<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedClass']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedClass'] as $classId)
				{
					$id = CleanData($classId, 'i');
					$result = DeleteFromTableById("klass", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Запись о классе успешно удалена.");
				}
			}
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: удалить класс</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sqlClass = "SELECT id, namerus, namelat FROM klass";
		$resultClass = mysql_query($sqlClass) or die(mysql_error());
?>
		<div id='form'>
			<form name = "deleteClass" action = "index.php?actionDelete=delete_class" method = "POST">
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Удаление класса</span></legend>
					<table>
						<tr>
							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowClass = mysql_fetch_assoc($resultClass))
						{
							echo "<tr class='form__row'>";
							echo "<td><input type = 'checkbox' name = 'selectedClass[]' value = {$rowClass['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$rowClass['namerus']}</td>";
							echo "<td>{$rowClass['namelat']}</td></tr>";
							$count++;
						}
					?>
					</table>
					<input type = "submit" name = "Delete" value = "Удалить" class="form__button">
				</fieldset>
			</form>
		</div>
<?
	}
?>