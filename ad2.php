<?php

session_start();
$connection = mysqli_connect("localhost", "root", "", "buronahodok");

mysqli_set_charset($connection,'utf8');

    
mysqli_query($connection, "UPDATE categories SET found=found+1 WHERE id=".$_GET['id']);

  printf("Озгоргон жолчо (UPDATE): %d\n", mysqli_affected_rows($connection));

if(isset($_POST['send']))
{
$error = array();
$a = 0;

  if ($_POST['caption'] == '') {
    $error[0] = '<span class="error">Введите Заголовок</span>';
    $a++;
  }
  else{
    $caption = $_POST['caption'];
  }
  if ($_POST['city'] == 0) {
    $error[1] = '<span class="error">Введите город</span>';
    $a++;
  }
  else{
    $city = $_POST['city'];
  }
  if ($_POST['category'] == 0) {
    $error[2] = '<span class="error">Введите Категорию</span>';
    $a++;
  }
  else{
    $category = $_POST['category'];
  }
  if ($_POST['nomer'] < 5) {
    $error[3] = '<span class="error">Введите Номер</span>';
    $a++;
  }
  else{
    $number = $_POST['nomer'];
  }
  if ($_POST['des'] == '') {
    $error[4] = '<span class="error">Введите Описание</span>';
    $a++;
  }
  else{
    $des = $_POST['des'];
  }
    $name = $_FILES['get_file'] ['name'];
  if ($a == 0) {



    $result = mysqli_query($connection, "SELECT max(id) FROM ads");
    $row = mysqli_fetch_row($result);
    $one = $row[0]+1;
    $name = 'picture'.$one.'.jpg';

    copy($_FILES['get_file'] ['tmp_name'], 'img/'.$name);

$query = "INSERT INTO ads(caption,city,data,nomer,des,category,id_category,picture) values('".$caption."','".$city."','".$_POST['data']."','".$number."','".$des."', '".$category."' , '".$_GET['id_categories']."','".$name."')"; 
mysqli_query($connection, $query) or die("Катачылык кетти " . mysqli_error());

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
  <script type="js/javascript.js"></script>
  <link href="css/bootstrap-fileupload.min.css" rel="stylesheet">
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
      <li><a href="ad.php">Сделать Объявление</a></li>
      <?php

        $result = mysqli_query($connection, "SELECT * FROM subcategory WHERE id=".$_GET['id_subcategory']);
        while ($row =mysqli_fetch_row($result)) {
        echo '<li class="active">'.$row[1].'</li>';
      }
      ?>
  </ol>
  </div>
</div>
                               <!-- SECTION3 -->
<div class="container bot">
  <div class="row">
    <div class="col-md-5 col-sm-8 col-xs-11 col-md-offset-4 col-sm-offset-2 col-xs-offset-2"><h2>2.Ввод основной информации</h2></div>
  </div>
</div>

<div class="container bot">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

      <?php


        $result = mysqli_query($connection, "SELECT * FROM categories WHERE id=".$_GET['id_categories']);
        while ($row =mysqli_fetch_row($result)) {

        $result1 = mysqli_query($connection, "SELECT * FROM subcategory WHERE id=".$_GET['id_subcategory']);
        while ($row1 =mysqli_fetch_row($result1)) {

      ?>
      <h2>Категория: <span class="navigation"><a href="ad.php"><? echo $row[1]; ?></a></span><span class="navigation"> / <? echo $row1[1]; ?></span></h2>
      <?
      }}
      ?>
    </div>
  </div>
</div>											


<section>
	<div class="container">
		<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form  method="POST" enctype="multipart/form-data" action="ad2.php?id_categories=<? echo $_GET['id_categories'] ?> && id_subcategory=<? echo $_GET['id_subcategory'] ?>">
        <div class="col-md-12 col-sm-12 col-xs-12 forma">
          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label class="cap">Заголовок объявления:<? echo $error[0]; ?></label></div></div>
            <div class="col-md-4 col-sm-6 col-xs-12"><div class="row"><input type="text" class="form-control" name="caption" id="caption"></div></div>
            <div id="cap_error"></div>
          </div> 

          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label>Город:<? echo $error[1]; ?></label></div></div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="row">
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
          </div>

          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label>Дата:</label></div></div>
            <div class="col-md-4 col-sm-6 col-xs-12"><div class="row"><input type="date" class="form-control" name="data"></div></div>
          </div>

          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label>Категория:<? echo $error[2]; ?></label></div></div>


            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="row">
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
          </div>

          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label>Номер:<? echo $error[3]; ?></label></div></div>
            <div class="col-md-4 col-sm-6 col-xs-12"><div class="row"><input type="text" class="form-control" name="nomer" value="+996"></div></div>
          </div>

          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label>Описание:<? echo $error[4]; ?></label></div></div>
            <div class="col-md-4 col-sm-6 col-xs-12"><div class="row"><textarea class="form-control" name="des"></textarea></div></div>
          </div>

          <div class="row bot">
            <div class="col-md-5 col-sm-6 col-xs-12"><div class="row"><label>Добавить картинку:</label></div></div>
            <div class="col-md-4 col-sm-6 col-xs-12"><div class="row">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                    <div>
                      <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="get_file"></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div></div></div>
          </div>

          <div class="row col-md-offset-8 col-sm-offset-10 col-xs-offset-10">
            <button type="submit" class="btn btn-primary" name="send">Отправить</button>
          </div>
        </div>
      </form>
      </div>
		</div>
	</div>
</section> 















<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="css/bootstrap-fileupload.js"></script>
</body>

<script type="text/javascript">
  
function login() {
  var login = document.getElementById("login").style.display = 'block';
}
function reg() {
  var reg = document.getElementById("reg").style.display = 'block';
}

</script>
</html>










