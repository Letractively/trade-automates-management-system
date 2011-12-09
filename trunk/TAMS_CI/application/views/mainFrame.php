<!DOCTYPE LINK PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/styles.css" TYPE="text/css" MEDIA=screen>
<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/navStyle.css" TYPE="text/css" MEDIA=screen>
<script type="text/javascript" src="<?php echo base_url()?>resources/jquery-1.3.2.js"></script>

<?php //session_start();
		if ( isset($_SESSION['username'])) {?>
<body>
<ul id="navigation">
	 <li class="home"><a title="Personal Cabinet" 
	 href="<?php echo base_url()?>index.php/pcab"> </a></li>
	 <li class="top"><a title="Top Seller"></a></li>
	 <li class="search"><a title="Search"></a></li>
	</ul>

<script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-85px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-85px'},200);
                    }
                );
            });
        </script>

<script
	type="text/javascript"> </script>
		<script type="text/javascript"> 
			$(document).ready(function(){ 
			$('.splLink').click(function(){ 
			$(this).parent().children('div.splCont').toggle('normal');
			 return false;
			 });
			 });
 		</script>
</body>

<?php }?>

<header class="mainH">
    <hgroup>
        <h1>Trade automates control and monitoring system</h1>
    </hgroup>
</header>
 
<nav id=global>
    <ul>
        <li><a href="<?php echo base_url()?>">Головна</a></li>
        <li><a href="<?php echo base_url()?>index.php/ta">Торгові автомати</a></li>
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