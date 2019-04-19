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
  /* background-color: #111; */
  color: white;
  font-size: 25px;
}
.price .greenBackGround {
    background-color:#4CAF50
}

.price .blackBackGround {
    background-color:#111111
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

<h2 style="text-align:center">OUR PACKAGES</h2>
<!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->

<div class="container" style="maring-bottom:50px">  
  <?php include 'packages/index.html'; ?>
</div>





<?php //include 'footer.php'; ?>