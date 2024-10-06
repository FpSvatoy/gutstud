<?php 
    include("../lk-admin/lk-admin-header.php");
    session_start();
    if(isset($_POST["updateStudent"])){
        $query_students = "SELECT * FROM `student` WHERE access_lvl = 1";
        $select_students = mysqli_query($connection, $query_students);
        while($row = mysqli_fetch_array($select_students)) {
            $checkbox = "checkbox_".$row["id_student"];
            if(isset($_POST["{$checkbox}"])){
                $id_student = $row["id_student"];
                $query = "UPDATE student SET `access_lvl` = '2' WHERE id_student = '{$id_student}' ";
                $update_query = mysqli_query($connection, $query);
            }
        }
    }
    if(isset($_POST["deleteStudent"])){
        $query_students = "SELECT * FROM `student` WHERE access_lvl = 1";
        $select_students = mysqli_query($connection, $query_students);
        while($row = mysqli_fetch_array($select_students)) {
            $checkbox = "checkbox_".$row["id_student"];
            if(isset($_POST["{$checkbox}"])){
                $id_student = $row["id_student"];
                $query = "DELETE FROM student WHERE id_student = '{$id_student}'";
                $delete_query = mysqli_query($connection, $query);
            }
        }
    }

    ?>
    <div class="wrapperOneBlock">
        <div class="content">
            <table class="tableCapability">
            <caption>Новые заявки: Cписок Cтудентов</caption>
                <thead>
                    <tr class = "headTable">
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Группа</th>
                        <th>Курс</th>
                        <th>Принятие заявки</th>
                    </tr>
                </thead>
                <tbody class = "bodyTable">
                    <?php 
                        
                        $query_students = "SELECT * FROM `student` WHERE access_lvl = 1";
                        $select_students = mysqli_query($connection, $query_students);
                        while($row = mysqli_fetch_array($select_students)) {
                            $surname = $row["surname"];
                            $name = $row["name"];
                            $patronymic = $row["patronymic"];
                            $query_group = "SELECT group_name FROM `group` WHERE id_group = '{$row["id_group_name"]}'";
                            $select_group = mysqli_query($connection, $query_group);
                            $group_result = mysqli_fetch_assoc($select_group);
                            $group = $group_result["group_name"];
                            $course = $row["course"];
                            
                            echo "<tr>";
                                echo "<td>{$surname}</td>";
                                echo "<td>{$name}</td>";
                                echo "<td>{$patronymic}</td>";
                                echo "<td>{$group}</td>";
                                echo "<td>{$course}</td>";
                                ?>
                                <td>
        <form action="" method = "post">
            <input name = "checkbox <?php echo $row["id_student"]?>" type="checkbox" >
                                </td>
                    <?php } ?>
                </tbody>
            </table>
           
            <?php

            if(mysqli_num_rows($select_students)>0){?>
                <button name = "updateStudent" id = "update" type = "submit">Принять заявки</button>
                <button name = "deleteStudent" id = "delete" type = "submit">Отклонить заявки</button>
            <?php }?>
        </form>
        </div>
    </div>
</body>
</html>