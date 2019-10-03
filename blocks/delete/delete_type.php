<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedType']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedType'] as $typeId)
				{
					$id = CleanData($typeId, 'i');
					$result = DeleteFromTableById("tip", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Запись о типе успешно удалена.");
				}
			}
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: удалить тип</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sql = "SELECT id, namerus, namelat FROM tip";
		$result = mysql_query($sql) or die(mysql_error());
?>
	<div id='form'>
		<form name = "deleteType" action = "index.php?actionDelete=delete_type" method = "POST">
			<fieldset class='form__fieldset'>
				<legend><span class='form__legend'>Удаление типа</span></legend>
				<table>
					<tr>
						<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
						<td>Номер</td>
						<td>Русское название</td>
						<td>Латинское название</td>
					</tr>
				<?
					$count = 1;
					while($rowType = mysql_fetch_assoc($result))
					{
						echo "<tr class='form__row'>";
						echo "<td><input type = 'checkbox' name = 'selectedType[]' value = {$rowType['id']}></td>";
						echo "<td>{$count}</td>";
						echo "<td>{$rowType['namerus']}</td>";
						echo "<td>{$rowType['namelat']}</td></tr>";
						$count++;
					}
				?>
				</table>	
				<input type = "submit" name = "Delete" value = "Удалить"class="form__button">
			</fieldset>
		</form>
	</div>
<?
	}
?>