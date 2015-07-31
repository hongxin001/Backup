 <?php
include "mysql.php";
$result=mysql_query("insert into result(name,grade,phone,t1,t2,t3,t4,t5,t6,t7,t8,t9,t10)  
		values('$_POST[name]','$_POST[grade]','$_POST[phone]','$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]')");
if($result)
	echo "1";
else echo "0";
?>
