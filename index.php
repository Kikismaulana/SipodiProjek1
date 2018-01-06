<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HOME | Sistem Penyewaan Orkes Dangdut Indramayu</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
    <nav id="myNavbar" class="navbar navbar-default" role="navigation" style="padding: 20px 20px 20px 20px; background-color: white">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    if (empty($_GET["page"])) {
                      echo "<a href='?page=home'><img src='gambar//LOGO1.png' width='140px' height='70px'></a>";
                    }
                    else
                    {
                      echo "<a href='?page=home'><img src='gambar//LOGO1.png' width='140px' height='70px'></a>";
                    }
                ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://www/Instagram.com/sipodi.polindra/?hI=id"><img src="gambar//Instagram.png" width="50px" height="50px"></a></li>
                    <li><a href="#"><img src="gambar//Twitter.png" width="50px" height="50px"></a></li>
                    <li><a href="https://www.facebook.com/sipodi.polindra.5"><img src="gambar//Facebook.png" width="50px" height="50px"></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="padding-top: 20px">
                    <?php
                    if (empty($_GET["page"])){
                        echo "<li class='active'><a href='?page=home'>Home</a></li>
                              <li><a href='?page=about'>About</a></li>
                              <li><a href='?page=contact'>Contact</a></li>";
                    }
                    elseif ($_GET["page"]=='home'){
                        echo "<li class='active'><a href='?page=home'>Home</a></li>
                              <li><a href='?page=about'>About</a></li>
                              <li><a href='?page=contact'>Contact</a></li>";
                    }
                    elseif ($_GET["page"]=='about'){
                        echo "<li><a href='?page=home'>Home</a></li>
                              <li class='active'><a href='?page=about'>About</a></li>
                              <li><a href='?page=contact'>Contact</a></li>";
                    }
                    elseif ($_GET['page']=='contact'){
                        echo "<li><a href='?page=home'>Home</a></li>
                              <li><a href='?page=about'>About</a></li>
                              <li class='active'><a href='?page=contact'>Contact</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php
      if (empty($_GET["page"])) {
        include "home.php";
      } elseif ($_GET['page'] == 'home') {
        include "home.php";
      } elseif ($_GET['page'] == 'about') {
        include "about.php";
      } elseif ($_GET['page'] == 'contact') {
        include "contact.php";
      } 
    ?>
    <div class="row" style="background-color: #2b7cff; color: white; padding-top: 10px">
        <div class="col-sm-12" align="center">
            <footer>
                <p>&copy Copyright 2017 Si PODI</p>
            </footer>
        </div>
    </div>
</body>
</html>