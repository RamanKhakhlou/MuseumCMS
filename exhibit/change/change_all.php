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
		<title>������ �������������</title>
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
				include("../../blocks/show_user.inc.php");
		?>
				<p>��������</p>
				<a href = "change_kingdom.php">�������</a>
				<br>
				<a href = "change_type.php">���</a>
				<br>
				<a href = "change_class.php">�����</a>
				<br>
				<a href = "change_detachment.php">�����</a>
				<br>
				<a href = "change_family.php">���������</a>
				<br>
				<a href = "change_species.php">���</a>
				<br>
				<a href = "change_exhibit.php">��������</a>
		<?
			}	
			mysql_close();
		?>	
	</body>
</html>