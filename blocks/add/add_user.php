<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$login = CleanData($_POST['login']);
			$password = CleanData($_POST['password']);
			$passwordConfirm = CleanData($_POST['passwordConfirm']);
			$name = CleanData($_POST['name']);
			if(!AddErrorsForUsers($login, $password, $passwordConfirm, $name))
			{
				// Add hash of password
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
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер пользователей: добавить пользователя</span></td>
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
			<div class='form'>
				<fieldset class='form__fieldset'>
					<legend><span class='form__legend'>Добавление пользователя</span></legend>
					<table>
						<tr tr class='form__row'>
							<td class='form__label'><label for="login">Логин<span class='form__star'>*</span></label></td>
							<td><input type = "text" id = "login" name = "login" class='form__input' required maxlength="255"></td>
						</tr>
						<tr tr class='form__row'>
							<td class='form__label'><label for="password">Пароль<span class='form__star'>*</span></label></td>
							<td><input type = "password" id = "password" name = "password" class='form__input' required maxlength="255" minlength="6"></td>
						</tr>
						<tr tr class='form__row'>
							<td class='form__label'><label for="passwordConfirm">Подтвердите пароль<span class='form__star'>*</span></label></td>
							<td><input type = "password" id = "passwordConfirm" name = "passwordConfirm" class='form__input' required maxlength="255" minlength="6"></td>
						</tr>
						<tr tr class='form__row'>
							<td class='form__label'><label for="name">Полное имя</label></td>
							<td><input type = "text" id = "name" name = "name" class='form__input' maxlength="255"></td>
						</tr>
					</table>
				</fieldset>
			<input type = "submit" value = "Добавить" name = "add" class='form__button'>
		</form>
		</div>
<?	
	}
?>