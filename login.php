<?php include ('server.php');  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style type="text/css" media="screen">
    .glyphicon-comment{
      font-size: 30px;
    }
    .glyphicon-bell{
      font-size: 30px;
    }
  </style>
</head>
<body>
    <div class="container" align="center">
      <div style="padding-top: 40px">
        <a href="index.php?page=home"><img src="gambar//logo1.png" width="300px" height="150px"></a>
        <div style="box-shadow: 0px -4px 5px -4px black; padding: 10px 0px 1px 0px"></div>
        <h3><b>Masuk Sistem Pemesanan Orkes Dangdut Indramayu</b></h3><br>
        <p>Belum punya akun Si PODI ? daftar
        <a href="daftar.php">disini</a>
      </p>
      </div>
    <form style="padding-bottom: 40px" action="login.php" method="POST">
      <div style="width: 50%"><?php include ('errors.php'); ?></div>
        <div class="form-group" align="center">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" placeholder="Masukkan Email" name="email" required="" style="width: 35%">
        </div>
        <div class="form-group" align="center">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" placeholder="Masukkan Password" required="" name="password" style="width: 35%">
        </div>
        <div class="form-group">
          <button style="width: 35%" class="btn btn-lg btn-success" name="masuk"><b>MASUK</b></button>
        </div>
    </form>
  </div>
    <div class="row" style="box-shadow: 0px -4px 5px -4px black; padding: 20px 0px 20px 0px">
        <div class="container">
            <div class="col-sm-12">
                <footer>
                    <font>&copy Copyright 2017 Si Podi</font>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>