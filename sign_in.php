<?php



$connection = mysqli_connect("localhost", "root", "", "buronahodok");
mysqli_set_charset($connection,'utf8');

if (isset($_POST['sign_in'])) {

  
  $result = mysqli_query($connection, "SELECT count(id),login FROM users WHERE login='".$_POST['login']."' AND pass='".md5($_POST['pass'])."'");
 while ($row =mysqli_fetch_row($result)) {

 	if ($row[0] == 1) {
 		 session_start();
 		$_SESSION['login'] = $row[1];
 		$error = '<span class="error_s">Вы усрешно вошли в свой акк</span>';
 		header('location:index.php');

  }

  else{

  	$error = '<span class="error_s">Логин или пароль введён не верно!</span>';

  }
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
  <nav class="navbar">
    <div class="container">
    <div class="navbar-header">
      <span><img class="logo" src="img/logo.png"></span>
    </div>
    <div class="navbar-form navbar-right">
    <?php  

      if(isset($_SESSION['login'])) {

    ?>
    <div class="user_1 btn-group">
      <div class="user" data-toggle="dropdown"><img class="account_icon" src="img/acc.jpg"> <? echo $_SESSION['login'] ?>
      <span class="caret"></span>
      </div>
  <ul class="dropdown-menu">
    <li><a href="#">Мой профиль</a></li>
    <li><a href="#">Мои объявления</a></li>
    <li class="divider"></li>
    <li><a href="#" onclick="exit()" id="ex">Выйти</a></li>
  </ul>


      <a <? if (isset($_SESSION['login'])) { echo 'href="ad.php"';} else{echo 'href="chek_in.php"';} ?>>
        <div class="ad">
          <p><i class="fa fa-plus"></i> Сделать Объявление</p>
        </div>
      </a>

      <div class="language">
        Кырг / Русс
      </div>



    <?
    }
    else {
      ?>

      <a href="chek_in.php"><div class="user"><img class="account_icon" src="img/acc.jpg"> Мой профиль</div></a>


      <a <? if (isset($_SESSION['login'])) { echo 'href="ad.php"';} else{echo 'href="chek_in.php"';} ?>>
        <div class="ad">
          <p><i class="fa fa-plus"></i> Сделать Объявление</p>
        </div>
      </a>

      <div class="language">
        Кырг / Русс
      </div>
    <?
    }
    ?>
    </div>
  </nav>
</header>

                                <!-- SECTION2 -->
<section class="section1">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
         <form class="navbar-form" action="search.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Поиск">
              <div class="input-group-btn">
                <select class="search" name="aa">
                  <option value=1>Нашёл</option>
                  <option value=2>Потерял</option>
                  </select>
              </div>
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="seke"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
          <div class="col-md-3 col-sm-4 col-xs-12 bot">
            <div class="poisk"><a data-toggle="collapse" href="#collapseTwo">Расширенный поиск</a></div>
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
  <div id="login" class="form">
    <form action="sign_in.php" method="POST" class="login-form">
      <h2>Вход</h2>
      <input type="text" placeholder="Логин" name="login">
      <input type="password" placeholder="Пароль" name="pass">
      <? echo $error; ?>
      <button type="submit" name="sign_in">Войти</button>
    </form>
    <div style="margin-top: 10px"><span style="color: grey">Нет аккаунта?</span> <span style="text-align: right;"><a href="chek_in.php">Зарегистрироваться</a></span></div>
  </div>


<footer class="footer">
  <div class="navbar navbar-default">
    <div class="container">
      <div class="row">
        <div class="center"><p>Copyright © 2018</p></div> 
      </div>
    </div>
  </div>
</footer>





</body>
</html>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
