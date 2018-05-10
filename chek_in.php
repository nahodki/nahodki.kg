<?php 
    session_start();
$connection = mysqli_connect("localhost", "root", "", "buronahodok");
mysqli_set_charset($connection,'utf8');

if (isset($_POST['chek_in'])) {


$error = array();
$a = 0;

  if ($_POST['login'] == '') {
  	$error[0] = '<span class="error">Логин введён не правильно!</span>';
    $a++;
  }
  else{
    $login = $_POST['login'];
  }
  if ($_POST['pass'] < 5) {
  	$error[1] = '<span class="error">Пароль должен состоять из 8 символов</span>';
    $a++;
  }
  else{
    $pass = $_POST['pass'];
  }
  if ($_POST['pass2'] != $_POST['pass']) {
  	$error[2] = '<span class="error">Повторный пароль введён не верно</span>';
    $a++;
  }
  else{
    $pass2 = $_POST['pass2'];
  }
  if ($_POST['number'] == '') {
  	$error[3] = '<span class="error">Введите номер!</span>';
    $a++;
  }
  else{
    $number = $_POST['number'];
  }
  if ($_POST['email'] == '') {
  	$error[4] = '<span class="error">Введите Email!</span>';
    $a++;
  }
  else{
    $email = $_POST['email'];
  }


if ($a == 0) {
      $query = "INSERT INTO users(login,pass,number,email) values('".$_POST['login']."','".md5($_POST['pass'])."','".$_POST['number']."','".$_POST['email']."')"; 
    mysqli_query($connection, $query) or die("Катачылык кетти " . mysqli_error());

    $_SESSION['login'] = $_POST['login'];
    header('location:index.php');
}


  }

?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
   <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <script type="js/javascript.js"></script>
  <script src="css/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</head>
<body>

                            <!-- AD -->




                            <!-- HEADER -->
  <header class="header">
  <nav class="navbar navbar-inverse">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"
       data-toggle="collapse"
       data-target="#bs-example-navbar-collapse-1"
       aria-expanded="false">
       <span class="sr-only">Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="logo"><img src="img/logo.png"></span>
    </div>

        <div class="collapse navbar-collapse"
         id="bs-example-navbar-collapse-1">
    <div class="navbar-form navbar-right">
    <?php  

      if(isset($_SESSION['login'])) {

    ?>
      <div class="user"><? echo $_SESSION['login'] ?></div>
      <a href="#" class="btn btn-primary border" onclick="exit()" id="ex">Выйти</a>

    <?
    }
    else {
      ?>
        <a href="sign_in.php" class="btn btn-primary border" id="login">Войти</a>
      <a href="chek_in.php" class="btn btn-success border" id="reg">Зарегистрироваться</a>
    <?
    }
    ?>
    </div>
</div>
  </div>
  </nav>
</header>

                                <!-- SECTION2 -->
<section class="section1">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="row">
      <form class="navbar-form" action="search.php" method="POST">
          <div class="col-md-5 col-sm-5 col-xs-6 bot">
            <div class="group">
              <input type="text" class="search" placeholder="Поиск" name="search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="seke"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-6 bot">
            <select  class="form-control" name="aa">
              <option value=1>Нашёл</option>
              <option value=2>Потерял</option>
            </select>
          </div>
              </form>
          <div class="col-md-3 col-sm-4 col-xs-12 bot">
            <div class="form-control"><a data-toggle="collapse" href="#collapseTwo">Расширенный поиск</a></div>
          </div>
      </div>
    </div>
  </nav>
</section>


  
<div id="collapseTwo" class="collapse">
  <div class="search_glav">
    <div class="container">
      <form action="search.php" method="POST">
    <div class="row bot">
      <div class="col-md-5 col-sm-6 col-xs-12"><label>Город:</label></div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <select class="form-control" name="city">
          <option value="0">Выбрать..</option>
            <?php

              $result = mysqli_query($connection, "SELECT * FROM region");
              while ($row =mysqli_fetch_row($result)) {
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
              }
              ?>
        </select>
      </div>
    </div>

    <div class="row bot">
      <div class="col-md-5 col-sm-6 col-xs-12"><label>Тип:</label></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <select class="form-control" name="category">
                  <option value="0">Выбрать..</option>
                    <?php
                    $result = mysqli_query($connection, "SELECT * FROM category_tip");
                    while ($row =mysqli_fetch_row($result)) {
                      echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                    }
                  ?>
                </select>
        </div>
    </div>

    <div class="row bot">
      <div class="col-md-5 col-sm-6 col-xs-12"><label>Категория:</label></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <select class="form-control" name="kat">
            <option value="0">Выбрать..</option>
              <?php

                $result = mysqli_query($connection, "SELECT * FROM categories");
                while ($row =mysqli_fetch_row($result)) {
                  echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                }
                ?>
          </select>
        </div>
    </div>
    <div class="row bot">
    <div class="col-md-2 col-sm-2 col-xs-12">
      <input type="submit" class="form-control" name="search_rash">
      </div>
    </div>
    </form>
    </div>
  </div>
</div>



                                  <!-- NAVIGATION -->

<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="index.php">Главная</a></li>
  </ol>
  </div>
</div>



<div id="reg" class="form reg">
    <form action="chek_in.php" method="POST" class="login-form">
      <h2>Регистрация</h2>
      <div class="reg2">Логин:<? echo $error[0]; ?></div>
      <input type="text" placeholder="Логин" name="login" value="<? echo $_POST['login'] ?>">
      <div class="reg2">Пароль:<? echo $error[1]; ?></div>
      <input type="password" placeholder="Пароль" name="pass">
      <div class="reg2">Повторите пароль:<? echo $error[2]; ?></div>
      <input type="password" placeholder="Повторите пароль" name="pass2">
      <div class="reg2">Номер:<? echo $error[3]; ?></div>
      <input type="text" placeholder="Номер" name="number" value="<? echo $_POST['number'] ?>">
      <div class="reg2">Email:<? echo $error[4]; ?></div>
      <input type="email" placeholder="Email" name="email" value="<? echo $_POST['email'] ?>">
      <button type="submit" name="chek_in">Зарегистрироваться</button>
    </form>
    <span style="text-align: right;"><a href="sign_in.php">Войти</a></span>
  </div>




<footer class="footer">
  <div class="navbar navbar-default">
    <div class="container">
      <div class="row">
      <div class="col-md-10 col-md-offset-2">
        <ul class="nav navbar-nav center">
          <li><a href="">Сотрудничество</a></li>
          <li><a href="">Ответы на вопросы</a></li>
          <li><a href="">Коммерческие сервисы</a></li>
          <li><a href="">Подписка</a></li>
          <li><a href="">Реклама</a></li>
          <li><a href="">Контакты</a></li>
        </ul>
      </div>
        <div class="col-md-9 col-md-offset-3">Copyright © 2016 Единая Национальная Служба Бюро Находок</div> 
      </div>
    </div>
  </div>
</footer>





</body>
</html>



<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>