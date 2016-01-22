<?php
Class PDO_h extends PDO {
		private static $DB = [
			"name" => "edd",
			"user" => "root",
			"pass" => "superuser",
		];

		private $DSN = 'mysql:host=127.0.0.1;dbname =';

		public static function exception_handler($exception) {
			  /*just*/ die('Unhandled exception: ' . $exception->$getMessage());
		}

		public function __construct() {
				$this->DSN .= static::$DB['name'];

				set_exception_handler(array(__CLASS__, 'exception_handler'));

			  parent::__construct($this->DSN, static::$DB['user'], static::$DB['pass']);
			  
			  $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		    restore_exception_handler();
		}
}

$dbh = new PDO_h();
?>