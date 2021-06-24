<?php
include("./header.php");
include("./escape.php");
include("./db.php");


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // ID生成（10桁）
  $contactId = '';
  for($i=0; $i<10; $i++){
    if($i === 0) {
      $contactId .= mt_rand(1,9);
    } else {
      $contactId .= mt_rand(0,9);
    }
  }
  $contactName = filter_input(INPUT_POST, 'contactName');
  $contactMail = filter_input(INPUT_POST, 'contactMail');
  $contactDate = date("Y-m-d H:i", time());
  $contactStatus = '未読';
  // checkboxのため、複数選択されている場合がある（カンマ区切りでINSERT）
  if(isset($_POST['contactTitle']) && is_array($_POST['contactTitle'])) {
    $contactTitle = implode(',', $_POST['contactTitle']);
  }
  $contactDetail = filter_input(INPUT_POST, 'contactDetail');

  try {
    $stmt = $dbh->prepare("
    INSERT INTO contact_table(
      contact_id, contact_name, contact_mail, contact_date, contact_status, contact_title, contact_detail)
    VALUES(
      :contact_id, :contact_name, :contact_mail, :contact_date, :contact_status, :contact_title, :contact_detail)
    ");

    $stmt->bindValue(':contact_id', $contactId);
    $stmt->bindValue(':contact_name', $contactName);
    $stmt->bindValue(':contact_mail', $contactMail);
    $stmt->bindValue(':contact_date', $contactDate);
    $stmt->bindValue(':contact_status', $contactStatus);
    $stmt->bindValue(':contact_title', $contactTitle);
    $stmt->bindValue(':contact_detail', $contactDetail);
    $stmt->execute();

    echo "<script>alert('お問合せ頂き、誠にありがとうございます。お問い合わせ内容を確認し頂いたメールアドレス宛に回答いたしますので、今しばらくお待ち下さい。');</script>";

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
      <div class="text-center">
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
                <input type="checkbox" name="contactTitle[]" value="サイトについて">サイトについて
                <input type="checkbox" name="contactTitle[]" value="OnlineShopについて">OnlineShopについて
                <input type="checkbox" name="contactTitle[]" value="商品について">商品について
                <input type="checkbox" name="contactTitle[]" value="その他ご意見・ご要望">その他ご意見・ご要望
              </td>
            </tr>
            <tr>
              <td>お問い合わせ内容 *</td>
              <!-- <td><textarea name="entry.1389805685" rows="8" cols="80" required=""></textarea></td> -->
              <td><textarea name="contactDetail" rows="8" cols="80" required=""></textarea></td>
            </tr>
          </table>
          <p style="text-align:center;">
            <input type="submit" value="送　信" class="btn">
          </p>
        </form>
      </div>
      <!-- <script type="text/javascript">
        var submitted = false;
      </script>
      <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;" onload="if(submitted){window.location='◯◯◯◯（サンクスページのパス）';}"></iframe> -->



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
