<?php
require_once "DBcontroller.php";

class Student{

public $db_handle;

public function __construct(){
    $this->db_handle = new DBcontroller;  
}

public function addStudent($name, $roll_number, $dob, $class){
    $query = "INSERT INTO tbl_student (name, roll_number, dob, class) VALUES (?,?,?,?)";
    $paramType = "siss";
    $paramValue = array($name, $roll_number, $dob, $class);
    $result = $this->db_handle->insert($query,$paramType,$paramValue);
    return $result;
}

public function editStudent($name, $roll_number, $dob, $class, $student_id){
    $query  = "UPDATE tbl_student SET name= ?, roll_number= ?, dob= ?, class = ? WHERE ID = ?";
    $paramType = "sissi";
    $paramValue = array($name, $roll_number, $dob, $class, $student_id);
    $result = $this->db_handle->update($query, $paramType,  $paramValue);
}

public function deleteStudent($student_id){
    $query = "DELETE FROM tbl_student WHERE id = ?";
    $paramType = "i";
    $paramValue = array($student_id);
    $this->db_handle->update($query, $paramType, $paramValue);
}

public function getStudentById($student_id){
    $query = "SELECT * FROM tbl_student WHERE id = ?";
    $paramType = "i";
    $paramValue = array($student_id);
    $result  = $this->db_handle->runQuery($query, $paramType, $paramValue);
    return $result;
}
public function getAllStudent(){
    $query = "SELECT * FROM tbl_student ORDER BY id;";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

}