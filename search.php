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
  <script type="js/javascript.js"></script>
  <link rel="stylesheet" href="css/animate.css">
  <script src="css/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</head>
<body>

                            <!-- AD -->




                            <!-- HEADER -->
  <header class="header">
  <nav class="navbar navbar-inverse navbar-fixed-top">
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
      <a href="session_destroy.php?id=1" class="btn btn-primary" onclick="exit()" id="ex">Выйти</a>

    <?
    }
    else {
      ?>
        <a href="sign_in.php" class="btn btn-primary" id="login">Войти</a>
      <a href="chek_in.php" class="btn btn-success" id="reg">Зарегистрироваться</a>
    <?
    }
    ?>
    </div>
</div>
  </div>
  </nav>
</header>

                                <!-- SECTION2 -->
<section class="section1" style="margin-top: 50px">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="row">
      <form class="navbar-form" action="search.php" method="POST">
          <div class="col-md-3 col-sm-4 col-xs-6 bot">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Поиск" name="search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-6 bot">
            <select  class="form-control" name="aa">
              <option value=1>Нашёл</option>
              <option value=2>Потерял</option>
            </select>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12 bot">
            <div class="form-control"><a href="get.html">Расширенный поиск</a></div>
          </div>

      </form>
      </div>
    </div>
  </nav>
</section>


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
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center plus">
        <div id="find" class="btn btn-success find">
          <h2><i class="fa fa-search-plus"></i> Нашёл</h2>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center plus">
        <div id="lost" class="btn btn-danger find">
          <h2><i class="fa fa-search-minus"></i> Потерял</h2>
        </div>
      </div>
    </div>
  </div>
</main>




                            <!-- SECTION3 -->


<div class="result">

<section>
  <div class="container">
    <div class="row">
    


      <div class="col-md-12 col-sm-12 col-xs-12">
<div class="row">
<?php




$name = $_POST['search'];



$sp = strpos($name, ' ')+1;
$first = substr($name, 0, strpos($name, ' '));
$second = substr($name, $sp);

      $result = mysqli_query($connection, "SELECT * FROM ads INNER JOIN categories ON ads.id_category=categories.id INNER JOIN category_tip ON ads.category=category_tip.id WHERE caption LIKE '$name%' AND category_tip.id=".$_POST['aa']);
  while ($row =mysqli_fetch_row($result)) {
?>
      <div class="col-md-12 col-sm-12 col-xs-12 wow flipInX">
        <div class="our">
          <div class="row">
            <div class="img col-md-4"><img src="img/<? echo $row[8] ?>"></div>
            <div class="col-md-8">
              <div class="row">
              <div class="caption center col-md-12"><h4><a href="index2.php?id=<? echo $row['0'] ?>"><? echo $row[3]; ?></a></h4></div>     
              <div class="date col-md-3">
                <div class="row">
                  <div class="col-md-12"><? echo $row[1]; ?></div>     
                  <div class="col-md-12"><? echo $row[10]; ?></div>     
                </div> 
              </div>
              <div class="description col-md-9"><? echo $row[6]; ?></div>  
              </div>
            </div>
          </div>
        </div>
      </div>
       <?
        }
        ?>
  </div>
</div>
   


<!-- <?php

//if (isset( $_POST['search_rash'])) {



      //$result = mysqli_query($connection, "SELECT * FROM ads INNER JOIN category_tip ON ads.category=category_tip.id INNER JOIN region ON ads.city=region.id INNER JOIN categories ON ads.id_category=categories.id");
  //while ($row =mysqli_fetch_row($result)) {

?>
            <tr class="center">
              <td><? //echo $row[1]; ?></td>
              <? //echo $row[9]; ?>
              <td><a href="index2.php?id=<?php //echo $row[0] ?>"><? //echo $row[3]; ?></a></td>
              <td><? //echo $row[4]; ?></td>
            </tr>
<?

?>  -->
















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











