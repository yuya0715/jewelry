<?php
include("./header.php");
include("./escape.php");
include("./db.php");
?>
<link href="../css/news.css" rel="stylesheet">

	<div class="wrapper">
  <div class="el_humburger"><!--ハンバーガーボタン-->
    <div class="el_humburger_wrapper">
      <span class="el_humburger_bar top"></span>
      <span class="el_humburger_bar middle"></span>
      <span class="el_humburger_bar bottom"></span>
    </div>
  </div>
  <div id="loader-bg">
    <div id="loader">
      <img src="../images/zara.gif" width="130" height="auto">
    </div>
  </div>

  <header class="navi">
    <div class="navi_inner">
      <div class="navi_item"><a href="../index.html">Top</a></div>
      <div class="navi_item"><a href="about.html">About</a></div>
      <div class="navi_item"><a href="brand.html">Brand</a></div>
      <div class="navi_item"><a href="brandhistory.html">BrandHistory</a></div>
      <div class="navi_item"><a href="onlinestore.html">OnlineStore</a></div>
      <div class="navi_item"><a href="contact.html">Contact</a></div>

    </div>
  </header>


    <header class="fixed">
      <div>
      <nav class="navBox">
        <div class="center">
          <ul class="nav-left">
            <li><a href="about.html">About</a></li>
            <li><a href="brand.html">Brand</a></li>
            <li><a href="brandhistory.html">BrandHistory</a></li>
          </ul>

          <div class="logo">
              <a href="../index.html"><img src="../images/charMa_logo02.png" alt="charMa" ></a>
          </div>

          <ul class="nav-right">
            <li class="margin01"><a href="interview.html">Interview</a></li>
            <li><a href="onlinestore.html">OnlineStore</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
      </nav>

      <div class="toggle_btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <div id="mask"></div>
    </header>

	<main>

    <h1>News</h1>

    <?php
      $sth4 =  $dbh->prepare("SELECT * FROM news_table ORDER BY news_day DESC");
      $sth4->execute();
      while ($row4 = $sth4->fetch(PDO::FETCH_ASSOC)) :
      ?>
        <?php if ($row4['news_status'] === "post") : ?>
          <section class="news">
            <div class="days">
              <p><?php echo h($row4['news_day']); ?></p>
            </div>
            <div class="image">
              <?php if (empty($row4['news_image'])) : ?>
                <img src="../img/202107050947016.png" alt="">
              <?php else :?>
                <img src="../img/<?php echo h($row4['news_image']); ?>" alt="">
              <?php endif; ?>  
            </div>
            <div class="title_dc">
              <h4><?php echo h($row4['news_title']); ?></h4>
              <div class="discription">
                <p><?php echo h($row4['news_text']); ?></p>
              </div>
            </div>
          </section>
        <?php endif; ?>  
      <?php
      endwhile;
      ?>
    <div class="page-borderbox l"></div>
    <div class="page-borderbox r"></div>
    <div class="page-borderbox t"></div>
    <div class="page-borderbox b"></div>
  </main>
  </div>

  <?php
include("./footer.php");
?>
