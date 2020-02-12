<?php require "header.php"?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div style="text-align: right; margin: 10px 0px 10px" >
    <a href="index.php?action=student_add" id="btnAddAction"><img src="web/image/icon-add.png" >Add Student</a>
</div>
<div class="toys-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
            <th><strong>Student Name</strong></th>
            <th><strong>Roll Number</strong></th>
            <th><strong>date of birtht</strong></th>
            <th><strong>Class</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Delete</strong></th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if (!empty($result)) {
            foreach($result as $key => $value ){
                ?>
                <tr>
                <td><?php echo $result[$key]['name']; ?></td>
                <td><?php echo $result[$key]['roll_number']; ?></td>
                <td><?php echo $result[$key]['dob']; ?></td>
                <td><?php echo $result[$key]['class']; ?></td>
                <td>
                <a href="index.php?action=student_edit&id=<?php echo $result[$key]['id'];?>" class="btnEditAction"><img src="web/image/icon-edit.png"></a></td>
                </td>
                <td>
                <a href="index.php?action=student_delete&id=<?php echo $result[$key]['id'];?>" class="btnDeleteAction"><img src="web/image/icon-delete.png"></a>
                </td>
                </tr>
                <?php
            }  
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

