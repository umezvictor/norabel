<?php
class DB{
    public $con;
//username = victor, password = blaze, database name = norabel
    public function __construct(){
        $this->con = mysqli_connect("localhost", "victor", "blaze", "norabel");
        if($this->con){
            //echo "connected";
        }else{
            echo "database connection failed";
        }
    }
}