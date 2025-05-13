<!DOCTYPE html>
<html lang="id-ID">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $isi1_judul_website; ?></title>
  <base href="<?php echo $alamat_website; ?>">
  <meta content="Daftar Situs Agen Judi Online Terpercaya, Bandar Taruhan Bola, Game Slot terbaik, Slot gacor, Togel Online, Live Casino bisa Deposit Via Pulsa, dan OVO" name=description>
  <meta content=PANDA138,slotonline,casinogameonline,situsjudislotonline,judislotonline,agenslotPANDA138,pokeronline,bolagameonline,idnpoker,judibolaonline,gameslotonline,agenslotonline,agentpokerterbaik,agenslotindoonline,websitepokerterpercaya name=keywords>
<meta name="description" content="PANDA138 adalah agen judi slot online terpercaya di Indonesia dan gacor. Daftar Sekarang untuk bermain slot deposit pulsa tanpa potongan 10 Ribu Rupiah." />
<meta name="keywords" content=" PANDA138 Slot pulsa, slot pulsa tanpa potongan, slot deposit pulsa, slot online, situs judi slot online terpercaya" />
    <meta name="twitter:title" content="PANDA138 - Situs Bandar Judi Live Slot Online Terbaik Di Indonesia">
   <meta name="twitter:description" content="PANDA138 adalah agen judi slot online terpercaya di Indonesia dan gacor. Daftar Sekarang untuk bermain slot deposit pulsa tanpa potongan 10 Ribu Rupiah.">
    <meta property="og:title" content="PANDA138 - Situs Bandar Judi Live Slot Online Terbaik Di Indonesia">
    <meta property="og:description" content="PANDA138 adalah agen judi slot online terpercaya di Indonesia dan gacor. Daftar Sekarang untuk bermain slot deposit pulsa tanpa potongan 10 Ribu Rupiah.">
    <meta name="robots" content="INDEX, FOLLOW">
    <meta name="Content-Type" content="text/html">
    <meta name="twitter:card" content="summary">
    <meta name="og:type" content="website">
    <meta name="author" content="PANDA138">
</head>
</html>

<div class="row gy-5 gx-0 justify-content-center align-items-center">
  <?php
    $query_promosi = mysqli_query($koneksi, "SELECT * FROM promosi ORDER BY id_promosi DESC");
    while ($data_promosi = mysqli_fetch_array($query_promosi)) {
      $id_promosi = $data_promosi['id_promosi'];
      $gambar_promosi = $data_promosi['gambar_promosi'];
      $judul_promosi = $data_promosi['judul_promosi'];
      $detail_promosi = $data_promosi['detail_promosi'];
  ?>
  <div class="col-10">
    <img src="<?php echo $alamat_website_admin; ?>assets/images/promosi/<?php echo $gambar_promosi; ?>" alt="<?php echo strtoupper($judul_promosi); ?>" class="w-100 h-auto mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <span style="font-size: 14px; font-weight: 700;"><?php echo strtoupper($judul_promosi); ?></span>
      <button type="button" class="btn btn-utama text-dark" id="promosi_<?php echo $id_promosi; ?>" style="font-size: 10px;">Klik untuk info lebih lanjut</button>
    </div>
    <div id="expand_promosi_<?php echo $id_promosi; ?>">
      <?php echo $detail_promosi; ?>
    </div>
  </div>
  <?php
    }
  ?>
</div>