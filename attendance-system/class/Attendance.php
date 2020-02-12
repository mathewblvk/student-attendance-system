<?php
require_once "DBcontroller.php";

class Attendance{
    private $db_handle;
    public function __construct(){$this->db_handle = new DBcontroller;}

    public function addAttendance($attendance_date, $student_id, $present, $absent){
        $query = "INSERT INTO tbl_attendance (attendance_date, student_id, present, absent) VALUES (?,?,?,?)";
        $param_type = "siii";
        $paramValue = array($attendance_date,$student_id,$present,$absent);
        $insertId = $this->db_handle->insert($query, $param_type, $paramValue);
        return $insertId;
    }
    public function deleteAttendanceByDate($attendance_date){
        $query = "DELETE FROM tbl_attendance WHERE attendance_date = ?";
        $param_type= "s";
        $paramValue = array($attendance_date);
        $this->db_handle->update($query,$param_type, $paramValue);
    }
    public function getAttendanceByDate($attendance_date){
        // check this sql later
        $query = "SELECT * FROM tbl_attendance LEFT JOIN tbl_student ON tbl_attendance.student_id = tbl_attendance.id WHERE attendance_date = ? ORDER BY student_id";
        $param_type = "s";
        $paramValue = array($attendance_date);
        $result = $this->db_handle->runQuery($query, $param_type, $paramValue);
        return $result;
    }
    public function getAttendance(){
        $query = "SELECT id, attendance_date ,sum(present) as present, sum(absent) as absent FROM tbl_attendance GROUP By attendance_date";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;   
    }



      
    


}