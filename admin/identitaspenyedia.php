<?php
    if (empty($_SESSION['username'])) {
        header('location: loginadmin.php');
    }
    $username = $_SESSION['username'];
    $dapatid = $_GET['permintaan'];
    $identitas = "SELECT * FROM penyedia WHERE id_penyedia = $dapatid";
    $queryidentitas = mysqli_query($db, $identitas);
    $dapat = mysqli_fetch_array($queryidentitas);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Identitas penyedia</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <td style="padding: 30px"><b>Nama Orkes Dangdut </b></td>
                            <td style="padding: 30px"> <b>: </b></td>
                            <td style="padding: 30px"> <b><?php echo "$dapat[nama_orkes]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Alamat Orkes Dangdut </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$dapat[alamat]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Deskripsi Orkes Dangdut </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$dapat[deskripsi_orkes]"; ?></b></td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td style="padding: 30px"><b>KTP Penyedia </b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><img width="30%" src="<?php echo "../pengguna/gambar/ktp/".$dapat['ktp']; ?>"></td>
                        </tr>
                    </table>
                    <form method="POST" action="index.php?page=penyedia&permintaan=<?php echo($dapat['id_penyedia']) ?>">
                        <div style="padding: 30px">
                            <button name="tolakpenyedia" class="btn btn-lg btn-danger">Tolak</button>
                            <button name="setujui" class="btn btn-lg btn-success">Setujui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->