<div id='titlesus'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='titlesus_h'>Менеджер экспонатов: изменить царство</span></td>
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
		//Выборка всех царств
		$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";
		$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
?>
		<form name = "changeKingdom" action = "index.php?actionChange=change_kingdom_form" method = "POST">
			<div id='cont'>
				<fieldset class='fs'>
					<legend><span class='legend'>Изменение царства</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Русское название</td>
							<td>Латинское название</td>
						</tr>
					<?
						$count = 1;
						//Вывод всех имеющихся в БД царств 
						while($rowKingdom = mysql_fetch_assoc($resultKingdom))
						{
							echo "<tr class='asdasd'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'selectedKingdom' value = {$rowKingdom['id']} ". ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowKingdom['namerus'] . "</td>";
							echo "<td>" . $rowKingdom['namelat'] . "</td>";
							echo "</tr>";
							$count++;
						}
					?>
					</table>
				</fieldset>
				<input type = "submit" name = "Ok" value = "Выбрать" class="buttonw">
			</div>
		</form>
<?
	}
?>