<?
	//Выполняется добавление при передаче методом Post
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$login = CleanData($_POST['login']);
			$password = CleanData($_POST['password']);
			$passwordConfirm = CleanData($_POST['passwordConfirm']);
			$name = CleanData($_POST['name']);
			//Если основные поля заполнены
			if(!AddErrorsForUsers($login, $password, $passwordConfirm, $name))
			{
				//Add hash of password
				//Добавление нового пользователя в БД
				$result = AddUser($login, $password, $name);
				
				if(isset($result) && $result != false)
				{
					AddSuccessMessage("Пользователь успешно добавлен.");
				}
			}
?>
			<script>museum.redirect("Add", "add_user");</script>
<?
		}
	}
?>
<div id='titlesus'>
<table>
	<tr>
		<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
		<td><span class='titlesus_h'>Менеджер пользователей: добавить пользователя</span></td>
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
		<form action = "index.php?actionAdd=add_user" method = "POST" name = "addition">
			<div id='cont'>
				<fieldset class='fs'>
					<legend><span class='legend'>Добавление пользователя</span></legend>
					<table>
						<tr tr class='asdasd'>
							<td class='number1'><label for="login">Логин<span class='star'>*</span></label></td>
							<td><input type = "text" id = "login" name = "login" class='ttext' required maxlength="255"></td>
						</tr>
						<tr tr class='asdasd'>
							<td class='number1'><label for="password">Пароль<span class='star'>*</span></label></td>
							<td><input type = "password" id = "password" name = "password" class='ttext' required maxlength="255" minlength="6"></td>
						</tr>
						<tr tr class='asdasd'>
							<td class='number1'><label for="passwordConfirm">Подтвердите пароль<span class='star'>*</span></label></td>
							<td><input type = "password" id = "passwordConfirm" name = "passwordConfirm" class='ttext' required maxlength="255" minlength="6"></td>
						</tr>
						<tr tr class='asdasd'>
							<td class='number1'><label for="name">Полное имя</label></td>
							<td><input type = "text" id = "name" name = "name" class='ttext' maxlength="255"></td>
						</tr>
					</table>
				</fieldset>
			<input type = "submit" value = "Добавить" name = "add" class="buttonw">
		</form>
		</div>
<?	
	}
?>