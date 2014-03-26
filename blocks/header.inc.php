<div id='panel1'>
			 <a href='index.php' class='pan'>Панель управления</a>
			</div>
			<div id='panel2'>
			</div>
			<div id='nav'>
			<ul>
				<li><a href="">Сайт</a></li>
				<!--TODO: Rename point "Exhibition"-->
				<li><a href="">Экспонаты</a>
					<ul>
						<li><a href="">Царство</a>
							<ul>
								<li><a href='index.php?actionAdd=add_kingdom'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_kingdom_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_kingdom'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Тип</a>
							<ul>
								<li><a href='index.php?actionAdd=add_type'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_type_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_type'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Класс</a>
							<ul>
								<li><a href='index.php?actionAdd=add_class'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_class_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_class'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Отряд</a>
							<ul>
								<li><a href='index.php?actionAdd=add_detachment'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_detachment_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_detachment'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Семейство</a>
							<ul>
								<li><a href='index.php?actionAdd=add_family'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_family_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_family'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Вид</a>
							<ul>
								<li><a href='index.php?actionAdd=add_species'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_species_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_species'>Удаление</a></li>
							</ul>
						</li>
						<li><a href="">Экспонат</a>
							<ul>
								<li><a href='index.php?actionAdd=add_exhibit'>Добавление</a></li>
								<li><a href='index.php?actionChange=change_exhibit_all'>Изменение</a></li>
								<li><a href='index.php?actionDelete=delete_exhibit'>Удаление</a></li>
							</ul>
						</li>
					</ul>	
				</li>
				<li><a href="">Новости</a>
					<ul>
						<li><a href='index.php?actionAdd=add_news'>Добавление</a></li>
						<li><a href='index.php?actionChange=change_news_all'>Изменение</a></li>
						<li><a href='index.php?actionDelete=delete_news'>Удаление</a></li>
					</ul>
				</li>
				<li><a href="">Галерея</a>
					<ul>
						<li><a href="index.php?actionAdd=add_photo">Добавить фото</a><li>
						<li><a href="index.php?actionDelete=delete_photo">Удалить фото</a><li>
					</ul>
				</li>				
				<li><a href="">Страницы</a>
					<ul>
						<li><a href='index.php?actionChange=change_page_all'>Редактирование</a></li>
					</ul>
				</li>
				<li><a href="">Пользователи</a>
					<ul>
						<li><a href="index.php?actionAdd=add_user">Добавить</a><li>
						<li><a href="index.php?actionChange=change_user">Редактировать</a><li>
						<li><a href="index.php?actionDelete=delete_user">Удалить</a><li>
					</ul>
				</li>
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