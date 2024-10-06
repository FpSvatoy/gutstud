<?php 
    include("../lk-head-department/lk-head-header.php");
    session_start();
    include "../construct/dbOpen.php";
    
    ?>
    <div class="wrapperOneBlock">
		<div class="content">
            <table class="tableCapability">
				<thead>
					<tr class = "headTable">
				    	<th>Фамилия</th>
						<th>Имя</th>
					    <th>Отчество</th>
				    	<th>Группа</th>
						<th>Курс</th>
					    <th>Тема</th>
					</tr>
				</thead>
				<tbody class="bodyTableDiplomniki">
            <?php
                $id = $_SESSION["nowUserId"];
                $queryDT = "SELECT * FROM `student` WHERE id_professor = $id";
                $selectedStudent = mysqli_query($connection, $queryDT);
                while($row = mysqli_fetch_array($selectedStudent)) {
                    $surname = $row["surname"];
                    $name = $row["name"];
                    $patronymic = $row["patronymic"];
                    $group_name_tb = "SELECT group_name FROM `group` WHERE id_group = '{$row["id_group_name"]}'";
                    $selectedGroupQuery = mysqli_query($connection, $group_name_tb);
                    $group_name = mysqli_fetch_assoc($selectedGroupQuery);
                    $course = $row["course"];
                    $topic_name = $row["topic_name"];
                    echo "<tr>";
                        echo "<td>{$surname}</td>";
                        echo "<td>{$name}</td>";
                        echo "<td>{$patronymic}</td>";
                        echo "<td>{$group_name["group_name"]}</td>";
                        echo "<td>{$course}</td>";
                        echo "<td>{$topic_name}</td>";
                }
				
            ?>
            </tbody>
			</table>
            <form method="post" action="exel.php">
                <input type="submit" id="update" name="export_exel" class="btn btn-success" value="Export to Exel"/>
            </form>
        </div>
		
    </div>
</body>
</html>