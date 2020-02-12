<?php 
require "class/DBcontroller.php";
require "class/Student.php";
require "class/Attendance.php";

$db_handle = new DBcontroller;

//$action = "";
if (!empty($_GET['action'])) {
    // to remove **undefined variable error for "action" use !empty($_GET("action")) **
}

switch ($_GET["action"]) { 
    case "attendance_add":
        if (isset($_POST["add"])) {
            $attendance = new Attendance();
            $attendance_timestamp = strtotime($_POST["attendance_date"]);
            $attendance_date = date("Y-m-d", $attendance_timestamp);
            if (!empty($_POST["student_id"])) {
                $attendance->deleteAttendanceByDate($attendance_date);
                foreach($_POST["student_id"] as $key => $value){
                    $present = 0;
                    $absent = 0;
                }
                if ($_POST["attendance-$student_id"] == "Present") {
                    $present = 1;
                }
                else if ($_POST["attendance-$student_id"] == "Absent") {
                    $absent = 1;
                }
                $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
            }
            header("Location: index.php?action=attendance");
        }
        // This run first, the the control will be moved back on the top when a user clicks add button
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "web/attendance_add.php";
        break;

    case "attendance-edit":
        $attendance_date = $_GET["date"];
        $attendance = new Attendance();
        if (isset($_POST["add"])) {
            $attendance->deleteAttendanceByDate($attendance_date);
            if ($_POST["student_id"]) {
                foreach ($_POST["student_id"] as $key => $student_id){
                        $present = 0;
                        $absent = 0;
                }
            if ($_POST["student-$student_id"] == "present") {
                $present = 1;
            }
            else if ($_POST["student-$student_id"] == "absent") {
                $absent = 1;
            }

            $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
        }
        header("Location: index.php?action=attendance");
        }
        $result = $attendance->getAllAttendanceByDate($attendance_date);
        $student = new Student();
        $studentResult  = $student->getAllStudent();
        require_once "web/attendance_edit.php";
        break;

    case "attendance-delete":
        $attendance_date = $_GET["date"];
        $attendance = new Attendance();
        $attendance->deleteAttendanceByDate($attendance_date);
        $result = $attendance->getAttendance;
        require_once "web/attendance.php";
        break;

    case "attendance":
        $attendance = new Attendance();
        $result = $attendance->getAttendance();
        require_once "web/attendance.php";
        break;

    case "student_add":
        if (isset($_POST["add"])) {
            $name = $_POST["name"];
            $roll_number = $_POST["roll_number"];
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $class = $_POST["class"];
            $student  = new Student();
            $insertId = $student->addStudent($name, $roll_number, $dob, $class);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem Adding New Record",
                    "type" => "Error"
                );
            } else{
                header("Location: index.php");
            }
        }
        require_once "web/student_add.php";
        break;

    case "student_edit":
        $student_id = $_GET["id"];
        $student = new Student();

        if (isset($_POST["add"])) {
            $name = $_POST["name"];
            $roll_number = $_POST["roll_number"];
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $class = $_POST["class"];
            $student->editStudent($name,$roll_number,$dob, $class, $student_id);
            header("Location: index.php");
        }
        
        $result = $student->getStudentById($student_id);
        require_once "web/student_edit.php";
    break;

    case "student_delete":
        $student_id = $_GET["id"];
        $student = new Student();
        $student->deleteStudent($student_id);
        $result = $student->getAllStudent();
        require_once "web/student.php";
        break;

    default:
        $student = new Student();
        $result = $student->getAllStudent();
        require_once "web/student.php";
        break;
}

