<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: Изменение типа</span></td>
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
		$sql = "SELECT id, namerus, namelat FROM tip";
		$result = mysql_query($sql) or die(mysql_error());
?>
		<form name = "changeType" action = "index.php?actionChange=change_type_form" method = "POST">
			<div id='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Изменение типа</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						while($rowType = mysql_fetch_assoc($result))
						{
							echo "<tr class='form__row'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'typeSelected' value = {$rowType['id']} " . ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowType['namerus'] . "</td>";
							echo "<td>" . $rowType['namelat'] . "</td>";
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