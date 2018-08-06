<?php
include "DB.php";

//extends DB so that the $con variable can be accessed
class CRUD extends DB{

    //generic insert function that can be reused
    public function insert($table,$fields){
        //buid the query
       // query syntax = "INSERT INTO table_name (, ,) VALUES ('', '')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fields)) .") VALUES ";
        $sql .= "('".implode("','", array_values($fields))."')";
        
        $query = mysqli_query($this->con, $sql);
        if($query){
            return true;
        }
    }

    public function fetch_records($table){
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($this->con, $sql);
        $myarray = array();
        while($row = mysqli_fetch_assoc($query)){
            $myarray[] = $row;
        }
        return $myarray;
    }

  
	public function deletePassenger(){
		//fetches the rows in education category in json format
		//displays the records in the update modal form
		if(isset($_POST["myid"])){
			/*participant_id here refers to the javascript 
			variable: participant_id set in participants.php
			*/
			$sql = "DELETE FROM flights WHERE id = '".$_POST["myid"]."'";	
			mysqli_query($this->con, $sql);
			
			
			}
	}
}



