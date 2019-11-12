<?php
$title = 'Регистрация';
require 'header.php';
define('ROOT_DIR', dirname(__FILE__));
?>
    <div id="middle">
        <div class="middleWrapper">
            <div class="middleWrapper2">
                <div class="middleWidth">
                    <div id="container">
                        <div id="content">
                            <div class="news">
                                <h2>Регистрация</h2>
                                <div class="newsContent">
                                    <div id="inline">

                                        <form id="registration" action="function/test_registration.php" method="post"
                                              name="registration">
                                            <input id="login" class="txt" name="login" type="text"
                                                   placeholder="Ваш логин"/>
                                            <input id="password" class="txt" name="password" type="password"
                                                   placeholder="Ваш пароль"/>
                                            <h2 style="color: red">Контактная информация</h2>
                                            <input id="name" class="txt" name="name" type="text"
                                                   placeholder="Ваше ФИО"/>
                                            <input id="phone" class="txt" name="phone" type="text"
                                                   placeholder="Ваш телефон"/>
                                            <input id="address" class="txt" name="address" type="text"
                                                   placeholder="Ваш адрес"/>
                                            <input id="email" class="txt" name="email" type="email"
                                                   placeholder="Ваш e-mail"/>
                                            <button id="send">Зарегистрироваться</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?PHP include('menu.php'); ?>
                </div>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>