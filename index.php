<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/auth-reg.css">
    </head>
    <body>
        <?php session_start();
        if(isset($_GET['exit'])){
            session_unset();
        } 
        ?>
		<div class="header">
        </div>		
        <div class = "centerBlock">
            <?php session_start(); 
            if(!isset($_GET['support_msg'])){
                header('Location: ../index.php?support_msg=');
            }
            ?>
            <section class = "sectionAuth">
                <form action="backend/authorisation.php" method = "post">
                    <p>
                        <input name = "mail" id = "mail" placeholder = "Логин" type="text">
                    </p>
 
                    <p>
                        <input name = "password" id = "password" placeholder = "Пароль" type="password">
                    </p>

                    <button name = "submit" id = "submit" type = "submit">Войти</button>
                </form>
                <div id = "href-reg">
                    <a id = "auth-reg" href="reg/regPage1.php">
                        Регистрация
                    </a>
                </div>
            </section>
            <p  class ="support_msg"> <?php echo ($_GET['support_msg']);?></p> <!--переделать через гет-->
        </div>
        
        <?php include "reg/regfooter.php";?>
    </body>