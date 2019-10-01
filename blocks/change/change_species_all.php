<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить вид</span></td>
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
		$sqlSpecies = "SELECT id, namerus, namelat FROM vid";
		$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
?>
		<form name = "changeSpecies" action = "index.php?actionChange=change_species_form" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Изменение вида</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowSpecies = mysql_fetch_assoc($resultSpecies))
						{
							echo "<tr class='form__row'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'speciesSelected' value = {$rowSpecies['id']} " . ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowSpecies['namerus'] . "</td>";
							echo "<td>" . $rowSpecies['namelat'] . "</td>";
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