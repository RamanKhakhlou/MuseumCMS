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
		ShowErrors();
		//������� ���� ������
		$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";
		$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
?>
		<form name = "changeKingdom" action = "index.php?actionChange=change_kingdom" method = "POST">
		<div id='cont'>
		<fieldset class='fs'>
		<legend><span class='legend'>��������� �������</span></legend>
		<table>		
		<?					
			$count = 0;
			//����� ���� ��������� � �� ������ 
			while($rowKingdom = mysql_fetch_assoc($resultKingdom))
			{
				if($count == 0)
				{
					echo "<tr class='asdasd'><td><input type = 'radio' name = 'selectedKingdom' value = {$rowKingdom['id']} checked></td><td>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}</td></tr>";
				}
				else
				{
					echo "<tr class='asdasd'><td><input type = 'radio' name = 'selectedKingdom' value = {$rowKingdom['id']}></td><td>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}</td></tr>";
				}
				$count++;
			}
		?>	
		</table>
		</fieldset>
			<input type = "submit" name = "Ok" value = "�������" class="buttonw">
		</form>
		</div>
		<?
	}
?>