<?php
$kd = "WD-";
?>

<?php
  if (isset($_GET['kategori_rekening'])) {
    $kategori_rekening_aktif = $_GET['kategori_rekening'];
  } else {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'withdraw/bank");
      </script>
    ';
  }
  if ($_POST['jumlah_withdraw']) {
    $id_akun_withdraw = $id_akun_masuk;
    $kode_withdraw = $kd.(generatorRangkaianAcak(10));
    $kategori_rekening_withdraw = $kategori_rekening_aktif;
    $id_rekening_anggota_withdraw = $_POST['id_rekening_anggota_withdraw'];
    $jumlah_withdraw = $_POST['jumlah_withdraw'];
    $tanggal_withdraw = date("Y-m-d H:i:s");
      if($jumlah_withdraw < 50000) {
      echo '
        <script>
          alert("Penarikan Minimal Sebesar Rp 50.000!");
        </script>';
     } else if ($total_saldo < $jumlah_withdraw) {
     echo '
         <script>
          alert("Saldo Anda Tidak Mencukupi");
        </script>';
    } else {
     if (isset($_POST['withdraw'])) {
    $id_akun_withdraw = $id_akun_masuk;
    $kode_withdraw = $kd.(generatorRangkaianAcak(10));
    $kategori_rekening_withdraw = $kategori_rekening_aktif;
    $id_rekening_anggota_withdraw = $_POST['id_rekening_anggota_withdraw'];
    $jumlah_withdraw = $_POST['jumlah_withdraw'];
    $tanggal_withdraw = date("Y-m-d H:i:s");
    $withdraw = mysqli_query($koneksi, "INSERT INTO withdraw (id_akun_withdraw, kode_withdraw, kategori_rekening_withdraw, id_rekening_anggota_withdraw, jumlah_withdraw, tanggal_withdraw) VALUES ('$id_akun_withdraw', '$kode_withdraw', '$kategori_rekening_withdraw', '$id_rekening_anggota_withdraw', '$jumlah_withdraw', '$tanggal_withdraw')");
    if ($withdraw)
{
     echo '
       <script>
         alert("Penarikan Telah Behasil");
     window.location.replace("riwayat_withdraw");
       </script>';
        }
      }
    }
  }
?>


<form method="post">
  <div class="row gy-2 gx-0">
    <div class="col-6">
      <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-flex justify-content-center align-items-center text-uppercase mx-3 p-2">
        <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/deposit.svg" alt="Deposit" width="25" height="25" class="me-2">
        Deposit
      </a>
    </div>
    <div class="col-6">
      <a href="<?php echo $alamat_website.'withdraw'; ?>" class="d-flex justify-content-center align-items-center text-uppercase  btn-utama mx-3 p-2">
        <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/withdrawal.svg" alt="Withdraw" width="25" height="25" class="me-2">
        Withdraw
      </a>
    </div>
  </div>
  <div class="row gy-2 gx-0 d-flex justify-content-center align-items-center mt-5">
    <div class="col-10">
      <div class="deposit-note">
        <div class="deposit-note-icon">
          <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/deposit-note.svg" alt="Deposit Note">
        </div>
        <div class="deposit-note-content">
          <span>Catatan:</span>
          <ol>
            <li>Silahkan dicek kembali, Pastikan Nomor Rekening sesuai dengan Nama Akun Terdaftar.</li>
            <li>Apabila terjadi kesalahan Penulisan Rekening, Silahkan Hubungi CS.</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="col-10">
      <a href="<?php echo $alamat_website.'riwayat_withdraw'; ?>" class="d-block text-center text-secondary text-decoration-underline" style="font-size: 14px;">Riwayat Withdraw</a>
    </div>

    <div class="col-10">
      <div class="d-flex justify-content-between align-items-center">

        <div class="d-flex flex-column align-items-end">
          <span class="text-secondary">TOTAL SALDO</span>
          <span style="color: #bda270;"><?php echo number_format($total_saldo).'.00'; ?></span>
        </div>
      </div>
    </div>

<div class="col-10">
      <div class="bg-dark rounded p-2">
        <span class="d-block mb-2" style="font-size: 14px;">Metode Pembayaran</span>
        <div class="row g-2">
          <div class="col-4">
            <a href="<?php echo $alamat_website.'withdraw/bank'; ?>">
              <?php
                if ($kategori_rekening_aktif == "bank") {
                  echo '<div class="d-flex flex-column align-items-center kotak-pembayaran-aktif rounded p-2">';
                } else {
                  echo '<div class="d-flex flex-column align-items-center kotak-pembayaran rounded p-2">';
                }
              ?>
                <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/bank.svg" alt="Bank" width="25" height="25">
                <span style="font-size: 14px;">Bank</span>
              </div>
            </a>
          </div>
          <div class="col-4">
            <a href="<?php echo $alamat_website.'withdraw/emoney'; ?>">
              <?php
                if ($kategori_rekening_aktif == "emoney") {

                echo '<div class="d-flex flex-column align-items-center kotak-pembayaran-aktif rounded p-2">';
                } else {
                echo '<div class="d-flex flex-column align-items-center kotak-pembayaran rounded p-2">';
                }
              ?>
                <img src="<?php echo $alamat_website_admin; ?>assets/images/svg/emoney.svg" alt="Bank" width="25" height="25">
                <span style="font-size: 14px;">E-Money</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-10">
      <div class="bg-dark rounded p-2">
        <span class="d-block mb-2" style="font-size: 14px;">Jumlah</span>
        <input type="text" name="jumlah_withdraw" class="form-control rounded-0 border-0 mb-2" id="hanya-angka" autocomplete="off" placeholder="Minimal Penarikan (Rp 50.000)" required>
        <span class="d-block" id="notif-nominal" style="color: #FF0000;">Silahkan masukan angka untuk jumlah Withdraw.</span>
        <span class="d-block" style="font-size: 14px;">Jumlah yang akan diterima</span>
        <span class="d-block" id="nominal" style="font-size: 24px;">0 (IDR)</span>
      </div>
    </div>
    <div class="col-10">
      <div class="bg-dark rounded p-2">
        <span class="d-block mb-2" style="font-size: 14px;">Akun Asal</span>
        <select class="form-select rounded-0" name="id_rekening_anggota_withdraw" style="font-size: 12px;">
          <?php
            $query_rekening_anggota = mysqli_query($koneksi, "SELECT * FROM rekening_anggota WHERE id_akun_rekening_anggota = '$id_akun_masuk' AND kategori_rekening_anggota = '$kategori_rekening_aktif'");
            $cek_rekening_anggota = mysqli_num_rows($query_rekening_anggota);
            if ($cek_rekening_anggota > 0) {
              while ($data_rekening_anggota = mysqli_fetch_array($query_rekening_anggota)) {
                $id_rekening_anggota = $data_rekening_anggota['id_rekening_anggota'];
                $id_rekening_rekening_anggota = $data_rekening_anggota['id_rekening_rekening_anggota'];
                $nama_rekening_anggota = $data_rekening_anggota['nama_rekening_anggota'];
                $nomor_rekening_anggota = $data_rekening_anggota['nomor_rekening_anggota'];
                $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_anggota'");
                $data_rekening = mysqli_fetch_array($query_rekening);
                $kategori_rekening = $data_rekening['kategori_rekening'];
                $jenis_rekening = $data_rekening['jenis_rekening'];

                echo '<option value="'.$id_rekening_anggota.'">'.$jenis_rekening.' | '.$nomor_rekening_anggota.'</option>';
              }

            }
          ?>
     
        </select>
      </div>
    </div>

    <div class="col-10">
      <button type="submit" name="withdraw" class="btn btn-utama w-100 text-uppercase py-3" style="font-size: 12px;">Withdraw</button>
    </div>
  </div>
</form>