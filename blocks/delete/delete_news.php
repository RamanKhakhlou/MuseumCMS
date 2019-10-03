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
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер новостей: удаление новости</span></td>
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
		<div class='form'>
			<form name = "deleteNews" action = "index.php?actionDelete=delete_news" method = "POST">
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Удаление новости</span></legend>
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
							echo "<tr class='form__row'>";
							echo "<td><input type = 'checkbox' name = 'selectedNews[]' value = {$row['id']}></td>";
							echo "<td>{$count}</td>";
							echo "<td>{$row['news']}</td></tr>";
							$count++;
						}
					?>	
					</table>
					<input type = "submit" name = "Delete" value = "Удалить" class='form__button'>
				</fieldset>
			</form>
		</div>
<?
	}
?>