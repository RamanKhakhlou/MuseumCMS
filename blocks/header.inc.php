<div id='panel1'>
			 <a href='index.php' class='pan'>Панель управления</a>
			</div>
			<div id='panel2'>
			</div>
			<div id='nav'>
			<ul>
				<li><a href="">Сайт</a></li>
				<li><a href="">Экспонаты</a>
					<ul>
						<li><a href="">Экспонат</a>
							<ul>
								<li><a href='index.php?actionAdd=add_exhibit'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_exhibit'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_exhibit'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Царство</a>
							<ul>
								<li><a href='index.php?actionAdd=add_kingdom'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_kingdom'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_kingdom'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Тип</a>
							<ul>
								<li><a href='index.php?actionAdd=add_type'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_type'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_type'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Класс</a>
							<ul>
								<li><a href='index.php?actionAdd=add_class'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_class'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_class'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Отряд</a>
							<ul>
								<li><a href='index.php?actionAdd=add_detachment'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_detachment'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_detachment'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Семейство</a>
							<ul>
								<li><a href='index.php?actionAdd=add_family'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_family'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_family'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Вид</a>
							<ul>
								<li><a href='index.php?actionAdd=add_species'>Добавление</a></li>
								<li><a href='index.php?actionChangeAll=change_species'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_species'>Удаление</a></li>
							</ul>
						</li>
					</ul>	
				</li>
				<li><a href="">Пункт №3</a>
					<ul>
						<li><a href="">Ячейка №1</a><li>
						<li><a href="">Ячейка №2</a><li>
						<li><a href="">Ячейка №3</a><li>
						<li><a href="">Ячейка №4</a><li>
						<li><a href="">Ячейка №5</a><li>
					</ul>
				</li>
				<li><a href="">Пункт №4</a></li>
				<li><a href="">Пункт №5</a></li>
				<li><a href="">Пункт №6</a></li>
				<li><a href="">Пункт №7</a></li>
			</ul>
			</div>
			<div id='menu2'>
			
			<?php
			printf("
			<form name = 'showUser' action = '{$_SERVER['PHP_SELF']}' method = 'POST'>
					<span class='111'><img src='image/system/view.png' width='14px' height='10px'><a href='http://muz.brsu.by/' class='h11'>Просмотр сайта</a><img src='image/system/shutdown.png' width='10px' height='10px'></span><input type = 'submit' name = 'Exit' value = 'Выйти' class='h22'>
			</form>");
			?>
			</div>
			<div id='menu3'></div>