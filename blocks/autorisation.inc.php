<?
	//���������� ���� ������������� �� ��
	$resultUsers = mysql_query("SELECT login, pass, stat FROM user") or die("�� ������� ������� ������ �� ����");

	//���������, �������� �� ������ �� �����
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "�����" && !isset($_SESSION['name']))
	{
		$name = CleanData($_POST['name']);
		$password = CleanData($_POST['password']);
		while($rowUser = mysql_fetch_assoc($resultUsers))
		{
			//�������� ���������� ������������ � ��� ������
			if($rowUser['login'] == $name && $rowUser['pass'] == $password)
			{
				//�������� ���������� � ������
				$_SESSION['name'] = $name;
				$_SESSION['privileges'] = $rowUser['stat'];	
				header("LOCATION:".$_SERVER['PHP_SELF']);
			}
		}
	}
	//������������ ����� �� ������� ������ ������������
	if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Exit'] == "�����" && isset($_SESSION['name']))
	{
		session_unset();
		header("LOCATION: {$_SERVER['PHP_SELF']}");
	}
?>