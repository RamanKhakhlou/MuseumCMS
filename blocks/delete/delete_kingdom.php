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
<div id='titlesus'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='titlesus_h'>Менеджер экспонатов: удаление царства</span></td>
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
		<div id='cont'>
			<form name = "deleteKingdom" action = "index.php?actionDelete=delete_kingdom" method = "POST">
				<fieldset class='fs'>
					<legend><span class='legend'>Удаление царства</span></legend>
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
							echo "<tr class='asdasd'>";
							echo "<td><input type = 'checkbox' name = 'selectedKingdom[]' value = {$row['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$row['namerus']}</td>";
							echo "<td>{$row['namelat']}</td></tr>";
							$count++;
						}
					?>	
					</table>
					<input type = "submit" name = "Delete" value = "Удалить" class="buttonw">
				</fieldset>
			</form>
		</div>
<?
	}
?>