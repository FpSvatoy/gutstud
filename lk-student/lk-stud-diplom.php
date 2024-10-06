<?php 
    include("../lk-student/lk-stud-header.php");
    session_start();
    if(!isset($_POST['support_msg'])){
        $_POST['support_msg'] = "";
    }
    
    if(isset($_POST["btn_update_diplom"])){
        if(!(empty($_POST["topic_name"]))){
            $id_student = $_SESSION["nowUserId"];
            $topic_name = $_POST["topic_name"];
            $dip_ruk = $_POST["dip_ruk"];
            $query = "UPDATE student SET `topic_name` = '{$topic_name}',`id_professor` = '{$dip_ruk}' WHERE id_student = '{$id_student}' ";
            $update_query = mysqli_query($connection, $query);
            if(!$update_query) {
                die("query failed ". mysqli_error($connection));
            }
        }
    }
    ?>
    <div class="wrapperOneBlock">
		<div class="content">
            <form action="" method="post" class="single-form">
                <?php   
                    if(isset($_SESSION["nowUserId"])){
						$id_student = $_SESSION["nowUserId"];
						$user = "SELECT * FROM student WHERE `id_student` = '{$id_student}'";
						$select_user = mysqli_query($connection, $user);
						$row_user = mysqli_fetch_assoc($select_user);
						
                        $surname = $row_user["surname"];	
                        $name = $row_user["name"];	
                        $patronymic = $row_user["patronymic"];	
                        $mail = $row_user["mail"];	
                        $phone = $row_user["phone"];	
                        $course = $row_user["course"];	
                        $course_query = "SELECT * FROM `group` WHERE `id_group` = '{$row_user["id_group_name"]}'";
						$select_course = mysqli_query($connection, $course_query);
                        $row_course = mysqli_fetch_assoc($select_course);
                        $group_name = $row_course["group_name"];	
                        $faculty = "SELECT * FROM faculty WHERE `id_faculty` = '{$row_user["id_faculty"]}'";
						$select_faculty = mysqli_query($connection, $faculty);
                        $row_faculty = mysqli_fetch_assoc($select_faculty);
                        $faculty = $row_faculty["faculty_abbreviation"];
                        $department = "SELECT * FROM department WHERE `id_department` = '{$row_user["id_department"]}'";
						$select_department = mysqli_query($connection, $department);
                        $row_department = mysqli_fetch_assoc($select_department);	
                        $department = $row_department["department_abbreviation"];	
                        $topic_name = $row_user["topic_name"];
                        if($row_user["id_professor"]!=null){
                            $dip_ruk_query = "SELECT * FROM professor WHERE `id_professor` = '{$row_user["id_professor"]}'";
                            $select_dip_ruk_query = mysqli_query($connection, $dip_ruk_query);
                            $row_dip_ruk = mysqli_fetch_assoc($select_dip_ruk_query);
                            $dip_ruk = $row_dip_ruk["surname"].' '.$row_dip_ruk["name"].' '.$row_dip_ruk["patronymic"];
                        }else{
                            $dip_ruk = '';
                        }
                        
                    }else{
                        $surname = '';
                        $name = '';
                        $patronymic = '';
                        $mail = '';
                        $phone = '';
                        $course = '';
                        $group_name = '';
                        $faculty = '';
                        $department = '';
                        $topic_name ='';
                        $dip_ruk = '';
                    }
				?>

                <p>
                    <label for="surname">Фамилия</label>
                    <input name="surname" id="surname" type="text" value="<?php echo ($surname);?>" readonly >
                </p>
                <p>
                    <label for="name">Имя</label>
                    <input name="name" id="name" type="text" value="<?php echo ($name);?>" readonly >
                </p>
                <p>
                    <label for="patronymic">Отчество</label>
                    <input name="patronymic" id="patronymic" type="text" value="<?php echo ($patronymic);?>" readonly >
                </p>
                <p>
                    <label for="mail">E-mail</label>
                    <input name="mail" id="mail" type="text" value="<?php echo ($mail);?>" >
                </p>
                <p>
                    <label for="phone">Телефон</label>
                    <input name="phone" id="phone" type="text" value="<?php echo ($phone);?>" >
                </p>
                <p>
                    <label for="course">Курс</label>
                    <input name="course" id="course" type="text" value="<?php echo ($course);?>" readonly >
                <p>
                    <label for="group_name">Группа</label>
                    <input name="group_name" id="group_name" type="text" value="<?php echo ($group_name);?>" readonly >
                </p>
                <p>
                    <label for="faculty">Факультет</label>
                    <input name="faculty" id="faculty" type="text" value="<?php echo ($faculty);?>" readonly >
                </p>
                <p>
                    <label for="department">Кафедра</label>
                    <input name="department" id="department" type="text" value="<?php echo ($department);?>" readonly >
                </p>
                <p>
                    <label for="topic_name">Тема ВКР</label>
                    <input name="topic_name" id="topic_name" type="text" value="<?php echo ($topic_name);?>" >
                </p>
                <p>
                    <?php 
                        if(isset($row_user["id_professor"])){?>
                            <label for="dip_ruk">Дипломный руководитель</label>
                            <input name="dip_ruk" id="dip_ruk" type="text" value="<?php echo ($dip_ruk);?>"readonly >  
                    <?php }else{ ?>
                        <label for="dip_ruk:">Дипломный руководитель:</label>
                            <select id="dip_ruk" name = "dip_ruk" >
                                <?php
                                    $query_professor = "SELECT * FROM professor WHERE id_department = '{$row_user["id_department"]}'";
                                    $select_professors = mysqli_query($connection, $query_professor);
                                    
                                    while($row = mysqli_fetch_assoc($select_professors)) {
                                        $id_professor = $row["id_professor"];
                                        $dip_ruk = $row["surname"].' '.$row["name"].' '.$row["patronymic"];
                                        echo "<option value='{$id_professor}'>{$dip_ruk}</option>";
                                    }
                                ?>
                            </select>
                    <?php }?>
                </p>
                
                <input type="hidden" name="support_msg" value="Данные обновлены."/>
                <button name = "btn_update_diplom" id="submit" type="submit">Update</button>
                <p  class ="support_msg"> <?php echo ($_POST['support_msg']);?></p>
            </form>
        </div>
    </div>
</body>
</html>