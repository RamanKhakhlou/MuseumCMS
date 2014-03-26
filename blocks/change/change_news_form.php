<?
	if(isset($_SESSION['name']))
	{
		//Выполняется после отправки формы
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			//Обработка введенных данных
			$id = CleanData($_POST['id'], 'i');
			$news = CleanData($_POST['news']);
			//Внесение изменений в БД
			if(!AddErrorsForNews($news))
			{
				$result = ChangeNews($id, $news);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Новость успешно отредактирована.");
				}
			}
?>
			<script>museum.redirect('Change', 'change_news_all');</script>
<?
		}
	}
?>
<div id='titlesus'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='titlesus_h'>Менеджер новостей: редактировать новость</span></td>
		</tr>
	</table>
</div>

<?
	if(isset($_SESSION['name']))
	{
		//Вывод формы заполнения
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$id = CleanData($_POST["selectedNews"], 'i');
			$sqlNews = "SELECT id, news FROM news WHERE id = {$id}";
			$resaultNews = mysql_query($sqlNews) or die(mysql_error());
			$rowNews = mysql_fetch_assoc($resaultNews);
?>
			<form action = "index.php?actionChange=change_news_form" method = "POST" name = "changeNews">
				<div id='cont'>
					<fieldset class='fs'>
						<legend><span class='legend'>Редактирование новости</span></legend>
						<table>
							<tr class='asdasd'>
								<td class='number1'>Текст новости<span class='star'>*</span></td>
								<td><textarea name = "news" class='tarea' required><?= $rowNews["news"]?></textarea></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?= $rowNews['id']?>" class="buttonw">
					<input type = "submit" name = "Ok" value = "Изменить" class="buttonw">
					<input type = "button" name = "back" value = "Назад" class="buttonw" onclick = "museum.redirect('Change', 'change_news_all')">
				</div>
			</form>
<?
		}
	}
?>