<!DOCTYPE html>
<html lang="sr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- fonts -->

    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- selectric  -->
    <link rel="stylesheet" href="js/selectric/selectric.css" />

    <!-- glider  -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css"
    />

    <!-- FONT AWESOME -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
    <!-- FAVICON  -->
    <link
      rel="shortcut icon"
      href="css/img/favicon/favicon.ico"
      type="image/x-icon"
    />
    <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />

    <title>nutri.logika</title>
  </head>

  <body>
    <!-- =====================
            HEADER
    ======================= -->
    <header class="index-header relative-navbar">
      <div class="navbar__wrapper">
        <a href="index.php#naslovna" class="navbar__logo"
          ><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img"
        /></a>
        <nav class="navbar">
          <ul class="navbar__list">
            <li class="navbar__item">
              <a href="index.php#naslovna" class="navbar__link"
                ><i class="fas fa-home"></i>&nbsp; Home</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#ponuda" class="navbar__link"
                ><i class="fas fa-dumbbell"></i>&nbsp; Ponuda</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#testimonials" class="navbar__link"
                ><i class="far fa-grin"></i>&nbsp; Rezultati</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#omeni" class="navbar__link"
                ><i class="far fa-thumbs-up"></i>&nbsp; O meni</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#prijava" class="navbar__link"
                ><i class="fas fa-pencil-alt"></i>&nbsp; Prijavi se</a
              >
            </li>
            <li class="navbar__item">
              <a href="calculator.html" class="navbar__link"
                ><i class="fas fa-calculator"></i>&nbsp; Kalkulator</a
              >
            </li>
            <li class="navbar__item">
              <a href="blog.php" class="navbar__link"
                ><i class="fas fa-book"></i>&nbsp; Blog</a
              >
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
            BLOG MAIN
    ======================= -->
    <main>
    <?php 
      //// Read ALL post from DB
              require_once('php/connection.php');

              $sql = "SELECT * FROM posts";
              $query=$conn->prepare($sql);
              $query->execute();
              $posts=$query->get_result()->fetch_all(MYSQLI_ASSOC);
      ?>
      <div class="blog-index__wrapper">
        <div class="blog-index__main-title--wrapper">
          <div class="blog-index__main-title">
            <h2>Najnoviji blog postovi</h2>
          </div>
        </div>
        <?php foreach ($posts as $key => $post): ?>
        <div class="blog-index__content">
          <!-- <div class="blog-index__content--info"> -->
          <ul class="blog-index__info--list">
            <li><span>Author:</span> Jovan Cvetojevic</li>
            <li><span>Date:</span> <?php echo " ".  date('F j, Y',strtotime($post['created_at']));?></li>
            <li><span>Category:</span> <?php echo $post['topic'];?></li>
          </ul>
          <div class="blog-index__img-holder">
          <a href="blog-single-post.php?id=<?php echo $post['id']?>"><img src="css/img/blog/<?php echo ($post['image']);?>" alt="" class="post-image"></a>
          </div>
          <!-- </div> -->
          <div class="blog-index__content--text">
            <a href="blog-single-post.php?id=<?php echo $post['id'];?>" class="single-blog__link">
              <div class="blog-index__title">
                <h4><?php echo $post['title'];?></h4>
              </div>
              <p>
              <?php echo html_entity_decode(substr($post['body'], 0, 500). '...'); ?>
              </p>
            </a>
          </div>
          <div class="blog-index__underline"></div>
        </div>
        <?php endforeach; ?>

        <!-- <div class="blog-index__button--wrapper">
              <button class="dugme-login-admin">
                <a href="blog.html">Pogledaj ceo blog</a>
              </button>
            </div> -->
      </div>
    </main>

    <!-- =====================
              FOOTER
    ======================= -->

    <footer>
      <section id="footer">
        <div class="footer-wrapper">
          <a href="index.html#naslovna" class="navbar__logo"
            ><img
              src="css/img/nutri.logika.png"
              alt=""
              class="navbar__logo__img"
          /></a>
          <div class="kontakt-container">
            <p><span>E-mail:</span> nutri.logika@gmail.com</p>
            <p><span>Telefon:</span> 061/61-45-617</p>
          </div>

          <div class="footer-links__container">
            <ul class="footer-links--list">
              <li class="footer__item">
                <a href="index.php#naslovna" class="footer__link"
                  ><i class="fas fa-home"></i>&nbsp; Home</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#ponuda" class="footer__link"
                  ><i class="fas fa-dumbbell"></i>&nbsp; Ponuda</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#testimonials" class="footer__link"
                  ><i class="far fa-grin"></i>&nbsp; Rezultati</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#omeni" class="footer__link"
                  ><i class="far fa-thumbs-up"></i>&nbsp; O meni</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#prijava" class="footer__link"
                  ><i class="fas fa-pencil-alt"></i>&nbsp; Prijavi se</a
                >
              </li>
              <li class="footer__item">
                <a href="calculator.html" class="footer__link"
                  ><i class="fas fa-calculator"></i>&nbsp; Kalkulator</a
                >
              </li>
              <li class="footer__item">
                <a href="blog.php" class="footer__link"
                  ><i class="fas fa-book"></i>&nbsp; Blog</a
                >
              </li>
            </ul>
          </div>
          <div class="social">
            <ul class="social-icons">
              <li class="social-icon">
                <i class="fab fa-instagram fa-2x"></i>
              </li>
              <li class="social-icon">
                <i class="fab fa-facebook-f fa-2x"></i>
              </li>
              <li class="social-icon"><i class="fab fa-twitter fa-2x"></i></li>
              <li class="social-icon"><i class="fab fa-tiktok fa-2x"></i></li>
            </ul>
          </div>
        </div>
      </section>
      <!-- zastava -->
      <div class="copyrights">
        <p class="copyright__text">Copyright &copy; VuleDule 2020 Serbia</p>
        <div class="mentions">
          <p>
            Icons made by
            <a href="https://www.flaticon.com/authors/freepik" title="Freepik"
              >Freepik</a
            >
            &
            <a
              href="https://www.flaticon.com/authors/roundicons"
              title="Roundicons"
              >Roundicons</a
            >
            from
            <a href="https://www.flaticon.com/" title="Flaticon"
              >www.flaticon.com</a
            >
          </p>
        </div>
      </div>
    </footer>
    <!-- ==========================
                  JQUERY
      =========================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- ==========================
                  GLIDER
      =========================== -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

    <!-- ==========================
                  SELECTRIC
      =========================== -->
    <script src="js/selectric/jquery.selectric.min.js"></script>
    <script>
      $(function () {
        $("select").selectric();
      });
    </script>
    <script src="js/custome.js"></script>
    <script src="js/form.js"></script>
  </body>
</html>