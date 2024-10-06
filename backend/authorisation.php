<?php
session_start();
include "../construct/dbOpen.php";

// проверка на то, была ли отправлена форма
// нужна чтобы не выполнять код обработки формы до того, как она будет заполнена
if (isset($_POST["submit"])) {
    if (!(empty($_POST["mail"])) && !(empty($_POST["password"]))) {
        $login = $_POST["mail"];
        $password = $_POST["password"];

        // LIMIT 1 позволяет остановиться как только найден первый результат
        // позволяет не выполнять запрос до конца, когда заведомо известно что результат будет только один
        $professor_query = "SELECT * FROM professor WHERE mail='{$login}' LIMIT 1";
        $professor_result = mysqli_query($connection, $professor_query);

        $student_query = "SELECT * FROM student WHERE mail='{$login}' LIMIT 1";
        $student_result = mysqli_query($connection, $student_query);
       /* echo"Prof_result:";
        var_dump($professor_result);
        ?>
        <br/>
        <?php
        echo"Stud_result:";
        $num_row*/
        var_dump($student_result);
        if (mysqli_num_rows($professor_result) == 0 and mysqli_num_rows($student_result) == 0) {
            header('Location: ../index.php?support_msg=Данного пользователя не существует');
            exit;
        } else {
           /* ?>
            <br/>
            <?php
            echo(mysqli_num_rows($professor_result));
            echo(mysqli_num_rows($student_result));*/
            // PHP считает 0 и NULL как FALSE а все остальное как TRUE, удобно в условиях
            // mysqli_query вернёт FALSE если ничего не найдёт и объект в противном случае, объект считается за TRUE
            $result = mysqli_num_rows($professor_result) ? $professor_result : $student_result;
            $row = mysqli_fetch_assoc($result);
            $hashpass = $row["password"];
            var_dump($row);
            if (password_verify($password, $hashpass)) {
                $access_lvl=$row["access_lvl"];
                if($access_lvl!=1){
                $nowUserLogin = $row["mail"];
                $nowUserId = mysqli_num_rows($student_result) ? $row["id_student"] : $row["id_professor"]; 
                $_SESSION["nowUserLogin"] = $nowUserLogin;
                $_SESSION["nowUserId"] = $nowUserId;
                $_SESSION["nowAccessLvl"] = $access_lvl;
                $_SESSION["support_msg"] = "Вход выполнен. User:" . $_SESSION["nowUserLogin"] . "; ID:" . $_SESSION["nowUserId"]."; Access_lvl:" . $_SESSION["nowUserId"];
            
                if($access_lvl==2){
                    header('Location: ../lk-student/lk-stud-profile.php');
                    exit();
                }
                if($access_lvl==3){
                    header('Location: ../lk-professor/lk-prof-profile.php');
                    exit();
                }
				if($access_lvl==4){
                    header('Location: ../lk-head-department/lk-head-profile.php');
                    exit();
                }
                if($access_lvl==5){
                    header('Location: ../lk-admin/lk-admin-table-students.php');
                    exit();
                }
                //header('Location: ../index.php?support_msg='.$_SESSION["support_msg"]);
            }else{
                header('Location: ../index.php?support_msg=Администратор еще не одобрил заявку. Пожалуйста, подождите...');
            }
            } else {
                header('Location: ../index.php?support_msg=Не верно введенный пароль. Повторите попытку.');
                exit();
            }
        }
    } else {
        header('Location: ../index.php?support_msg=Заполните поля для ввода.');
    }
} else {
    header('Location: ../index.php?support_msg=Ошибка отправки формы.');
}
?>
