<?php
include("./header.php");
include("./escape.php");
include("./db.php");

$brandId = $_GET["brandId"];

$stmt =  $dbh->prepare("SELECT * FROM brand_table WHERE brand_id = :brand_id");
$stmt->bindValue(':brand_id', $brandId, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$brandName = $row['brand_name'];
$brandAddress = $row['brand_address'];
$brandTopImage = $row['brand_top_image'];
$brandTitle1 = $row['brand_block1_title'];
$brandContent1 = $row['brand_block1_content'];
$brandImage1 = $row['brand_block1_image'];
$brandTitle2 = $row['brand_block2_title'];
$brandContent2 = $row['brand_block2_content'];
$brandImage2 = $row['brand_block2_image'];


?>
  <link href="../css/brandhistory.css" rel="stylesheet">


	<div class="wrapper">
  <div class="el_humburger"><!--ハンバーガーボタン-->
    <div class="el_humburger_wrapper">
      <span class="el_humburger_bar top"></span>
      <span class="el_humburger_bar middle"></span>
      <span class="el_humburger_bar bottom"></span>
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

  <!-- <div class="main_photo">
    <div class="slideshow">
      <img class="shadow" src="images/top03.png" alt="charMaTOP" width="980px" height="auto"> -->
      <!-- <img class="shadow" src="images/sozai01.jpg" alt="charMa" width="980px" height="auto"> -->
      <!-- <img src="" alt=""> -->
    <!-- </div>
  </div> -->

	<main>
    <section class="history">
      <h1>BrandHistory</h1>
      <!-- <img src="images/980.400.png" alt="工房名" > -->

      <div class="rules-outer">
        <div class="rules-inner">
          <div class="company">
            <div class="c01">
              <h2><?php echo h($brandName); ?></h2>
              <p>所在地：<?php echo h($brandAddress); ?></p>

            </div>
            <div class="c02">
              <img src="../img/<?php echo h($brandTopImage); ?>" alt="" >
            </div>
          </div>
        </div>
      </div>
      <div class="link">
      <div>
        <a href="interview.html" class="btn">Interviewはこちら</a>
      </div>
      <div>
        <a href="onlinestore.html" class="btn btn03">商品はこちら</a>
      </div>
    </div>
      </section>
      <div class="line"></div>
      <h2 class="komidasi"><i class="fas fa-signature"></i><?php echo h($brandTitle1); ?></h2>
      <section class="history01">
      <figure><img src="../img/<?php echo h($brandImage1); ?>"></figure>
        <p><?php echo h($brandContent1); ?></p>

      </section>
      <div class="line"></div>
      <h2 class="komidasi"><i class="fas fa-signature"></i><?php echo h($brandTitle2); ?></h2>
      <section class="history02">
      <figure><img src="../img/<?php echo h($brandImage2); ?>"></figure>
        <p><p><?php echo h($brandContent2); ?></p></p>

      </section>

      <div class="link margin02">
        <div>
          <a href="interview.html" class="btn">Interviewはこちら</a>
        </div>
        <div>
          <a href="onlinestore.html" class="btn btn03">商品はこちら</a>
        </div>
      </div>


    <div class="page-borderbox l"></div>
    <div class="page-borderbox r"></div>
    <div class="page-borderbox t"></div>
    <div class="page-borderbox b"></div>
  </main>
  </div>

  <?php
include("./footer.php");
?>
