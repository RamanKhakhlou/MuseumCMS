<?
	//Выполняется добавление при передаче методом Post
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$news = CleanData($_POST['news']);
			//Если основные поля заполнены
			if($news != "")
			{
				//Добавление нового царства в БД
				$result = AddNews($news);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Запись о новости успешно добавлена.");
				}
			}
			//Вывод ошибок
			AddErrorsForNews($news);
?>
			<script>museum.redirect('Add', 'add_news');</script>";
<?
		}
	}
?>
<div id='titlesus'>
<table>
	<tr>
		<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
		<td><span class='titlesus_h'>Менеджер новостей: добавить новость</span></td>
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
			<div id='cont'>
				<fieldset class='fs'>
					<legend><span class='legend'>Добавление новость</span></legend>
					<table>
						<tr tr class='asdasd'>
							<td class='number1'>Текст новости<span class='star'>*</span></td>
							<td><textarea name = "news" class="tarea" required></textarea></td>
						</tr>
					</table>
				</fieldset>
			<input type = "submit" value = "Добавить" name = "add" class="buttonw">
		</form>
		</div>
<?	
	}
?>