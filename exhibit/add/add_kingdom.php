<?
	//����������� ���������� ��� �������� ������� Post	
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "��������")
		{
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			//���� �������� ���� ���������
			if($nameRus != "" && $nameLat != "")
			{
				//���������� ������ ������� � ��
				AddKingdom($nameRus, $nameLat, $description);	
				//������������ ��������
				header("LOCATION: index.php?actionAdd=add_kingdom");
			}			
			//����� ������
			AddErrors($nameRus, $nameLat);
		}
	}
?>