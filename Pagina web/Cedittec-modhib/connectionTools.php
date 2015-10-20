<?php
	include 'connection.php';
	$link = mysqli_connect($db_url, $db_user,$db_pass, $db_name, $db_port); 

	/*
	function insertQuery($table, $values, $structure){
		$queryString = "insert into ".$table. "(".$structure. ") values (".$values.");";
		$result = $link->query($queryString);
	}
	function updateQuery($table, $conditions, $changes){
		$queryString = "update ".$table." set ". $changes." where ".$conditions;
		$result = $link->query($queryString);
	}
	function deleteQuery($table, $conditions){
		$queryString = "delete from ".$table;
		if (is_array($conditions)){
			$queryString .= " where ". implode(' and ', $conditions);
		}
		else{
			if ($conditions == null){
				return;
			}
			else{
				$queryString .= " where ". $conditions;
			}
		}
		$queryString .= ";";
		$result = $link->query($queryString);
	}
	function queryArray($table, $conditions){
		if ($link == null)
			return null;
		$out = array();
		$queryString = "select * from ".$table. " ";
		if (is_array($conditions)){
			$queryString .= " where ". implode(' and ', $conditions);
		}
		else{
			if ($conditions == null){

			}
			else{
				$queryString .= " where ". $conditions;
			}
		}
		$queryString .= ";";
		$result = $link->query($queryString);
		if (!$result)
			return null;
		while ($row = mysqli_fetch_array($result)){
			array_push($out, $row);
		}
		return $out;
	}
	function queryElement($table, $conditions){
		$out = queryArray($table, $conditions);
		if ($out == null)
			return null;
		return $out[0];
	}
	function queryData($column, $table,$conditions){
		$tempQueryArray = queryArray($table,$conditions);
		$lane = $tempQueryArray[0];
		return $lane[$column];
	}
	*/
?>