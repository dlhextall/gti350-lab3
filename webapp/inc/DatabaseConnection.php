<?php

// $dbcon = pg_connect("host=localhost port=5432 dbname=gti619-lab5 user=goliathadmin password=explosion")
// or die ("Unnable to connect to the database!" . pg_last_error($conn));
class DatabaseConnection {

    private $dsn = 'pgsql:dbname=d9818fb3j9mm9c;host=ec2-23-23-81-171.compute-1.amazonaws.com';
    private $user = 'jspylguvfppodc';
    private $password = 'xcPKKb3AlhR8PhaBCNZ2S8JYNj';

    private static $instance, $dbh;

    private function __construct() { }

    public static function singleton() {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function get() {
        if (!isset(self::$dbh)) {
            try {
                self::$dbh = new PDO($this->dsn, $this->user, $this->password);
            } catch (PDOException $e) {
                error_log('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$dbh;
    }

}

?>