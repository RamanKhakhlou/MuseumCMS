<?
	if(isset($_SESSION['name']))
	{
		//��������� ������ � ���������� �� � ��
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "��������")
		{
			$idSpecies = CleanData($_POST['selectedSpecies'], 'i');
			$count = CleanData($_POST['count'], 'i');
			$inventoryNumber = CleanData($_POST['inventoryNumber']);
			$dateAct = CleanData($_POST['dateAct']);
			$size = CleanData($_POST['size']);
			$weight = CleanData($_POST['weight']);
			$findHistory = CleanData($_POST['findHistory']);
			$makeMethod = CleanData($_POST['makeMethod']);
			$makePlace = CleanData($_POST['makePlace']);
			$author = CleanData($_POST['author']);
			$history = CleanData($_POST['history']);
			$passport = CleanData($_POST['passport']);
			if(isset($count) && $inventoryNumber != "" && $dateAct != "" && $size != "" && $weight != "" && isset($passport))
			{
				//�������� ������� ����������� � ���� �����������
				if($_FILES['photo']['size'] != 0 && $_FILES['photo']['size'] <= 1024000)
				{
					//�������� ���� �����������
					if($_FILES['photo']['type'] == "image/jpeg")
					{
						$sqlSpecies = "SELECT namelat FROM vid WHERE id = {$idSpecies}";
						$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
						$species = mysql_fetch_assoc($resultSpecies);
						$sqlExhibitId = "SELECT id FROM eksponat ORDER BY id DESC LIMIT 1";
						$resultExhibitId = mysql_query($sqlExhibitId);
						$exhibitId = mysql_fetch_assoc($resultExhibitId);
						$photoName = "[" . ++$exhibitId['id'] . "]{$species['namelat']}.jpg";
						$uploaddir = 'image/exhibits/';
						$uploadfile = $uploaddir . $photoName;
						//����������� �����������
						move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
						
						$result = AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight, $findHistory, $makeMethod, $makePlace, $author, $history, $passport, $photoName);
						
						if(isset($result) && $result != false)
						{
							AddSuccessMessage('������ �� ��������� ������� ���������.');
						}
					}
				}
				if($_FILES['photo']['name'] == "")
				{
					$result = AddExhibit($idSpecies, $count, $inventoryNumber, $dateAct, $size, $weight, $findHistory, $makeMethod, $makePlace, $author, $history, $passport);
					
					if(isset($result) && $result != false)
					{
						AddSuccessMessage('������ �� ��������� ������� ���������.');
					}
				}
			}
			if($_FILES['photo']['name'] == "")
			{
				AddErrorsForExhibit($count, $inventoryNumber, $dateAct, $size, $weight, $passport);
			}
			else
			{
				AddErrorsForExhibit($count, $inventoryNumber, $dateAct, $size, $weight, $passport, $_FILES['photo']['size'], $_FILES['photo']['type']);
			}
?>
			<script>museum.redirect("Add", "add_exhibit")</script>
<?
		}
	}
?>
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
		if($_SERVER['REQUEST_METHOD'] != "POST")
		{
			ShowErrors();
			ShowSuccessMessage();
		}
		$sqlSpecies = "SELECT id, namerus, namelat FROM vid";
		$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());
?>
		<form action = "index.php?actionAdd=add_exhibit" method = "POST" name = "addition" enctype = "multipart/form-data">
				<div id='cont'>
				<fieldset class='fs'>
				<legend><span class='legend'>���������� ���������</span></legend>
				<table>
					<tr class='asdasd'>
						<td class='number1'>���</td>
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
						<td class='number1'>����������<span class='star'>*</span></td>
						<td><input type = "text" name = "count" class='ttext' required></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>����������� �����<span class='star'>*</span></td>
						<td><input type = "text" name = "inventoryNumber" class='ttext' required></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>���� �����������<span class='star'>*</span></td>
						<td><input type = "text" name = "dateAct" class='ttext' required></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>������<span class='star'>*</span></td>
						<td><input type = "text" name = "size" class='ttext' required></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>���<span class='star'>*</span></td>
						<td><input type = "text" name = "weight" class='ttext' required></td>
					</tr>
					<tr class='asdasd'>
						<td class='number1'>���������� �����<span class='star'>*</span></td>
						<td><input type = "text" name = "passport" class='ttext' required pattern="\d{1,6}"></td>
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