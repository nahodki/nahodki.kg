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


                            <!-- MAIN -->
<main class="main">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 center plus wow fadeInLeft">
        <div id="find" class="find">
          <h2><i class="fa fa-search-plus"></i> Нашёл</h2>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 plus center plus wow fadeInRight">
        <div id="lost" class="find">
          <h2><i class="fa fa-search-minus"></i> Потерял</h2>
        </div>
      </div>
    </div>
  </div>
</main>



                            <!-- SECTION3 -->


<div class="result">

<section class="content">
  <div class="container">
    <div class="row">
    
                                <h1 class="center zag">Свежие объявления</h1>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="row">
 <?php  
    $result1 = mysqli_query($connection, "SELECT * FROM ads INNER JOIN categories ON ads.id_category=categories.id INNER JOIN category_tip ON ads.category=category_tip.id INNER JOIN region ON ads.city=region.id ORDER BY ads.vip DESC, ads.id DESC");
     while ($row1 =mysqli_fetch_row($result1)) {


      ?>
      <div class="row rt <? if($row1[9] == 1) echo 'vip'; ?>">
      <ul class="col-xs-12 wow fadeInUp glav center ">
          <li class="col-xs-2 data"><? echo $row1[1]; ?></li>
          <li class="col-xs-2 <? if($row1[2] == 1) echo 'back'; else echo 'back2'?>"><? echo $row1[14]; ?></li>
          <li class="col-xs-6 caption"><a data-toggle="collapse" href="#collapseInfo<?php echo $row1[0] ?>"><? echo $row1[3]; ?></a></li>
          <li class="col-xs-2 city"><? echo $row1[16]; ?></li>
      </ul>
      </div>

      
      <div id="collapseInfo<?php echo $row1[0] ?>" class="collapse">
      <div class="row pod <? if($row1[2] == 1) echo 'b1'; else echo 'b2' ?>">
    <?php
     $result = mysqli_query($connection, "SELECT * FROM ads INNER JOIN region ON ads.city=region.id WHERE ads.id=".$row1[0]);
          while ($row =mysqli_fetch_row($result)) {
        ?>

        <div><h2><? echo $row[3]; ?></h2></div>
        <hr>


         
 
<div class="col-xs-12">
      <div class="col-md-6 col-sm-6 col-xs-12">
      <ul class="info">
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
        </div> 

        <div class="col-md-6 col-sm-6 col-xs-12 bot">
          <img src="img/<? echo $row[8]; ?>">
        </div>
</div>



      </div> 
      </div>
<?
}}
?>
  </div>
</div>

    </div>
  </div>
</section> 


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









<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
<script type="text/javascript">
  
                                        // FIND && LOST
$("#find").click(
  function(){
    sendAjaxForm('results', 'find.php');
    return false;
  });
    function sendAjaxForm(res, url) {
          $.ajax({
          url: url,
          type: "POST",
          dataType: "html",
          success: function(data) {
            $('.result').html(data);
          }
        });
   }

  $("#lost").click(
  function(){
    sendAjaxForm('results', 'lost.php');
    return false;
  });
    function sendAjaxForm(res, url) {
          $.ajax({
          url: url,
          type: "POST",
          dataType: "html",
          success: function(data) {
            $('.result').html(data);
          }
        });

   }
   

</script>
</html>

<script type="text/javascript">
  function exit() {
    if(confirm('Вы точно хотите выйти?') == true) {
      document.getElementById("ex").href = 'session_destroy.php';
    }
  }
</script>










