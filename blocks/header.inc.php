<div id='panel1'>
			 <a href='index.php' class='pan'>������ ����������</a>
			</div>
			<div id='panel2'>
			</div>
			<div id='nav'>
			<ul>
				<li><a href="">����</a></li>
				<!--TODO: Rename point "Exhibition"-->
				<li><a href="">���������</a>
					<ul>
						<li><a href="">�������</a>
							<ul>
								<li><a href='index.php?actionAdd=add_kingdom'>����������</a></li>
								<li><a href='index.php?actionChange=change_kingdom_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_kingdom'>��������</a></li>
							</ul>
						</li>
						<li><a href="">���</a>
							<ul>
								<li><a href='index.php?actionAdd=add_type'>����������</a></li>
								<li><a href='index.php?actionChange=change_type_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_type'>��������</a></li>
							</ul>
						</li>
						<li><a href="">�����</a>
							<ul>
								<li><a href='index.php?actionAdd=add_class'>����������</a></li>
								<li><a href='index.php?actionChange=change_class_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_class'>��������</a></li>
							</ul>
						</li>
						<li><a href="">�����</a>
							<ul>
								<li><a href='index.php?actionAdd=add_detachment'>����������</a></li>
								<li><a href='index.php?actionChange=change_detachment_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_detachment'>��������</a></li>
							</ul>
						</li>
						<li><a href="">���������</a>
							<ul>
								<li><a href='index.php?actionAdd=add_family'>����������</a></li>
								<li><a href='index.php?actionChange=change_family_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_family'>��������</a></li>
							</ul>
						</li>
						<li><a href="">���</a>
							<ul>
								<li><a href='index.php?actionAdd=add_species'>����������</a></li>
								<li><a href='index.php?actionChange=change_species_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_species'>��������</a></li>
							</ul>
						</li>
						<li><a href="">��������</a>
							<ul>
								<li><a href='index.php?actionAdd=add_exhibit'>����������</a></li>
								<li><a href='index.php?actionChange=change_exhibit_all'>���������</a></li>
								<li><a href='index.php?actionDelete=delete_exhibit'>��������</a></li>
							</ul>
						</li>
					</ul>	
				</li>
				<li><a href="">�������</a>
					<ul>
						<li><a href='index.php?actionAdd=add_news'>����������</a></li>
						<li><a href='index.php?actionChange=change_news_all'>���������</a></li>
						<li><a href='index.php?actionDelete=delete_news'>��������</a></li>
					</ul>
				</li>
				<li><a href="">�������</a>
					<ul>
						<li><a href="index.php?actionAdd=add_photo">�������� ����</a><li>
						<li><a href="index.php?actionDelete=delete_photo">������� ����</a><li>
					</ul>
				</li>				
				<li><a href="">��������</a>
					<ul>
						<li><a href='index.php?actionChange=change_page_all'>��������������</a></li>
					</ul>
				</li>
				<li><a href="">������������</a>
					<ul>
						<li><a href="index.php?actionAdd=add_user">��������</a><li>
						<li><a href="index.php?actionChange=change_user">�������������</a><li>
						<li><a href="index.php?actionDelete=delete_user">�������</a><li>
					</ul>
				</li>
			</ul>
			</div>
			<div id='menu2'>
			
			<?php
				printf("
				<form name = 'showUser' action = '{$_SERVER['PHP_SELF']}' method = 'POST'>
						<span class='111'><img src='image/system/view.png' width='14px' height='10px'><a href='http://muz.brsu.by/' class='h11'>�������� �����</a><img src='image/system/shutdown.png' width='10px' height='10px'></span><input type = 'submit' name = 'Exit' value = '�����' class='h22'>
				</form>");
			?>
			</div>
			<div id='menu3'></div>