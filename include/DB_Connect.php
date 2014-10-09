<?php
class DB_Connect {
    // constructor
    function __construct() {
    }
    // destructor
    function __destruct() {
        // $this->close();
    }
    // Connecting to database
    public function connect() {
        require_once 'config.php';
        // connecting to mysql
        $con = mysql_connect("127.0.0.1", "root", "");
        // selecting database
        mysql_select_db("ellumfpc_flamer_nofacebook");
        // return database handler
        return $con;
    }
    // Closing database connection
    public function close() {
        mysql_close();
    }
}
?>