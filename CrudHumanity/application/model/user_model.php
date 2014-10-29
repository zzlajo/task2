<?php

include_once 'application/core/db_connection.php';

class UserModel extends DbConnection {

    private static $instance;
    private $mysqli = FALSE;
    private $result = FALSE;

    private function __construct() {
        if (!$this->mysqli) {
            $mysqli = new mysqli($this->getServer(), $this->getUser(), $this->getPassword(), $this->getDb_name());
            if ($mysqli->connect_errno == 0) {
                $mysqli->set_charset('UTF8');
                $this->mysqli = $mysqli;
            }
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    public function __clone() {
        
    }

    public function insertar($data) {
        if ($this->mysqli) {
            $firstname = $this->mysqli->escape_string($data['firstname']);
            $lastname = $this->mysqli->escape_string($data['lastname']);
            $email = $this->mysqli->escape_string($data['email']);
	    echo $firstname. ' - ' . $lastname .' - '. $email;
            $this->result = $this->mysqli->query("INSERT INTO users(firstname,lastname,email) VALUES('" . $firstname . "','" . $lastname . "','" . $email . "')");
            if ($this->mysqli->errno != 0) {
                $this->result = FALSE;
            }
        }
        return $this->result;
    }
 
    public function listdata() {
        if ($this->mysqli) {
            $this->result = $this->mysqli->query("SELECT * 
                                                  FROM users");
            if ($this->mysqli->errno != 0) {
                $this->result = FALSE;
            }
            $this->mysqli->close();
        }
        return $this->result;
    }

    public function get($key) {
        if ($this->mysqli) {
            $key = $this->mysqli->escape_string($key);
            $this->result = $this->mysqli->query("SELECT * 
                                                  FROM users
                                                  WHERE userid=" . $key);
            if ($this->mysqli->errno != 0) {
                $this->result = FALSE;
            }
            $this->mysqli->close();
        }
        return $this->result;
    }

    public function actualizar($data) {
        if ($this->mysqli) {
            $userid = $this->mysqli->escape_string($data['userid']);
            $firstname = $this->mysqli->escape_string($data['firstname']);
            $lastname = $this->mysqli->escape_string($data['lastname']);
            $email = $this->mysqli->escape_string($data['email']);
            $this->result = $this->mysqli->query("UPDATE users SET firstname='" . $firstname . "', lastname='" . $lastname . "', email='" . $email . "' WHERE userid=" . $userid);
            if ($this->mysqli->errno != 0) {
                $this->result = FALSE;
            }
            $this->mysqli->close();
        }
        return $this->result;
    }

    public function delete($key) {
        if ($this->mysqli) {
            $key = $this->mysqli->escape_string($key);
            $this->result = $this->mysqli->query("DELETE FROM users 
                                                  WHERE userid=" . $key);
            if ($this->mysqli->errno != 0) {
                $this->result = FALSE;
            }
            $this->mysqli->close();
        }
        return $this->result;
    }

}