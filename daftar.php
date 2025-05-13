<!DOCTYPE html>
<html lang="id-ID">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $nama_website; ?></title>
  <meta name="description" content="<?php echo $isi1_judul_website; ?>">
  <meta name="keywords" content="slot">
  <meta property="og:title" content="<?php echo nama_website; ?>"/>
  <meta property="og:description" content="<?php echo $isi1_judul_website; ?>" />
  <meta property="og:url" content="<?php echo $alamat_website; ?>" />
  <meta name="resource-type" content="document" />
  <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="author" content="<?php echo $alamat_website; ?>" />
  <meta name="contact" content="<?php echo $alamat_website; ?>" />
  <meta name="copyright" content="Copyright (c) <?php echo $alamat_website; ?>. All Rights Reserved." />
  <meta name="robots" content="index, nofollow">


    <meta name="twitter:title" content="KING808 - Situs Bandar Judi Live Slot Online Terbaik Di Indonesia">

    <meta name="twitter:description" content="KING808 adalah agen judi slot online terpercaya di Indonesia dan gacor. Daftar Sekarang untuk bermain slot deposit pulsa tanpa potongan 25 Ribu Rupiah.">

    <meta property="og:title" content="KING808 - Situs Bandar Judi Live Slot Online Terbaik Di Indonesia">

    <meta property="og:description" content="KING808 adalah agen judi slot online terpercaya di Indonesia dan gacor. Daftar Sekarang untuk bermain slot deposit pulsa tanpa potongan 25 Ribu Rupiah.">

    <meta name="robots" content="INDEX, FOLLOW">

    <meta name="Content-Type" content="text/html">

    <meta name="twitter:card" content="summary">

    <meta name="og:type" content="website">

    <meta name="author" content="KING808">
</head>
</html>

<?php
  if (isset($_SESSION['id_akun'])) {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'");
      </script>
    ';
  }
?>

<form method="post">
  <div class="row gy-3 gx-0 justify-content-center align-items-center my-5">
    <div class="col-10 text-center btn-utama p-2">
      <span style="font-size: 18px;">Informasi Pribadi</span>
    </div>
    <div class="col-10 px-4">
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nama Pengguna <span style="color: #FF0000;">*</span></label>
        <input type="text" name="nama_pengguna_akun" class="form-control form-control-sm rounded-0 syarat-nama-pengguna" placeholder="Nama Pengguna Anda" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Kata Sandi <span style="color: #FF0000;">*</span></label>
        <div class="input-group input-group-sm">
          <input type="password" name="kata_sandi_akun" class="form-control rounded-0 border-end-0 syarat-kata-sandi" id="input-kata-sandi-daftar" placeholder="Kata Sandi Anda" required>
          <span class="input-group-text rounded-0 border-start-0" id="peralihan-kata-sandi-daftar" style="cursor: pointer; background-color: #FFFFFF!important;">
            <i id="kata-sandi-daftar" class="ri-eye-off-line"></i>
          </span>
        </div>
        <span id="notif-syarat-kata-sandi" style="color: #FF0000;"></span>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Ulangi Kata Sandi <span style="color: #FF0000;">*</span></label>
        <div class="input-group input-group-sm">
          <input type="password" name="kata_sandi_akun_2" class="form-control rounded-0 border-end-0 syarat-kata-sandi-2" id="input-kata-sandi-daftar-2" placeholder="Ulangi Kata Sandi Anda" required>
          <span class="input-group-text rounded-0 border-start-0" id="peralihan-kata-sandi-daftar-2" style="cursor: pointer; background-color: #FFFFFF!important;">
            <i id="kata-sandi-daftar-2" class="ri-eye-off-line"></i>
          </span>
        </div>
        <span id="notif-syarat-kata-sandi-2" style="color: #FF0000;"></span>
      </div>
      <div class="mb-3">
        Catatan:<br>
        *Password harus terdiri dari 8-20 karakter.<br>
        *Password harus mengandung setidaknya satu huruf besar, satu huruf kecil, dan satu angka.<br>
        *Password tidak boleh mengandung username.
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nama Lengkap <span style="color: #FF0000;">*</span></label>
        <input type="text" name="nama_lengkap_akun" class="form-control form-control-sm rounded-0 syarat-nama-lengkap" placeholder="Nama Lengkap Anda" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Email</label>
        <input type="email" name="email_akun" class="form-control form-control-sm rounded-0" placeholder="Email@example.com">
      </div>
      <div class="mb-3">
        Silakan masukkan email yang aktif untuk tujuan reset kata sandi.
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">No. Kontak <span style="color: #FF0000;">*</span></label>
        <input type="text" name="telepon_akun" class="form-control form-control-sm rounded-0" placeholder="Nomor Telepon Anda" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">WhatsApp <span style="color: #FF0000;">*</span></label>
        <input type="text" name="whatsapp_akun" class="form-control form-control-sm rounded-0" placeholder="WhatsApp No." required>
      </div>
    </div>
    <div class="col-10 text-center btn-utama p-2">
      <span style="font-size: 18px;">Informasi Pembayaran</span>
    </div>
    <div class="col-10 px-4">
      <div class="mb-3">
        <select class="form-select form-select-sm" name="rekening_anggota" required>
          <option selected>-- Pilih Jenis Pembayaran --</option>
          <?php
            $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening");
            while ($data_rekening = mysqli_fetch_array($query_rekening)) {
              $id_rekening = $data_rekening['id_rekening'];
              $kategori_rekening = $data_rekening['kategori_rekening'];
              $jenis_rekening = $data_rekening['jenis_rekening'];
              echo '<option value="'.$id_rekening.' '.$kategori_rekening.'">'.$jenis_rekening.'</option>';
            }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nama Rekening <span style="color: #FF0000;">*</span></label>
        <input type="text" name="nama_rekening_anggota" class="form-control form-control-sm rounded-0 syarat-nama-rekening" placeholder="Nama lengkap anda sesuai dengan buku tabungan" required>
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Nomor Rekening <span style="color: #FF0000;">*</span></label>
        <input type="text" name="nomor_rekening_anggota" class="form-control form-control-sm rounded-0" id="hanya-angka-2" placeholder="Nomor rekening anda" required>
      </div>
    </div>
    <div class="col-10 text-center btn-utama p-2">
      <span style="font-size: 18px;">Lainnya</span>
    </div>
    <div class="col-10 px-4">
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Kode Referensi</label>
        <input type="text" name="kode_referensi_akun" class="form-control form-control-sm rounded-0" placeholder="Kode Referensi (Optional)">
      </div>
      <div class="mb-3">
        <label class="form-label" style="font-size: 14px;">Kode Verifikasi <span style="color: #FF0000;">*</span></label>
        <div class="input-group input-group-sm">
          <input type="text" name="input_kode_verifikasi" class="form-control rounded-0" id="input-kode-verifikasi" placeholder="Validasi" required>
          <input type="text" name="kode_verifikasi" class="form-control rounded-0 border-end-0" id="kode-verifikasi" value="<?php echo generatorRangkaianAcak(6); ?>" readonly>
          <span class="input-group-text rounded-0 border-start-0" onclick="randomStringToInput(this)" style="cursor: pointer; background-color: #FFFFFF!important;">
            <i class="ri-refresh-line"></i>
          </span>
        </div>
        <span id="notif-kode-verifikasi" style="color: #FF0000;"></span>
      </div>
      <button type="submit" name="daftar" class="btn btn-utama my-3 w-100 sidebar-daftar">Daftar</button>
      <div class="text-center">
        Dengan meng-klik tombol DAFTAR, saya menyatakan bahwa saya berumur diatas 18 tahun dan telah membaca dan menyetujui syarat & ketentun PANDA138.
      </div>
    </div>
  </div>
</form>