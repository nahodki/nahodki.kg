<?php
$connection = mysqli_connect("localhost", "root", "", "buronahodok");

mysqli_set_charset($connection,'utf8');

?>

<section class="top">
  <div class="container">
    <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="row">
 <?php  
    $result = mysqli_query($connection, "SELECT * FROM ads INNER JOIN categories ON ads.id_category=categories.id INNER JOIN category_tip ON ads.category=category_tip.id WHERE ads.category=1");
     while ($row =mysqli_fetch_row($result)) {

      ?>
      <div class="col-md-12 col-sm-12 col-xs-12 wow flipInX">
        <div class="our">
          <div class="row">
            <div class="img col-md-4 col-sm-5 col-xs-5"><img src="img/<? echo $row[8] ?>"></div>
            <div class="col-md-8 col-sm-7 col-xs-7">
              <div class="row">
              <div class="caption center col-md-12"><h4><a href="index2.php?id=<? echo $row['0'] ?>"><? echo $row[3]; ?></a></h4></div>     
              <div class="date col-md-3 col-sm-3 col-xs-12">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-4"><? echo $row[1]; ?></div>     
                  <div class="col-md-12 col-sm-12 col-xs-4"><? echo $row[10]; ?></div>     
                  <div class="col-md-12 col-sm-12 col-xs-4"><? echo $row[13]; ?></div>     
                </div> 
              </div>
              <?
            $text = $row[6];
            $text = mb_substr($text,0,160, 'UTF-8');
              ?>
              <div class="description col-md-9 col-sm-9 col-xs-12"><? echo $text.'...'; ?></div>  
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
    </div>
  </div>
</section>