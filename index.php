<?php
  session_start();
  include_once "mimintop/modul/koneksi.php";
  include_once "mimintop/modul/fungsi_umum.php";
  include_once "mimintop/modul/query_pengaturan.php";
  if (!isset($_GET['halaman'])) {
    echo '
      <script>
        window.location.replace("'.$alamat_website.'beranda");
      </script>
    ';
  } else if (isset($_SESSION['id_akun'])) {
    $id_akun_masuk = $_SESSION['id_akun'];
    $query_akun_masuk = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_masuk'");
    $data_akun_masuk = mysqli_fetch_array($query_akun_masuk);
    $nama_lengkap_akun_masuk = $data_akun_masuk['nama_lengkap_akun'];
    $nama_pengguna_akun_masuk = $data_akun_masuk['nama_pengguna_akun'];
    $kata_sandi_akun_masuk = $data_akun_masuk['kata_sandi_akun'];
    $email_akun_masuk = $data_akun_masuk['email_akun'];
    $telepon_akun_masuk = $data_akun_masuk['telepon_akun'];
    $whatsapp_akun_masuk = $data_akun_masuk['whatsapp_akun'];
    $kode_referensi_akun_masuk = $data_akun_masuk['kode_referensi_akun'];
    $level_akun_masuk = $data_akun_masuk['level_akun'];
    $status_akun_masuk = $data_akun_masuk['status_akun'];

    $saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_akun_saldo = '$id_akun_masuk'");
    $data_saldo = mysqli_fetch_array($saldo);
    $id_saldo = $data_saldo['id_saldo'];
    $total_saldo = $data_saldo['total_saldo'];
  } else if (isset($_POST['masuk'])) {
    $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
    $kata_sandi_akun = $_POST['kata_sandi_akun'];
    $query_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
    $cek_akun = mysqli_num_rows($query_akun);
    if ($cek_akun > 0) {
      $data_akun = mysqli_fetch_array($query_akun);
      $id_akun = $data_akun['id_akun'];
      $status_akun = $data_akun['status_akun'];
      if ($status_akun == "Aktif") {
        $_SESSION['id_akun'] = $id_akun;
        echo '
          <script>
            window.location.replace("'.$alamat_website.'");
          </script>
        ';
      } else {
        echo '
          <script>
            alert("Akun anda tidak aktif silahkan hubungi admin!");
            window.location.replace("'.$alamat_website.'");
          </script>
        ';
      }
    } else {
      echo '
        <script>
          alert("Akun tidak ditemukan, periksa lagi!");
          window.location.replace("'.$alamat_website.'masuk");
        </script>
      ';
    }
  } else if (isset($_POST['daftar'])) {
    $nama_lengkap_akun = $_POST['nama_lengkap_akun'];
    $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
    $kata_sandi_akun = $_POST['kata_sandi_akun'];
    $email_akun = $_POST['email_akun'];
    $telepon_akun = $_POST['telepon_akun'];
    $whatsapp_akun = $_POST['whatsapp_akun'];
    $kode_referensi_akun = $_POST['kode_referensi_akun'];
    $rekening_anggota = explode(" ", $_POST['rekening_anggota']);
    $id_rekening_rekening_anggota = $rekening_anggota[0];
    $kategori_rekening_anggota = $rekening_anggota[1];
    $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
    $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
    $input_kode_verifikasi = $_POST['input_kode_verifikasi'];
    $kode_verifikasi = $_POST['kode_verifikasi'];
    $cek_nama_pengguna = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun'");
    $jumlah_nama_pengguna = mysqli_num_rows($cek_nama_pengguna);
    if ($jumlah_nama_pengguna > 0) {
      echo '
        <script>
          alert("Nama pengguna sudah terdaftar, gunakan yang lainnya!");
        </script>
      ';
    } else {
      if ($input_kode_verifikasi != $kode_verifikasi) {
        echo '
          <script>
            alert("Kode verifikasi salah!");
          </script>
        ';
      } else {
        $daftar = mysqli_query($koneksi, "INSERT INTO akun (nama_lengkap_akun, nama_pengguna_akun, kata_sandi_akun, email_akun, telepon_akun, whatsapp_akun, kode_referensi_akun) VALUES ('$nama_lengkap_akun', '$nama_pengguna_akun', '$kata_sandi_akun', '$email_akun', '$telepon_akun', '$whatsapp_akun', '$kode_referensi_akun')");
        if ($daftar) {
          $akun_baru = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
          $data_akun_baru = mysqli_fetch_array($akun_baru);
          $id_akun_baru = $data_akun_baru['id_akun'];
          $daftar_rekening = mysqli_query($koneksi, "INSERT INTO rekening_anggota (id_akun_rekening_anggota, kategori_rekening_anggota, id_rekening_rekening_anggota, nama_rekening_anggota, nomor_rekening_anggota) VALUES ('$id_akun_baru', '$kategori_rekening_anggota', '$id_rekening_rekening_anggota', '$nama_rekening_anggota', '$nomor_rekening_anggota')");
          if ($daftar_rekening) {
            $saldo = mysqli_query($koneksi, "INSERT INTO saldo (id_akun_saldo, total_saldo) VALUES ('$id_akun_baru', '0')");
            if ($saldo) {
              echo '
                <script>
                  alert("Pendaftaran berhasil, silahkan masuk");
                  window.location.replace("'.$alamat_website.'masuk");
                </script>
              ';
            } else {
              echo "Proses Gagal<br>Error : ".$saldo."<br>".mysqli_error($koneksi);
            }
          } else {
            echo "Proses Gagal<br>Error : ".$daftar_rekening."<br>".mysqli_error($koneksi);
          }
        } else {
          echo "Proses Gagal<br>Error : ".$daftar."<br>".mysqli_error($koneksi);
        }
      }
    }
  }

  $ip_pengunjung = ipPengunjung();
  $tanggal_pengunjung = date("j");
  $bulan_pengunjung = date("n");
  $tahun_pengunjung = date("Y");
  $cek_pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE ip_pengunjung = '$ip_pengunjung'");
  $jumlah_pengunjung = mysqli_num_rows($cek_pengunjung);
  if ($jumlah_pengunjung == 0) {
    $tambah_pengunjung = mysqli_query($koneksi, "INSERT INTO pengunjung (ip_pengunjung, tanggal_pengunjung, bulan_pengunjung, tahun_pengunjung) VALUES ('$ip_pengunjung', '$tanggal_pengunjung', '$bulan_pengunjung', '$tahun_pengunjung')");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $nama_website; ?> - <?php echo $isi1_judul_website; ?></title>
  <meta name="description" content="<?php echo $isi1_judul_website; ?>">
  <meta name="keywords" content="slot">
  <meta property="og:title" content="<?php echo $nama_website; ?>"/>
  <meta property="og:description" content="<?php echo $isi1_judul_website; ?>" />
  <meta content="Daftar Situs Agen Judi Online Terpercaya, Bandar Taruhan Bola, Game Slot terbaik, Slot gacor, Togel Online, Live Casino bisa Deposit Via Pulsa, dan OVO" name=description>
  <meta property="og:url" content="<?php echo $alamat_website; ?>" />
  <meta name="resource-type" content="document" />
  <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="author" content="<?php echo $alamat_website; ?>" />
  <meta name="contact" content="<?php echo $alamat_website; ?>" />
  <meta name="copyright" content="Copyright (c) <?php echo $alamat_website; ?>. All Rights Reserved." />
  <meta name="robots" content="index, nofollow">

  <!-- Font -->
  <link rel=preload href=<?php echo $alamat_website_admin; ?>assets/fonts/digital_sans_ef_medium.woff2 as=font type=font/woff2 crossorigin>
  <link rel=preload href=<?php echo $alamat_website_admin; ?>assets/fonts/advanced_dot_digital7.woff2 as=font type=font/woff2 crossorigin>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo $alamat_website_admin; ?>/assets/images/<?php echo $isi1_favicon; ?>">
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="<?php echo $alamat_website_admin; ?>assets/libs/bootstrap/css/bootstrap.min.css">
  <!-- Icon CSS -->
  <link href="<?php echo $alamat_website_admin; ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="<?php echo $alamat_website_admin; ?>assets/libs/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo $alamat_website_admin; ?>assets/libs/owl-carousel/assets/owl.theme.default.min.css">
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="<?php echo $alamat_website_admin; ?>assets/libs/flatpickr/flatpickr.min.css">
  <!-- Datatables Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
  <!-- Page CSS -->
  
  


  <style>
    @font-face {
      font-family: digital_sans_ef_medium;
      src: url(<?php echo $alamat_website_admin; ?>assets/fonts/digital_sans_ef_medium.woff2);
    }
    @font-face {
      font-family: advanced_dot_digital7;
      src: url(<?php echo $alamat_website_admin; ?>assets/fonts/advanced_dot_digital7.woff2);
    }
    body {
      background: #0A0A0A;
      color: #FFFFFF;
      font-family: 'digital_sans_ef_medium';
      font-size: 12px;
    }
    a {
      color: #FFFFFF;
      text-decoration: none;
    }
    a:hover {
      color: #FFFFFF;
    }
    .bg-king {
      background: #1E1E1E;
    }
    .btn-utama {
      background: linear-gradient(to bottom,#bda270 0%,#675a43 100%);
    }
    .bg-footer {
      background: #5F481F;
    }
    .bg-utama {
      background-color: <?php echo $isi1_warna_utama; ?>;
    }
    .text-utama {
      color: #bda270;
    }
    .my-svg {
    fill: #bda270;
    }
    /* Counter USD Jackpot */
    .container-usd-jackpot-counter {
      background: center no-repeat;
      background-size: contain;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      height: 120px;
      padding-bottom: 30px;
    }
    .usd-jackpot-counter {
      color: #03ffd8;
      font-size: 12px;
      font-family: 'advanced_dot_digital7';
      margin: 0 0 15px 100px;
    }
    /* Owl Carousel */
    .owl-dots {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%)!important;
    }
    .owl-theme .owl-dots .owl-dot span {
      margin: 1px!important;
      background: none!important;
      border: 1px solid #FFFFFF!important;
    }
    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
      background: #FFFFFF!important;
    }
    /* Unduh APK */
    .container-unduh-apk {
      background-size: cover;
      font-family: sans-serif;
    }
    .container-unduh-apk>div {
      flex-basis: 50%;
      text-align: center;
      opacity: 0;
      transition: all 1s ease;
    }
    .container-unduh-apk>div:nth-child(1) {
      align-self: flex-end;
      transform: translateX(100%);
    }
    .container-unduh-apk h2 {
      font-size: 18px;
      font-weight: 600;
      text-transform: uppercase;
      margin: 0;
    }
    .container-unduh-apk h3 {
      font-size: 11px;
      font-weight: 100;
      margin: 0;
    }
    .info-unduh-apk {
      display: flex;
      justify-content: center;
      padding: 7px 0;
    }
    .info-unduh-apk>div {
      flex-basis: 45%;
      max-width: 45%;
    }
    .section-unduh-apk {
      text-align: center;
      margin-right: 5px;
    }
    .section-unduh-apk img {
      width: 45%;
      margin: auto auto 5px auto;
    }
    .section-unduh-apk a {
      color: #FFFFFF;
      text-transform: uppercase;
      padding: 2px 0;
      display: block;
      border-radius: 20px;
      text-align: center;
      text-decoration: none;
      font-size: 11px;
      background: linear-gradient(to bottom,#ff1300 0%,#9a0f04 100%);
    }
    .container-masuk-daftar {
      display: flex;
    }
    .container-masuk-daftar a {
      flex-basis: 50%;
      padding: 14px 20px;
      text-align: center;
      line-height: 1;
      text-decoration: none;
      font-size: 18px;
      color: #FFFFFF;
    }
    .container-masuk-daftar a.masuk {
      background: linear-gradient(to bottom,#6a6a6a 0%,#464646 100%);
    }
    .container-masuk-daftar a.daftar {
      background: linear-gradient(to bottom,#bda270 0%,#675a43 100%);
    }
    .img-pembayaran {
      position: relative;
    }
    .img-pembayaran:before {
      content: '';
      position: absolute;
      top: 0;
      left: -10px;
      bottom: 0;
      width: 5px;
      border-radius: 2px;
      background-color: #00FF00;
    }
    .hub-kami {
      margin-bottom: 25px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .hub-kami>a {
      color: #FFFFFF;
      width: 100%;
      background-size: cover;
      margin-bottom: 15px;
      min-height: 160px;
      padding: 20px 15px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      text-decoration: none;
      border-radius: 20px;
      border: 1px solid #4A0A0A;
    }
    .hub-kami>a>h3 {
      font-size: 16px;
      font-weight: 500;
      margin: 0 0 10px;
      text-transform: uppercase;
    }
    .hub-kami>a>h6 {
      font-size: 12px;
      margin: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      text-transform: uppercase;
    }
    .hub-kami>a>h6>i {
      font-size: 18px;
      font-weight: 800;
    }
    .user-menu {
      background-color: #4A0A0A;
      background-image: linear-gradient(to bottom,#6F6D6D 100%,#100 30%);
      display: flex;
      justify-content: space-around;
      font-size: 10px;
      overflow: hidden;
    }
    .user-menu .user-menu-item {
      flex-basis: initial;
      flex: 1;
      margin: 10px 0;
      padding: 0 10px;
      flex-basis: 22%;
    }
    .user-menu .user-menu-item>a {
      color: #FFFFFF;
      text-decoration: none;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      flex-direction: column;
      height: 100%;
      white-space: nowrap;
    }
    .user-menu .user-menu-item>a>img {
      width: 20px;
      height: 20px;
      margin-bottom: 5px;
      vertical-align: middle;
      border: 0;
    }
    .deposit-note {
      color: #6AFF1A;
      display: flex;
      align-items: stretch;
      line-height: 19px;
      margin-bottom: 15px;
    }
    .deposit-note-icon {
      flex-basis: 20%;
      display: flex;
      justify-content: center;
      align-items: center;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      padding: 10px;
      background: linear-gradient(to bottom,#787880,#42424f);
    }
    .deposit-note-icon img {
      width: 35px;
    }
    .deposit-note-content {
      flex-basis: 80%;
      background-color: #CBCBCB;
      color: #363565;
      padding: 10px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }
    .kotak-pembayaran {
      background-color: #CBCBCB;
      color: #000000;
      cursor: pointer;
    }
    .kotak-pembayaran-aktif {
      background-color: #675a43;
      background-image: linear-gradient(to bottom,#bda270 0%,#675a43 100%);
      cursor: pointer;
    }
    .kotak-pembayaran-aktif img {
      filter: brightness(0) invert(1);
    }
    .bank-info {
      background-color: #919197;
      background-image: linear-gradient(to bottom,#919197 0%,#444352 100%);
    }
    .bank-info hr {
      border-top: 1px solid #000000;
      border-bottom: 1px solid #393939;
      margin: 10px 0;
      width: 100%;
    }
    .floating-whatsapp {
      text-decoration: none;
      position: fixed;
      bottom: 20px;
      left: 20px;
      width: 50px;
      height: 100px;
      z-index: 9999;
    }
    .floating-whatsapp:before {
      content: "";
      background-repeat: no-repeat;
      background-size: 34px 34px;
      background-position: center center;
      width: 50px;
      height: 50px;
      background-image: url("data:image/svg+xml;charset=utf8,%3csvg viewBox='0 0 24 24' width='32' height='32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3e%3cg%3e%3cpath style='fill:%23ffffff' d='M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,14 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z'%3e%3c/path%3e%3c/g%3e%3c/svg%3e");
      background-color: #00C853;
      position: absolute;
      top: 0;
      left: 0;
      border-radius: 100%;
      box-shadow: 0 1px 1.5px 0 rgb(0 0 0 / 12%), 0 1px 1px 0 rgb(0 0 0 / 24%);
    }
    .animation-1 {
      -webkit-animation: rubberBand 1s linear 1s infinite normal;
      animation: rubberBand 1s linear 1s infinite normal;
    }
    @keyframes rubberBand {
      10% {
        -webkit-transform: scale3d(1,1,1);
        transform: scale3d(1,1,1)
      }
      30% {
        -webkit-transform: scale3d(1.25,.75,1);
        transform: scale3d(1.25,.75,1)
      }
      40% {
        -webkit-transform: scale3d(.75,1.25,1);
        transform: scale3d(.75,1.25,1)
      }
      50% {
        -webkit-transform: scale3d(1.15,.85,1);
        transform: scale3d(1.15,.85,1)
      }
      65% {
        -webkit-transform: scale3d(.95,1.05,1);
        transform: scale3d(.95,1.05,1)
      }
      75% {
        -webkit-transform: scale3d(1.05,.95,1);
        transform: scale3d(1.05,.95,1)
      }
    }
    @-webkit-keyframes rubberBand {
      0%,
      100% {
        -webkit-transform: scale3d(1,1,1);
        transform: scale3d(1,1,1)
      }
      30% {
        -webkit-transform: scale3d(1.25,.75,1);
        transform: scale3d(1.25,.75,1)
      }
      40% {
        -webkit-transform: scale3d(.75,1.25,1);
        transform: scale3d(.75,1.25,1)
      }
      50% {
        -webkit-transform: scale3d(1.15,.85,1);
        transform: scale3d(1.15,.85,1)
      }
      65% {
        -webkit-transform: scale3d(.95,1.05,1);
        transform: scale3d(.95,1.05,1)
      }
      75% {
        -webkit-transform: scale3d(1.05,.95,1);
        transform: scale3d(1.05,.95,1)
      }
    }
    .floating-lainnya {
      position: fixed;
      bottom: 150px;
      left: 5px;
      z-index: 10;
    }
  </style>
  
</head>
<body>
    

    
  <div class="fixed-top">
    <div class="container-fluid bg-king position-relative p-3">
      <a href="<?php echo $alamat_website.'beranda'; ?>" class="d-block">
        <img src="<?php echo $alamat_website_admin; ?>assets/images/<?php echo $isi1_logo; ?>" alt="Logo" height="35" class="float-left mr-3">
      </a>
      <div class="position-absolute top-50 end-0 translate-middle-y fs-3 me-3 text-utama" data-bs-toggle="offcanvas" data-bs-target="#menunya">
        <i class="ri-menu-3-line"></i>
      </div>
    </div>
  </div>
  <div class="container-fluid px-0" style="padding: 5rem 0;">
    <?php
      include_once "mimintop/modul/sidebar.php";

      if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == "beranda") {
          include_once "beranda.php";
        } else if ($_GET['halaman'] == "masuk") {
          include_once "masuk.php";
        } else if ($_GET['halaman'] == "daftar") {
          include_once "daftar.php";
        } else if ($_GET['halaman'] == "promosi") {
          include_once "promosi.php";
        } else if ($_GET['halaman'] == "hub_kami") {
          include_once "hub_kami.php";
        } else if ($_GET['halaman'] == "pusat_bantuan") {
          include_once "pusat_bantuan.php";
        } else if ($_GET['halaman'] == "syarat_dan_ketentuan") {
          include_once "syarat_dan_ketentuan.php";
        } else if ($_GET['halaman'] == "responsible_gaming") {
          include_once "responsible_gaming.php";
        } else if ($_GET['halaman'] == "tentang") {
          include_once "tentang.php";
        } else if ($_GET['halaman'] == "deposit") {
          include_once "deposit.php";
        } else if ($_GET['halaman'] == "deposit/qris") {
          include_once "qris.php";
        } else if ($_GET['halaman'] == "withdraw") {
          include_once "withdraw.php";
        } else if ($_GET['halaman'] == "rekening") {
          include_once "rekening.php";
        } else if ($_GET['halaman'] == "riwayat_deposit") {
          include_once "riwayat_deposit.php";
        } else if ($_GET['halaman'] == "riwayat_withdraw") {
          include_once "riwayat_withdraw.php";
        } else if ($_GET['halaman'] == "akun_saya") {
          include_once "akun_saya.php";
        } else if ($_GET['halaman'] == "ubah_kata_sandi") {
          include_once "ubah_kata_sandi.php";
        } else if ($_GET['halaman'] == "profil_saya") {
          include_once "profil_saya.php";
        } else if ($_GET['halaman'] == "games") {
          include_once "games.php";
        }
      } else if (isset($_GET['link_menu_games']) || isset($_GET['link_sub_menu_games'])) {
        include_once "games.php";
      }
    ?>
    <div class="p-3">
      <div class="row g-3">
        <div class="col-6">
          <a href="<?php echo $isi2_line; ?>" class="text-decoration-none d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle btn-utama" style="width: 36px; height: 36px; color: #000000; margin-right: 10px;">
              <i class="ri-line-fill" style="font-size: 22px;"></i>
            </div>
            <span style="font-size: 14px; color: #6F6D6D;"><?php echo $isi1_line; ?></span>
          </a>
        </div>
        <div class="col-6">
          <a href="<?php echo $isi2_twitter; ?>" class="text-decoration-none d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle btn-utama" style="width: 36px; height: 36px; color: #000000; margin-right: 10px;">
              <i class="ri-twitter-fill" style="font-size: 22px;"></i>
            </div>
            <span style="font-size: 14px; color: #6F6D6D;"><?php echo $isi1_twitter; ?></span>
          </a>
        </div>
        <div class="col-6">
          <a href="https://wa.me/<?php echo $isi2_whatsapp.'?text='.$isi3_whatsapp; ?>" class="text-decoration-none d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle btn-utama" style="width: 36px; height: 36px; color: #000000; margin-right: 10px;">
              <i class="ri-whatsapp-line" style="font-size: 22px;"></i>
            </div>
            <span style="font-size: 14px; color: #6F6D6D;"><?php echo $isi2_whatsapp; ?></span>
          </a>
        </div>
        <div class="col-6">
          <a href="<?php echo $isi2_instagram; ?>" class="text-decoration-none d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle btn-utama" style="width: 36px; height: 36px; color: #000000; margin-right: 10px;">
              <i class="ri-instagram-line" style="font-size: 22px;"></i>
            </div>
            <span style="font-size: 14px; color: #6F6D6D;"><?php echo $isi1_instagram; ?></span>
          </a>
        </div>
        <div class="col-12">
          <a href="<?php echo $isi2_facebook; ?>" class="text-decoration-none d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle btn-utama" style="width: 36px; height: 36px; color: #000000;  margin-right: 10px;">
              <i class="ri-facebook-fill" style="font-size: 22px;"></i>
            </div>
            <span style="font-size: 14px; color: #6F6D6D;"><?php echo $isi1_facebook; ?></span>
          </a>
        </div>

       <div class="col-12">
         <div class="text-white text-center text-uppercase" style="font-size: 18px;">
            Metode Pembayaran
          </div>
          <div class="d-flex justify-content-evenly align-items-center mt-3">
            <div class="img-pembayaran">
             <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/bca.png" alt="BCA">
            </div>
            <div class="img-pembayaran">
              <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/bni.png" alt="BNI">
            </div>
            <div class="img-pembayaran">
              <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/bri.png" alt="BRI">
            </div>
            <div class="img-pembayaran">
              <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/mandiri.png" alt="MANDIRI">
            </div>
          </div>
          <div class="d-flex justify-content-evenly align-items-center mt-3">
            <div class="img-pembayaran">
              <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/gopay.png" alt="GOPAY">
            </div>
            <div class="img-pembayaran">
              <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/ovo.png" alt="OVO">
            </div>
            <div class="img-pembayaran">
               <img src="<?php echo $alamat_website_admin; ?>assets/images/payment/dana.png" alt="DANA">
            </div>
            </div>
          <div class="text-white text-center text-uppercase mt-5" style="font-size: 18px;">
            Tetap terhubung dengan kami
          </div>
          <div class="row g-0 mt-3">
            <div class="col-4">
              <a href="<?php echo $isi2_twitter; ?>" class="d-block text-end">
                <img src="<?php echo $alamat_website_admin; ?>assets/images/twitter.png" alt="Twitter">
              </a>
            </div>
            <div class="col-4">
              <a href="<?php echo $isi2_instagram; ?>" class="d-block text-center">
                <img src="<?php echo $alamat_website_admin; ?>assets/images/instagram.png" alt="Instagram">
              </a>
            </div>
            <div class="col-4">
              <a href="<?php echo $isi2_facebook; ?>" class="d-block text-start">
                <img src="<?php echo $alamat_website_admin; ?>assets/images/facebook.png" alt="Facebook">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-utama">
      <div class="row g-0">
        <div class="col-3">
          <a href="<?php echo $alamat_website.'pusat_bantuan'; ?>" class="d-block text-center text-white text-decoration-none my-2 py-2 border-1 border-end">Pusat Bantuan</a>
        </div>
        <div class="col-3">
          <a href="<?php echo $alamat_website.'syarat_dan_ketentuan'; ?>" class="d-block text-center text-white text-decoration-none my-2 py-2 border-1 border-end">Syarat dan Ketentuan</a>
        </div>
        <div class="col-3">
          <a href="<?php echo $alamat_website.'responsible_gaming'; ?>" class="d-block text-center text-white text-decoration-none my-2 py-2 border-1 border-end">Responsible Gaming</a>
        </div>
        <div class="col-3">
          <a href="<?php echo $alamat_website.'tentang'; ?>" class="d-block text-center text-white text-decoration-none my-2 py-2">Tentang Kami</a>
        </div>
      </div>
    </div>
    <div class="row g-0 justify-content-center align-items-center mt-3">
      <div class="col-10">
        <div class="text-center">
          <?php echo $isi1_footer; ?>
        </div>
      </div>
      <div class="col-10">
        <p class="mt-3" style="font-size: 14.4px;"><?php echo $isi2_footer; ?></p>
      </div>
    </div>
  </div>
  <div class="fixed-bottom">
    <div class="container-fluid bg-footer py-2">
      <div class="row g-2">
        <div class="col">
          <a href="<?php echo $alamat_website.'beranda'; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "beranda") {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/home-active.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Beranda</span>
                  ';
                } else {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/home.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Beranda</span>
                  ';
                }
              } else {
                echo '
                  <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/home.svg" alt="Home" width="25" height="25">
                  <span class="text-utama">Beranda</span>
                ';
              }
            ?>
          </a>
        </div>
        <div class="col">
          <a href="<?php echo $alamat_website; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/mobile-app.svg" alt="Home" width="25" height="25">
            <span class="text-utama">Unduh</span>
          </a>
        </div>
        <div class="col">
          <?php
            if (isset($_SESSION['id_akun'])) {
          ?>
          <a href="<?php echo $alamat_website.'deposit'; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "deposit" || $_GET['halaman'] == "penarikan" || $_GET['halaman'] == "rekening" || $_GET['halaman'] == "riwayat_deposit" || $_GET['halaman'] == "riwayat_withdraw") {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/banking-active.svg" alt="Banking" width="25" height="25">
                    <span class="text-utama">Banking</span>
                  ';
                } else {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/banking.svg" alt="Banking" width="25" height="25">
                    <span class="text-utama">Banking</span>
                  ';
                }
              } else {
                echo '
                  <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/banking.svg" alt="Banking" width="25" height="25">
                  <span class="text-utama">Banking</span>
                ';
              }
            ?>
          </a>
          <?php
            } else {
          ?>
          <a href="<?php echo $alamat_website.'masuk'; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "masuk") {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/login-active.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Masuk</span>
                  ';
                } else {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/login.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Masuk</span>
                  ';
                }
              } else {
                echo '
                  <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/login.svg" alt="Home" width="25" height="25">
                  <span class="text-utama">Masuk</span>
                ';
              }
            ?>
          </a>
          <?php
            }
          ?>
        </div>
        <div class="col">
          <a href="<?php echo $alamat_website.'promosi'; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "promosi") {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/promotion-active.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Promosi</span>
                  ';
                } else {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/promotion.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Promosi</span>
                  ';
                }
              } else {
                echo '
                  <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/promotion.svg" alt="Home" width="25" height="25">
                  <span class="text-utama">Promosi</span>
                ';
              }
            ?>
          </a>
        </div>
        <div class="col">
          <a href="<?php echo $alamat_website.'hub_kami'; ?>" class="d-flex flex-column align-items-center text-decoration-none">
            <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "hub_kami") {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/live-chat-active.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Hub Kami</span>
                  ';
                } else {
                  echo '
                    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/live-chat.svg" alt="Home" width="25" height="25">
                    <span class="text-utama">Hub Kami</span>
                  ';
                }
              } else {
                echo '
                  <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/footer/live-chat.svg" alt="Home" width="25" height="25">
                  <span class="text-utama">Hub Kami</span>
                ';
              }
            ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup Pengumuman -->
  <div class="modal fade" id="popup-pengumuman" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="popup-pengumuman" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header align-items-start border-0">
          <h4 class="modal-title mx-auto" id="popup-pengumuman" style="font-size: 15px; color: white;">
            PENGUMUMAN
          </h4>
          <i class="ri-close-line fs-6 fw-bold" data-bs-dismiss="modal" style="cursor: pointer;"></i>
        </div>
        <div class="modal-body">
          <a href="<?php echo $isi2_popup_pengumuman; ?>" class="d-block text-center" style="margin-bottom: 10px;">
            <img src="<?php echo $alamat_website_admin; ?>assets/images/<?php echo $isi1_popup_pengumuman; ?>" alt="Pengumuman" class="img-fluid">
          </a>
          <?php echo $isi3_popup_pengumuman; ?>
        </div>
        <div class="modal-footer justify-content-center border-secondary" style="border-top: 1px solid #2B2B2B!important;">
          <button type="button" class="btn btn-utama fw-normal text-white" data-bs-dismiss="modal" style="min-width: 100px; font-size: 14px!important;">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JQuery 3.6.3 -->
  <script src="<?php echo $alamat_website_admin; ?>assets/js/jquery-3.6.3.min.js"></script>
  <!-- Bootstrap 5 JS -->
  <script src="<?php echo $alamat_website_admin; ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="<?php echo $alamat_website_admin; ?>assets/libs/owl-carousel/owl.carousel.min.js"></script>
  <!-- Flatpickr JS -->
  <script src="<?php echo $alamat_website_admin; ?>assets/libs/flatpickr/flatpickr.min.js"></script>
  <!-- Datatables Bootstrap 5 -->
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
  <!-- Page JS -->
  <script>
    // Popup Pengumuman
    <?php
      if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == "beranda") {
    ?>
    var popupPengumuman = new bootstrap.Modal(document.getElementById("popup-pengumuman"), {});
    document.onreadystatechange = function () {
      popupPengumuman.show();
    };
    <?php
        } else if ($_GET['halaman'] == "daftar") {
    ?>
    function randomStringToInput(clicked_element) {
      var self = $(clicked_element);
      var random_string = generateRandomString2(5);
      $("input[name=kode_verifikasi]").val(random_string);
    }

    function generateRandomString2(string_length) {
      var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      var string = "";

      for(var i = 0; i <= string_length; i++) {
        var rand = Math.round(Math.random() * (characters.length - 1));
        var character = characters.substr(rand, 1);
        string = string + character;
      }

      return string;
    }
    <?php
        }
      }
    ?>
    
    $(document).ready(function () {
      // Input Hanya Angka
      $("#hanya-angka").on("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        var nominal = $(this).val().replace(/ik/g, "b");
        var formatUang = new Intl.NumberFormat("en-US", {currency: "USD", maximumFractionDigits: 0});
        if ($(this).val().length === 0) {
          $("#notif-nominal").removeClass("d-none");
          $("#nominal").text("0 (IDR)");
        } else {
          $("#notif-nominal").addClass("d-none");
          $("#nominal").text(formatUang.format(nominal) + " (IDR)");
        }
      });
      $("#hanya-angka-2").on("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
      });
      // Show or Hide Bank Info Admin
      $(".bank-info").hide();
      $("#rekening-admin").on("change", function() {
        var optionSelected = $(this).find("option:selected");
        var valueSelected  = optionSelected.val();
        $(".bank-info").hide();
        $("#rekening-admin-" + valueSelected).show();
      });
      // Salin Nomor Rekening Admin
      <?php
        if (isset($_GET['kategori_rekening'])) {
          $query_rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening_admin WHERE kategori_rekening_admin = '$kategori_rekening_aktif'");
          while ($data_rekening_admin = mysqli_fetch_array($query_rekening_admin)) {
            $id_rekening_admin = $data_rekening_admin['id_rekening_admin'];
            $id_rekening_rekening_admin = $data_rekening_admin['id_rekening_rekening_admin'];
            $nama_rekening_admin = $data_rekening_admin['nama_rekening_admin'];
            $nomor_rekening_admin = $data_rekening_admin['nomor_rekening_admin'];

            $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_admin'");
            $data_rekening = mysqli_fetch_array($query_rekening);
            $kategori_rekening = $data_rekening['kategori_rekening'];
            $jenis_rekening = $data_rekening['jenis_rekening'];
      ?>
      $("#tombol-salin-<?php echo $id_rekening_admin; ?>").click(function() {
        // Menyimpan teks yang akan disalin ke variabel
        var textToCopy<?php echo $id_rekening_admin; ?> = $("#target-salin-<?php echo $id_rekening_admin; ?>").text();

        // Membuat elemen input untuk menyimpan teks
        var tempInput<?php echo $id_rekening_admin; ?> = $("<input>");
        $("body").append(tempInput<?php echo $id_rekening_admin; ?>);
        tempInput<?php echo $id_rekening_admin; ?>.val(textToCopy<?php echo $id_rekening_admin; ?>).select();

        // Menjalankan perintah salin
        document.execCommand("copy");
        $("#text-tombol-salin-<?php echo $id_rekening_admin; ?>").text("BERHASIL MENYALIN!");
        $("#ikon-salin-<?php echo $id_rekening_admin; ?>").removeClass("ri-file-fill").addClass("ri-check-fill");

        setTimeout(function () {
          $("#text-tombol-salin-<?php echo $id_rekening_admin; ?>").text("SALIN");
          $("#ikon-salin-<?php echo $id_rekening_admin; ?>").removeClass("ri-check-fill").addClass("ri-file-fill");
        }, 1500);

        // Menghapus elemen input
        tempInput<?php echo $id_rekening_admin; ?>.remove();
      });
      <?php
          }
        }
      ?>
      // Balik Beranda
      $("#beranda1, #beranda2, #beranda3, #beranda4").on("click", function () {
        window.location.replace("<?php echo $alamat_website; ?>");
      });
      $("#keluar").on("click", function () {
        window.location.replace("keluar.php");
      });
      // Show or Hide Password
      $("#peralihan-kata-sandi, #peralihan-kata-sandi-masuk-daftar").on("click", function () {
        $("#kata-sandi, #kata-sandi-masuk-daftar").toggleClass("ri-eye-line");
        var inputKataSandi = $("#input-kata-sandi, #input-kata-sandi-masuk-daftar");
        if (inputKataSandi.attr("type") === "password") {
          $("#kata-sandi, #kata-sandi-masuk-daftar").removeClass("ri-eye-off-line").addClass("ri-eye-line");
          inputKataSandi.attr("type", "text");
        } else {
          $("#kata-sandi, #kata-sandi-masuk-daftar").removeClass("ri-eye-line").addClass("ri-eye-off-line");
          inputKataSandi.attr("type", "password");
        }
      });
      $("#peralihan-kata-sandi-daftar").on("click", function () {
        $("#kata-sandi-daftar").toggleClass("ri-eye-line");
        var inputKataSandi = $("#input-kata-sandi-daftar");
        if (inputKataSandi.attr("type") === "password") {
          $("#kata-sandi-daftar").removeClass("ri-eye-off-line").addClass("ri-eye-line");
          inputKataSandi.attr("type", "text");
        } else {
          $("#kata-sandi-daftar").removeClass("ri-eye-line").addClass("ri-eye-off-line");
          inputKataSandi.attr("type", "password");
        }
      });
      $("#peralihan-kata-sandi-daftar-2").on("click", function () {
        $("#kata-sandi-daftar-2").toggleClass("ri-eye-line");
        var inputKataSandi = $("#input-kata-sandi-daftar-2");
        if (inputKataSandi.attr("type") === "password") {
          $("#kata-sandi-daftar-2").removeClass("ri-eye-off-line").addClass("ri-eye-line");
          inputKataSandi.attr("type", "text");
        } else {
          $("#kata-sandi-daftar-2").removeClass("ri-eye-line").addClass("ri-eye-off-line");
          inputKataSandi.attr("type", "password");
        }
      });
      // Syarat Nama Pengguna
      $(".syarat-nama-pengguna").on('input', function() {
        this.value = this.value.replace(/[^a-z0-9]/gi, '').toLowerCase();
      });
      // Syarat Kata Sandi
      $(".syarat-kata-sandi").keyup(function() {
        var kataSandi = $(this).val();
        var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/;
        if (!pattern.test(kataSandi)) {
          $("#notif-syarat-kata-sandi").text("Harus ada huruf besar, kecil dan angka !");
        } else {
          if (kataSandi.length < 7) {
            $("#notif-syarat-kata-sandi").text("Minimal 8 karakter !");
          } else if (kataSandi.length > 7) {
            $("#notif-syarat-kata-sandi").empty();
          } else if (kataSandi.length > 19) {
            $("#notif-syarat-kata-sandi").text("Maksimal 20 karakter !");
            $(this).val(kataSandi.substring(0, 20));
          }
        }
      });
      $(".syarat-kata-sandi-2").keyup(function() {
        var kataSandi2 = $(this).val();
        var kataSandi1 = $(".syarat-kata-sandi").val();
        if (kataSandi2 != kataSandi1) {
          $("#notif-syarat-kata-sandi-2").text("Kata sandi tidak cocok !");
        } else {
          $("#notif-syarat-kata-sandi-2").empty();
        }
      });
      //Syarat Nama Lengkap & Nama Rekening
      function titleCase(str) {
        return str.toLowerCase().replace(/\b(\w)/g, function(txt) {
          return txt.toUpperCase();
        });
      }
      $(".syarat-nama-lengkap").keyup(function() {
        $(this).val(titleCase($(this).val()));
      });
      $(".syarat-nama-rekening").keyup(function() {
        $(this).val(titleCase($(this).val()));
      });
      // Kode Verifikasi
      $("#input-kode-verifikasi").keyup(function() {
        var kataSandi2 = $(this).val();
        var kataSandi1 = $("#kode-verifikasi").val();
        if (kataSandi2 != kataSandi1) {
          $("#notif-kode-verifikasi").text("Kode tidak cocok !");
        } else {
          $("#notif-kode-verifikasi").empty();
        }
      });
      // Refresh Saldo
      $("#refresh-saldo").click(function() {
        $("#saldo").load(location.href + " #saldo");
      });
      setInterval (function (){
        $("#saldo").load(location.href + " #saldo");
      }, 5000);
      // Counter
      let jackpot = 10000000000;
      let count = 41394775;

      let interval = setInterval(function() {
        count += 1.11;
        if (count >= jackpot) {
          clearInterval(interval);
          count = jackpot;
        }
        let formattedJackpot = 'USD ' + count.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '1,');
        $('#counter').text(formattedJackpot);
      }, 10);
      // Owl Carousel
      $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
      });
      // Scroll Kategori
      const scrollKategori = $("#scroll-kategori");
      const scrollKiri = $("#scroll-kiri");
      const scrollKanan = $("#scroll-kanan");

      scrollKiri.click(function () {
        scrollKategori.animate({
          scrollLeft: "-=100"
        }, "slow");
      });

      scrollKanan.click(function () {
        scrollKategori.animate({
          scrollLeft: "+=100"
        }, "slow");
      });
      // Promosi
      <?php
        $query_promosi = mysqli_query($koneksi, "SELECT * FROM promosi ORDER BY id_promosi DESC");
        while ($data_promosi = mysqli_fetch_array($query_promosi)) {
          $id_promosi = $data_promosi['id_promosi'];
          $gambar_promosi = $data_promosi['gambar_promosi'];
          $judul_promosi = $data_promosi['judul_promosi'];
          $detail_promosi = $data_promosi['detail_promosi'];
      ?>
      $("#expand_promosi_<?php echo $id_promosi; ?>").addClass("d-none");
      $("#promosi_<?php echo $id_promosi; ?>").on("click", function () {
        if ($("#expand_promosi_<?php echo $id_promosi; ?>").hasClass("d-none")) {
          $("#expand_promosi_<?php echo $id_promosi; ?>").removeClass("d-none").addClass("d-block");
        } else {
          $("#expand_promosi_<?php echo $id_promosi; ?>").removeClass("d-block").addClass("d-none");
        }
      });
      <?php
        }
      ?>
      // Dropdown Menu
      $("#expand_menu").addClass("d-none");
      $("#menu").on("click", function () {
        if ($("#expand_menu").hasClass("d-none") && $("#panah").hasClass("ri-arrow-right-s-line")) {
          $("#expand_menu").removeClass("d-none").addClass("d-block");
          $("#panah").removeClass("ri-arrow-right-s-line").addClass("ri-arrow-down-s-line");
        } else {
          $("#expand_menu").removeClass("d-block").addClass("d-none");
          $("#panah").removeClass("ri-arrow-down-s-line").addClass("ri-arrow-right-s-line");
        }
      });
      <?php
        $query_menu_games = mysqli_query($koneksi, "SELECT * FROM menu_games");
        while ($data_menu_games = mysqli_fetch_array($query_menu_games)) {
          $id_menu_games = $data_menu_games['id_menu_games'];
          $judul_menu_games = $data_menu_games['judul_menu_games'];
          $link_menu_games = $data_menu_games['link_menu_games'];
      ?>
      $("#expand_menu_<?php echo $id_menu_games; ?>").addClass("d-none");
      $("#menu_<?php echo $id_menu_games; ?>").on("click", function () {
        if ($("#expand_menu_<?php echo $id_menu_games; ?>").hasClass("d-none") && $("#panah_<?php echo $id_menu_games; ?>").hasClass("ri-arrow-right-s-line")) {
          $("#expand_menu_<?php echo $id_menu_games; ?>").removeClass("d-none").addClass("d-block");
          $("#panah_<?php echo $id_menu_games; ?>").removeClass("ri-arrow-right-s-line").addClass("ri-arrow-down-s-line");
        } else {
          $("#expand_menu_<?php echo $id_menu_games; ?>").removeClass("d-block").addClass("d-none");
          $("#panah_<?php echo $id_menu_games; ?>").removeClass("ri-arrow-down-s-line").addClass("ri-arrow-right-s-line");
        }
      });
      <?php
        }
      ?>
      // Flatpickr
      $(".tanggal-awal").flatpickr({
        dateFormat: "Y-m-d",
      });
      $(".tanggal-akhir").flatpickr({
        dateFormat: "Y-m-d",
      });
      // Datatables
      $("#riwayat").DataTable({
        ordering: false
      });
    });
  </script>
  
  
  <style>
    #customGif {
    padding-top: 20px;
    z-index:105;
    cursor:pointer;
    bottom:65px;
    left:14px;
    position:fixed;
    display: flex;
    justify-content:center;
    flex-direction: column;
}
#customGif.close_custom_gif{
    display: none;
}
@media (min-width:600px)
    #noty_layout__bottomLeft {
        bottom:50px;
    }
}
#custom_popup::before{
    content:" ";
    width:100px;
    height: 100px;
    background: red;
}
    
</style>


<div id="customGif">
<a href="<?php echo $alamat_website; ?>rtp.php" target="_blank" rel="nofollow"><img src="https://i.ibb.co/6Z01Pvp/RTP.gif" width="75" height="75" border="0" alt="RTP Gif"></a>
<a href="https://wa.me/<?php echo $isi2_whatsapp.'?text='.$isi3_whatsapp; ?>" target="_blank"><img src="https://i.ibb.co/2dX1f02/logowhatsapp.png" width="75" height="75" border="0" class="WaButton" alt="Whatsapp" style="width:65px;height:65px"></a>
<a href="<?php echo $isi3_livechat; ?>" target="_blank" rel="nofollow"><img src="https://i.ibb.co/YjYsPCx/image.png" width="75" height="75" border="0" alt="Livechat Alternatif"></a></div>



  
  
</body>
</html>