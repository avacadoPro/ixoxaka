<?php
include 'header.php';



require 'archon/packages/classes/packagesDAL.php';
$packages_db=new packagesDAL(include('dbConfig.php'));
$packages=$packages_db->LoadAll();


?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">Packeges</div>
</div>


<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>

<h2 style="text-align:center">Packeges Pricing</h2>
<!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->

<div class="container" style="maring-bottom:50px">
<?php foreach ($packages as $key => $value) {
  $personalLockerTemp=($value['personalLocker']==true)?"<i class='fas fa-check-circle' style='color:#4CAF50'></i>":"<i class='far fa-check-circle'></i>";
  $freeAccessTemp=($value['freeAccess']==true)?"<i class='fas fa-check-circle' style='color:#4CAF50'></i>":"<i class='far fa-check-circle'></i>";
  $personalTrainerTemp=($value['personalTrainer']==true)?"<i class='fas fa-check-circle' style='color:#4CAF50'></i>":"<i class='far fa-check-circle'></i>";
  $NutritionPlanTemp=($value['NutritionPlan']==true)?"<i class='fas fa-check-circle' style='color:#4CAF50'></i>":"<i class='far fa-check-circle'></i>";
  $FreeMassageTemp=($value['FreeMassage']==true)?"<i class='fas fa-check-circle' style='color:#4CAF50'></i>":"<i class='far fa-check-circle'></i>";
  ?> 
  <div class="columns">
    <ul class="price">
      <li class="header"  <?php echo ($key % 2 == 0) ? "" : "style='background-color:#4CAF50'" ?>><?php echo $value['title']; ?></li>
      <li class="grey"> <?php echo $value['price']; ?> / <?php echo $value['type']; ?></li>
      <li> <?php echo $personalLockerTemp; ?> Personal Locker</li>
      <li> <?php echo $freeAccessTemp; ?> Free Access</li>
      <li> <?php echo $personalTrainerTemp; ?> Personal Trainer</li>
      <li> <?php echo $NutritionPlanTemp; ?> Nutrition Plan</li>
      <li> <?php echo $FreeMassageTemp; ?> Free Locker</li>
      <li class="grey"><a href="#" class="button">Getting Started</a></li>
    </ul>
  </div>
<?php }?>
</div>





<?php include 'footer.php'; ?>