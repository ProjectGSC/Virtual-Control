<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['permission'])) {
    http_response_code(403);
    header("Location: 403.php");
    exit();
}

$options = array(
    array('アカウント'),
    array('サーバ'),
    array('コミュニティ')
);
$option_flags = array(false, false, false);

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="Virtual Control">
        <link rel="icon" href="images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OPTION - Virtual Control</title>
        <meta name="description" content="Virtual Control - A Controlling Network Tool.">
        <link rel="stylesheet" href="style/awesome.min.css" type="text/css">
        <link rel="stylesheet" href="style/aquamarine.css" type="text/css">
        <link rel="stylesheet" href="style/dialog.css" type="text/css">

        <script src="js/navbar-ontop.js"></script>
        <script src="js/animate-in.js"></script>
        <script src="js/loader.js"></script>
    </head>

    <body class="text-monospace">
        <!-- Navbar & Logo -->
        <div id="nav"></div>
        <div class="bg-primary pt-5">
            <div class="container">
                <div id="logo"></div>
            </div>
        </div>

        <!-- Server Status -->
        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="">
                        <h2 style="" class="text-left text-uppercase"><i class="fa fa-fw fa-server"></i>[Server_NAME]</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-monospace">[Description]</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Page Description -->
        <div class="py-1 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="my-0" style=""><i class="fa fa-fw fa-wrench"></i>オプション</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Option Buttons -->
        <div class="bg-primary py-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="list-group">
                            <?php 
                                if($_SESSION['permission'] === 0) {
                                    
                                }
                            ?>
                            <!-- Account Option (All) -->
                            <button id="account" class="list-group-item list-group-item-action flex-column align-items-start active list-group-item-dark mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><i class="fa fa-user fa-fw"></i>アカウント管理</h5>
                                </div>
                                <p class="mb-1" style="">アカウントを設定します</p>
                            </button>

                            <!-- Server Option (VCServer Only) -->
                            <a href="#con" class="list-group-item list-group-item-action flex-column align-items-start active list-group-item-dark mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><i class="fa fa-fw fa-home"></i>サーバ設定</h5>
                                </div>
                                <p class="mb-1 text-monospace">サーバ全般の設定を行います</p>
                            </a>
                            
                            <!-- Community Option (VCServer Only) -->
                            <a href="#con" class="list-group-item flex-column align-items-start list-group-item-dark list-group-item-action active mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1" style=""><i class="fa fa-fw fa-server"></i>コミュニティ設定</h5>
                                </div>
                                <p class="mb-1">機器との接続情報を設定します</p>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div id="foot"></div>

        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            load(1);
        </script>
    </body>

</html>