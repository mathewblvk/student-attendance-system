<?php require "header.php"?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>
    
<form method = "post" name = "frmAdd" id="frmAdd" onSubmit = "return Validate();">
   <div id="mail-status"></div>
    <div>
    <label style="padding-top: 20px">Name</label><span id="name-info" class="info"></span> <br>
   <input type="text" class="demoInputBox" name="name" id="name" value = "<?php echo $result[0]["name"]?>" > 
    </div>
  
  <div>
  <label style="padding-top: 20px">Roll number</label><span id="roll-number-info" class="info"></span> <br>
   <input type="text" class="demoInputBox" name="roll_number" id="roll_number" value = "<?php echo $result[0]["roll_number"]?>" > 
  </div>
  
    <div>
    <label style="padding-top: 20px">Date of Birth</label><span id="dob-info" class="info"></span> <br>
   <input type="date" class="demoInputBox" name="dob" id="dob" value = "<?php echo $result[0]["dob"]?>" > 
    </div>
  
  <div>
  <label style="padding-top: 20px">class</label><span id="class-info" class="info"></span> <br>
   <input type="text" class="demoInputBox" name="class" id="class" value = "<?php echo $result[0]["class"]?>"> 
  </div>

    <div>
    <input type="submit" name="add" value="Save" id="btnSubmit"/>
    </div>
</form>

<script src="jquery-3.4.1.min.js" typr="text/javascript"></script>
<script>
function validate() {
    var valid = true;
    $(".demoInputBox").css("background-color", "");
    $(".info").html("");  
}
if (!$("#name").val()) {
    $("#name_info").html("Required");
    $("name").css("background-color", "#ffffdf")
    valid = false;
}
if (!$("#roll-number").val()) {
    $("#roll-number-info").html("Required");
    $("#roll-number").css("background-color", "#ffffdf")
    valid = false;
}
if (!$("#dob").val()) {
    $("#dob-info").html("Required");
    $("dob").css("background-color", "#ffffdf")
    valid = false;
}
if (!$("#class").val()) {
    $("#class_info").html("Required");
    $("class").css("background-color", "#ffffdf")
    valid = false;
}
return valid;
</script>

</body>
</html>
