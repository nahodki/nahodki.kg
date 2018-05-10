<?php

$connection = mysqli_connect("localhost", "root", "", "buronahodok");

mysqli_set_charset($connection,'utf8');

session_start();

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
        <a href="sign_in.php" class="btn btn-primary border" id="login">Войти</a>
      <a href="chek_in.php" class="btn btn-success border" id="reg">Зарегистрироваться</a>
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
      <li><a href="#">Главная</a></li>
      <li class="active">Объявления</li>
  </ol>
  </div>
</div>



		
														<!-- SECTION3 -->

<section>
	<div class="container">
		<div class="row">
    <?php
     $result = mysqli_query($connection, "SELECT * FROM ads INNER JOIN region ON ads.city=region.id WHERE ads.id=".$_GET['id']);
          while ($row =mysqli_fetch_row($result)) {
        ?>
        <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-3 col-sm-offset-3 bot">
          <img src="img/01.jpg">
        </div>

		</div>

      <div class="col-md-12 col-sm-12 col-xs-12">
      <ul class="info">
          <li class="row">
            <div class="col-md-5 col-sm-6 col-xs-12"><label class="cap">Заголовок объявления:</label></div>
            <div class="col-md-7 col-sm-6 col-xs-12"><label><? echo $row[3]; ?></label></div>
          </li> 

          <li class="row">
            <div class="col-md-5 col-sm-6 col-xs-12"><label>Город:</label></div>
            <div class="col-md-7 col-sm-6 col-xs-12"><label><? echo $row[10]; ?></label></div>
          </li> 

          <li class="row">
            <div class="col-md-5 col-sm-6 col-xs-12"><label>Дата:</label></div>
            <div class="col-md-7 col-sm-6 col-xs-12"><label><? echo $row[1]; ?></label></div>
          </li> 

          <li class="row">
            <div class="col-md-5 col-sm-6 col-xs-12"><label>Номер:</label></div>
            <div class="col-md-7 col-sm-6 col-xs-12"><label><? echo $row[5]; ?></label></div>
          </li> 

          <li class="row">
            <div class="col-md-5 col-sm-6 col-xs-12"><label>Описание:</label></div>
            <div class="col-md-7 col-sm-6 col-xs-12"><label><? echo $row[6]; ?></label></div>
          </li> 
        </ul>
<?
}
?>
    </div>
  </div>
</section> 

                                                          <!-- COMMENTS -->

                          



<footer class="footer">
  <div class="navbar navbar-default">
    <div class="container">
      <div class="row">
        <div class="center"><p>Copyright © 2018</p></div> 
      </div>
    </div>
  </div>
</footer>










<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
<script type="text/javascript">
  
function login() {
  var login = document.getElementById("login").style.display = 'block';
}
function reg() {
  var reg = document.getElementById("reg").style.display = 'block';
}

</script>

<script type="text/javascript">
  function exit() {
    if(confirm('Вы точно хотите выйти?') == true) {
      document.getElementById("ex").href = 'session_destroy.php';
    }
  }
</script>
</html>











