<?php
include("./header.php");
include("./escape.php");
include("./db.php");

$name = filter_input(INPUT_POST, 'contactName');
$mail = filter_input(INPUT_POST, 'contactMail');
$title = filter_input(INPUT_POST, 'contactTitle');
$content = filter_input(INPUT_POST, 'contactContent');

if(!empty($name) && !empty($mail) && !empty($title) && !empty($content)) {
  try {
    $stmt = $dbh->prepare("
    INSERT INTO contact_table(
      contact_id, contact_name, contact_mail, contact_date, contact_status, contact_title, contact_detail)
    VALUES(
      :contact_id, :contact_name, :contact_mail, :contact_date, :contact_status, :contact_title, :contact_detail)
    ");

    $stmt->bindValue(':news_id', $newsId, PDO::PARAM_STR);
    $stmt->bindValue(':news_day', $postDate, PDO::PARAM_STR);
    $stmt->bindValue(':news_title', $postTitle, PDO::PARAM_STR);
    $stmt->bindValue(':news_text', $postText, PDO::PARAM_STR);
    $stmt->bindValue(':news_image', $postImage, PDO::PARAM_STR);
    $stmt->bindValue(':news_status', $status, PDO::PARAM_STR);
    $stmt->bindValue(':news_timestamp', $timestamp, PDO::PARAM_STR);
    $stmt->execute();

    if ($status === 'post') {
      echo "<script>alert('投稿しました');</script>";
    } elseif ($status === 'save') {
      echo "<script>alert('保存しました');</script>";
    }
    $status = '';
  } catch (PDOException $e) {
    exit($e);
  }
}

?>
<div class="wrapper">
  <div class="el_humburger">
    <!--ハンバーガーボタン-->
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
            <a href="../index.html"><img src="../images/charMa_logo02.png" alt="charMa"></a>
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
    <section class="contact-main">
      <h1>Contact</h1>
      <div class="com">
        <p>
          ご不明点などございましたらお気軽にお問合せくださいませ。
        </p><br>
        いつ見ても楽しめるサイトを目指しておりますので<br>
        もっとこうだったら、もっとこうして欲しい、などのリクエストもお待ちしております。
        </p>
      </div>
      <div class="line"></div>
      <div align="center">
        <!-- <form class="form01" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSd8spkJcnGMyjJOJhJ6J44EYh_mN28aV0EFgAyCmwAFVKPLBg/formResponse" method="post" target="hidden_iframe" onsubmit="submitted=true;"> -->
        <form class="form01" action="./contact.php" method="post">
          <table>
            <tr>
              <td>お名前 *</td>
              <!-- <td><input type="text" name="entry.2007206440" value="" required=""></td> -->
              <td><input type="text" name="contactName" value="" required=""></td>
            </tr>
            <tr>
              <td>メールアドレス *</td>
              <!-- <td><input type="email" name="entry.380396688" value="" required=""></td> -->
              <td><input type="email" name="contactMail" value="" required=""></td>
            </tr>
            <tr>
              <td>お問い合わせ項目 *</td>
              <td>
                <!-- <input type="checkbox" name="example" value="サイトについて">サイトについて
                <input type="checkbox" name="example" value="OnlineShopについて">OnlineShopについて
                <input type="checkbox" name="example" value="商品について">商品について
                <input type="checkbox" name="example" value="その他ご意見・ご要望">その他ご意見・ご要望 -->
                <input type="checkbox" name="contactTitle" value="サイトについて">サイトについて
                <input type="checkbox" name="contactTitle" value="OnlineShopについて">OnlineShopについて
                <input type="checkbox" name="contactTitle" value="商品について">商品について
                <input type="checkbox" name="contactTitle" value="その他ご意見・ご要望">その他ご意見・ご要望
              </td>
            </tr>
            <tr>
              <td>お問い合わせ内容 *</td>
              <!-- <td><textarea name="entry.1389805685" rows="8" cols="80" required=""></textarea></td> -->
              <td><textarea name="contactContent" rows="8" cols="80" required=""></textarea></td>
            </tr>
          </table>
          <input type="submit" value="送　信" class="btn">
        </form>
      </div>
      <script type="text/javascript">
        var submitted = false;
      </script>
      <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;" onload="if(submitted){window.location='◯◯◯◯（サンクスページのパス）';}"></iframe>



    </section>




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
      <a href="../index.html">
        <p>Top</p>
      </a>
    </div>
    <div class="footer-menu">
      <a href="about.html">
        <p>About</p>
      </a>
    </div>
    <div class="footer-menu">
      <a href="brand.html">
        <p>Brand</p>
      </a>
      <!-- <ul>
          <li><a href="">All</a></li>
        </ul> -->
    </div>
    <div class="footer-menu">
      <a href="brandhistory.html">
        <p>BrandHistory</p>
      </a>
      <!-- <ul>
          <li><a href="#aboutus">All</a></li>
        </ul> -->
    </div>

    <div class="footer-menu">
      <a href="interview.html">
        <p>Interview</p>
      </a>
      <!-- <ul>
          <li><a href="/works#all">All</a></li>
        </ul> -->
    </div>

    <div class="footer-menu">
      <a href="onlinestore.html">
        <p>OnlineStore</p>
      </a>
      <ul>
        <li><a href="/works#all">Privacy policy</a></li>
        <li class="small"><a href="/works#all">特定商取引法に基づく表記</a></li>
        <li class="small"><a href="/works#all">配送・返品について</a></li>
      </ul>
    </div>

    <div class="footer-menu">
      <a href="contact.html">
        <p>Contact</p>
      </a>
    </div>
  </div>

  <div id="followUs">
    <ul class="btn00">
      <li class="instagram"><a href="" target="_blank">
          <!--instagramのURL--><i class="fab fa-instagram"></i>
        </a></li>
      <!--instagramのアイコン画像-->
      <li class="facebook"><a href="" target="_blank">
          <!--FBのURL--><i class="fab fa-facebook-square"></i>
        </a></li>
      <!--FBのアイコン画像-->
      <li class="twitter"><a href=" " target="_blank"><i class="fab fa-twitter"></i></a></li>
    </ul>
  </div>

  <div class="copyright">
    <p><small>Copyright charMa All Rights Reserved.</small></p>
  </div>
  <!-- /#globalFooter -->
</footer>
<!-- <a href="#" class="totop">トップに<br>戻る</a> -->
<a href="#" id="page-top">TOP</a>

<?php
include("./footer.php");
?>
