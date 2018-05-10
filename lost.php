<?php
$connection = mysqli_connect("localhost", "root", "", "buronahodok");

mysqli_set_charset($connection,'utf8');

?>


<section class="top">
  <div class="container">
    <div class="row">
    
                                <h1 class="center zag">Свежие объявления</h1>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="row">
 <?php  
    $result1 = mysqli_query($connection, "SELECT * FROM ads INNER JOIN categories ON ads.id_category=categories.id INNER JOIN category_tip ON ads.category=category_tip.id INNER JOIN region ON ads.city=region.id WHERE ads.category=2");
     while ($row1 =mysqli_fetch_row($result1)) {


      ?>
      <div class="row rt">
      <ul class="col-xs-12 wow fadeInUp glav center ">
          <li class="col-xs-2 data"><? echo $row1[1]; ?></li>
          <li class="col-xs-2 <? if($row1[2] == 1) echo 'back'; else echo 'back2'?>"><? echo $row1[13]; ?></li>
          <li class="col-xs-6 caption"><a data-toggle="collapse" href="#collapseInfo<?php echo $row1[0] ?>"><? echo $row1[3]; ?></a></li>
          <li class="col-xs-2 city"><? echo $row1[15]; ?></li>
        </div>
      </ul>

      
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