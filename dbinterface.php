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

      private $DSN = 'mysql:host=127.0.0.1;dbname=';
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

      private function resolve_field($indexes) {
          if( !($indexes == "*") ) {
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

      private function resolve_condition($conditionArray) {
          $condition = "";
          if( !(empty($conditionArray)) ) {
              $condition = " WHERE";
              foreach ($conditionArray as $key => $value) {
                  $condition .= " $key=?";
              }
          }
          return $condition;
      }

      private function apply_binds($statement, $conditionArray) {
          if( !(empty($conditionArray)) ) {
              $i = 0;
              foreach ($conditionArray as $value) {
                  $i++;
                  $statement->bindValue($i, $value);
              }
          }
      }

      public function pull($fieldset = "*", $conditionArray = [], &$result = null) {
          $fieldset = self::resolve_field($fieldset);
          $conditions = self::resolve_condition($conditionArray);
          $stmt = $this->prepare('SELECT ' . $fieldset . ' FROM ' . $this->data_route . $conditions);
          self::apply_binds($stmt, $conditionArray);
          $stmt->execute();
          $record = $stmt->fetchAll(\PDO::FETCH_BOTH);
          $result = count($record);
          return $record;
      }

  }
}
