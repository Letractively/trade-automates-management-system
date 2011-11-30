<!DOCTYPE LINK PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

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
					<li><a href=#>Про нас</a></li>
					<li><a href=#>Контакти</a></li>
					<li><a href=#>Зворотній звязок</a></li>
				</ul>
		</li>
		<li id=about >
			<a href="#">All</a>
			<ul id=subMenu style="left: -160px;">
					<li><a href="<?php echo base_url()?>index.php/welcome/test">productslist</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/Locations">Locations</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/Roles">Roles</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/Users">Users</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/Transactions">Transactions</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/trade_automates">Trade Automates</a></li>
					<li><a href=#>empty</a></li>
				</ul>
		</li>
    </ul>
</nav>
 
<div id=content>

	<article>
		<header>
			<time datetime="2011-04-26" pubdate>
				<span>Лис</span> 15
			</time>
			<h1>
				<a href="#" title="Ссылка на новость" rel="bookmark">
					Заголовок новини
				</a>
			</h1>
		</header>
		<p>Тіло новини (сюди поміщається основна інформація)</p>
		<!--
		<section>
			<header>
				<h1>Что думает общественность</h1>
			</header>
			<p>В реальности существует только Ubuntu с таким странным именем "Зайцелоп".</p>
		</section>
		-->
	</article>
</div>
 
<footer>
    <p>&copy; 2011 SPR-1. All Rights Reserved.</p>
</footer>