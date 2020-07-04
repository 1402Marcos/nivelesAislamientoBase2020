<?php

$connect = new mysqli("localhost","root","","vuelos");

if($connect){
	 
}else{
	echo "Fallo, revise ip o firewall";
	exit();
}