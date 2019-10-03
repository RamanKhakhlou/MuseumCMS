<?
	if($_SESSION['name'])
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedExhibit']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedExhibit'] as $exhibitId)
				{
					$id = CleanData($exhibitId, 'i');
					$result = DeleteFromTableById("eksponat", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Запись об экспонате успешно удалена.");
				}
			}
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: удалить экспонат</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sqlExhibit = "SELECT id, vid FROM eksponat";
		$resultExhibit = mysql_query($sqlExhibit) or die(mysql_error());
?>
		<div id='form'>
			<form name = "deleteExhibit" action = "index.php?actionDelete=delete_exhibit" method = "POST">
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Удаление экспоната</span></legend>
					<table>
						<tr>
							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
						<?
							$count = 1;
							while($rowExhibit = mysql_fetch_assoc($resultExhibit))
							{
								$sqlSpecies = "SELECT namerus, namelat FROM vid WHERE id = {$rowExhibit['vid']}";
								$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
								$species = mysql_fetch_assoc($resultSpecies);
								
								echo "<tr class='form__row'>";
								echo "<td><input type = 'checkbox' name = 'selectedExhibit[]' value = {$rowExhibit['id']}></td>";
								echo "<td>{$count}</td>";
								echo "<td>{$species['namerus']}</td>";
								echo "<td>{$species['namelat']}</td></tr>";
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