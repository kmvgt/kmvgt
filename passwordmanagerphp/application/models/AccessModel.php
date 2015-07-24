<?php

class ClientModel extends CI_Model {

	var $table_name;
	var $pk;

	function __construct() {
		parent::__construct();
		$this -> table_name = "Acceso";
		$this -> pk = "idAcceso";
	}

	function Add($typeToAdd) {

		if(is_array($typeToAdd)) {
			$this -> db -> insert($this -> table_name, $typeToAdd);
			return TRUE;
		}
		return FALSE;

	}

	function GetAll() {
		$query = $this -> db -> get($this -> table_name);
		$result = array();
		foreach($query->result() as $row) {
			$result[] = $row;
		}
		$query -> free_result();
		return $result;
	}

	function update($typeToAdd) {
		
		if(is_array($typeToAdd)) {
			$this -> db -> where($this -> pk, $typeToAdd[$this-> pk]);
			
			$this -> db -> update($this-> table_name, $typeToAdd);
			return TRUE;
		}
		return FALSE;
	}
	
	function delete($typeToAdd) {
		
		if(is_array($typeToAdd)) {
			$this -> db -> where($this -> pk, $typeToAdd[$this-> pk]);
			
			$this -> db -> delete($this-> table_name, $typeToAdd);
			return TRUE;
		}
		return FALSE;
	}

}
