<?php
$connection = mysqli_connect("localhost", "root", "", "buronahodok");

mysqli_set_charset($connection,'utf8');

?>

                                                                      <!-- LOST -->
<section>
  <div class="container">
    <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
          <div class="panel-heading"> Свежие объявления</div>
          
          <table class="table">
             <tr class="center">
                <td><b>Дата</b></td>
                <td><b>Категория</b></td>
                <td><b>Заголовок</b></td>
                <td><b>Город</b></td>
             </tr>
          <?php

          $result = mysqli_query($connection, "SELECT * FROM ads INNER JOIN category_tip ON ads.category=category_tip.id WHERE category=2");
          while ($row =mysqli_fetch_row($result)) {

            ?>
            <tr class="center">
              <td><? echo $row[1]; ?></td>
              <? echo $row[9]; ?>
              <td><a href="index2.php?id=<?php echo $row[0] ?>"><? echo $row[3]; ?></a></td>
              <td><? echo $row[4]; ?></td>
            </tr>
<?
}
?>          
          </table>
        </div>
      </div>
    </div>
  </div>
</section>