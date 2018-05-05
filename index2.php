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











