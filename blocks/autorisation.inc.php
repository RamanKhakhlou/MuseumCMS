<?
	//���������, �������� �� ������ �� �����
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "�����" && !isset($_SESSION['name']))
	{
		$name = CleanData($_POST['name']);
		$password = md5(CleanData($_POST['password']));
		
		$sql = "SELECT COUNT(*) FROM user WHERE login = '{$name}' AND pass = '{$password}'" or die("�� ������� ������� �������������.");;
		$count = mysql_query($sql);
		
		if(mysql_result($count, 0) > 0)
		{
			$_SESSION['name'] = $name;
			header("LOCATION:".$_SERVER['PHP_SELF']);
		}
	}
	//������������ ����� �� ������� ������ ������������
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Exit'] == "�����" && isset($_SESSION['name']))
	{
		session_unset();
		header("LOCATION: {$_SERVER['PHP_SELF']}");
	}
?>