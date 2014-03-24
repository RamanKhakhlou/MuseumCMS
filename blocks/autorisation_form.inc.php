<div class='wrapper'>
<div class="main">
	<img src="image/system/logo.png" width='125px' height='21px'>
	<hr class="hrs">
	<form name = "autarisationUser" action = "<?=$_SERVER["PHP_SELF"]?>" method = "POST">
		<div class="smart_input">
			<input type="text" name="name" id="name" class="inp" required placeholder="Логин">
		</div>
		
		<div class="smart_input">
			<input type="password" name="password" id="password" class="inp" required placeholder="Пароль">
		</div>
	
		<input type = submit name = "Ok" value = "Войти" class='btn'>
	</form>
</div>
	<a href='http://muz.brsu.by/' class='pull-left'>
		<img src='image/system/back.png' width='12px' height='12px'>
		Вернуться на сайт
	</a>
</div>