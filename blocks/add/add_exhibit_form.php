<div id='titlesus'>
				<table>
					<tr>
						<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
						<td><span class='titlesus_h'>�������� ����������: �������� ��������</span></td>
					</tr>
				</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowErrors();
		$sqlSpecies = "SELECT id, namerus, namelat FROM vid";
		$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
?>				
		<form action = "index.php?actionAdd=add_exhibit" method = "POST" name = "addition" enctype = "multipart/form-data">
							
				<div id='cont'>
				<fieldset class='fs'>
				<legend><span class='legend'>���������� ���������</span></legend>
				<table>
					<tr class='asdasd'>
						<td class='number1'>���<span class='star'>*</span></td>
						<td><select name = "selectedSpecies" class='ttext'>
							<?
								while($rowSpecies = mysql_fetch_assoc($resultSpecies))
								{
									echo "<option value = {$rowSpecies['id']}>{$rowSpecies['namerus']} | {$rowSpecies['namelat']}";
								}
							?>
				
							</select></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>�������<span class='star'>*</span></td>
						<td><input type = "text" name = "kingdom" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>����������<span class='star'>*</span></td>
						<td><input type = "text" name = "count" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>����������� �����<span class='star'>*</span></td>
						<td><input type = "text" name = "inventoryNumber" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>���� �����������<span class='star'>*</span></td>
						<td><input type = "text" name = "dateAct" class='ttext'>	</td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>������<span class='star'>*</span></td>
						<td><input type = "text" name = "size" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>���<span class='star'>*</span></td>
						<td><input type = "text" name = "weight" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>���������� �����<span class='star'>*</span></td>
						<td><input type = "text" name = "passport" class='ttext'>	</td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>�����</td>
						<td><input type = "text" name = "author" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>��� � ��� ��������� ��� ������</td>
						<td><input type = "text" name = "findHistory" class='ttext'></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>�������� ������������</td>
						<td class='number11'><textarea name = "makeMethod" class='tarea'></textarea></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>����� ������������</td>
						<td class='number11'><textarea name = "makePlace" class='tarea'></textarea>	</td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>������� ���������</td>
						<td class='number11'><textarea name = "history" class='tarea'></textarea></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>�����������</td>
						<td><input type = "file" name = "photo" class='ttext'></td>
					</tr>
				</table>
				</fieldset>
								<input type = "submit" value = "��������" name = "add" class="buttonw">
				</form>
				</div>
<?
	}
?>	