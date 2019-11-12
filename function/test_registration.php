<? 
	$link = mysqli_connect("localhost", "root", "", "web4");
	if ( !$link  ) die ("Невозможно подключение к MySQL");	
	
	$err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
	if(!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/",$_POST['email']))
    {
        $err[] = "Неверный формат email'a";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT login FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
    $err[] = "Логин может состоять только из букв английского алфавита и цифр";
}
if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
    $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
}
if (!preg_match("/^[а-яА-Я]+\s*[а-яА-Я]+\s*[а-яА-Я]*$/u", $_POST['name'])) {
    $err[] = "Неверный формат ФИО";
}
if (!preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $_POST['phone'])) {
    $err[] = "Неверный формат номера телефона";
}

    // Если нет ошибок, то добавляем в БД нового пользователя
    if($err==NULL)
    {

        $login = $_POST['login'];

        // Убераем лишние пробелы 
        $password = md5(trim($_POST['password']));
		$email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone']);
        mysqli_query($link,"INSERT INTO users SET login='$login', password='$password', name ='$name' , address = '$address', phone = '$phone', email='$email'");
		
		header("Location: /index.php"); 
		exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
	
?>