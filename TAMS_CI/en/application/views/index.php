<!DOCTYPE LINK PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<LINK REL=StyleSheet HREF="resources/styles.css" TYPE="text/css" MEDIA=screen>

<header class="mainH">
    <hgroup>
        <h1>Trade automates managment system</h1>
        <h2>TAMS</h2>
    </hgroup>
</header>
 
<nav id=global>
    <ul>
        <li><a href="<?php echo base_url()?>">Main</a></li>
        <li><a href="#">Trade automates</a></li>
        <li id=about >
			<a href="#">Про нас</a>
			<ul id=subMenu>
					<li><a href="<?php echo base_url()?>index.php/about">About us</a></li>
					<li><a href="<?php echo base_url()?>index.php/about/contacts">Contacts</a></li>
					<li><a href="<?php echo base_url()?>index.php/about/feedback">Callback</a></li>
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
					<li><a href="<?php echo base_url()?>index.php/admin/trade_list">Trade Lists</a></li>
					<li><a href="<?php echo base_url()?>index.php/admin/tasks">Tasks</a></li>
					<li><a href=#>empty</a></li>
				</ul>
		</li>
		<?php //session_start();
		if ( !isset($_SESSION['username'])) {
			echo '<li id=login ><a href="', base_url(), 
			'index.php/login ">Login</a></li>';
		}
		else {
			echo '<li id=login ><a href="', base_url(), 
			'index.php/login/logout ">Logout</a></li>';
		}
		?>
    </ul>
</nav>
 
<div id=content>

	<article>
		<header>
			<time datetime="2011-04-26" pubdate>
				<span>Лис</span> 15
			</time>
			<h1>
				<a href="#" title="link to news" rel="bookmark">
					News title
				</a>
			</h1>
		</header>
		<p>News body (here is body of news)</p>
		<!--
		<section>
			<header>
				<h1>news title</h1>
			</header>
			<p>news body</p>
		</section>
		-->
	</article>
</div>
 
<footer>
    <p>&copy; 2011 SPR-1. All Rights Reserved.</p>
</footer>
