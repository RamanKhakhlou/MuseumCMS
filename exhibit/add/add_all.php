<?
	session_start();
	//����������� � ��
	include("../../blocks/connection.inc.php");
	//����������� ��������� �������
	include("../../blocks/functions.inc.php");
	//���������� �����������
	include("../../blocks/autorisation.inc.php");
?>
<html>
	<head>
		<link href="../../css/style.css" type="text/css" rel="stylesheet">
		<title>������ ������������� - ����������</title>
	</head>
	<body>
		<?
			if(!isset($_SESSION['name']))
			{
				//�������� ����� ��� �����������
				include("../../blocks/autorisation_form.inc.php");
			}
			//����������, ���� ������������ �������������
			elseif(isset($_SESSION['name']))
			{
				//����� �������� ������������
				//include("../../blocks/show_user.inc.php");	
				include("../../blocks/header.inc.php");
		?>
				<p>��������</p>
				<a href = "add_kingdom.php">�������</a>
				<br>
				<a href = "add_type.php">���</a>
				<br>
				<a href = "add_class.php">�����</a>
				<br>
				<a href = "add_detachment.php">�����</a>
				<br>
				<a href = "add_family.php">���������</a>
				<br>
				<a href = "add_species.php">���</a>
				<br>
				<a href = "add_exhibit.php">��������</a>
		<?
			}
			mysql_close();
		?>	
	</body>
</html>