<?php

	$conexao=mysql_connect('localhost','root','bcd127'); 

    /*$conexao=mysql_connect('192.168.0.2','pc1620171','senai127');*/

	mysql_select_db('dbpc1620171');

	mysql_set_charset('utf8');
	
	session_start();
	
?>