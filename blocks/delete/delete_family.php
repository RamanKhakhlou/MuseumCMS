<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedFamily']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedFamily'] as $familyId)
				{
					$id = CleanData($familyId, 'i');
					$result = DeleteFromTableById("semejstva", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Запись о семействе успешно удалена.");
				}
			}
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: удалить семейство</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sqlFamily = "SELECT id, namerus, namelat FROM semejstva";
		$resultFamily = mysql_query($sqlFamily) or die(mysql_error());
?>
		<div id='form'>
			<form name = "deleteFamily" action = "index.php?actionDelete=delete_family" method = "POST">
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Удаление семейства</span></legend>
					<table>
						<tr>
							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowFamily = mysql_fetch_assoc($resultFamily))
						{
							echo "<tr class='form__row'>";
							echo "<td><input type = 'checkbox' name = 'selectedFamily[]' value = {$rowFamily['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$rowFamily['namerus']}</td>";
							echo "<td>{$rowFamily['namelat']}</td></tr>";
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