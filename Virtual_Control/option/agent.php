<?php
include_once ('../scripts/general/sqldata.php');
include_once ('../scripts/session/session_chk.php');
include_once ('../scripts/general/loader.php');
include_once ('../scripts/general/former.php');

if(!session_chk()) {
    http_response_code(301);
    header('Location: ../403.php');
    exit();
}
$id = $_SESSION['gsc_userid'];
$getdata = select(true, "GSC_USERS", "USERNAME, PERMISSION", "WHERE USERID = '$id'");
if(!$getdata && $getdata['PERMISSION'] != 0) {
    http_response_code(301);
    header('Location: ../403.php');
    exit();
}

$loader = new loader();

$fm_pg = new form_generator('fm_pg');
$fm_pg->SubTitle('OPTION - AGENT', 'エージェントを選択してください。', 'book');
$fm_pg->Check(1, 'rd_01', 'agt', '1', 'AGENT1', true);
$fm_pg->Check(1, 'rd_02', 'agt', '2', 'AGENT2',false);
$fm_pg->Check(1, 'rd_03', 'agt', '3', 'AGENT3',false);
$fm_pg->Button('bt_mk_ag', '作成', 'submit', 'fa-edit');//ボタンの設置

?>

<html>
    <head>
	<?php echo $loader->loadHeader('Virtual Control', 'OPTION - AGENT', true) ?>
	<?php echo form_generator::ExportClass([$fm_pg]) ?>
    </head>
    <body>
	<?php echo $loader->navigation($getdata['PERMISSION']) ?>
	<?php echo $loader->load_Logo() ?>
	
	<?php echo $loader->Title('OPTION - AGENT', 'user') ?>
	<div id="data_output"></div>
        
	
	<?php echo $loader->footer() ?>
	<?php echo $loader->footerS(true) ?>
	
	<script type="text/javascript">
	    $(document).ready(function() {
		animation('data_output', 0, fm_pg);
	    });
	</script>
    </body>
</html>