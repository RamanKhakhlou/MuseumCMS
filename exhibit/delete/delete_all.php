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
		<title>������ ������������� - ��������</title>
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
				<p>�������</p>
				<a href = "delete_kingdom.php">�������</a>
				<br>
				<a href = "delete_type.php">���</a>
				<br>
				<a href = "delete_class.php">�����</a>
				<br>
				<a href = "delete_detachment.php">�����</a>
				<br>
				<a href = "delete_family.php">���������</a>
				<br>
				<a href = "delete_species.php">���</a>
				<br>
				<a href = "delete_exhibit.php">��������</a>
		<?
			}
			mysql_close();
		?>
	</body>
</html>