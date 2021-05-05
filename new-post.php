<!DOCTYPE html>
<html lang="sr">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8N2WRBFNYH"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-8N2WRBFNYH');
  </script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />
<style>
    @font-face {
    font-family: 'Oswald';
    src: url('css/fonts/Oswald-SemiBold.woff2') format('woff2'),
        url('css/fonts/Oswald-SemiBold.woff') format('woff');
    font-weight: 600;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Oswald';
    src: url('css/fonts/Oswald-Bold.woff2') format('woff2'),
        url('css/fonts/Oswald-Bold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Poppins';
    src: url('css/fonts/Poppins-Black.woff2') format('woff2'),
        url('css/fonts/Poppins-Black.woff') format('woff');
    font-weight: 900;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Poppins';
    src: url('css/fonts/Poppins-Regular.woff2') format('woff2'),
        url('css/fonts/Poppins-Regular.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Poppins';
    src: url('css/fonts/Poppins-SemiBold.woff2') format('woff2'),
        url('css/fonts/Poppins-SemiBold.woff') format('woff');
    font-weight: 600;
    font-style: normal;
    font-display: swap;
}
  </style>
  <!-- FAVICON  -->
  <link rel="shortcut icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />

  <!-- CLEAN URL AFTER REFRESHING  -->
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script>
  <title>Nutri.Logika</title>
</head>

<body>
  <?php session_start(); ?>
  <!-- =====================================
           Stop direct request for dashboard
    ========================================= -->
  <?php if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:index.php?dashboard=false');
    exit;
  } ?>
  <!-- =====================
            HEADER
    ======================= -->
  <header class="index-header relative-navbar">
    <div class="navbar__wrapper">
      <a href="index.php#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
      <nav class="navbar">
        <ul class="navbar__list">
          <li class="navbar__item">
            <a href="index.php#naslovna" class="navbar__link"> Home</a>
          </li>
          <li class="navbar__item">
            <a href="blog-admin.php" class="navbar__link"> Blog</a>
          </li>
          <li class="navbar__item">
            <a href="dashboard.php" class="navbar__link"> Prijave</a>
          </li>
        </ul>
      </nav>
      <button class="menu-toggle">
        <span class="hamburger"></span>
      </button>
    </div>
    <!-- <div class="switchers-wrapper">
            <button class="language-switcher-sr">
              SR <img src="css/img/flat-icons/serbia.png" alt="ser" />
            </button>
            <button class="language-switcher-en">
              <img src="css/img/flat-icons/united-kingdom.png" alt="eng" />EN
            </button>
          </div> -->
  </header>
  <!-- =====================
          NEW POST MAIN
    ======================= -->
  <main class="new-post__main">
    <div class="new-post__wrapper">
      <div class="new-post__title">
        <h1>Add New Post</h1>
      </div>

      <!--ISPISIVANJE GRESKE PRAZNO POLJE-->
      <div id="php_greska" class="error-message-visible">
        <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "create=prazno_polje") == true) {
          $errors = "MORATE POPUNITI SVA POLJA";
          echo ('<p>' . $errors . '</p>');
        } elseif (strpos($fullUrl, "create=image_error") == true) {
          $errors = "SLIKA MORA BITI PNG,JPG,JPEG FORMATA I MANJA OD 1MB";
          echo ('<p>' . $errors . '</p>');
        } elseif (strpos($fullUrl, "create=error") == true) {
          $errors = "DOSLO JE DO PROBLEMA SA SERVEROM POKUSAJTE PONOVO";
          echo ('<p>' . $errors . '</p>');
        }
        ?>
      </div>
      <div class="new-post__form--wrapper">
        <form action="php/new-post-engine.php" class="new-post__form" method="post" enctype="multipart/form-data">
          <div class="polje">
            <label for="new-post__title">Naslov</label>

            <!-- <input
                type="text"
                name="new-post__title"
                id="new-post__title"
                placeholder="Naslov novog posta.."
              > -->
            <?php
            if (isset($_GET['title'])) {
              $title = $_GET['title'];
              echo '<input  name="new-post__title" id="new-post__title" value="' . $title . '">';
            } else {
              echo '<input placeholder="Naslov novog posta.." name="new-post__title" id="new-post__title">';
            };
            ?>
          </div>
          <!-- *********************** -->
          <div class="polje">
            <label for="new-post__tekst">Tekst</label>
            <!-- <textarea
                name="new-post__tekst"
                id="new-post__tekst"
                cols="30"
                rows="10"
                placeholder="Tekst novog posta.."
              ></textarea>-->
            <?php
            if (isset($_GET['body'])) {
              $body = $_GET['body'];
              echo '<textarea cols="30"rows="10" name="new-post__tekst" id="post__tekst" >' . $body . '</textarea>';
            } else {
              echo '<textarea cols="30"rows="10"placeholder="Tekst novog posta.." name="new-post__tekst" id="post__tekst"></textarea>';
            };
            ?>
          </div>
          <!-- *********************** -->
          <div class="polje">
            <label for="image">Slika</label>
            <input type="file" name="userfile" id="userfile">
          </div>
          <!-- *********************** -->
          <div class="polje">
            <select type="text" name="new-post__kategorija" id="new-post__kategorija">
              <option value="Ishrana" name="Ishrana" class="opcija">Ishrana</option>
              <option value="Trening" name="Trening" class="opcija">Trening</option>
              <option value="Motivacija" name="Motivacija" class="opcija">Motivacija</option>
            </select>
          </div>
          <!-- *********************** -->
          <button type="submit" name="add-post-btn" class="dugme-login-admin dugme-omeni">Add New Post</button>
        </form>

      </div>
    </div>
  </main>
  <!-- =====================
              FOOTER
    ======================= -->
  <footer>
    <section id="footer">
      <div class="footer-wrapper">
        <a href="index.php#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
        <div class="kontakt-container">
        <h3>Contact:</h3>
          <p><span>E-mail:</span> nutri.logika@gmail.com</p>
          <p><span>Telefon:</span> 061/61-45-617</p>
        </div>

        <div class="footer-links__container">
        <h3>Quick links:</h3>
          <ul class="footer-links--list">
            <li class="footer__item">
              <a href="index.php#naslovna" class="footer__link">Home</a>
            </li>
            <li class="footer__item">
              <a href="index.php#ponuda" class="footer__link">Ponuda</a>
            </li>
            <li class="footer__item">
              <a href="index.php#testimonials" class="footer__link">Rezultati</a>
            </li>
            <li class="footer__item">
              <a href="omeni.html" class="footer__link">O meni</a>
            </li>
            <li class="footer__item">
              <a href="index.php#prijava" class="footer__link">Prijavi se</a>
            </li>
            <li class="footer__item">
              <a href="calculator.html" class="footer__link">Kalkulator</a>
            </li>
          </ul>
        </div>
        <div class="social">
          <ul class="social-icons">
            <li class="social-icon">
              <a href="https://www.instagram.com/nutri.logika/"><img class="social-icon-img" src="css/img/flat-icons/instagram.svg" alt="instagram icon"></a>

            </li>
            <li class="social-icon">
              <a href="https://www.facebook.com/pages/category/Health-Beauty/Nutri-Logika-152013968719417/"><img class="social-icon-img" src="css/img/flat-icons/facebook.svg" alt="facebook icon"></a>

            </li>
            <li class="social-icon"><a href="https://twitter.com/JCvetojevic"><img class="social-icon-img" src="css/img/flat-icons/twitter.svg" alt="twiter icon"></a></li>
          </ul>
        </div>
      </div>
    </section>
    <!-- zastava -->
    <div class="copyrights">
      <p class="copyright__text">Copyright &copy; VuleDule 2020 Serbia</p>
    </div>
  </footer>
  <!-- ==========================
                      JQUERY
          =========================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- ==========================
                      SELECTRIC
          =========================== -->
  <script src="js/selectric/jquery.selectric.min.js"></script>
  <script>
    $(function() {
      $("select").selectric();
    });
  </script>
  <!-- <script src="js/dashboard.js"></script> -->
  <script src="js/custome.js"></script>
</body>

</html>