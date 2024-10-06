<?php 
	session_start();
    include "../construct/dbOpen.php";
	$output='';
	if(isset($_POST["export_exel"]))
	{
		$id = $_SESSION["nowUserId"];
                $queryDT = "SELECT * FROM `student` WHERE id_professor = $id";
                $selectedStudent = mysqli_query($connection, $queryDT);
                $output.= '
				<table class="table" bordered="1">
				<tr>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Группа</th>
				<th>Курс</th>
				<th>Тема</th>
				</tr>
				';
				while($row = mysqli_fetch_array($selectedStudent)) {
                    /*$group_name_tb = "SELECT group_name FROM `group` WHERE id_group = '{$row["id_group_name"]}'";
                    $selectedGroupQuery = mysqli_query($connection, $group_name_tb);
                    $group_name = mysqli_fetch_assoc($selectedGroupQuery);*/
                    $output.= '
					<tr>
                        <td>'.$row["surname"].'</td>
                        <td>'.$row["name"].'</td>
                        <td>'.$row["patronymic"].'</td>
                        <td>'.$row["group_name"].'</td>
                        <td>'.$row["course"].'</td>
                        <td>'.$row["topic_name"].'</td>
					</tr>
					';
				}
				$output .= '</table>';
				header("Content-Type: application/xls");
				header("Content-Disposition: attachment; filename=diplomniky.xls");
				echo $output;
	}
?>