<?php
include("../admin/php/parts/escape.php");
include("../admin/php/parts/db.php");
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="../css/style.css" rel="stylesheet">
  <link href="../css/news.css" rel="stylesheet">
	<title>charMa</title>
	<!--ファビコン-->
  <link rel="shortcut icon" type="" href=" "> <!--←image/vnd.microsoft.iconファイルを指定する-->
  <link rel="apple-touch-icon" type="image/png" href=""><!--image/apple-touch-icon-180x180.pngファイルを指定する-->
  <link rel="icon" type="image/png" href="">　 <!--←image/icon-192x192.pngファイルを指定する-->

  <meta http-equiv="X-UA-Compatible"content="IE=edge" />
  <meta name="description" content="ディスクリプションを設定する">
  <meta name="keywords" content="charMa, 職人,ジュエリー, インタビュー, 天然石, ストーリー,セレクトショップ">
  <meta property="og:title" content="charMa">
  <meta property="og:type" content="website">
  <meta property="og:url" content=""> <!--URLを貼る-->
  <meta property="og:image"content=""><!--イメージ画像を張る-->
  <meta content="charMa" property="og:site_name">
  <meta property="og:description" content="charMa　ジュエリーセレクトショップ">
  <!-- ↓アップする際に必ず外す！！！！！！！ -->
  <meta name=”robots” content="noindex, nofollow">
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
  <!-- google-font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
</head>

<body>
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
                <img src="../admin/img/202107050947016.png" alt="">
              <?php else :?>
                <img src="../admin/img/<?php echo h($row4['news_image']); ?>" alt="">
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

  <footer>
    <hr class="cp_hr04">
    <div class="container">
      <div class="footer-menu">
        <a href="../index.html"><p>Top</p></a>
      </div>
      <div class="footer-menu">
        <a href="about.html"><p>About</p></a>
      </div>
      <div class="footer-menu">
        <a href="brand.html"><p>Brand</p></a>
        <!-- <ul>
          <li><a href="">All</a></li>
        </ul> -->
      </div>
      <div class="footer-menu">
        <a href="brandhistory.html"><p>BrandHistory</p></a>
        <!-- <ul>
          <li><a href="#aboutus">All</a></li>
        </ul> -->
      </div>

      <div class="footer-menu">
        <a href="interview.html"><p>Interview</p></a>
        <!-- <ul>
          <li><a href="/works#all">All</a></li>
        </ul> -->
      </div>

      <div class="footer-menu">
        <a href="onlinestore.html"><p>OnlineStore</p></a>
        <ul>
          <li><a href="/works#all">Privacy policy</a></li>
          <li class="small"><a href="/works#all">特定商取引法に基づく表記</a></li>
          <li class="small"><a href="/works#all">配送・返品について</a></li>
        </ul>
      </div>

      <div class="footer-menu">
        <a href="contact.html"><p>Contact</p></a>
      </div>
    </div>


    <div id="followUs">
      <ul class="btn00">
        <li class="instagram"><a href="" target="_blank"><!--instagramのURL--><i class="fab fa-instagram"></i></a></li><!--instagramのアイコン画像-->
        <li class="facebook"><a href="" target="_blank"><!--FBのURL--><i class="fab fa-facebook-square"></i></a></li><!--FBのアイコン画像-->
        <li class="twitter"><a href=" " target="_blank"><i class="fab fa-twitter"></i></a></li>
      </ul>
    </div>

    <div class="copyright">
      <p><small>Copyright charMa All Rights Reserved.</small></p>
    </div>
    <!-- /#globalFooter --></footer>
<!-- <a href="#" class="totop">トップに<br>戻る</a> -->
<a href="#" id="page-top">TOP</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</body>
</html>
