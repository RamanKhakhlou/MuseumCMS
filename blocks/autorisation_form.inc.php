<script type="text/javascript">
// �������� ���������� ����
function chkTT(e) {
  if (typeof(e)=='string') { e=document.getElementById(e); }
  if (!e) { return false; }
  document.getElementById(e.id+'_tooltip').style.display =
   (e.value==''?'inline':'none');
}
// �������� ���������
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
			<label for="name" id="name_tooltip">�����</label>
			<input type="text" name="name" id="name" class="inp" onfocus="hideTT(this);" onblur="chkTT(this);">
		</div>
		
		<div class="smart_input">
			<label for="password" id="password_tooltip">������</label>
			<input type="password" name="password" id="password" class="inp" onfocus="hideTT(this);" onblur="chkTT(this);">
		</div>
	
		<input type = submit name = "Ok" value = "�����" class='btn'>
	</form>
</div>
	<a href='http://muz.brsu.by/' class='pull-left'>
		<img src='image/system/back.png' width='12px' height='12px'>
		��������� �� ����
	</a>
</div>

	<script type="text/javascript">
		// �������� ��������� � ����� �����
		chkTT('name');
		chkTT('password');
	</script>
	