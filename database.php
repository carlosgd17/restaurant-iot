<?php
	class Database {
		private static $dbName = 'esp32_mc_db'; // Example: private static $dbName = 'myDB';
		private static $dbHost = 'restaurant-iot.mysql.database.azure.com'; // Example: private static $dbHost = 'localhost';
		private static $dbUsername = 'restaurant'; // Example: private static $dbUsername = 'myUserName';
		private static $dbUserPassword = '123456'; // // Example: private static $dbUserPassword = 'myPassword';
		 
		private static $cont  = null;
		 
		public function __construct() {
			die('Init function is not allowed');
		}
		 
		public static function connect() {
      // One connection through whole application
      if ( null == self::$cont ) {     
        try {
          //self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
		 /* 	
		  self::$con = mysqli_init();
			mysqli_ssl_set($con,NULL,NULL, "./DigiCertGlobalRootG2.crt.pem", NULL, NULL);
			mysqli_real_connect($conn, "restaurant-iot.mysql.database.azure.com", "restaurant", "N\$TG_UW6", "restaurant-iot", 3306, MYSQLI_CLIENT_SSL);
			echo "<script>console.log('database' );</script>";
			*/
			$options = array(
				PDO::MYSQL_ATTR_SSL_CA => './DigiCertGlobalRootG2.crt.pem'
			);
			self::$cont = new PDO('mysql:host=restaurant-iot.mysql.database.azure.com;port=3306;dbname=restaurant-iot', 'restaurant@restaurant-iot', 'N\$TG_UW6', $options);
        } catch(PDOException $e) {
          die($e->getMessage()); 
        }
      }
      return self::$cont;
		}
		 
		public static function disconnect() {
			self::$cont = null;
		}
	}
?>