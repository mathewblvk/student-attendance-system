<?php require "web/header.php";?>

<form action="" method="post" id="frmAdd" name="frmAdd" onSubmit = "return Validate();">
    <div>
    <label style="padding-top: 20px" >Name</label> <span id="name-info" class="info"> </span> <br>
    <input type="text" id="name" name="name" class="demoInputBox"> 
    </div>
    
    <div>
    <label>Roll Number</label> <span id="roll-number-info" class="info"> </span> <br>
    <input type="text" id="roll-number" name="roll_number" class="demoInputBox"> 
    </div>
    
    <div>
    <label>Date of Birth</label> <span id="dob-info" class="info"> </span> <br> 
    <input type="date" id="dob" name="dob" class="demoInputBox"> 
    </div>
    
    <div>
    <label>Class</label> <span id="class-info" class="info"> </span> <br>
    <input type="text" id="class" name="class" class="demoInputBox"> 
    </div>
    
    <div>
    <input type="submit" id="btnSubmit" name="add" value="Add"/>
    </div>

</form> 

<script src="jquery-3.4.1.min.js" type="text/javascript"></script>
<script>
function validate(){
    var valid = true;
    $('.demoInputBox').css('background-color', '';)
    $('.info').html('');

    if (!$('#name').val()) {
        $('#name-info').html('Required');
        $('#name').css('background-color', '#ffffdf');
        valid = false;
    }
    if (!$('#roll-number').val()) {
        $('#roll-number-info').html('Required');
        $('#roll-number').css('background-color', '#ffffdf');
        valid = false;
    }
    if (!$('#dob').val()) {
        $('#dob-info').html('Required');
        $('#name').css('background-color', '#ffffdf');
        valid = false;
    }
    if (!$('#class').val()) {
        $('#class-info').html('Required');
        $('#class').css('background-color', '#ffffdf');
        valid = false;
    }
    return valid;
}
</script>

