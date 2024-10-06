<?php 
    include("../lk-admin/lk-admin-header.php");
    session_start();
    if(isset($_POST["updateProfessor"])){
        $query_professors = "SELECT * FROM `professor` WHERE access_lvl = 1";
        $select_professors = mysqli_query($connection, $query_professors);
        while($row = mysqli_fetch_array($select_professors)) {
            $checkbox = "checkbox_".$row["id_professor"];
            if(isset($_POST["{$checkbox}"])){
                $id_professor = $row["id_professor"];
                $query = "UPDATE professor SET `access_lvl` = '3' WHERE id_professor = '{$id_professor}' ";
                $update_query = mysqli_query($connection, $query);
            }
        }
    }
    if(isset($_POST["deleteProfessor"])){
        $query_professors = "SELECT * FROM `professor` WHERE access_lvl = 1";
        $select_professors = mysqli_query($connection, $query_professors);
        while($row = mysqli_fetch_array($select_professors)) {
            $checkbox = "checkbox_".$row["id_professor"];
            if(isset($_POST["{$checkbox}"])){
                $id_professor = $row["id_professor"];
                $query = "DELETE FROM professor WHERE id_professor = '{$id_professor}'";
                $delete_query = mysqli_query($connection, $query);
            }
        }
    }

    ?>
    <div class="wrapperOneBlock">
        <div class="content">
            <table class="tableCapability">
            <caption>Новые заявки: Список Преподавателей </caption>
                <thead>
                    <tr class = "headTable">
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Должность</th>
                        <th>Ученое звание</th>
                        <th>Кафедра</th>
                        <th>Заявки с</th>
                    </tr>
                </thead>
                <tbody class = "bodyTable">
                    <?php 
                        $query_professors = "SELECT * FROM `professor` WHERE access_lvl = 1";
                        $select_professors = mysqli_query($connection, $query_professors);
                        while($row = mysqli_fetch_array($select_professors)) {
                            $surname = $row["surname"];
                            $name = $row["name"];
                            $patronymic = $row["patronymic"];
                            $query_position = "SELECT position_name FROM professor_position WHERE id_position = '{$row["position"]}'";
                            $select_position = mysqli_query($connection, $query_position);
                            $position_result = mysqli_fetch_array($select_position);
                            $position_abbreviation = $position_result["position_name"];
                            $query_title = "SELECT title_abbreviation FROM academic_title WHERE id_title = '{$row["academic_title"]}'";
                            $select_title = mysqli_query($connection, $query_title);
                            $title_result = mysqli_fetch_array($select_title);
                            $title_abbreviation = $title_result["title_abbreviation"];
                            $query_department = "SELECT department_abbreviation FROM `department` WHERE id_department = '{$row["id_department"]}'";
                            $select_department = mysqli_query($connection, $query_department);
                            $department_result = mysqli_fetch_array($select_department);
                            $department_abbreviation = $department_result["department_abbreviation"];
                            echo "<tr>";
                                echo "<td>{$surname}</td>";
                                echo "<td>{$name}</td>";
                                echo "<td>{$patronymic}</td>";
                                echo "<td>{$position_abbreviation}</td>";
                                echo "<td>{$title_abbreviation}</td>";
                                echo "<td>{$department_abbreviation}</td>";
                                ?>
                                <td>
        <form action="" method = "post">
            <input name = "checkbox <?php echo $row["id_professor"]?>" type="checkbox">
                                </td>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            if(mysqli_num_rows($select_professors)>0){?>
                <button name = "updateProfessor" id = "update" type = "submit">Принять заявки</button>
                <button name = "deleteProfessor" id = "delete" type = "submit">Отклонить заявки</button>
            <?php }?>
        </form>
        </div>
    </div>
</body>
</html>