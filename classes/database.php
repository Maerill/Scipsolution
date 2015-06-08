<?php
    require_once(__DIR__."/../config.php");
/*
* Database Class
*/
class Database {
    private static $instance = null;
    protected $mysqli;
    function __construct() {
        $this->mysqli = $this->connect();
        if($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }
        return $this->mysqli;
    }
    function __destruct() {
        return $this->mysqli->close();
    }
    protected function connect() {
        if (null === $this->mysqli) {
            $this->mysqli = new mysqli(config()['database']['host'], config()['database']['username'], config()['database']['password'], config()['database']['name']);
        }
        return $this->mysqli;
    }
    public static function getInstance() {
        if(!self::$instance)
            self::$instance = new self();
        return self::$instance;
    }
    public function query_execute($sql, $params = []) {
        $stmt =  $this->mysqli->stmt_init();
        if(!$stmt->prepare($sql))
            return false;
        if(count($params) !== 0) {
            $params = is_array($params) ? $params : [$params];
            $bind_types = '';
            $a_params = [];
            foreach($params as $param) {
                $bind_types .= $this->bindType($param);
            }
            $a_params[] = $bind_types;
            foreach($params as $param) {
                if (is_object($param)) {
                    var_dump($param);
                    throw new \Exception();
                }
                $paramString = (string)$param;
                $param_name = 'bind.'.$paramString;
                $$param_name = $param;
                $a_params[] = &$$param_name;
            }
            call_user_func_array(array($stmt, 'bind_param'),$a_params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if(is_object($result) === false)
            return false;
        return $result->fetch_object();
    }
    
    private function bindType($param) {
        if(is_string($param))
            return 's';
        elseif(is_integer($param))
            return 'i';
        elseif(is_double($param))
            return 'd';
        else
            return '';
    }
    public function error_execute() {
        if (!empty($this->mysqli->error)) {
            var_dump($this->mysqli->error);
            die;
        }
    }
    public static function error() {
        self::getInstance()->error_execute();
    }
    public static function query($sql, $params = []) {
        return self::getInstance()->query_execute($sql, $params);
    }
}
/*
$dbName = "scip";
$dbUser = "root";
$dbPass = "Scip12345";
function connectDb($dbUser,$dbPass) {
    $con = mysql_connect("127.0.0.1", $dbUser, $dbPass);
    // If it can't connect to the database: Error!
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    return $con;
}
function disconnectdb($con) {
    mysql_close($con);
}
function checkUser($username, $pass) {
    $username = mysql_real_escape_string($username);
    $pass = mysql_real_escape_string($pass);
    //Make global variables availabe in the function
    global $dbUser, $dbPass, $dbName;
    //Query
    $sql = "SELECT Username, Password FROM tb_users WHERE Username='".$username."'";
    //Connect
    $con = connectDb($dbUser, $dbPass);
    //SQL Select
    mysql_select_db($dbName, $con);
    //Send qurey at DB
    $result = mysql_query($sql, $con);
    //Evaluate line by line
    while ($row = mysql_fetch_row($result)) {
        //Test
        if ($row[0] == $username) {
            //If the User was found => check password (MD5 encoded)
            if ($row[1] == md5($pass)) {
                return true;
            }
        }
    }
    return false;
}
function insert_user($username, $password){
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    global $dbUser, $dbPass, $dbName;
    //SQL Statement
    //$date = (string)date('d.m.Y');
    $sql = 'INSERT INTO tb_users(Username, Password, Mail, Profilpic)';
    $sql = $sql . ' VALUES("'.$username.'","'.md5($password).'", "'.$mail.'","/../pics/defaultProfilePic.png")';
    //DB Verbindung aufbauen
     $con = connectDb($dbUser, $dbPass);
     //SQL Select
    mysql_select_db($dbName, $con);
    $result = mysql_query($sql, $con);
}
function insert_query($sql){
global $dbUser, $dbPass, $dbName;
    //DB Verbindung aufbauen
     $con = connectDb($dbUser, $dbPass);
     //SQL Select
    mysql_select_db($dbName, $con);
    $result = mysql_query($sql, $con);
}
//Function SELECT Query individual Rows
function select_query($sql){
    $result = select_all_query($sql);
    $row =  mysql_fetch_row($result);
    return $row;
}
//Function SELECT Query for multiple Rows
function select_all_query($sql){
    global $dbUser, $dbPass, $dbName;
    //DB Verbindung aufbauen
     $con = connectDb($dbUser, $dbPass);
    //SQL Select
    mysql_select_db($dbName, $con);
    $result = mysql_query($sql, $con);
    return $result;
}
?>
*/