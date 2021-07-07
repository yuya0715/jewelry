<?php
include("./header.php");
include("./escape.php");
include("./db.php");

?>
<link href="../css/brand.css" rel="stylesheet">

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
      <div class="navi_item"><a href="">About</a></div>
      <div class="navi_item"><a href="">Brand</a></div>
      <div class="navi_item"><a href="">BrandHistory</a></div>
      <div class="navi_item"><a href="">OnlineStore</a></div>
      <div class="navi_item"><a href="">Contact</a></div>

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
    <section class="brand">
      <h1>Brand</h1>

      <div class="list">
        <?php
        $sth =  $dbh->prepare("SELECT * FROM brand_table");
        $sth->execute();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) :
          if ($row['brand_flag'] === "open") : 
        ?>   
          <form action="history01.php" method="get">
            <div>
              <div class="box_desc">
                <button type="submit">
                  <img src="../admin/img/<?php echo h($row['brand_top_image']); ?>"> 
                  <h3><?php echo h($row['brand_name']); ?></h3>
                  <input type="hidden" id="brandId" name="brandId" value="<?php echo h($row['brand_id']); ?>">
                </button>
              </div>
            </div>
          </form>
          <?php endif; ?> 
        <?php endwhile;?>
      </div>  
  </section>


    <div class="page-borderbox l"></div>
    <div class="page-borderbox r"></div>
    <div class="page-borderbox t"></div>
    <div class="page-borderbox b"></div>
  </main>
  </div>

  <?php
include("./footer.php");
?>
