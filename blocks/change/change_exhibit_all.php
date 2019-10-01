<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить экспонат</span></td>
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
		$sqlExhibit = "SELECT id, vid FROM eksponat";
		$resultExhibit = mysql_query($sqlExhibit) or die(mysql_error());
?>
		<form name = "changeExhibit" action = "index.php?actionChange=change_exhibit_form" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Изменение экспоната</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowExhibit = mysql_fetch_assoc($resultExhibit))
						{
							$sqlSpecies = "SELECT id, namerus, namelat FROM vid WHERE id = {$rowExhibit['vid']}";
							$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
							$species = mysql_fetch_assoc($resultSpecies);
							echo "<tr class='form__row'ow'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'exhibitSelected' value = {$rowExhibit['id']} " . ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $species['namerus'] . "</td>";
							echo "<td>" . $species['namelat'] . "</td>";
							echo "<td>" . $rowExhibit['id'] . "</td>";
							echo "</tr>";
							$count++;
						}
					?>
					</table>
				</fieldset>
				<input type = "submit" name = "Ok" value = "Выбрать" class='form__button'>
			</div>
		</form>
<?
	}
?>