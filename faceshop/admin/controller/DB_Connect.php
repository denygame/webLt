<?php
require_once('others/constants.php');

class DB_Connect
{
    var $host;
    var $user;
    var $pass;
    var $db;

    public function __construct()
    {
        $this->host = constants::server;
        $this->user = constants::username;
        $this->pass = constants::password;
        $this->db = constants::database_name;
    }

    public function connect()
    {
        $con = mysql_connect($this->host, $this->user, $this->pass) or die("Không thể kết nối đến server");
        mysql_select_db($this->db) or die("Không thể kết nối database");
        mysql_query("SET NAMES'utf8'");

        return $con;
    }
}

?>