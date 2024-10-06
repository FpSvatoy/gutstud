<?php include "regheader.php";?>
        <?php 
            include "../construct/dbOpen.php";
            /*Пару проверок на занятость мыла/логина */
            $queryUniqueProf = "SELECT * FROM professor WHERE `mail` = '{$_POST["mail"]}'";
			$checkMailProf = mysqli_query($connection, $queryUniqueProf);
            $queryUniqueStud = "SELECT * FROM student WHERE `mail` = '{$_POST["mail"]}'";
			$checkMailStud = mysqli_query($connection, $queryUniqueProf);
            if (mysqli_num_rows($checkMailProf) > 0 || mysqli_num_rows($checkMailStud) > 0){
                header('Location: /reg/regPage1.php?support_msg=Данный пользователь уже зарегестрирован.Введите другой mail!.');
            }else{      
        ?>
        <div class = "centerBlock">
            <main class = "mainAuth">
                <section class = "sectionAuth">
                    <form action="/reg/registration.php" method = "post">
                        <input type="hidden" id="surname" name="surname" value=<?php echo($_POST["surname"])?> />
                        <input type="hidden" id="name" name="name" value=<?php echo($_POST["name"])?> />
                        <input type="hidden" id="patronymic" name="patronymic" value=<?php echo($_POST["patronymic"])?> />
                        <input type="hidden" id="mail" name="mail" value=<?php echo($_POST["mail"])?> />
                        <input type="hidden" id="phone" name="phone" value=<?php echo($_POST["phone"])?> />
                        <input type="hidden" id="password" name="password" value=<?php echo($_POST["password"])?> />
                        <input type="hidden" id="faculty" name="faculty" value=<?php echo($_POST["faculty"])?> />
                        <p>
                            <label for="department:">Кафедра:</label>
                            <select id="department" name = "department">
                                <?php
                                    $query_department = "SELECT * FROM department WHERE `id_faculty` = '{$_POST["faculty"]}'";
                                    $select_department = mysqli_query($connection, $query_department);            
                                    while($row = mysqli_fetch_assoc($select_department)) {
                                        $id_department = $row["id_department"];
                                        $department_abbreviation= $row["department_abbreviation"];
                                        echo "<option value='{$id_department}'>{$department_abbreviation}</option>";
                                    }
                                ?>
                            </select>
                            <?php
                                if(!isset($_POST["checkbox"])){?>
                                <p>
                                    <label for="course:">Номер курса:</label>
                                    <select id="course" name = "course">
                                        <option value='4'>4</option>
                                        <option value="5">5</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="group:">Группа:</label>
                                    <select id="group" name = "group">
                                        <?php
                                            $query_group = "SELECT * FROM `group`";
                                            $select_group = mysqli_query($connection, $query_group);
                                            
                                            while($row = mysqli_fetch_assoc($select_group)) {
                                                $id_group = $row["id_group"];
                                                $group_name= $row["group_name"];
                                                echo "<option value='{$id_group}'>{$group_name}</option>";
                                            }
                                        ?>
                                    </select>
                                </p>
                                <?php
                                }else{ /*добавим поле для checkbox, если он активен, для будущих запросов регистарции
                                        в зависимости от проверки будем формировать тот или иной запрос.
                                        или не формировать...*/?>
                                <p>
                                    
                                    <input type="hidden" id="checkbox" name="checkbox"/>
                                    <label for="professor_position:">Должность:</label>
                                    <select id="professor_position" name = "professor_position">
                                        <?php
                                            $query_position = "SELECT * FROM `professor_position`";
                                            $select_position = mysqli_query($connection, $query_position);
                                            
                                            while($row = mysqli_fetch_assoc($select_position)) {
                                                $id_position = $row["id_position"];
                                                $position_name= $row["position_name"];
                                                echo "<option value='{$id_position}'>{$position_name}</option>";
                                            }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="academic_title:">Ученое звание:</label>
                                    <select id="academic_title" name = "academic_title">
                                        <?php
                                            $query_academic_title = "SELECT * FROM `academic_title`";
                                            $select_academic_title = mysqli_query($connection, $query_academic_title);
                                            
                                            while($row = mysqli_fetch_assoc($select_academic_title)) {
                                                $id_title = $row["id_title"];
                                                $title_abbreviation= $row["title_abbreviation"];
                                                echo "<option value='{$id_title}'>{$title_abbreviation}</option>";
                                            }
                                        ?>
                                    </select>
                                </p>
                                <?php
                                }
                            ?>
                        </p>
                        <button name = "submitcontinue" id = "submit" type = "submit">Продолжить</button>
                    </form>
                    <div id = "href-reg">
                        <a id = "auth-reg" href="../index.php">
                            Выйти
                        </a>
                    </div>
                </section>
                <p  class ="support_msg"></p> 
            </main>
        </div>
        <?php
            }
        ?>
        <?php include "regfooter.php";?>
    </body>
</html>