<!DOCTYPE html>

<!--
<?php
session_start();
if(isset($_SESSION['count'])) {
    if($_SESSION['count'] === 0) {
        http_response_code(301);
        header("Location: dash.php");
        exit();
    }
}
?>
-->

<html>

<head>
  <meta charset="utf-8">
  <meta name="application-name" content="Virtual Control">
  <link rel="icon" href="images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TOP - Virtual Control</title>
  <meta name="description" content="Virtual Control - A Controlling Networks Tool.">
  
  <!-- CSS -->
  <link rel="stylesheet" href="awesome.min.css" type="text/css">
  <link rel="stylesheet" href="aquamarine.css" type="text/css">
  
  <!-- Javascript -->
  <script src="js/navbar-ontop.js"></script>
  <script src="js/animate-in.js"></script>
  <script src="js/loader.js"></script>  
  
</head>

<body>
  <!-- Navbar -->
  <div id="nav"></div>
  
  <div class="pt-5 bg-primary shadow-lg" style="">
    <div class="container mt-0 pt-0">
      <div class="row" style="">
        <div class="col-md-12 text-lg-left text-center align-self-center my-2" style="">
          <div class="card-body my-1 bg-dark" style="border-top-left-radius: 20px; border-bottom-right-radius: 20px;">
            <h5 class="card-title bg-primary shadow-none p-2" style="border-bottom-right-radius: 10px;border-top-left-radius: 10px;">
                <i class="fa fa-user fa-fw"></i>ログインが必要です</h5>
            <p class="card-text">本サーバはユーザ登録制です。<br>管理者権限により作成されたアカウントでログインしてください。</p>
          </div>
        </div>
      </div>
      <div id="logo"></div>
    </div>
  </div>
  <div class="py-3" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <h3 class="" style="">アクセス監視は新たな挑戦へ</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card text-white bg-dark mb-3">
          </div>
          <p class="text-monospace break" style="">Virtual Control は、SNMPを利用したネットワークアクセス監視を実現できる監視ツールです。<br><br>アクセス監視は運用・保守の専門職を問わず、誰でも監視できる環境を整えなければならない時代に差し掛かっています。その状況の中で、私たちは「標準化」を目的に、Webアプリケーションで監視が可能なアプリケーションを開発しました。<br></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Cover -->
  <!-- Article style section -->
  <div class="py-2 bg-primary" style="">
    <div class="container">
      <div class="row" style="">
        <div class="col-md-12 align-self-center order-1 order-md-2 text-md-left text-center" style="">
          <h3 style="" class="text-left text-body">使いやすく<br>そしてわかりやすく</h3>
          <p class="text-left text-monospace">Virtual Control は、できるだけ利用しやすい環境として HTML5 (+ CSS, JavaScript), PHP の2言語を使用しております。<br></p><a class="btn btn-dark btn-lg btn-block active" href="https://github.com/ClearNB/Virtual-Control" target="_blank" style=""><i class="fa fa-fw fa-github fa-lg"></i>GitHubを開く</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Features -->
  <div class="py-3" id="features">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="text-left text-monospace" style="">SNMPを使った監視をもっと気軽に</h3>
          <div class="col-md-12">
            <div class="card mt-1 rounded">
              <div class="card-header bg-secondary border-bottom border-dark">標準MIBに準拠した監視を</div>
              <div class="card-body bg-primary">
                <h5 class="text-left text-monospace"><i class="fa fa-fw fa-server"></i>OID識別を日本語メッセージに変換！</h5>
                <p class="text-left">参照しなければ何の項目かわからないOIDを、標準MIBに準拠した日本語メッセージを搭載！安心して気になった項目を監視できます。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Call to action -->
  <div class="bg-primary" id="login">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-12 align-self-center text-center text-md-left" style="">
          <h4 class="text-center">ログインが必要です</h4>
          <p contenteditable="true" class="text-center">ボタンをクリックして、ログインを行ってください</p>
          <div class="row mt-4">
            <div class="col-md-12 col-12"> <a class="btn btn-block btn-lg btn-dark active" href="login.php"><i class="fa fa-fw fa-sign-in"></i>ログイン</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <div id="foot"></div>
  
  <!-- JavaScript dependencies -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">load(2); load(0);</script>
</body>

</html>