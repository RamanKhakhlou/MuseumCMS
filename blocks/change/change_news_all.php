<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер новостей: редактировать новость</span></td>
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

		$sqlNews = "SELECT id, news FROM news";
		$resultNews = mysql_query($sqlNews) or die(mysql_error());
?>
		<form name = "changeNews" action = "index.php?actionChange=change_news_form" method = "POST">
			<div class='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Редактирование новости</span></legend>
					<table>
						<tr>
							<td></td>
							<td>Номер</td>
							<td>Текст</td>
						</tr>
					<?
						$count = 1;
						while($rowNews = mysql_fetch_assoc($resultNews))
						{
							echo "<tr class='form__row'>";
							echo "<td>";
							echo "<input type = 'radio' name = 'selectedNews' value = {$rowNews['id']} ". ($count == 1 ? "checked>" : ">");
							echo "</td>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $rowNews['news'] . "</td></tr>";
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