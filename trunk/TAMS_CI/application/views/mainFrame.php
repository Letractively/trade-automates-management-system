<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/styles.css" TYPE="text/css" MEDIA=screen>

<header class="mainH">
    <hgroup>
        <h1>������� ��������� ��������� ����������</h1>
        <h2>����</h2>
    </hgroup>
</header>
 
<nav id=global>
    <ul>
        <li><a href="#">�������</a></li>
        <li id=about >
			<a href="#">��� ���</a>
			<ul id=subMenu>
					<li><a href=#>��� ���</a></li>
					<li><a href=#>��������</a></li>
					<li><a href=#>�������� ������</a></li>
				</ul>
		</li>
        <li><a href="#">������ ��������</a></li>
    </ul>
</nav>
 
<div id=content>

	<?php echo $content;?>
</div>
 
<footer>
    <p>&copy; 2011 SPR-1. All Rights Reserved.</p>
</footer>