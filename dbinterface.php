<?php
namespace dbinterface {

# Here be dragons.
# Thou art forewarned.

  class PDO_handle extends \PDO
  {
      private static $DB = [
        "name" => "edd",
        "user" => "root",
        "pass" => "superuser",
      ];

      private static $data_sources = [
        "users" => "edd.users_tbl",
      ];

      private static $data_source_fieldset = [
        "users" => array("UserID", "FirstName", "LastName", "Username", "Password"),
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

      public function pull($arg, &$result, $fieldset = "*") {
          $fieldset = self::resolve_field($fieldset);
          $stmt = $this->prepare('SELECT ' . $fieldset . ' FROM ' . $this->data_route);
          //$stmt->bindParam(':arg', $arg);
          $stmt->execute();
          $record = $stmt->fetch();
          return $record;
      }

      private function resolve_field($indexes) {
          if(!($indexes == "*")) {
              $fields = "";
              foreach( explode(" ", $indexes)  as $thisIndex ) {
                  $fields .= static::$data_source_fieldset[ array_search($this->data_route, static::$data_sources) ][ $thisIndex ] . ",";
              }
              $fields = trim($fields, ",");
          } else {
              $fields = "*";
          }

          return $fields;
      }

  }
}

namespace {
  $dbh = new dbinterface\PDO_handle();
}
