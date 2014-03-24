<?
	session_start();
	//����������� � ��
	include("blocks/connection.inc.php");
	//����������� ��������� �������
	include("blocks/functions.inc.php");
	//���������� �����������
	include("blocks/autorisation.inc.php");
	$actionAdd = $_GET['actionAdd'];
	$actionChange = $_GET['actionChange'];
	$actionDelete = $_GET['actionDelete'];
?>
<html>
	<head>
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<script src="scripts/jquery-1.9.1.min.js"></script>
		<script src="scripts/museum.js"></script>
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
									include("blocks/add/{$actionAdd}.php");
								}
								if(isset($actionChange))
								{
									include("blocks/change/{$actionChange}.php");
								}
								if(isset($actionDelete))
								{
									include("exhibit/delete/{$actionDelete}_form.php");
								}
								//TODO: Add checking for 404
								if(!isset($actionAdd) && !isset($actionChange) && !isset($actionDelete))
								{
							?>
									<div id="search_wrapper">
										<input type="text" name="query" id="query">
										<input type="button" name="search" id="search" value="Search" onclick="museum.search()">
										<div id="results"></div>
									</div>
							<?
								}
							?>
						</div>
					</div>
				</div>
 		<?
			}
			mysql_close();
		?>	
	</body>
</html>