<!DOCTYPE html>

<!--
<?php
/*
 * ログインページ（LOGIN）
 * 概要: Virtual Control 上でユーザとしてのログインセッションを行うページ
 * 遷移元: INDEX, HELP
 * 遷移方法: INDEXからログインボタンを押下したとき
 * 遷移先: DASHBOARD (SESSION-IN), HELP, INDEX
 */

//include
include_once ('./scripts/general/sqldata.php');
include_once ('./scripts/session/session_chk.php');
include_once ('./scripts/general/loader.php');
include_once ('./scripts/general/former.php');

if (session_chk()) {
    http_response_code(301);
    header('location: dash.php');
    exit();
}

$loader = new loader();

$fm_lg = new form_generator('fm_lg');
$fm_lg->Input('userid', 'ユーザID', 'ユーザIDは、VCServerによって指定されています。', 'id-card-alt', true);
$fm_lg->Password('password', 'パスワード', '指定のパスワードを入力します。', 'key', true);
$fm_lg->Button('fm_sb', 'ログイン', 'submit', 'sign-in-alt');

$fm_lg_ld = new form_generator('fm_lg_ld');
$fm_lg_ld->SubTitle("セッション中です。", "そのままお待ちください...", "spinner fa-spin");

$fm_lg_fl_01 = new form_generator('fm_lg_fl_01');
$fm_lg_fl_01->SubTitle("ログインに失敗しました。", "ユーザIDまたはパスワードが違います", "exclamation-triangle");
$fm_lg_fl_01->openList();
$fm_lg_fl_01->addList('各項目の入力事項をご確認ください');
$fm_lg_fl_01->addList('ユーザID・パスワードを忘れたら、管理者に相談してください');
$fm_lg_fl_01->closeList();
$fm_lg_fl_01->Button('bt_lg_bk', '入力に戻る', 'button', 'caret-square-o-left');

$fm_lg_fl_02 = new form_generator('fm_lg_fl_02');
$fm_lg_fl_02->SubTitle("ログインに失敗しました。", "データベースの状態を確認してください。", "exclamation-triangle");
$fm_lg_fl_02->openList();
$fm_lg_fl_02->addList('データベースの設定を見直してください。');
$fm_lg_fl_02->addList('この件は管理者に必ず相談してください。');
$fm_lg_fl_02->closeList();
$fm_lg_fl_02->Button('bt_lg_bk', '入力に戻る', 'button', 'caret-square-o-left');
?>
-->

<html>
    <head>
        <?php echo $loader->loadHeader('Virtual Control', 'LOGIN') ?>
        <?php echo form_generator::ExportClass() ?>
    </head>

    <body class="text-monospace">
        <!-- Navbar -->
        <?php echo $loader->navigation(0) ?>
        
        <?php echo $loader->load_Logo() ?>

        <?php echo $loader->Title('LOGIN', 'fas fa-sign-in-alt') ?>
        
        <!-- Login Form -->
        <div id="data_output"></div>

        <!-- Footer -->
        <?php echo $loader->footer() ?>

        <!-- JavaScript dependencies -->
        <?php echo $loader->footerS() ?>
        <script type="text/javascript">

            $(document).ready(function () {
                animation('data_output', 0, fm_lg);
            });

            //Page1: Login Form 
            $(document).on('submit', '#fm_lg', function (event) {
                event.preventDefault();
                var d = $(this).serializeArray();
                fm_lg = document.getElementById('data_output').innerHTML;
                animation('data_output', 400, fm_lg_ld);
                ajax_dynamic_post('./scripts/session/session.php', d).then(function (data) {
                    switch (data['res']) {
                        case 0:
                            animation_to_sites('data_output', 400, './dash.php');
                            break;
                        case 1:
                            animation('data_output', 400, fm_lg_fl_02);
                            break;
                        case 2:
                            animation('data_output', 400, fm_lg_fl_01);
                            break;
                    }
                });
            });

            $(document).on('click', '#bt_lg_bk', function () {
                animation('data_output', 400, fm_lg);
            });
        </script>
    </body>
</html>