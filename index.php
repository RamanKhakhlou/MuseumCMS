<?
	session_start();
	//Подключение к БД
	include("blocks/connection.inc.php");
	//Подключение имеющихся функций
	include("blocks/functions.inc.php");
	//Производит авторизацию
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
		<title>Панель управления</title>
	</head>
	<body>
		<?
			if(!isset($_SESSION['name']))
			{
				//Вызывает форму для авторизации
				include("blocks/autorisation_form.inc.php");
			}
			//Вызывается, если пользователь авторизовался
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
											<h1>Работа с экспонатами</h1>		
											<ul>
												<li><a href = "exhibit/add/add_all.php">Добавление</a><li>
												<li><a href = "exhibit/change/change_all.php">Изменение</a><li>
												<li><a href = "exhibit/delete/delete_all.php">Удаление</a><li>
											</ul>
										</li>
										<li>
											<h1>Работа с контентом</h1>		
											<ul>
												<li><a href = "#">Добавление</a><li>
												<li><a href = "#">Изменение</a><li>
												<li><a href = "#">Удаление</a><li>
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
						<h1>Работа с пользователями</h1>		
						<ul>
							<li><a href = "#">Добавление</a><li>
							<li><a href = "#">Изменение</a><li>
							<li><a href = "#">Удаление</a><li>
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