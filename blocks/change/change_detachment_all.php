<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменить отряд</span></td>
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
		$sqlDetachment = "SELECT id, namerus, namelat FROM otrjad";
		$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());
?>
		<form name = "changeDetachment" action = "index.php?actionChange=change_detachment_form" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Изменение отряда</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowDetachment = mysql_fetch_assoc($resultDetachment))
						{
							echo "<tr class='form__row'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'detachmentSelected' value = {$rowDetachment['id']} " . ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowDetachment['namerus'] . "</td>";
							echo "<td>" . $rowDetachment['namelat'] . "</td>";
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