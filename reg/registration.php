<?php
include "../construct/dbOpen.php";
if(isset($_POST["submitcontinue"])){
    /*тут получаем все общие данные*/
    $surname = trim(strip_tags($_POST["surname"]));
    $name = trim(strip_tags($_POST["name"]));
    $patronymic = trim(strip_tags($_POST["patronymic"]));
    $mail = trim(strip_tags($_POST["mail"]));
    $phone = trim(strip_tags($_POST["phone"]));
    $password = trim(strip_tags($_POST["password"]));
    $faculty = trim(strip_tags($_POST["faculty"]));
    $department = trim(strip_tags($_POST["department"]));
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    if(!isset($_POST["checkbox"])){
        /*если не прожато, то это студент, создаем запрос и регаем его*/
        $course = trim(strip_tags($_POST["course"]));
        $group = trim(strip_tags($_POST["group"]));
        $insert_query = "INSERT INTO student ( `surname`, `name`, `patronymic`,`mail`,`phone`,`password`,`id_faculty`,`id_department`,`course`,`id_group_name`)";
		$insert_query .= "VALUE('{$surname}', '$name', '{$patronymic}', '{$mail }', '{$phone}', '{$hashPassword}', '{$faculty}', '{$department}', '{$course}', '{$group}')";
    }else{ 
        /*если прожато, то это препод, создаем запрос и регаем его*/
        $professor_position = trim(strip_tags($_POST["professor_position"]));
        $academic_title = trim(strip_tags($_POST["academic_title"]));
        $insert_query = "INSERT INTO professor ( `surname`, `name`, `patronymic`,`mail`,`phone`,`password`,`id_faculty`,`id_department`,`position`,`academic_title`)";
		$insert_query .= "VALUE('{$surname}', '$name', '{$patronymic}', '{$mail }', '{$phone}', '{$hashPassword}', '{$faculty}', '{$department}', '{$professor_position}', '{$academic_title}')";
    }
    $insert_result = mysqli_query($connection, $insert_query);
    if(!$insert_result){
        header('Location: ../index.php?support_msg=Ooops... Ошибка при выполнении запроса в бд!');
    }else{
        header('Location: ../index.php?support_msg=Заявка на регистрацию подана, подождите пока администратор сайта её одобрит!');
    }
}else{
    header('Location: ../index.php?support_msg=Вы ошиблись дверью, сюда попадает только регистрация с:');
}
?>
