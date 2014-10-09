<?php
$dbhandle = mysql_connect("127.0.0.1", "root", "") 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db("ellumfpc_flamer_nofacebook",$dbhandle) 
  or die("Could not select examples");
$usuario="flamer_admin";
$result = mysql_query("SELECT * FROM t_admin WHERE admin_username = '$usuario'") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
echo( $no_of_rows);
 $result = mysql_fetch_array($result);
 print_r($result);
    
    
    
    ?>  