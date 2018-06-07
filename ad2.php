<?php

session_start();
$connection = mysqli_connect("localhost", "root", "", "buronahodok");

mysqli_set_charset($connection,'utf8');

    
$_SESSION['caption'] = $_POST['caption'];
$_SESSION['des'] = $_POST['des'];


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
  if(isset($_POST['chek'])) {
    $chek = 1;
  }


    $name = $_FILES['get_file'] ['name'];
  if ($a == 0) {

    header('location:index.php');

    $result = mysqli_query($connection, "SELECT max(id) FROM ads");
    $row = mysqli_fetch_row($result);
    $one = $row[0]+1;
    $name = 'picture'.$one.'.jpg';

    copy($_FILES['get_file'] ['tmp_name'], 'img/'.$name);

    if ($_FILES['get_file'] ['size'] == 0) {
      $name = 'default.png';
    }

$query = "INSERT INTO ads(caption,city,data,nomer,des,category,id_category,picture,vip,id_user) values('".$caption."','".$city."','".$_POST['data']."','".$number."','".$des."', '".$category."' , '".$_GET['id_categories']."','".$name."','".$chek."','".$_SESSION['user_id']."')"; 
mysqli_query($connection, $query) or die("Катачылык кетти " . mysqli_error());

mysqli_query($connection, "UPDATE categories SET found=found+1 WHERE id=".$_GET['id_categories']);

 mysqli_affected_rows($connection);



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
  <link href="css/bootstrap-fileupload.min.css" rel="stylesheet">
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
      <li><a href="index.php">Главная</a></li>
      <li><a href="ad.php">Сделать Объявление</a></li>
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

      ?>
      <h2>Категория: <span class="navigation"><a href="ad.php"><? echo $row[1]; ?></a></span></h2>
      <?
      }
      ?>
    </div>
  </div>
</div>											


<section>
	<div class="container">
		<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form  method="POST" enctype="multipart/form-data" action="ad2.php?id_categories=<? echo $_GET['id_categories'] ?>">
        <div class="col-md-12 col-sm-12 col-xs-12 forma">
          <div class="row bot">
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="cap">Заголовок объявления:<? echo $error[0]; ?></label></div></div>
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><input type="text" class="form-control" name="caption" id="caption" value="<? echo $_SESSION['caption'] ?>"></div></div>
            <div id="cap_error"></div>
          </div> 

          <div class="row bot">
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label>Город:<? echo $error[1]; ?></label></div></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
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
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label>Дата:</label></div></div>
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><input type="date" class="form-control" name="data"></div></div>
          </div>

          <div class="row bot">
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label>Категория:<? echo $error[2]; ?></label></div></div>


            <div class="col-md-6 col-sm-6 col-xs-12">
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
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label>Номер:<? echo $error[3]; ?></label></div></div>
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><input type="text" class="form-control" name="nomer" value="+996"></div></div>
          </div>

          <div class="row bot">
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label>Описание:<? echo $error[4]; ?></label></div></div>
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><textarea class="form-control" name="des"><? echo $_SESSION['des'] ?></textarea></div></div>
          </div>

          <div class="row bot">
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row"><label>Добавить картинку:</label></div></div>
            <div class="col-md-6 col-sm-6 col-xs-12"><div class="row">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                    <div>
                      <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="get_file"></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div></div></div>
          </div>

          <div class="center"><h2>VIP</h2><input type="checkbox" name="chek" class="form-control"></div>

          <div class="row col-md-offset-11 col-sm-offset-10">
            <button type="submit" class="btn btn-primary" name="send">Отправить</button>
          </div>
        </div>
      </form>
      </div>
		</div>
	</div>
</section> 







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
<script src="css/bootstrap-fileupload.js"></script>
</body>

<script type="text/javascript">
  function exit() {
    if(confirm('Вы точно хотите выйти?') == true) {
      document.getElementById("ex").href = 'session_destroy.php';
    }
  }
</script>
</html>











