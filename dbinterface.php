<?php
namespace dbinterface {

Class PDO_h extends \PDO {
		private static $DB = [
			"name" => "edd",
			"user" => "root",
			"pass" => "superuser",
		];

		private static $data_sources = [
			"users" => "edd.users_tbl",
		];

		private $DSN = 'mysql:host=127.0.0.1;dbname =';
		private $data_route;

		public static function exception_handler($exception) {
			  /*just*/ die('Unhandled exception: ' . $exception->$getMessage());
		}

		public function __construct() {
				$this->DSN .= static::$DB['name'];

				set_exception_handler(array(__CLASS__, 'exception_handler'));

			  parent::__construct($this->DSN, static::$DB['user'], static::$DB['pass']);
			  
			  $this->data_route = static::$data_sources['users'];
			  $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$this->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
		
		    restore_exception_handler();
		}

		public function pull($arg, &$result) {
				$stmt = $this->prepare('SELECT :arg FROM ' . $this->data_route);
				$stmt->bindParam(':arg', $arg);
				$stmt->execute();
				$record = $stmt->fetch();
				return $record;
		}

}
}

namespace {
	$dbh = new dbinterface\PDO_h();
}
?>