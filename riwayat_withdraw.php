<?php
  if (isset($_POST['cari_riwayat_withdraw'])) {
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    echo '
      <script>
        window.location.replace("'.$alamat_website.'riwayat_withdraw/filter/'.$tanggal_awal.'/'.$tanggal_akhir.'");
      </script>
    ';
  }
?>

<form method="post">
  <div class="row gy-3 gx-0 mb-3">
    <div class="col-6">
      <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-flex justify-content-center align-items-center text-uppercasemx-3 p-2">
        <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/deposit.svg" alt="Deposit" width="25" height="25" class="me-2">
        Deposit
      </a>
    </div>
    <div class="col-6">
      <a href="<?php echo $alamat_website.'withdraw'; ?>" class="d-flex justify-content-center align-items-center text-uppercase btn-utama mx-3 p-2">
        <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/withdrawal.svg" alt="Withdraw" width="25" height="25" class="me-2">
        Withdraw
      </a>
    </div>
    <div class="col-6 ps-2 pe-1">
      <span class="d-block mb-2" style="font-size: 14px;">Tanggal Awal</span>
      <input type="text" name="tanggal_awal" class="form-control rounded-pill tanggal-awal" value="<?php echo date("Y-m-d"); ?>" style="font-size: 12px;">
    </div>
    <div class="col-6 ps-1 pe-2">
      <span class="d-block mb-2" style="font-size: 14px;">Tanggal Akhir</span>
      <input type="text" name="tanggal_akhir" class="form-control rounded-pill tanggal-awal" value="<?php echo date("Y-m-d"); ?>" style="font-size: 12px;">
    </div>
    <div class="col-12 px-2">
      <button type="submit" name="cari_riwayat_withdraw" class="btn btn-utama rounded-pill text-uppercase py-2 w-100" style="font-size: 12px;">Cari</button>
    </div>
  </div>
</form>
<div class="table-responsive p-2">
  <table class="table table-dark table-bordered align-middle" id="riwayat" style="width:100%">
    <thead>
      <tr>
        <th scope="col">Kode</th>
        <th scope="col">Jenis Pembayaran</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($_GET['tanggal_awal']) || isset($_GET['tanggal_akhir'])) {
          $tanggal_awal = $_GET['tanggal_awal'];
          $tanggal_akhir = $_GET['tanggal_akhir'];
          $withdraw = mysqli_query($koneksi, "SELECT * FROM withdraw WHERE id_akun_withdraw = '$id_akun_masuk' AND tanggal_withdraw BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY id_withdraw DESC");
        } else {
          $withdraw = mysqli_query($koneksi, "SELECT * FROM withdraw WHERE id_akun_withdraw = '$id_akun_masuk' ORDER BY id_withdraw DESC");
        }
        while ($data_withdraw = mysqli_fetch_array($withdraw)) {
          $id_withdraw = $data_withdraw['id_withdraw'];
          $kode_withdraw = $data_withdraw['kode_withdraw'];
          $kategori_rekening_withdraw = $data_withdraw['kategori_rekening_withdraw'];
          $id_rekening_anggota_withdraw = $data_withdraw['id_rekening_anggota_withdraw'];
          $jumlah_withdraw = $data_withdraw['jumlah_withdraw'];
          $tanggal_withdraw = $data_withdraw['tanggal_withdraw'];
          $status_withdraw = $data_withdraw['status_withdraw'];
          $explode_tanggal = explode(" ", $tanggal_withdraw);
          $tanggal_deposit_fix = $explode_tanggal[0];
          $jam_withdraw_fix = $explode_tanggal[1];
      ?>
      <tr>
        <th scope="row"><?php echo $kode_withdraw; ?></th>
        <td><?php echo strtoupper($kategori_rekening_withdraw); ?></td>
        <td><?php echo number_format($jumlah_withdraw); ?></td>

        <td><?php echo jamTanggalIndonesia($tanggal_withdraw, true); ?></td>
        <td>
          <?php
            if ($status_withdraw == "proses") {
              echo '<span class="text-warning">Tertunda</span>';
            } else if ($status_withdraw == "batal") {
              echo '<span class="text-danger">Ditolak</span>';
            } else if ($status_withdraw == "selesai") {
              echo '<span class="text-success">Selesai</span>';
            }
          ?>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>