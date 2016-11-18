<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация на сайте</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 <style>
body {
   background-color: #284166;
  background-image: url("https://www.transparenttextures.com/patterns/45-degree-fabric-light.png");
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
}	
</style>   

</head>
<body>


<div align="center"><h2>Регистрация на сайте:</h2>
 <section class="login-form-wrap">
<form class="login-form" action="reg.php" method="post">
    <label>
      <input type="email" name="login2" required placeholder="Ваше имя">
    </label>
    <label>
      <input type="password" name="password2" required placeholder="Ваш пароль">
    </label>
    <input type="submit" name="submit2">
  </form>
</section>
</div>


<?php if (!isset($_SESSION['login']) || !isset($_SESSION['id'])) // если в сессии не загружены логин и id
{
echo '<div id="lastmain">
<a href="index.php" class="main-action">Вернуться назад </a>
</div>'; // Выводим нашу ссылку регистрации
} 
?>






<?php $connection = mysqli_connect('localhost', 'root', '', 'base') or die(mysqli_error()); // Соединение с базой данных ?> 

<?php if (isset($_POST['submit2'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['login2']))  // Условие - если поле логин пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['password2'])) // Иначе если поле с паролем пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
else // Иначе если поля не пустые
{
$login2 = $_POST['login2']; // Присваеваем переменной значение из поля с логином             
$password2 = $_POST['password2']; // Присваеваем другой переменной значение из поля с паролем
$query = "INSERT INTO `users` (login, password) VALUES ('$login2', '$password2')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
echo "<div align='center'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось
}
} 
?>

</body>
</html>