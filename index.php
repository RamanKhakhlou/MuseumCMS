<?
	session_start();
	//����������� � ��
	include("blocks/connection.inc.php");
	//����������� ��������� �������
	include("blocks/functions.inc.php");
	//���������� �����������
	include("blocks/autorisation.inc.php");
	$actionAdd = $_GET['actionAdd'];
	$actionChangeAll = $_GET['actionChangeAll'];
	$actionChange = $_GET['actionChange'];
	$actionDelete = $_GET['actionDelete'];
	if(isset($actionAdd))
	{
		include("exhibit/add/{$actionAdd}.php");
	}
	if(isset($actionChange))
	{
		include("exhibit/change/{$actionChange}_make.php");
	}
	if(isset($actionDelete))
	{
		include("exhibit/delete/{$actionDelete}.php");
	}	
?>
<html>
	<head>
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<title>������ ����������</title>
	</head>
	<body>
		<?
			if(!isset($_SESSION['name']))
			{
				//�������� ����� ��� �����������
				include("blocks/autorisation_form.inc.php");
			}
			//����������, ���� ������������ �������������
			elseif(isset($_SESSION['name']))
			{
		?>
				<div class='wrapper'>
					<div id="stroke">
						<div id="up_part">								
							<?			
								include("blocks/header.inc.php");	
								if(isset($actionAdd))
								{
									include("exhibit/add/{$actionAdd}_form.php");
								}
								if(isset($actionChangeAll))
								{
									include("exhibit/change/{$actionChangeAll}_all.php");
								}
								if(isset($actionChange))
								{
									include("exhibit/change/{$actionChange}_form.php");
								}
								if(isset($actionDelete))
								{
									include("exhibit/delete/{$actionDelete}_form.php");
								}
								if(!isset($actionAdd) && !isset($actionChange) && !isset($actionDelete) && !isset($actionChangeAll))
								{
							?>				
									<ul>
										<li>
											<h1>������ � �����������</h1>		
											<ul>
												<li><a href = "exhibit/add/add_all.php">����������</a><li>
												<li><a href = "exhibit/change/change_all.php">���������</a><li>
												<li><a href = "exhibit/delete/delete_all.php">��������</a><li>
											</ul>
										</li>
										<li>
											<h1>������ � ���������</h1>		
											<ul>
												<li><a href = "#">����������</a><li>
												<li><a href = "#">���������</a><li>
												<li><a href = "#">��������</a><li>
											</ul>
										</li> 
									</ul>
							<?
								}								
							?>
						</div>
					</div>
				</div>					
			<?
				if($_SESSION['privileges'] == 1)
				{
			?>
					<!-- 
					<li>
						<h1>������ � ��������������</h1>		
						<ul>
							<li><a href = "#">����������</a><li>
							<li><a href = "#">���������</a><li>
							<li><a href = "#">��������</a><li>
						</ul>
					</li>
					-->
			<?
				}
			?>
				<!-- </ul> -->
 		<?
			}			
			mysql_close();
		?>	
	</body>
</html>