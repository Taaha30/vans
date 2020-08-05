<?php
// session_start();
class Connection{
    private $host = 'localhost';
    private $dbName = "vans";
    private $user = "root";
    private $pass = "";
    private $charset = 'utf8';

    protected $dbh;
    private $error;
    private $stmt;

    //connection
    public function __construct(){
        $dsn     = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=" . $this->charset;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }

    public function sqlQuery($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function lastInsertId(){
        return $this->stmt = $this->dbh->lastInsertId();
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindParam($param, $value, $type);
    }

    public function run() {
        try{
            return $this->stmt->execute();
        }
        catch (PDOException $e) {
            return $this->error = $e->getMessage();
        }
    }

    public function response($response, $action){
        $time = $this->timeZone();
        $response_query = "INSERT INTO `responses` (ipaddress, sessionid, api, response, createdon) VALUES ('".$_SERVER["REMOTE_ADDR"]."', '".session_id()."', '$action', '$response', '$time')";
        $add_response = $this->sqlQuery($response_query);
        return $exec_response = $this->run();
    }

    public function fetch(){
          $this->run();
          return $this->stmt->fetchall();
      }

    public function timeZone(){
        date_default_timezone_set("Asia/Calcutta");
        $t = time();
        $datetime = date("Y-m-d H:i:sa",$t);
        return $datetime;
    }

    public function tokenid($length = 3) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $now_t=date('d',time()).date('m',time()).date('y',time()).date('h',time()).date('i',time()).date('s',time());
        $tokenid = session_id().$now_t.$randomString;
        return $tokenid;
    }
}
?>
