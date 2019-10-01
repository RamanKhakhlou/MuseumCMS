<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить семейство</span></td>
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
		$sqlFamily = "SELECT id, namerus, namelat FROM semejstva";
		$resultFamily = mysql_query($sqlFamily) or die(mysql_error());
?>
		<form name = "changeFamily" action = "index.php?actionChange=change_family_form" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Изменение семейства</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowFamily = mysql_fetch_assoc($resultFamily))
						{
							echo "<tr class='form__row'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'familySelected' value = {$rowFamily['id']} " . ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowFamily['namerus'] . "</td>";
							echo "<td>" . $rowFamily['namelat'] . "</td>";
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