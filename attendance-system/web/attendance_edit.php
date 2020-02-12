<?php require_once "header.php";?>

<form action="" method="post" id="frmAdd" onSubmit="return Validate()">
    <div>
    <?php 
     $attendance_timestamp = strtotime($attendance_date);
     $attendance_date = date("m-d-Y", $attendance_timestamp);
    ?>
    <input name="attendance_date" id="attendance_date" class="demoInputBox" disabled value="<?php echo $attendance_date;?>" >
    </div>
    <div id="toys-grid">
     <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <td> <strong>Student</strong> </td>
                <td> <strong>Present</strong> </td>
                <td> <strong>Absent</strong> </td>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (!empty($studentResult)) {
                    foreach ($studentResult as $key => $value) {
                        $presentChecked = "";
                        $absentChecked = "";
                        if ($studentResult[$key]["id"] == $result[$key]["student_id"]) {
                            if ($result[$key]["present"] == 1) {
                                $presentChecked = "checked";
                            } else if ($result[$key]["absent"] == 1) {
                                $absentChecked = "checked";
                            }
                        }
                        ?>
                    <tr>
                <td>

                <input type="hidden" name="student_id[]" id="student_id" value = "<?php echo $studentResult[$key]["id"] ?>"> <?php echo $studentResult[$key]["name"] ?> 
                
                </td>
                <td>

                <input type="radio" name="attendance-<?php echo $studentResult[$key]["id"]?>" value = "present"> <?php echo $presentChecked; ?>
                </td>

                <td>
                <input type="radio" name="attendance-<?php echo $studentResult[$key]["id"]?>" value = "absent"> <?php echo $absentChecked ?>
                
                </td>
                </tr>
                    <?php
                    }
                }
            ?>
        </tbody>
     </table>
    </div>
</form>