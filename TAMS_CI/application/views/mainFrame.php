<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/styles.css" TYPE="text/css" MEDIA=screen>

<header class="mainH">
    <hgroup>
        <h1>Система керування торговими автоматами</h1>
        <h2>СКТА</h2>
    </hgroup>
</header>
 
<nav id=global>
    <ul>
        <li><a href="#">Головна</a></li>
        <li id=about >
			<a href="#">Про нас</a>
			<ul id=subMenu>
					<li><a href=#>Про нас</a></li>
					<li><a href=#>Контакти</a></li>
					<li><a href=#>Зворотній звязок</a></li>
				</ul>
		</li>
        <li><a href="#">Торгові автомати</a></li>
    </ul>
</nav>
 
<div id=content>

	<?php echo $content;?>
</div>
 
<footer>
    <p>&copy; 2011 SPR-1. All Rights Reserved.</p>
</footer>