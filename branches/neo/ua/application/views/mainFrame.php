﻿<!DOCTYPE LINK PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/styles.css" TYPE="text/css" MEDIA=screen>

<header class="mainH">
    <hgroup>
        <h1>Система керування торговими автоматами</h1>
        <h2>СКТА</h2>
    </hgroup> 
</header>
 
<nav id=global>
    <ul>
        <li><a href="<?php echo base_url()?>">Головна</a></li>
        <li><a href="#">Торгові автомати</a></li>
        <li id=about >
			<a href="#">Про нас</a>
			<ul id=subMenu>
					<li><a href="<?php echo base_url()?>index.php/about">Про нас</a></li>
					<li><a href="<?php echo base_url()?>index.php/about/contacts">Контакти</a></li>
					<li><a href="<?php echo base_url()?>index.php/about/feedback">Зворотній звязок</a></li>
				</ul>
		</li>
		<li id=about >
			<a href="#">All</a>
			<ul id=subMenu style="left: -320px;">
					<li><a href="<?php echo base_url()?>index.php/admin/test">productslist</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/Locations">Locations</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/Roles">Roles</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/Users">Users</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/Transactions">Transactions</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/trade_automates">Trade Automates</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/trade_list">Trade List</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/tasks">Tasks</a></li>
					<li><a href=#>empty</a></li>
				</ul>
		</li>
		<?php //session_start();
		if ( !isset($_SESSION['username'])) {
			echo '<li id=login ><a href="', base_url(), 
			'index.php/login ">Увійти</a></li>';
		}
		else {
			echo '<li id=login ><a href="', base_url(), 
			'index.php/login/logout ">Вийти</a></li>';
		}
		?>
    </ul>
</nav>
 
<div id=content>

	<?php echo $content;?>
</div>
 
<footer>
    <p>&copy; 2011 SPR-1. All Rights Reserved.</p>
</footer>