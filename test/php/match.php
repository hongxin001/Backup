<?php
function match($id,$type){
	if($type==1)
	{
		do
		{
		$sql = "select * from car_infos where Id=$id ";
		$result = mysql_query($sql);
		$msg = mysql_fetch_assoc($result);
		$sql = "select * from good_infos where fp='$msg[fp]' and fc='$msg[fc]' and tp='$msg[tp]' and tc='$msg[tc]' and ct='$msg[ct]'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num)
		{
			$dat = mysql_fetch_assoc($result);
			$sql = "insert into message(msg) values('$dat[Id]')";
			$result = mysql_query($sql);
			break;
		}

		$sql = "select * from good_infos where fp like '$msg[fp]' and fc like '$msg[fc]' and tp like '$msg[tp]' and tc like '$msg[tc]'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num)
		{
			$dat = mysql_fetch_assoc($result);
			$sql = "insert into message(msg) values('$dat[Id]')";
			$result = mysql_query($sql);
			break;
		}
		}
		while(0);
	}
	else if($type==2)
	{
		do
		{
		$sql = "select * from good_infos where Id=$id ";
		$result = mysql_query($sql);
		$msg = mysql_fetch_assoc($result);
		$sql = "select * from car_infos where fp='$msg[fp]' and fc='$msg[fc]' and tp='$msg[tp]' and tc='$msg[tc]' and ct='$msg[ct]'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num)
		{
			$dat = mysql_fetch_assoc($result);
			$sql = "insert into message(msg) values('$dat[Id]')";
			$result = mysql_query($sql);
			break;
		}

		$sql = "select * from car_infos where fp like '$msg[fp]' and fc like '$msg[fc]' and tp like '$msg[tp]' and tc like '$msg[tc]'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num)
		{
			$dat = mysql_fetch_assoc($result);
			$sql = "insert into message(msg) values('$dat[Id]')";
			$result = mysql_query($sql);
			break;
		}
		}
		while(0);
	}
}
?>