<?
	if(isset($_SESSION['name']))
	{		
		//����������� ����� �������� �����
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'] == "���������")
		{
			//��������� ��������� ������
			$id = CleanData($_POST["id"], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			$description = CleanData($_POST['description']);
			//�������� ��������� � ��
			if($nameRus != "" && $nameLat != "")
			{
				ChangeKingdom($id, $nameRus, $nameLat, $description);							
				//������� �� ���������� ��������
				header("LOCATION: index.php?actionChangeAll=change_kingdom");
			}			
			AddErrors($nameRus, $nameLat);
			header("LOCATION: index.php?actionChangeAll=change_kingdom");
		}
	}
?>