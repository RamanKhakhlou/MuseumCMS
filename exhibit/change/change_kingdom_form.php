<div id='titlesus'>
				<table>
					<tr>
						<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
						<td><span class='titlesus_h'>�������� ����������: �������� �������</span></td>
					</tr>
				</table>
</div>

<?
	if(isset($_SESSION['name']))
	{			
		//����� ����� ����������
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{		
			$id = CleanData($_POST["selectedKingdom"], 'i');
			$sqlKingdom = "SELECT id, namerus, namelat, opisanie FROM carstva WHERE id = {$id}";
			$resaultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
			$rowKingdom = mysql_fetch_assoc($resaultKingdom);
?>
			<form action = "index.php?actionChange=change_kingdom" method = "POST" name = "changeKingdom">	
				<div id='cont'>
		<fieldset class='fs'>
		<legend><span class='legend'>��������� �������</span></legend>
		<table>	
					
				
				<tr class='asdasd'>
					<td class='number1'>������� �������� �������<span class='star'>*</span></td>
					<td><input type = "text" name = "nameRus" class='ttext' value = "<?= $rowKingdom["namerus"]?>"></td>
				</tr>
				<tr class='asdasd'>
					<td class='number1'>��������� �������� �������<span class='star'>*</span></td>
					<td><input type = "text" name = "nameLat" class='ttext' value = "<?= $rowKingdom["namelat"]?>"></td>
				</tr>
				<tr class='asdasd'>
					<td class='number1'>�������� �������</td>
					<td><input type = "text" name = "description" class='ttext' value = "<?$rowKingdom["opisanie"]?>"></td>
				</tr>
				
				
				</table>
				</fieldset>
				<input type = "hidden" name = "id" value = "<?= $rowKingdom['id']?>" class="buttonw">
				<input type = "submit" name = "Ok" value = "��������" class="buttonw">
			</form>
			</div>
<?
		}
	}
?>