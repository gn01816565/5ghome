<!DOCTYPE html>
<html>
  <head>
    <?php
      include ('./head.php');
    ?>
  </head>
    <!--Jquery-->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <body>
    <div id="loginMainWarp">
      <div id="topLineWarp" class="red">
        <div class="btnWarp">
          <ul>
            <li><a href='login.php' class="green" title="會員登入">管理者登入</a></li>
            <li><a href="../tc" class="red" title="連結官網">連結官網</a></li>
          </ul>
        </div>
      </div>
      <header id="loginWarp">
        <div class="logo"><img src ="../images/logo.svg" alt="logo"></div>
        <div class="txt">密碼還原</div>
        <div class="formWarp">
          <div class="formBox">
            <div class="title red">訊息</div>
            <div class="form" style="height:150px;text-align:center;">
              </br>
              <img src="../images/mail_icon.svg" alt="mail_icon">
               <p>您好！您的資料已送出！<br>稍後請登入您的申請信箱收取郵件，謝謝！</p>
            </div>
            <span id="emailAlert"></span>
          </div>
          <div class="formBox">
            <button type="button" class="red" style='width:100%;height:40px;' onclick="location.href='./index.php'">回首頁</button>
          </div>
        </div>
      </header>
      <footer id="footerWarp" class="login">
        <h2>Copyright © 2015 FIVE STARS. All Rights Reserved.</h2>
      </footer>
    </div>
  </body>
</html>