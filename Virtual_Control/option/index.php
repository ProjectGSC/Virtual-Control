<!DOCTYPE html>
<?php
include ('../scripts/session_chk.php');
if (!session_chk()) {
    http_response_code(403);
    header("Location: ../403.php");
    exit();
}

include_once ('../scripts/sqldata.php');
include_once ('../scripts/common.php');
include_once ('../scripts/dbconfig.php');
include_once ('../scripts/former.php');
include_once ('../scripts/loader.php');
include_once ('../scripts/table_generator.php');

$loader = new loader();

$index = $_SESSION['gsc_userindex'];
$getdata = select(true, "GSC_USERS", "USERNAME, PERMISSION", "WHERE USERINDEX = $index");
?>

<html>
    <head>
        <?php echo $loader->loadHeader('Virtual Control', 'OPTION', true); ?>
    </head>

    <body class="text-monospace">
        <!-- Navbar & Logo -->
        <?php echo $loader->navigation($getdata['PERMISSION']) ?>
        <div class="bg-primary pt-5">
            <div class="container">
                <?php echo $loader->load_Logo(); ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $loader->SubTitle('オプション', '設定を行いましょう。', 'wrench') ?>
                </div>
            </div>
        </div>

        <!-- Option Buttons -->
        <div class="bg-primary py-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="list-group">
                            <!-- Account Option (All) -->
                            <a href="./account.php" class="list-group-item list-group-item-action flex-column align-items-start active list-group-item-dark mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><i class="fa fa-user fa-fw"></i>アカウント管理</h5>
                                </div>
                                <p class="mb-1">アカウントを設定します</p>
                            </a>

                            <!-- Server Option (VCServer Only) -->
                            <a href="./server.php" class="list-group-item list-group-item-action flex-column align-items-start active list-group-item-dark mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><i class="fa fa-fw fa-home"></i>サーバ設定</h5>
                                </div>
                                <p class="mb-1 text-monospace">サーバ全般の設定を行います</p>
                            </a>

                            <!-- MIB Option (VCServer Only) -->
                            <a href="./mib.php" class="list-group-item list-group-item-action flex-column align-items-start active list-group-item-dark mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><i class="fa fa-fw fa-home"></i>MIB設定</h5>
                                </div>
                                <p class="mb-1 text-monospace">MIB管理を行います</p>
                            </a>

                            <!-- Agent Option (VCServer Only) -->
                            <a href="./agt.php" class="list-group-item flex-column align-items-start list-group-item-dark list-group-item-action active mb-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1" style=""><i class="fa fa-fw fa-server"></i>エージェント設定</h5>
                                </div>
                                <p class="mb-1">機器との接続情報を設定します</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php echo $loader->footer() ?>

        <script src="../js/jquery.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>