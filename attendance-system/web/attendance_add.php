<?php require "header.php"; ?>

<form method="post" id="frmAdd" name="frmAdd" onSubmit ="return Validate()">

<div>
<input type="date" name="attendance_date" id ="attendance_date" class="demInputBox"> <span class="info" id="attendance_date_info"></span>
</div>

<div class="toys-grid">
<table cellspacing="10" cellpadding = "1">
    <thead>
        <tr>
            <th> <strong>Student</strong> </th>
            <th> <strong>Present</strong> </th>
            <th> <strong>Absent</strong> </th>
        </tr>
    </thead>
    <tbody>
         <?php if (!empty($studentResult)) {
             foreach ($studentResult as $key => $value) { 
                ?>
                <tr>
                    <td>
                    <input type="hidden" name="student_id[]" id="student_id" value="<?php echo $studentResult[$key]["id"];?>" ><?php echo $studentResult[$key]["name"];?> 
                    </td>

                    <td>
                    <input type="radio" name="attendance-<?php echo $studentResult[$key]["id"];?>" value="Present" >
                    </td>

                    <td>
                    <input type="radio" name="attendance-<?php echo $studentResult[$key]["id"];?>" value="Absent" >
                    </td>

                </tr>
                <?php
             }
         }?>
    </tbody>
</table>
</div>
    <div>
         <input type="submit" name="add" id="btnSubmit" value="add">
    </div>
</form>
<script src="jquery-3.4.1.min.js" type="text/javascript"> </script>

<script>
function validate(){
    var valid = true;
    $(".demoInput").css("backgroud-color","");
    $(".info").html("");

    if(!$("#attendance_date").val()){
        $("#attendance_date_info").html("Required");
        $("#attendance_date").css("background-color", "#ffffdf");
    }
}
</script>