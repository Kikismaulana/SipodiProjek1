<?php include 'server.php'; ?>
    <div class="col-sm-12" style="height: 10px; background-color: #2b7cff"></div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                  <div class="item active">
                    <img src="gambar//home.jpg" style="width:100%;">
                  </div>
                  <?php
                  $tampil=mysqli_query($db, "SELECT * from penyedia");
                  while ($r=mysqli_fetch_array($tampil))
                  {
                    echo"
                  <div class='item'>
                    <img src='penyedia/gambar/sampul/$r[foto]' alt='Chicago' style='width:100%; height: 500px'>
                    <div class='carousel-caption'>
                      <h3>$r[nama_orkes]</h3>
                      <p>$r[deskripsi_orkes]</p>
                    </div>
                  </div>";
                }
                  ?>
          
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
    </div>

        <div class="row" style="background-color: #181e28; padding: 30px 50px 30px 20px; color: white">
            <div class="col-sm-12 col-md-9">
                <font size="6">Segera daftarkan diri anda untuk bisa booking <b>Orkes Dangdut !</b><br> Dan ciptakan bisnis yang moderen.</font>
            </div>
            <div class="col-sm-12 col-md-3" align="center" style="padding-top: 25px">
                <span style="padding-right: 20px"><a href="daftar.php"><button class="btn btn-lg btn-success">Daftar Sekarang !</button></a></span>
                <span><a href="login.php"><button class="btn btn-lg btn-primary">Masuk</button></a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="height: 10px; background-color: #2b7cff"></div>
        </div>
        <div class="row">
            <div class="col-sm-12" align="center" style="padding: 50px 200px 50px 200px">
                <p>Sistem Pemesanan Orkes Dangdut Indramayu atau bisa kita sebut Si PODI adalah jasa pelayanan untuk masyarakat umum.
                Sebagai alat untuk memesan/booking suatu hiburan Orkes Dangdut pada suatu acara hajat dan tentunya ini membuka peluang besar bagi anda sebagai Pimpinan Orkes Dangdut untuk mengembangkan pemasaran Grup Orkes anda !</p>
            </div>
        </div>