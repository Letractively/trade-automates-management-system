<<!DOCTYPE LINK PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/styles.css" TYPE="text/css" MEDIA=screen>

<header class="mainH">
    <hgroup>
        <h1>������� ��������� ��������� ����������</h1>
        <h2>����</h2>
    </hgroup>
</header>
 
<nav id=global>
    <ul>
        <li><a href="<?php echo base_url()?>">�������</a></li>
        <li><a href="#">������ ��������</a></li>
        <li id=about >
			<a href="#">��� ���</a>
			<ul id=subMenu>
					<li><a href=#>��� ���</a></li>
					<li><a href=#>��������</a></li>
					<li><a href=#>�������� ������</a></li>
				</ul>
		</li>
		<li id=about >
			<a href="#">All</a>
			<ul id=subMenu style="left: -160px;">
					<li><a href="<?php echo base_url()?>index.php/welcome/test">productslist</a></li>
					<li><a href=#>empty</a></li>
					<li><a href=#>empty</a></li>
				</ul>
		</li>
    </ul>
</nav>
 
<div id=content>

	<?php echo $content;?>
</div>
 
<footer>
    <p>&copy; 2011 SPR-1. All Rights Reserved.</p>
</footer>