<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedKingdom']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedKingdom'] as $kingdomId)
				{
					$id = CleanData($kingdomId, 'i');
					$result = DeleteFromTableById("carstva", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Запись о царстве успешно удалена.");
				}
			}
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: удаление царства</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sql = "SELECT id, namerus, namelat FROM carstva";
		$result = mysql_query($sql) or die (mysql_error());
?>
		<div class='form'>
			<form name = "deleteKingdom" action = "index.php?actionDelete=delete_kingdom" method = "POST">
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Удаление царства</span></legend>
					<table>
						<tr>
							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($row = mysql_fetch_assoc($result))
						{
							echo "<tr class='form__row'>";
							echo "<td><input type = 'checkbox' name = 'selectedKingdom[]' value = {$row['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$row['namerus']}</td>";
							echo "<td>{$row['namelat']}</td></tr>";
							$count++;
						}
					?>	
					</table>
					<input type = "submit" name = "Delete" value = "Удалить" class='form__button'>
				</fieldset>
			</form>
		</div>
<?
	}
?>