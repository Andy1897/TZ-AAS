<div id="sidebar">
    <div class="block">
        <h3>Меню сайта</h3>
        <ul id="menu" class="list">
            <li><a href="index.php">Главная страница</a></li>

            <?PHP
            if (!$_SESSION["login"])
                echo '<li><a href="registration.php">Регистрация</a></li>';
            ?>
        </ul>
    </div>
    <div class="block">
        <?PHP
        if ($_SESSION["login"]) {
            echo "<h3>Вы вошли, как " . $_SESSION["login"] . "</h3>"; // переход к HTML
            ?>
            <form action="logout.php" method="post">
                <input name="text" type="submit" value="выйти"/>
            </form>
            <?PHP //снова PHP
        } else {//переход к HTML
            ?>
            <h3>Авторизация</h3>
            <form action="authorize.php" method="post">
                Пользователь
                <input type="text" name="login"/>
                <br/>
                Пароль
                <input type="password" name="password"/>
                <br/>
                <input type="submit" name="ok" value="  Ok  "/>
            </form>
            <?PHP
        }
        ?>
        <?php

        switch ($_GET['is_out']) {
            case 1:
                echo "Выход выполнен успешно";
                break;
            case 2:
                echo "Неверный логин/пароль";
                break;
            case 3:
                echo "Нет доступа";
                break;
        }
        unset($_GET["is_out"]);
        if (isset($_SESSION["message"])) {
            $messege = $_SESSION["message"];
            echo "$messege";
            unset($_SESSION["message"]);
        }
        ?>
    </div>
</div>