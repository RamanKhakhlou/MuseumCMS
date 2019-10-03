<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedDetachment']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedDetachment'] as $detachmentId)
				{
					$id = CleanData($detachmentId, 'i');
					$result = DeleteFromTableById("otrjad", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Запись об отряде успешно удалена.");
				}
			}
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: удалить отряд</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sqlDetachment = "SELECT id, namerus, namelat FROM otrjad";
		$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());
?>
		<div id='form'>
			<form name = "deleteDetachment" action = "index.php?actionDelete=delete_detachment" method = "POST">
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Удаление отряда</span></legend>
					<table>
						<tr>
							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowDetachment = mysql_fetch_assoc($resultDetachment))
						{
							echo "<tr class='form__row'>";
							echo "<td><input type = 'checkbox' name = 'selectedDetachment[]' value = {$rowDetachment['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$rowDetachment['namerus']}</td>";
							echo "<td>{$rowDetachment['namelat']}</td></tr>";
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