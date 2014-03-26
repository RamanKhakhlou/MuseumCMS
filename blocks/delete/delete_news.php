<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(count($_POST['selectedNews']) > 0)
			{
				$result = false;
				
				foreach($_POST['selectedNews'] as $newsId)
				{
					$id = CleanData($newsId, 'i');
					$result = DeleteFromTableById("news", $id) || $result;
				}
				
				if($result != false)
				{
					AddSuccessMessage("Новость успешно удалена.");
				}
			}
		}
	}
?>
<div id='titlesus'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='titlesus_h'>Менеджер новостей: удаление новости</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		ShowSuccessMessage();
		
		$sql = "SELECT id, news FROM news";
		$result = mysql_query($sql) or die (mysql_error());
?>
		<div id='cont'>
			<form name = "deleteNews" action = "index.php?actionDelete=delete_news" method = "POST">
				<fieldset class='fs'>
					<legend><span class='legend'>Удаление новости</span></legend>
					<table>
						<tr>
							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>
							<td>Номер</td>
							<td>Новость</td>
						</tr>
					<?
						$count = 1;
						while($row = mysql_fetch_assoc($result))
						{
							echo "<tr class='asdasd'>";
							echo "<td><input type = 'checkbox' name = 'selectedNews[]' value = {$row['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$row['news']}</td></tr>";
							$count++;
						}
					?>	
					</table>
					<input type = "submit" name = "Delete" value = "Удалить" class="buttonw">
				</fieldset>
			</form>
		</div>
<?
	}
?>