<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "Изменить")
		{
			$id = CleanData($_POST['id'], 'i');
			$news = CleanData($_POST['news']);

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
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$id = CleanData($_POST["selectedNews"], 'i');
			$sqlNews = "SELECT id, news FROM news WHERE id = {$id}";
			$resaultNews = mysql_query($sqlNews) or die(mysql_error());
			$rowNews = mysql_fetch_assoc($resaultNews);
?>
			<form action = "index.php?actionChange=change_news_form" method = "POST" name = "changeNews">
				<div class='form'>
					<fieldset class='form__fieldset'>
						<legend><span class='form__legend'>Редактирование новости</span></legend>
						<table>
							<tr class='form__row'>
								<td class='form__label'>Текст новости<span class='form__star'>*</span></td>
								<td><textarea name = "news" class='form__area' required><?= $rowNews["news"]?></textarea></td>
							</tr>
						</table>
					</fieldset>
					<input type = "hidden" name = "id" value = "<?= $rowNews['id']?>" class='form__button'>
					<input type = "submit" name = "Ok" value = "Изменить" class='form__button'>
					<input type = "button" name = "back" value = "Назад" class='form__button' onclick = "museum.redirect('Change', 'change_news_all')">
				</div>
			</form>
<?
		}
	}
?>