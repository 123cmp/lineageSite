<?php

class Connection {

    private static $instance = null;

    public function __construct() {
        $this->MYSQL_SERVER = '127.0.0.1';
        $this->MYSQL_USER = 'root';
        $this->MYSQL_PASSWORD = '';
        $this->MYSQL_DB = 'lineageSite';
        $this->link = null;
    }

    public static function getInstance() {
        if(!self::$instance)
            self::$instance = new Connection();

        return self::$instance;
    }

    public function connect() {
        $lnk = mysqli_connect($this->MYSQL_SERVER, $this->MYSQL_USER, $this->MYSQL_PASSWORD, $this->MYSQL_DB)
        or die("Error: ".mysqli_error($lnk));
        if(!mysqli_set_charset($lnk, "utf8")){
            printf("Error: ".mysqli_error($lnk));
        }

        $this->link = $lnk;
    }

    public function getLink() {
        return $this->link;
    }
}

