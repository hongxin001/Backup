<?php
function spread($id,$type){
	if($type=="1")
	{
		$sql = "select * from car_infos where id=$id";
		$result=mysql_query($sql);
		$msg=mysql_fetch_assoc($result);
		mysql_select_db("logistic1");
		$loc = $msg[fc];
		$sql = "select * from allgoods where location='$loc'";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		if($num==0)
		{
			$loc = $msg[fp];
			$sql = "select * from allgoods where location='$loc'";
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
		}
		for($i=0;$i<5&&$i<$num;$i++)
		{
			$rand = rand(0,$num);
			$sql = "select * from allgoods where location='$loc' limit $rand,1";
			$result=mysql_query($sql);
		    $msg=mysql_fetch_assoc($result);
			echo $msg[name];echo $msg[phone];echo $msg[loc];
			echo "<br>";
		}
	}
	else if($type=="2")
	{
		$sql = "select * from good_infos where id=$id";
		$result=mysql_query($sql);
		$msg=mysql_fetch_assoc($result);
		mysql_select_db("logistic1");
		$loc = $msg[fc];
		$sql = "select * from allcars where loc='$loc'";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		if($num==0)
		{
			$loc = $msg[fp];
			$sql = "select * from allcars where locn='$loc'";
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
		}
		for($i=0;$i<5&&$i<$num;$i++)
		{
			$rand = rand(0,$num);
			$sql = "select * from allcars where loc='$loc' limit $rand,1";
			$result=mysql_query($sql);
		    $msg=mysql_fetch_assoc($result);
			echo $msg[name];echo $msg[phone];echo $msg[loc];
			echo "<br>";
		}
	}
}
include "mysql.php";

spread(188,"2");
?>
