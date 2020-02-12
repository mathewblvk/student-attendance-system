<?php  require "web/header.php"?>

<div style = "text-align: right; margin: 20px 0px 10px">
<a href="index.php?action=attendance_add" id="btnAddAction"><img src="web/image/icon-add.png">Add Attendance</a>
</div>
<div class="toys-grid"> 
    <table cellspacing = "10" cellpadding = "1" class="attendance-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>present</th>
                <th>Absent</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(!empty($result)){
                foreach($result as $key => $value){
                    ?>
                    <tr>
                        <td>
                            <?php 
                            $attendance_date = "";
                            if(!empty($result[$key]["attendace_date"])){
                                $attendance_timestamp = strtotime($result[$key]["attendance_date"]);
                                $attendance_date = time('Y-m-d', $attendance_timestamp);
                            }
                            echo $attendance_date;
                            ?>
                        </td>
                        <td><?php echo $result[$key]['present'];?></td>
                        <td><?php echo $result[$key]['absent'];?></td>
                            <td> 
                            <a href="index.php?action=attendance_edit&date=<?php echo $result[$key]["attendance_date"];?>"class="btnEditAction"> <img src="web/image/icon-edit.png"></a> 
                            </td>
                            <td> 
                            <a href="index.php?action=attendance_delete&date=<?php echo $result[$key]["attendance_date"];?>"class="btnDeleteAction"> <img src="web/image/icon-delete.png"></a> 
                            </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>