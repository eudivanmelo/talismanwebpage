<?php 

// Settings for connection with database
define('HOST', '54.233.140.224');
define('USER', 'eudivan');
define('PASSWORD', '11031997');

/*
 * connection with db_account in database
 */
class DB_Account{
    /*
     * static atribute PDO
     */
    private static $pdo;

    /*
     * hidden contructor
     */
    private function __construct()
    {
        
    }

    /*
     * Static method to return a valid connection
     * Checks if an instance of the connection already exists, if not, configures a new connection
     */
    public static function getInstance(){
        if (!isset(self::$pdo)) {  
            try {  
              $settings = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
              self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=db_account;", USER, PASSWORD, $settings);  
            } catch (PDOException $e) {  
              print "Erro: " . $e->getMessage();  
            }  
          }  
          return self::$pdo; 
    }
}

/*
 * connection with db_game in database
 */
class DB_Game{
    /*
     * static atribute PDO
     */
    private static $pdo;

    /*
     * hidden contructor
     */
    private function __construct()
    {
        
    }

    /*
     * Static method to return a valid connection
     * Checks if an instance of the connection already exists, if not, configures a new connection
     */
    public static function getInstance(){
        if (!isset(self::$pdo)) {  
            try {  
              $settings = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
              self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=db_game", USER, PASSWORD, $settings);  
            } catch (PDOException $e) {  
              print "Erro: " . $e->getMessage();  
            }  
          }  
          return self::$pdo; 
    }
}

/*
 * connection with db_log in database
 */
class DB_Log{
  /*
   * static atribute PDO
   */
  private static $pdo;

  /*
   * hidden contructor
   */
  private function __construct()
  {
      
  }

  /*
   * Static method to return a valid connection
   * Checks if an instance of the connection already exists, if not, configures a new connection
   */
  public static function getInstance(){
      if (!isset(self::$pdo)) {  
          try {  
            $settings = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
            self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=db_log;", USER, PASSWORD, $settings);  
          } catch (PDOException $e) {  
            print "Error: " . $e->getMessage();  
          }  
        }  
        return self::$pdo; 
  }
}



?>