<div id='class='info''>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: изменение классов</span></td>
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
		$sqlClass = "SELECT id, namerus, namelat FROM klass";
		$resultClass = mysql_query($sqlClass) or die(mysql_error());
?>
		<form name = "changeType" action = "index.php?actionChange=change_class_form" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Изменение класса</span></legend>
					<table>	
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowClass = mysql_fetch_assoc($resultClass))
						{
							echo "<tr class='form__row'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'classSelected' value = {$rowClass['id']} " . ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowClass['namerus'] . "</td>";
							echo "<td>" . $rowClass['namelat'] . "</td>";
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