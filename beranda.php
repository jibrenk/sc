<div class="d-flex align-items-center p-2 pt-0" style="background: <?php echo $isi2_marquee_pengumuman; ?>; color: <?php echo $isi3_marquee_pengumuman; ?>;">
  <i class="ri-volume-up-line me-2"></i>
  <marquee behavior="scroll" direction="left"><?php echo $isi1_marquee_pengumuman; ?></marquee>
</div>
<!-- Slideshow -->
<div class="owl-carousel owl-theme">
  <?php
  $query_slideshow = mysqli_query($koneksi, "SELECT * FROM slideshow ORDER BY id_slideshow DESC");
  while ($data_slideshow = mysqli_fetch_array($query_slideshow)) {
      $id_slideshow = $data_slideshow['id_slideshow'];
      $gambar_slideshow = $data_slideshow['gambar_slideshow'];
      $judul_slideshow = $data_slideshow['judul_slideshow'];
      ?>
      <div class="item">
        <img src="<?php echo $alamat_website_admin; ?>assets/images/slideshow/<?php echo $gambar_slideshow; ?>" alt="<?php echo $judul_slideshow; ?>" class="img-fluid">
    </div>
    <?php
}
?>
</div>
<div class="row g-0">
  <div class="col-12">
    <div class="d-flex">
      <i class="ri-arrow-left-s-line fs-4 fw-bold d-flex align-items-center btn-utama top-0 px-0" id="scroll-kiri"></i>
      <div class="d-flex flex-grow-1 overflow-auto m-0" id="scroll-kategori">
        <?php
        if (isset($_SESSION['id_akun'])) {
            echo '<a href="'.$alamat_website.'games/kategori/slots" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3 ms-auto">';
        } else {
            echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3 ms-auto">';
        }
        ?>
        <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/hot-games.svg" alt="Hot Games" class="d-block my-svg my-2 mx-auto" width="25" height="25">
        Hot Games
    </a>
    <?php
    if (isset($_SESSION['id_akun'])) {
        echo '<a href="'.$alamat_website.'games/kategori/slots" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
    } else {
        echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
    }
    ?>
    <img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/slots.svg" alt="Slots" class="d-block my-2 my-svg mx-auto" width="25" height="25">
    Slots
</a>
<?php
if (isset($_SESSION['id_akun'])) {
    echo '<a href="'.$alamat_website.'games/kategori/live_casino" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
} else {
    echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
}
?>
<img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/casino.svg" alt="Casino" class="d-block my-2 mx-auto" width="25" height="25">
Live Casino
</a>
<?php
if (isset($_SESSION['id_akun'])) {
    echo '<a href="'.$alamat_website.'games/kategori/sports" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
} else {
    echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
}
?>
<img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/sports.svg" alt="Sports" class="d-block my-2 mx-auto" width="25" height="25">
Sports
</a>
<?php
if (isset($_SESSION['id_akun'])) {
    echo '<a href="'.$alamat_website.'games/kategori/arcade" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
} else {
    echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
}
?>
<img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/arcade.svg" alt="Arcade" class="d-block my-2 mx-auto" width="25" height="25">
Arcade
</a>
<?php
if (isset($_SESSION['id_akun'])) {
    echo '<a href="'.$alamat_website.'games/kategori/poker" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
} else {
    echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3">';
}
?>
<img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/poker.svg" alt="Poker" class="d-block my-2 mx-auto" width="25" height="25">
Poker
</a>
<?php
if (isset($_SESSION['id_akun'])) {
    echo '<a href="'.$alamat_website.'games/kategori/togel" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3 me-auto">';
} else {
    echo '<a href="'.$alamat_website.'masuk" class="d-block text-nowrap text-utama text-decoration-none text-center text-uppercase p-3 me-auto">';
}
?>
<img src="https://nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/menu/others.svg" alt="Togel" class="d-block my-2 mx-auto" width="25" height="25">
Togel
</a>
</div>
<i class="ri-arrow-right-s-line fs-4 fw-bold d-flex align-items-center btn-utama top-0 px-0" id="scroll-kanan"></i>
</div>
</div>
</div>
<div class="container-usd-jackpot-counter" style="background-image: url(<?php echo $alamat_website_admin; ?>assets/images/<?php echo $isi1_bg_jackpot; ?>);">
  <div class="usd-jackpot-counter" id="counter"></div>
</div>




<style>

    .site-contacts .contact-list li a i img {
        width: 50%;
        height: 50%
    }

    .social-media-list {
        display: flex;
        justify-content: center
    }

    .social-media-list li {
        margin: 20px 10px
    }

    .bank-list {
        margin: 0 0 15px;
        padding: 10px 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center
    }

    .bank-list>li {
        flex-basis: 25%;
        margin: 5px 0;
        text-align: center
    }

    .bank-list>li+li {
        padding-left: 5px
    }

    .bank-list [data-online] {
        position: relative;
        display: inline-block;
        width: 80px;
        min-height: 40px
    }

    .bank-list [data-online] img {
        width: 80px;
        height: 40px
    }

    .bank-list [data-online='true']:before,.bank-list [data-online='false']:before {
        content: '';
        position: absolute;
        top: 0;
        left: -10px;
        bottom: 0;
        width: 5px;
        border-radius: 2px
    }

    .bank-list [data-online='true']:before {
        background-color: #0f0
    }

    .bank-list [data-online='false']:before {
        background-color: #e00
    }

    .footer-links-container {
        background-color: #1d1d1d
    }

    .footer-links-container .footer-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 10px 0
    }

    .footer-links-container .footer-links li {
        margin: 2.5px
    }

    .footer-links-container .footer-links li a {
        display: block;
        padding: 2.5px 10px
    }

    .site-info {
        padding: 20px 0
    }

    .site-description,.copyright {
        color: #74708f;
        text-align: center
    }

    .copyright {
        padding: 20px 0
    }

    .copyright img {
        display: block;
        margin: 15px auto
    }

    .site-footer {
        position: absolute;
        background-color: #141125;
        color: #736d99;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 99;
        display: flex;
        justify-content: space-around
    }

    .site-footer a {
        flex-basis: calc((100% - 15px*6)/5);
        color: inherit;
        font-size: 9px;
        text-align: center;
        padding: 5px 0;
        background-color: inherit
    }

    .site-footer a[data-active="true"] {
        color: #ff35ed
    }

    .site-footer a>img {
        display: block;
        height: 20px;
        width: 20px;
        margin: 5px auto;
        background: center no-repeat;
        background-size: contain;
        background-color: inherit;
        border-radius: 50%
    }

    .site-footer a[data-active="true"]>img {
        content: var(--image-src)
    }

    .site-footer a[data-priority="true"]>img {
        transform: scale(2.5) translateY(-5px)
    }

    .site-footer .live-chat-link img {
        background: transparent;
        animation: pulse 3s infinite
    }

    @keyframes pulse {
        0% {
            filter: initial
        }

        50% {
            filter: brightness(40.5) drop-shadow(0 0 10px white)
        }
    }

    .user-balance {
        display: inline-flex;
        align-items: center;
        background-color: #090b1a;
        color: #fff;
        padding: 7px 14px;
        border-radius: 25px;
        font-size: 12px
    }

    .user-balance>button {
        margin-right: 10px;
        border: none;
        background: none;
        padding: 0;
        line-height: 1
    }

    .user-balance>button [data-icon] {
        display: inline-block;
        height: 18px;
        width: 18px;
        background: center no-repeat;
        background-size: contain;
        background-image: var(--image-src)
    }

    .user-balance .balance>a {
        color: #fff
    }

    .user-balance .balance>a>span {
        color: #00fc12
    }

    .user-balance .balance.open>.dropdown-menu {
        left: 0;
        right: 0;
        top: 45px;
        margin: auto
    }

    .user-balance>.balance::after {
        content: '';
        display: block;
        margin: auto;
        margin-top: 1px;
        width: 0;
        height: 0;
        border-top: solid 4px #fff;
        border-left: solid 4px transparent;
        border-right: solid 4px transparent
    }

    .user-balance>.balance.open::after {
        border-top: 0;
        border-bottom: solid 4px #fff
    }

    .user-balance .vendor-balances-container {
        border: 3px solid #b31bc8;
        width: 90vw;
        max-width: 350px;
        background-color: rgba(0,0,0,.85);
        padding: 15px 30px;
        padding-right: 40px;
        border-radius: 15px
    }

    .user-balance .vendor-balances-container .vendor-balances-header {
        border-bottom: 2px solid #b31bc8;
        margin-bottom: 25px
    }

    .user-balance .vendor-balances-container .vendor-balances-header {
        font-size: 19px
    }

    .user-balance .vendor-balances-container .balance-detail-game-type {
        font-size: 12px
    }

    .user-balance .vendor-balances-container .vendor-balances-header,.user-balance .vendor-balances-container strong {
        color: #b31bc8;
        font-weight: 900
    }

    .user-balance .vendor-balances-container .vendor-balances-content>div {
        padding-bottom: 5px
    }

    .user-balance .vendor-balances-container .vendor-balance-item>div,.user-balance .vendor-balances-container .vendor-balances-header {
        display: grid;
        grid-template-columns: 60% 40%;
        padding-bottom: 5px
    }

    .user-balance .vendor-balances-container .vendor-balance-item>div div:last-child,.user-balance .vendor-balances-container .vendor-balances-header div:last-child {
        text-align: right
    }

    .user-balance .vendor-balances-container .vendor-balances-content {
        max-height: calc(80vh - 100px);
        overflow-y: auto;
        width: calc(100% + 32px);
        padding-right: 25px
    }

    .user-balance .vendor-balances-container .vendor-balance-item {
        padding: 5px 10px;
        padding-right: 0
    }

    .user-balance .vendor-balances-container strong {
        text-transform: uppercase;
        margin-top: 5px
    }

    .user-balance .vendor-balances-container ::-webkit-scrollbar {
        width: 7px
    }

    .user-balance .vendor-balances-container ::-webkit-scrollbar-track {
        background: transparent
    }

    .user-balance .vendor-balances-container ::-webkit-scrollbar-thumb {
        background: #58585a;
        border-radius: 5px
    }

    .modal-content ul,.site-description ul {
        list-style: disc
    }

    .modal-content ol,.site-description ol {
        list-style: decimal
    }

    .modal-content ol,.site-description ol,.modal-content ul,.site-description ul {
        margin-block-start:1em;margin-block-end:1em;margin-inline-start:0;margin-inline-end:0;padding-inline-start:40px}

        .top-tab-container {
            display: flex;
            justify-content: flex-start;
            padding: 10px 0
        }

        .top-tab-container a {
            padding: 10px 20px;
            background-color: #0c0a17;
            color: #fff;
            text-transform: uppercase;
            margin-right: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            text-transform: none
        }

        .top-tab-container a[data-active="true"] {
            background-color: #390a42;
            color: #fff
        }

        .carousel-inner>.item>img,.carousel-inner>.item>picture>img,.carousel-inner>.item>a>img,.carousel-inner>.item>a>picture>img {
            width: 100%
        }

        .carousel-inner>.item>picture>img,.carousel-inner>.item>a>picture>img {
            display: block;
            height: auto;
            max-width: 100%;
            line-height: 1
        }

        .carousel-indicators li {
            border: 1px solid #f8007e
        }

        .carousel-indicators .active {
            background-color: #f8007e
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100%;
            pointer-events: none
        }

        .modal-content {
            flex-basis: 100%;
            pointer-events: initial;
            background: transparent;
            border: 0;
            border-radius: 10px
        }

        .modal-header {
            background-color: linear-gradient(to bottom,#bda270 0%,#675a43 100%);
            background-image: linear-gradient(to bottom,#bda270 0%,#675a43 100%);
            color: #fff;
            text-align: left;
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;
            border-bottom: 0;
            min-height: 50px;
            text-transform: uppercase;
            text-align: center
        }

        .modal-header .modal-title {
            font-size: 15px
        }

        .modal-header .close {
            opacity: 1;
            color: #fff;
            margin: 0
        }

        .modal-body {
            background-color: #FFFFFF;
            color: #fff
        }

        .modal-body img {
            max-width: 100%
        }

        .modal-footer {
            text-align: center;
            margin-top: 0;
            border-top: 0;
            background-color: #FFFFFF;
            border-bottom-left-radius: inherit;
            border-bottom-right-radius: inherit;
            display: flex;
            justify-content: space-around
        }

        .modal-footer button {
            min-width: 100px
        }

        .modal-footer .btn-primary {
            border: 0
        }

        .popup-modal[data-title] .modal-title:before {
            content: '';
            display: block;
            margin: 10px auto;
            height: 70px;
            width: 70px;
            background: center no-repeat;
            background-size: contain;
            background-image: var(--mobile-popup-notification-src)
        }

        .popup-modal[data-title=""] .modal-title:before {
            background-image: var(--mobile-popup-alert-src)
        }

        .popup-modal[data-title=""] .modal-body {
            text-align: center;
            padding-top: 40px
        }

        .popup-modal [data-popup="maintenance"] {
            padding: 0 10px
        }

        .popup-modal [data-popup="maintenance"] p {
            margin-bottom: 5px;
            text-align: left
        }

        .popup-modal [data-popup="maintenance"] p:last-child {
            text-align: center
        }

        .popup-modal [data-popup="maintenance"] p span {
            display: inline-block;
            color: #ddd;
            background-color: rgba(255,255,255,.15);
            padding: 2px 5px;
            margin-right: 3px
        }

        .popup-thumbnail {
            display: block;
            text-align: center;
            margin-bottom: 10px
        }

        .nexus-pay-modal {
            background-color: rgba(0,0,0,.5);
            text-align: center
        }

        .giveaway-modal {
            background-color: rgba(0,0,0,.5);
            text-align: center
        }

        .standard-form-container,.reporting-form-container {
            font-size: 16px
        }

        .standard-form-container {
            margin: 15px;
            padding: 40px 0 20px;
            background-color: #1a1231;
            background-image: linear-gradient(to bottom,#1a1231 0%,#230c2c 100%);
            border-radius: 15px
        }

        .standard-form-container label {
            color: #f8007e;
            font-size: 12px;
            font-weight: normal
        }

        .standard-form-container .form-control {
            background-color: transparent;
            color: #fff;
            border: none;
            border-bottom: 1px solid #632451;
            border-radius: 0;
            font-size: 14px
        }

        .standard-form-container .form-control:focus {
            border-color: #fe0077;
            box-shadow: none
        }

        .standard-form-container .form-control option {
            background-color: #9f065d
        }

        .standard-form-container .form-control::-webkit-input-placeholder {
            color: #734064
        }

        .standard-form-container [data-section="radios"] label+label {
            margin-left: 25px
        }

        .required-form-group>label:after {
            content: '*';
            color: #f00;
            margin-left: 3px
        }

        .reporting-form-container {
            padding: 20px 15px;
            font-size: 14px
        }

        .reporting-form-container .reporting-control-group {
            color: #fff;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background: #17132d;
            padding: 10px;
            border-radius: 10px
        }

        .reporting-form-container .reporting-control-group>div {
            flex-basis: calc(50% - 10px)
        }

        .reporting-control-group label {
            font-weight: normal;
            margin-bottom: 3px
        }

        .reporting-control-group .form-control {
            background: #0a0917;
            border: 0;
            color: #fff
        }

        .reporting-scroll-container {
            width: 100%;
            overflow: auto;
            background-color: #f3f3f3;
            font-size: 12px;
            margin-bottom: 20px
        }

        .reporting-scroll-container .table {
            margin-bottom: 0
        }

        .reporting-scroll-container thead {
            background-color: #8a0f42;
            color: #fff
        }

        .reporting-scroll-container thead th,.reporting-scroll-container tbody tr td {
            border: 1px solid #e8e8e8
        }

        .reporting-scroll-container tbody tr td {
            color: #838383
        }

        .reporting-scroll-container .table .grid-totals {
            background-color: #8a0f42;
            color: #fff;
            border: 1px solid #8a0f42;
            font-weight: bold;
            text-transform: uppercase
        }

        .reporting-scroll-container .table .grid-totals>tr:last-child>td {
            border-top: 0
        }

        .standard-form-title {
            color: #f41168;
            font-family: 'latobold';
            text-align: center;
            font-size: 18px;
            margin-bottom: 15px
        }

        .standard-form-title:not(:first-child) {
            margin-top: 50px
        }

        .reporting-nav-bar {
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #8a0f42;
            border-radius: 5px;
            font-size: 13px;
            overflow: hidden;
            background-color: #120a1f;
            color: #fff;
            margin-bottom: 15px
        }

        .reporting-nav-bar a,.reporting-nav-bar a:hover {
            text-decoration: none;
            color: inherit
        }

        .reporting-nav-bar a {
            flex-basis: calc(100%/3);
            padding: 10px 0;
            text-align: center
        }

        .reporting-nav-bar a[data-active="true"] {
            background-color: #8a0f42
        }

        .standard-password-field {
            position: relative
        }

        .standard-password-field>i {
            position: absolute;
            top: 35px;
            right: 10px;
            bottom: initial;
            color: #7a426b;
            cursor: pointer
        }

        .standard-password-field input[type=text]~i:before {
            content: ""
        }

        .standard-expand-button {
            border: none;
            background: center no-repeat;
            background-size: contain;
            background-image: var(--expand-icon-src);
            height: 12px;
            width: 12px;
            padding: 0
        }

        .standard-expand-button[data-active="true"] {
            background-image: var(--collapse-icon-src)
        }

        .standard-button-group {
            text-align: center;
            margin-bottom: 15px
        }

        .standard-button,.standard-secondary-button {
            color: #fff;
            text-transform: uppercase;
            padding: 10px 50px;
            border-radius: 25px;
            margin-top: 10px;
            background-color: #f8007e;
            background-image: linear-gradient(to right,#f8007e 0%,#a500e0 100%);
            font-size: 12px;
            border: 0;
            max-width: 100%;
            white-space: initial
        }

        .standard-button:hover {
            background-color: #a500e0;
            background-image: linear-gradient(to right,#a500e0 0%,#f8007e 100%)
        }

        .standard-form-note {
            color: #9a7791;
            font-size: 14px;
            line-height: 19px;
            margin-bottom: 15px
        }

        .standard-form-note:last-child {
            margin: 15px 0 0
        }

        .standard-form-note ol {
            list-style: lower-roman;
            padding-left: 15px
        }

        .alert-success,.alert-danger {
            padding: 10px;
            font-size: 14px
        }

        .captcha-input {
            position: relative
        }

        .captcha-input input {
            width: 50%
        }

        .captcha-input .captcha-container {
            position: absolute;
            top: 0;
            right: 0;
            display: flex;
            align-items: center
        }

        .captcha-input .captcha-container img {
            height: 34px;
            margin-right: 10px
        }

        .captcha-input .captcha-container .refresh-captcha-button {
            font-size: 22px;
            top: 0;
            color: #fff
        }

        .copy-input-button-field {
            position: relative
        }

        .copy-input-button-field .copy-input-button {
            position: absolute;
            top: 0;
            right: 0;
            background: none;
            border: none;
            padding: 2px 5px;
            margin-left: 5px;
            color: #fff;
            background: linear-gradient(to right,#ee1da9 0%,#d86548 100%);
            border-radius: 5px;
            font-size: 14px
        }

        .copy-input-button-field .copy-input-button:hover {
            color: #fff
        }

        .standard-required-message,.field-validation-error {
            color: #f00;
            display: block;
            margin-top: 5px;
            font-size: 14px
        }

        .standard-required-message {
            display: none
        }

        .input-validation-error+.standard-required-message {
            display: block
        }

        .expiration-countdown {
            display: inline-flex;
            flex-wrap: nowrap;
            font-size: 10px
        }

        .expiration-countdown [data-section] {
            display: flex;
            flex-direction: column-reverse;
            justify-content: center;
            align-content: center;
            text-align: center;
            padding-bottom: 5px;
            background-color: #5f334d;
            color: #fff;
            min-width: 60px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 1px 1px 3px rgba(0,0,0,.3)
        }

        .expiration-countdown [data-section]+[data-section] {
            margin-left: 10px
        }

        .expiration-countdown [data-value] {
            font-size: 20px;
            background-color: #f6f6f6;
            color: #5f334d;
            margin-bottom: 5px;
            padding: 5px 0
        }

        .standard-side-menu {
            background-color: #120e1d;
            color: #fff;
            border-radius: 15px;
            padding: 20px 15px;
            margin: 15px 0;
            text-align: center
        }

        .standard-side-menu>h4 {
            font-size: 20px;
            margin: 20px 0
        }

        .standard-side-menu>h4:not(:first-child) {
            margin-top: 50px
        }

        .standard-side-menu a {
            display: block;
            border: 1px solid #171225;
            background-color: #171225;
            color: #fff;
            font-size: 16px;
            padding: 12px 0;
            border-radius: 10px;
            margin: 15px 0
        }

        .standard-side-menu a[data-active="true"] {
            background-color: #7f0fbf;
            background-image: linear-gradient(to right,#7f0fbf 0%,#870d63 100%)
        }

        .standard-side-menu a:not([data-active="true"]):hover {
            border-color: #ba3bff;
            color: #ba3bff
        }

        .standard-form-content {
            background-color: #230f2a;
            color: #fff;
            padding: 20px 15px;
            border-radius: 15px;
            margin: 15px 0
        }

        .popular-game-title-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #400d75;
            background-image: linear-gradient(to right,#400d75 0%,#700d3c 100%);
            margin-top: 10px;
            color: #fff
        }

        .popular-game-title-container .title {
            font-size: 16px;
            display: flex;
            align-items: center
        }

        .popular-game-title-container .title i {
            display: inline-block;
            height: 24px;
            width: 25px;
            background: center no-repeat;
            background-size: contain;
            background-image: var(--image-src);
            margin-right: 10px
        }

        .popular-game-title-container .title>strong {
            margin-left: 4px
        }

        .popular-game-title-container a {
            display: inline-block;
            padding: 6px 8px;
            border-radius: 25px;
            font-size: 10px;
            background-color: rgba(177,58,115,.64);
            color: #fff
        }

        .last-transaction-model {
            line-height: 1
        }

        .last-transaction-model span[data-section="REJ"],.last-transaction-model span[data-section="CAN"],.last-transaction-model span[data-section="FAIL"] {
            color: #f00
        }

        .last-transaction-model span[data-section="APP"] {
            color: #008000
        }

        .last-transaction-model span[data-section="PEN"],.last-transaction-model span[data-section="NEW"],.last-transaction-model span[data-section="PRO"],.last-transaction-model span[data-section="PRO1"],.last-transaction-model span[data-section="APP1"],.last-transaction-model span[data-section="remark"] {
            color: #00f
        }

        [data-copied] {
            position: relative
        }

        [data-copied]:after {
            content: attr(data-copied);
            pointer-events: none;
            position: absolute;
            top: 100%;
            display: flex;
            align-items: center;
            text-transform: capitalize
        }

        .tab-menu-container {
            display: flex;
            margin-bottom: 20px;
            background-color: #808080;
            border-radius: 10px;
            font-size: 12px
        }

        .tab-menu-container a {
            flex: 1;
            text-transform: uppercase;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 7px;
            overflow: hidden
        }

        .tab-menu-container a[data-active="true"] {
            background-color: #7f673a
        }

        .tab-menu-container a:first-child {
            border-top-left-radius: inherit;
            border-bottom-left-radius: inherit
        }

        .tab-menu-container a:last-child {
            border-top-right-radius: inherit;
            border-bottom-right-radius: inherit
        }

        .tab-menu-container a:not(:last-child) {
            border-right: 1px solid #fff
        }

        .tab-menu-container a [data-icon] {
            height: 25px;
            width: 25px;
            display: inline-block;
            margin-right: 5px;
            background-image: var(--image-src);
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat
        }

        .tab-menu-container a[data-active="true"] [data-icon] {
            background-image: var(--active-image-src)
        }

        .tab-menu-container[data-style="vertical"] a {
            flex-direction: column;
            overflow: hidden;
            text-align: center;
            line-height: 1;
            font-size: 11px
        }

        .tab-menu-container[data-style="vertical"] a [data-icon] {
            margin-right: 0;
            margin-bottom: 5px
        }

        .form-group-link-container a,.form-group-link {
            font-size: 12px;
            color: #3f51b5
        }

        .form-group-link {
            float: right;
            margin-top: 3px
        }

        .form-group-link-container {
            text-decoration: underline;
            display: flex;
            justify-content: space-evenly
        }

        .tab-menu-container+.form-group-link-container {
            margin-top: 35px;
            margin-bottom: -15px
        }

        .otp-hr {
            border-color: #f8007e;
            border-width: 2px
        }

        .request-otp-button,.request-otp-button:hover {
            border: 2px solid #f8007e;
            color: #f8007e;
            background-color: transparent
        }

        .request-otp-button[disabled] {
            border-color: #464646;
            background-color: #707070;
            color: #929292
        }

        .otp-input {
            border-color: #f8007e;
            box-shadow: none
        }

        .otp-dropdown-section [data-section="input"] {
            display: flex;
            flex-wrap: wrap;
            align-items: center
        }

        .otp-dropdown-section [data-section="input"] select,.otp-dropdown-section [data-section="input"] .request-otp-button,.otp-dropdown-section [data-section="input"] .contact-verification-link {
            flex-basis: 100%
        }

        .otp-dropdown-section [data-section="input"] .request-otp-button,.otp-dropdown-section [data-section="input"] .contact-verification-link {
            margin-top: 10px;
            white-space: initial;
            text-align: center
        }

        .standard-sub-section:first-of-type .standard-form-title {
            margin-top: 0
        }

        .standard-sub-section .standard-form-title {
            margin-top: 20px;
            margin-bottom: 0
        }

        .standard-sub-section .standard-form-content {
            margin: 10px 0
        }

        [data-payment-gateway] {
            background-color: #fff;
            color: #000;
            margin-top: 20px;
            padding: 20px 30px;
            border-radius: 10px
        }

        [data-payment-gateway="va"] .va-account-number {
            font-size: 20px;
            font-weight: 700
        }

        [data-payment-gateway="va"] .va-account-name {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #999;
            padding-top: 25px;
            font-size: 16px;
            font-weight: 500
        }

        [data-payment-gateway="va"] h5 {
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #999;
            line-height: .1em;
            margin: 10px 0 20px;
            font-size: 14px
        }

        [data-payment-gateway="va"] h5 span {
            background-color: #fff;
            color: #000;
            padding: 0 10px
        }

        [data-payment-gateway="va"] ol {
            text-align: left;
            margin: 0;
            padding: 0 20px
        }

        [data-payment-gateway="qris"] .qris-qr-code-container {
            display: flex;
            flex-direction: column;
            gap: 15px
        }

        [data-payment-gateway="qris"] .qris-admin-fee {
            color: #f00
        }

        [data-payment-gateway="qris"] .qris-qr-code-container img {
            background-color: #fff
        }

        [data-payment-gateway="qris"] .qris-qr-code-container a {
            background: linear-gradient(to right,#db1acb 0%,#470a30 100%);
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px
        }

        @media screen and (device-aspect-ratio: 2/3) {
            select,textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],.standard-form-container .form-control {
                font-size:16px
            }
        }

        @media screen and (device-aspect-ratio: 40/71) {
            select,textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],.standard-form-container .form-control {
                font-size:16px
            }
        }

        @media screen and (device-aspect-ratio: 375/667) {
            select,textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="tel"],input[type="url"],.standard-form-container .form-control {
                font-size:16px
            }
        }

        @media screen and (device-aspect-ratio: 9/16) {
            select,textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="tel"],input[type="url"],.standard-form-container .form-control {
                font-size:16px
            }
        }

        .main-menu-outer-container {
            display: flex
        }

        .main-menu-outer-container>i {
            background: #fe0178;
            color: #fff;
            display: flex;
            align-items: center;
            padding: 0 3px;
            top: 0
        }

        .main-menu-outer-container>main {
            margin: 0;
            flex-grow: 1;
            display: flex;
            overflow: auto
        }

        .main-menu-outer-container>main>a:first-child {
            margin-left: auto
        }

        .main-menu-outer-container>main>a:last-child {
            margin-right: auto
        }

        .main-menu-outer-container>main>a {
            display: block;
            white-space: nowrap;
            padding: 10px;
            min-width: 80px;
            font-size: 12px;
            text-align: center;
            text-transform: uppercase;
            color: #494366
        }

        .main-menu-outer-container>main>a[href="/hot-games"][data-active="true"] {
            color: #fca501
        }

        .main-menu-outer-container>main>a[href="games/kategori/slots"][data-active="true"] {
            color: #ff0154
        }

        .main-menu-outer-container>main>a[href="games/kategori/casino"][data-active="true"] {
            color: #00fe78
        }

        .main-menu-outer-container>main>a[href="games/kategori/sport"][data-active="true"] {
            color: #52b9ee
        }

        .main-menu-outer-container>main>a[href="games/kategori/arcade"][data-active="true"] {
            color: #fee300
        }

        .main-menu-outer-container>main>a[href="games/kategori/poker"][data-active="true"] {
            color: #2afe00
        }

        .main-menu-outer-container>main>a[href="games/kategori/others"][data-active="true"] {
            color: #f60
        }

        .main-menu-outer-container>main>a>img {
            display: block;
            height: 25px;
            width: 25px;
            margin: 10px auto
        }

        .main-menu-outer-container>main>a[data-active="true"]>img {
            content: var(--image-src)
        }

        .games-filter-section {
            background-color: #0a0814;
            color: #9694a0;
            font-size: 12px
        }

        .games-filter-section .name-filter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            position: relative
        }

        .games-filter-section .name-filter:after {
            content: "";
            font-family: 'Glyphicons Halflings';
            position: absolute;
            top: 10px;
            right: 25px;
            bottom: 12px;
            font-size: 10px;
            display: flex;
            align-items: center;
            pointer-events: none
        }

        .games-filter-section .name-filter .title {
            display: flex;
            align-items: center
        }

        .games-filter-section .name-filter input[type="text"] {
            background-color: #191723;
            color: #fff;
            border-radius: 20px;
            border: none;
            padding: 5px 25px 5px 15px
        }

        .games-filter-section .category-filter {
            display: flex;
            overflow: auto;
            padding: 0 10px
        }

        .games-filter-section .category-filter .category-filter-link {
            padding: 5px 10px;
            margin: 5px;
            white-space: nowrap;
            text-transform: uppercase
        }

        .games-filter-section .category-filter .category-filter-link.active {
            border-bottom: 3px solid #ff0096;
            color: #fff
        }

        .game-list ul {
            padding: 5px;
            margin: 10px 0;
            display: flex;
            flex-wrap: wrap
        }

        .game-list ul>li {
            width: calc(100%/4);
            padding: 10px;
            text-align: center;
            color: #bfbbd0;
            font-size: 9px;
            text-transform: uppercase;
            position: relative
        }

        .game-list ul>li>a {
            display: block;
            width: 100%;
            padding-top: 100%;
            position: relative;
            margin-bottom: 5px
        }

        .game-list ul>li>a img {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%
        }

        .scrollable-game-list {
            display: flex;
            justify-content: space-between
        }

        .scrollable-game-list>i {
            background: transparent;
            color: #fff;
            display: flex;
            align-items: center;
            padding: 0 3px;
            top: 0
        }

        .scrollable-game-list main {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding: 10px 0;
            flex-grow: 1
        }

        .scrollable-game-list main .game-item {
            flex-shrink: 0
        }

        .bigger-game-list ul {
            padding: 5px;
            margin: 10px 0;
            display: flex;
            flex-wrap: wrap
        }

        .bigger-game-list ul>li,.scrollable-game-list main .game-item {
            width: calc(100%/4);
            padding: 5px;
            text-align: center;
            color: #fff;
            font-size: 9px;
            position: relative
        }

        .bigger-game-list ul .inner-game-item,.scrollable-game-list .inner-game-item {
            margin: 0;
            padding: 5px;
            border-radius: 25px;
            background-color: #1e1a31;
            background-image: linear-gradient(to bottom,#1e1a31 0%,#171429 100%);
            display: block;
            font-weight: normal
        }

        .bigger-game-list ul .inner-game-item .wrapper-container,.scrollable-game-list main .inner-game-item .wrapper-container {
            display: block;
            width: 100%;
            padding-top: 100%;
            position: relative;
            margin-bottom: 5px;
            border-radius: 25px;
            overflow: hidden
        }

        .bigger-game-list ul .inner-game-item .wrapper-container img,.bigger-game-list ul .inner-game-item .wrapper-container .link-container,.scrollable-game-list main .inner-game-item .wrapper-container img,.scrollable-game-list main .inner-game-item .wrapper-container .link-container {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%
        }

        .bigger-game-list ul .inner-game-item .wrapper-container img,.scrollable-game-list main .inner-game-item .wrapper-container img {
            background-color: #000;
            transition: transform .2s;
            transform-origin: center
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .link-container,.scrollable-game-list main .inner-game-item .wrapper-container .link-container {
            padding: 15px 7px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            background-color: rgba(6,0,15,.85)
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .link-container>a,.scrollable-game-list main .inner-game-item .wrapper-container .link-container>a {
            margin: 0;
            font-size: 10px
        }

        .bigger-game-list ul .inner-game-item .game-name,.scrollable-game-list main .inner-game-item .game-name,.scrollable-game-list main .inner-game-item .provider-name {
            display: block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .bigger-game-list ul .inner-game-item .game-name,.scrollable-game-list main .inner-game-item .game-name {
            margin: 8px 0 4px;
            padding: 0 5px
        }

        .bigger-game-list ul input[type="radio"],.scrollable-game-list main input[type="radio"] {
            position: absolute;
            visibility: hidden;
            left: -99em
        }

        .bigger-game-list ul input[type="radio"]:not(:checked)~.wrapper-container .link-container,.scrollable-game-list main input[type="radio"]:not(:checked)~.wrapper-container .link-container {
            display: none
        }

        .bigger-game-list ul input[type="radio"]:checked~.wrapper-container img,.scrollable-game-list main input[type="radio"]:checked~.wrapper-container img {
            transform: scale(1.25)
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .rtp-container,.scrollable-game-list main .inner-game-item .wrapper-container .rtp-container {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 5px 12px;
            background-color: rgba(0,0,0,.7);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 3px;
            font-size: 9px;
            pointer-events: none;
            line-height: 1
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .rtp-container .rtp-progress,.scrollable-game-list main .inner-game-item .wrapper-container .rtp-container .rtp-progress {
            flex-grow: 1;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 50px
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar,.scrollable-game-list main .inner-game-item .wrapper-container .rtp-container .rtp-container .rtp-progress-bar {
            height: 8px;
            border-radius: 50px
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar[data-rtp="low"],.scrollable-game-list main .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar[data-rtp="low"] {
            background: linear-gradient(to right,#cd9ba7,#ca6a86)
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar[data-rtp="medium"],.scrollable-game-list main .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar[data-rtp="medium"] {
            background: linear-gradient(to right,#fcdc8f,#f2d064)
        }

        .bigger-game-list ul .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar[data-rtp="high"],.scrollable-game-list main .inner-game-item .wrapper-container .rtp-container .rtp-progress .rtp-progress-bar[data-rtp="high"] {
            background: linear-gradient(to right,#31a13b,#62c88d)
        }

        .bigger-game-list ul input[type="radio"]:checked~.wrapper-container .rtp-container,.scrollable-game-list main input[type="radio"]:checked~.wrapper-container .rtp-container {
            opacity: 0
        }

        .bigger-game-list .game-item input[type=checkbox].favourite-game-btn,.game-list .game-item input[type=checkbox].favourite-game-btn {
            display: none
        }

        .bigger-game-list .game-item input[type=checkbox].favourite-game-btn+label,.game-list .game-item input[type=checkbox].favourite-game-btn+label {
            position: absolute;
            margin: 0;
            top: 5px;
            right: 5px;
            z-index: 2;
            width: 25px;
            height: 25px;
            padding: 5px;
            background: var(--star-off-icon) center no-repeat;
            background-size: 19px;
            background-color: #fff;
            border-radius: 50%;
            cursor: pointer;
            transition: background-image ease .35s
        }

        .bigger-game-list .game-item input[type=checkbox].favourite-game-btn:checked+label,.game-list .game-item input[type=checkbox].favourite-game-btn:checked+label {
            background-image: var(--star-on-icon)
        }

        @media(max-width: 480px) {
            .bigger-game-list ul>li,.scrollable-game-list main>.game-item {
                width:calc(100%/3)
            }
        }

        .play-now,.free-play {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            white-space: nowrap;
            font-size: 12px;
            border-radius: 18px;
            padding: 5px;
            margin: 10px 0;
            text-decoration: none
        }

        .play-now:hover,.free-play:hover {
            text-decoration: none
        }

        .play-now:before,.free-play:before {
            content: "";
            display: inline-block;
            height: 15px;
            width: 15px;
            margin-right: 5px;
            background: center no-repeat;
            background-image: var(--play-icon-src);
            background-size: contain
        }

        .free-play {
            color: #d8d8d8
        }

        .free-play:hover {
            color: #d8d8d8
        }

        .play-now {
            background-color: #f8007e;
            background-image: linear-gradient(to right,#f8007e 0%,#a500e0 100%);
            color: #fff
        }

        .play-now:hover {
            background-color: #f8007e;
            background-image: linear-gradient(to right,#f8007e 0%,#a500e0 100%);
            color: #fff
        }

        .play-desktop-version-now {
            text-transform: uppercase
        }

        .play-desktop-version-now:before {
            background-image: var(--desktop-icon-src)
        }

        .game-buttons-field {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 10px 20%;
            margin-bottom: 20px;
            background-color: #17132d
        }

        .game-buttons-field .play-now {
            padding: 10px 5px
        }

        .progressive-jackpot {
            background-color: #0d0b18;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            padding: 10px 0;
            font-size: 18px;
            text-shadow: 0 2px 22px rgba(237,0,255,1)
        }

        .progressive-jackpot .jackpot-container {
            font-family: 'Open24DisplaySt';
            font-size: 27px;
            text-align: center;
            background: center no-repeat;
            background-size: contain;
            background-image: var(--image-src);
            padding: 4vw 6vh 6vw
        }

        .progressive-jackpot .jackpot-currency {
            color: #b7004d;
            margin-right: 10px
        }

        .tickercontainer {
            margin: 0;
            padding: 0;
            overflow: hidden;
            text-align: center
        }

        .tickercontainer .mask {
            position: relative;
            width: 100%;
            overflow: hidden;
            overflow: hidden
        }

        ul.newsticker {
            position: relative;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex
        }

        ul.newsticker li {
            margin: 0;
            font-size: 12px;
            padding: 0 25px 0 0;
            white-space: nowrap
        }

        ul.er-controls {
            list-style: none;
            display: inline-block;
            padding: 0
        }

        ul.er-controls>li {
            display: inline-block;
            padding: 0 10px;
            background: #f0f0f0;
            margin: 5px;
            border-radius: 5px;
            height: 40px;
            line-height: 40px
        }

        ul.er-controls>li:hover {
            background: #f5f5f5;
            cursor: pointer
        }

        .announcement-container {
            display: flex;
            align-items: center;
            font-size: 9px;
            padding: 0 10px;
            background-color: rgba(8,6,17,.89);
            color: #948aa4
        }

        .announcement-container>[data-section="date"] {
            flex-basis: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right: 10px
        }

        .announcement-container>[data-section="date"] [data-icon="news"] {
            display: inline-block;
            height: 15px;
            width: 15px;
            background: center no-repeat;
            background-size: contain;
            background-image: var(--image-src)
        }

        .announcement-container>[data-section="announcements"] {
            flex-basis: calc(100% - 30px);
            overflow: hidden;
            padding: 8px 0
        }

        .announcement-container>[data-section="announcements"] ul {
            margin: 0
        }

        .download-apk-container {
            text-align: center;
            margin-top: 15px
        }

        .download-apk-container .popup-modal[data-title] .modal-title:before {
            content: none
        }

        .download-apk-container .popup-modal .modal-header h4 {
            font-size: 24px
        }

        .download-apk-container .popup-modal .modal-body {
            text-align: left
        }

        .download-apk-container .popup-modal .modal-body img {
            height: 20px;
            width: 20px;
            margin-right: 5px;
            filter: contrast(0)
        }

        .download-apk-container .popup-modal .modal-body h5 {
            font-size: 18px;
            color: inherit;
            text-transform: uppercase
        }

        .download-apk-container .popup-modal .modal-body ol {
            list-style: decimal;
            padding-left: 5px
        }

        .download-apk-info {
            display: flex;
            justify-content: space-around
        }

        .download-apk-section {
            flex-basis: 40%;
            display: flex;
            flex-direction: column;
            align-items: center
        }

        .download-apk-section>* {
            margin: 5px 0
        }

        .download-apk-section span {
            color: #d40082;
            font-size: 16px
        }

        .download-apk-section.android span {
            text-transform: uppercase;
            color: #8921f1
        }

        .download-apk-section img {
            width: 85%;
            margin: auto
        }

        .download-apk-section a {
            background-color: #d40082;
            border-radius: 10px;
            color: #fff;
            width: 100%;
            max-width: 200px;
            padding: 5px 0
        }

        .download-apk-section.android a {
            background-color: #8921f1
        }

        .download-apk-guide {
            padding: 20px 0;
            color: #fff
        }

        .download-apk-guide a {
            color: #01de41;
            text-decoration: underline
        }

        .standard-form-container .popular-game-title-container {
            display: none
        }

        .standard-form-container .download-apk-container {
            margin-top: 25px
        }

        .download-popup-modal .modal-body img {
            height: 20px;
            width: 20px;
            margin-right: 5px;
            filter: contrast(0)
        }

        .popular-game-title-container {
            background: #bda270;
            color: #fff
        }

        .popular-game-title-container a {
            background: linear-gradient(to bottom,#bda270 0%,#675a43 100%);
            color: #fff
        }


    </style>



    <div class="popular-game-title-container">
        <div class="title">
            <i data-icon="popular-games" style="--image-src: url(//nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/popular-games.png?v=20230823-2);"></i>
            Game Populer
        </div>
        <a href="games/kategori/slots">Lebih Banyak Game</a>
    </div>
    <div class="bigger-game-list">
        <ul>
            <li class="game_item" data-game="Gates of Olympus™">
                <label class="inner-game-item">
                    <input type="radio" name="game-list-radio-button" />
                    <span class="wrapper-container">
                        <picture><source srcset="//nx-cdn.trgwl.com/Images/providers/PP/vs20olympgate.webp?v=20230823-2" type="image/webp" /><source srcset="//nx-cdn.trgwl.com/Images/providers/PP/vs20olympgate.jpg?v=20230823-2" type="image/jpeg" /><img alt="Gates of Olympus™" loading="lazy" src="//nx-cdn.trgwl.com/Images/providers/PP/vs20olympgate.jpg?v=20230823-2" /></picture>
                        <span class="link-container">
                            <a href="<?php echo $alamat_website; ?>games/kategori/slots" class="play-now" data-game="Gates of Olympus™">
                                MAIN
                            </a>
                        </span>
                    </span>
                    <span class="game-name">Gates of Olympus™</span>
                </label>
            </li>
            <li class="game_item" data-game="Mahjong Ways 2">
                <label class="inner-game-item">
                    <input type="radio" name="game-list-radio-button" />
                    <span class="wrapper-container">
                        <picture><source srcset="//nx-cdn.trgwl.com/Images/providers/PGSOFT/mahjong-ways2.webp?v=20230823-2" type="image/webp" /><source srcset="//nx-cdn.trgwl.com/Images/providers/PGSOFT/mahjong-ways2.jpg?v=20230823-2" type="image/jpeg" /><img alt="Mahjong Ways 2" loading="lazy" src="//nx-cdn.trgwl.com/Images/providers/PGSOFT/mahjong-ways2.jpg?v=20230823-2" /></picture>
                        <span class="link-container">
                            <a href="<?php echo $alamat_website; ?>masuk" class="play-now btn-utama" data-game="Mahjong Ways 2">
                                MAIN
                            </a>
                        </span>
                    </span>
                    <span class="game-name">Mahjong Ways 2</span>
                </label>
            </li>
            <li class="game_item" data-game="Lucky Twins Nexus">
                <label class="inner-game-item">
                    <input type="radio" name="game-list-radio-button" />
                    <span class="wrapper-container">
                        <picture><source srcset="//nx-cdn.trgwl.com/Images/providers/MICROGAMING/SMG_luckyTwinsNexus.webp?v=20230823-2" type="image/webp" /><source srcset="//nx-cdn.trgwl.com/Images/providers/MICROGAMING/SMG_luckyTwinsNexus.jpg?v=20230823-2" type="image/jpeg" /><img alt="Lucky Twins Nexus" loading="lazy" src="//nx-cdn.trgwl.com/Images/providers/MICROGAMING/SMG_luckyTwinsNexus.jpg?v=20230823-2" /></picture>
                        <span class="link-container">
                            <a href="<?php echo $alamat_website; ?>masuk" class="play-now btn-utama" data-game="Lucky Twins Nexus">
                                MAIN
                            </a>
                        </span>
                    </span>
                    <span class="game-name">Lucky Twins Nexus</span>
                </label>
            </li>
            <li class="game_item" data-game="Aztec: Bonus Hunt">
                <label class="inner-game-item">
                    <input type="radio" name="game-list-radio-button" />
                    <span class="wrapper-container">
                        <picture><source srcset="//nx-cdn.trgwl.com/Images/providers/ADVANTPLAY/AdvantPlay_10022.webp?v=20230823-2" type="image/webp" /><source srcset="//nx-cdn.trgwl.com/Images/providers/ADVANTPLAY/AdvantPlay_10022.jpg?v=20230823-2" type="image/jpeg" /><img alt="Aztec: Bonus Hunt" loading="lazy" src="//nx-cdn.trgwl.com/Images/providers/ADVANTPLAY/AdvantPlay_10022.jpg?v=20230823-2" /></picture>
                        <span class="link-container">
                            <a href="<?php echo $alamat_website; ?>masuk" class="play-now btn-utama" data-game="Aztec: Bonus Hunt">
                                MAIN
                            </a>
                        </span>
                    </span>
                    <span class="game-name">Aztec: Bonus Hunt</span>
                </label>
            </li>
            <li class="game_item" data-game="Hot Hot Fruit">
                <label class="inner-game-item">
                    <input type="radio" name="game-list-radio-button" />
                    <span class="wrapper-container">
                        <picture><source srcset="//nx-cdn.trgwl.com/Images/providers/HABANERO/SGHotHotFruit.webp?v=20230823-2" type="image/webp" /><source srcset="//nx-cdn.trgwl.com/Images/providers/HABANERO/SGHotHotFruit.jpg?v=20230823-2" type="image/jpeg" /><img alt="Hot Hot Fruit" loading="lazy" src="//nx-cdn.trgwl.com/Images/providers/HABANERO/SGHotHotFruit.jpg?v=20230823-2" /></picture>
                        <span class="link-container">
                            <a href="<?php echo $alamat_website; ?>masuk" class="play-now btn-utama" data-game="Hot Hot Fruit">
                                MAIN
                            </a>
                        </span>
                    </span>
                    <span class="game-name">Hot Hot Fruit</span>
                </label>
            </li>
            <li class="game_item" data-game="Money Tree Slot">
                <label class="inner-game-item">
                    <input type="radio" name="game-list-radio-button" />
                    <span class="wrapper-container">
                        <picture><source srcset="//nx-cdn.trgwl.com/Images/providers/CROWDPLAY/MoneyTree.webp?v=20230823-2" type="image/webp" /><source srcset="//nx-cdn.trgwl.com/Images/providers/CROWDPLAY/MoneyTree.jpg?v=20230823-2" type="image/jpeg" /><img alt="Money Tree Slot" loading="lazy" src="//nx-cdn.trgwl.com/Images/providers/CROWDPLAY/MoneyTree.jpg?v=20230823-2" /></picture>
                        <span class="link-container">
                            <a href="<?php echo $alamat_website; ?>masuk" class="play-now btn-utama" data-game="Money Tree Slot">
                                MAIN
                            </a>
                        </span>
                    </span>
                    <span class="game-name">Money Tree Slot</span>
                </label>
            </li>
        </ul>
    </div>


    <div class="popular-game-title-container">
        <div class="title">
            <i data-icon="popular-games" style="--image-src: url(//nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/layout/download-app.png?v=20230823-2);"></i>
            UNDUH
            <strong>DOLAR368.APK</strong>
        </div>
    </div>

    <div class="download-apk-container">
        <div class="download-apk-info">
            <div class="download-apk-section android">
                <span>Android</span>
                <picture><source srcset="//nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/home/android-logo.webp?v=20230823-2" type="image/webp"><source srcset="//nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/home/android-logo.png?v=20230823-2" type="image/png"><img alt="Download Android APK" class="img-responsive" loading="lazy" src="//nx-cdn.trgwl.com/Images/nexus-beta/dark-gold/mobile/home/android-logo.png?v=20230823-2"></picture>
                    <a href="https://apk-bank.s3.ap-southeast-1.amazonaws.com/rdp.apk">Unduh</a>
                </div>
            </div>
            <div id="apk_install_guide_modal" class="modal download-popup-modal" role="dialog" data-title="Panduan Instalasi" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="apk_install_guide_modal_title">
                                Panduan Instalasi
                            </h4>
                        </div>
                        <div class="modal-body" id="apk_install_guide_modal_body">
                            <h5><img loading="lazy" src="//nx-cdn.trgwl.com/Images/icons/android-logo.svg?v=20230823-2"> Instalasi Android</h5>
                            <ol>
                                <li>
                                    Pindai kode QR untuk Android
                                </li>
                                <li>
                                    Pilih buka situs web
                                </li>
                                <li>
                                    Pilih "UNDUH" untuk mengunduh PASJACKPOT App
                                </li>
                                <li>
                                    Pilih "PENGATURAN"
                                </li>
                                <li>
                                    Pilih "Mengizinkan" dari sumber kami
                                </li>
                                <li>
                                    Pilih "Terima"
                                </li>
                                <li>
                                    Pilih "INSTAL"
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .snowflake{color:#fff;font-size:1em;font-family:Arial,sans-serif;text-shadow:0 0 5px #000;position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:first-of-type{left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:60%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:10%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:40%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s}
        </style>
    </div>