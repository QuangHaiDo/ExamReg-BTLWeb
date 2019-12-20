<?php
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if ($_SESSION["vaitro"] !== "user") header("location: index.php");
    } else header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <span class="navbar-text">
    trang danh cho student
  </span>
  <span> Nguoi dung: <?php echo $_SESSION["username"] ?> </span> 
<a href="logout.php" >Sign Out of Your Account</a>
</nav>

<div class="row">
    <div class="col-2">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="dang-ky-thi" data-toggle="tab" href="#dk-thi" role="tab" aria-controls="dk-thi" aria-selected="true">Dang ky thi</a>
        <a class="list-group-item list-group-item-action" id="in-dk-thi" data-toggle="tab" href="#in-dkthi" role="tab" aria-controls="in-dkthi" aria-selected="false">In dang ky thi</a>
       </div>
    </div>
    <div class="col-10">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade active show" id="dk-thi" role="tabpanel" aria-labelledby="dang-ky-thi">
            giao dien dang ky lich thi
        </div>
        <div class="tab-pane fade" id="in-dkthi" role="tabpanel" aria-labelledby="in-dk-thi">
            Giao dien in dang ky thi
        </div>
      </div>
    </div>
  </div>

</body>
<script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/bootstrap/js/bootstrap.js" type="text/javascript"></script>

</html>