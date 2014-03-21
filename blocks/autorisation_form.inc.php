<script type="text/javascript">
// Проверка заполнения поля
function chkTT(e) {
  if (typeof(e)=='string') { e=document.getElementById(e); }
  if (!e) { return false; }
  document.getElementById(e.id+'_tooltip').style.display =
   (e.value==''?'inline':'none');
}
// Спрятать подсказку
function hideTT(e) {
  if (typeof(e)=='string') { e=document.getElementById(e); }
  if (!e) { return false; }
  document.getElementById(e.id+'_tooltip').style.display='none';
}
</script>

<div class='wrapper'>
<div class="main">
	<img src="image/system/logo.png" width='125px' height='21px'>
	<hr class="hrs">
	<form name = "autarisationUser" action = "<?=$_SERVER["PHP_SELF"]?>" method = "POST">
		
		
		<div class="smart_input">
			<label for="name" id="name_tooltip">Логин</label>
			<input type="text" name="name" id="name" class="inp" onfocus="hideTT(this);" onblur="chkTT(this);">
		</div>
		
		<div class="smart_input">
			<label for="password" id="password_tooltip">Пароль</label>
			<input type="password" name="password" id="password" class="inp" onfocus="hideTT(this);" onblur="chkTT(this);">
		</div>
	
		<input type = submit name = "Ok" value = "Войти" class='btn'>
	</form>
</div>
	<a href='http://muz.brsu.by/' class='pull-left'>
		<img src='image/system/back.png' width='12px' height='12px'>
		Вернуться на сайт
	</a>
</div>

	<script type="text/javascript">
		// Показать подсказки в полях ввода
		chkTT('name');
		chkTT('password');
	</script>
	