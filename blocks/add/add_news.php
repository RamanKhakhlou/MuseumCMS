<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$news = CleanData($_POST['news']);
			if($news != "")
			{
				$result = AddNews($news);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о новости успешно добавлена.");
				}
			}
			AddErrorsForNews($news);
?>
			<script>museum.redirect('Add', 'add_news');</script>";
<?
		}
	}
?>
<div class='info'>
<table>
	<tr>
		<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
		<td><span class='info__title'>Менеджер новостей: добавить новость</span></td>
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
?>
		<form action = "index.php?actionAdd=add_news" method = "POST" name = "addition">
			<div class='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Добавление новость</span></legend>
					<table>
						<tr tr class='form__row'>
							<td class='form__label'>Текст новости<span class='form__star'>*</span></td>
							<td><textarea name = "news" class="form__area" required></textarea></td>
						</tr>
					</table>
				</fieldset>
			<input type = "submit" value = "Добавить" name = "add" class='form__button'>
		</form>
		</div>
<?	
	}
?>