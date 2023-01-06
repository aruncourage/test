<?php
require_once('db.class.php');
class Query {
    public $table_name;
    public $insert_table;
    public $fields;
    public $values;

    public function selectAll($table_name) {
        return DB::query("SELECT * FROM $table_name");
    }

    public function insertToAllFieldsMaster($insert_table, $fields, $values){ 
        DB::insert($insert_table, [
            $fields[0] => $values[0],
            $fields[1] => $values[1],
            $fields[2] => $values[2],
            $fields[3] => $values[3],
            $fields[4] => $values[4],
            $fields[5] => $values[5],
          ]);
          return DB::insertId();
      
    }

    public function insertToAllFiedsServices($insert_table, $fields, $values){ 
        DB::insert($insert_table, [
            $fields[0] => $values[0],
            $fields[1] => $values[1],
            $fields[2] => $values[2],
            $fields[3] => $values[3],
            $fields[4] => $values[4],
            $fields[5] => $values[5],
            $fields[6] => $values[6],
            $fields[7] => $values[7],
          ]);
      
    }
}
?>