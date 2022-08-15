<?php
namespace MyApp\Data;
use PDO;
use PDOException;

class Database {
    public $objetoPDO = null;
    public $user = "";
    public $password = "";
    public $dbname = "";

    public function __construct(string $dbname, string $user, string $password) {
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }
    public function getPDO(){
        try {
            $host = "mysql:host=localhost;dbname=$this->dbname";
            $objetoPDO = new PDO($host, $this->user, $this->password);
            return $objetoPDO;
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
        
    }
    public function desconectarDB() {
        $objetoPDO = null;
    }
}

new Database("gravity_games", "root", "");
$objetoPDO = $cc->getPDO();


