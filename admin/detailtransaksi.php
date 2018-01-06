<?php
    if (empty($_SESSION['username'])) {
        header('location: loginadmin.php');
    }
    $username = $_SESSION['username'];
    $dapetidtransaksi = $_GET['detail'];
    $sqldetail = "SELECT * FROM detail where id_transaksi = $dapetidtransaksi";
    $querydetail = mysqli_query($db,$sqldetail);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Identitas penyedia</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="padding-bottom: 100px">
                <div class="col-lg-12">
                    <?php while ($t = mysqli_fetch_array($querydetail)) { ?>
                    <table>
                        <tr>
                            <td style="padding: 30px"><b>Id Transaksi </b></td>
                            <td style="padding: 30px"> <b>: </b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[id_transaksi]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Tipe Panggung </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[tipe]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Nama Acara </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[nama_acara]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b> Tanggal</b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[tanggal]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Alamat </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[alamat]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Deskripsi Acara </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[deskripsi]"; ?></b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px"><b>Status Transaksi </b></td>
                            <td style="padding: 30px"> <b>:</b></td>
                            <td style="padding: 30px"> <b><?php echo "$t[keterangan]"; ?></b></td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td style="padding: 30px"><b>Bukti Transfer </b></td>
                        </tr>
                        <tr>
                            <td style="padding: 30px">
                            <?php if ($t['bukti_transfer']=="") { ?>
                                <img width="20%" src="../gambar/TF.png">
                            <?php } else { ?>
                                <img width="20%" src="<?php echo "../pengguna/gambar/buktitf/".$t['bukti_transfer']; ?>">
                            </td>
                            <?php } ?>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->