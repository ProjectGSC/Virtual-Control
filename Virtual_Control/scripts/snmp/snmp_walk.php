<?php

/**
 * [Ajax] SNMPWALK・テーブルデータ表示
 * 
 * SNMPWALK専用のファンクションです。SNMP取得およびテーブル表示化を行います。
 * 
 * @author ClearNB
 * @package VirtualControl_scripts_snmp
 */
include_once __DIR__ . '/../general/sqldata.php';
include_once __DIR__ . '/../general/loader.php';
include_once __DIR__ . '/snmptable.php';
include_once __DIR__ . '/snmpdata.php';
include_once __DIR__ . '/../session/session_chk.php';
include_once __DIR__ . '/../mib/mibdata.php';

session_action_scripts();

function get_walk_result($agentid) {
    $res = [];

    //データベース情報取得
    $q01 = select(false, 'GSC_AGENT_MIB a INNER JOIN GSC_AGENT b ON a.AGENTID = b.AGENTID', 'a.SID, b.AGENTHOST, b.COMMUNITY', 'WHERE a.AGENTID = ' . $agentid);

    if ($q01) {
	//サブツリーデータの加工
	$subdata = ['AGENTHOST' => '', 'COMMUNITY' => '', 'SID' => []];
	while ($var = $q01->fetch_assoc()) {
	    $subdata['AGENTHOST'] = $var['AGENTHOST'];
	    $subdata['COMMUNITY'] = $var['COMMUNITY'];
	    if (!in_array($var['SID'], $subdata['SID'])) {
		array_push($subdata['SID'], $var['SID']);
	    }
	}
	$mibdata = new MIBData();
	$alldata = $mibdata->getMIB(2, 1, $subdata['SID']);
	$res = convert_data($subdata['AGENTHOST'], $subdata['COMMUNITY'], $alldata);
	$res['AGENTID'] = $agentid;
    } else {
	$res = ['CODE' => 2, 'LOG' => ob_get_contents()];
    }
    return $res;
}

function convert_data($agenthost, $community, $mib) {
    $loader = new loader();
    $date = date("Y-m-d H:i:s");
    $res = [
	'CODE' => 0,
	'DATE' => $date,
	'HOST' => $agenthost,
	'COMMUNITY' => $community,
	'CSV' => 'Virtual Control Data Convertion v 1.0.0\n取得時間,' . $date . '\nエージェントホスト,' . $agenthost . '\nコミュニティ名,' . $community . '\n+----- 取得データ一覧 -----+\nOID,データ項目名（英名）,データ項目名（日本語名）,データ (インデックス)\n',
	'LIST' => $loader->openListGroup(),
	'SUBDATA' => [],
	'SIZE' => 0
    ];
    $i = 1;

    foreach ($mib['GROUP'] as $g) {
	$res['LIST'] .= $loader->SubTitle('【' . $g['GROUP_OID'] . '】' . $g['GROUP_NAME'], 'グループ配下の' . $g['GROUP_SUB_COUNT'] . '個のデータを確認できます。', 'object-group', false);
	foreach ($mib['SUB'][$g['GROUP_ID']] as $s) {
	    $sub = walk($agenthost, $community, $s, $mib['NODE'][$s['SUB_ID']]);
	    if ($sub['CODE'] == 0) {
		$id_f = 'sub_i' . $i;
		$res_data = $sub['DATA'];
		$res['CSV'] .= '【' . $res_data['MIB'] . '】\n' . $res_data['CSV'];
		$res['SUBDATA'][$id_f] = ['SIZE' => $res_data['SIZE'], 'MIB' => $res_data['MIB'], 'TABLE' => $res_data['TABLE'], 'ERROR' => $res_data['ERROR']];
		$res['LIST'] .= $loader->addListGroup($id_f, $res_data['MIB'], 'poll-h', $res_data['SIZE'] . '個データ取得 | ' . $res_data['ERR_SIZE'] . '個エラー', '詳しくはクリック！');
		$res['SIZE'] += $res_data['SIZE'];
		$i += 1;
	    } else {
		$log = (strpos(ob_get_contents(), 'No response from') !== false) ? ' アドレス到達に失敗しました。宛先のエージェントとの接続状態、ファイアウォールをご確認ください' : 'アクセスログやデベロッパーツール（F12）などで原因を追求してください。';
		$res = ['CODE' => 1, 'LOG' => $log];
		break;
	    }
	}
	if ($res['CODE'] == 0) {
	    $res['LIST'] .= $loader->closeListGroup();
	} else {
	    break;
	}
    }

    return $res;
}

function walk($host, $com, $subdata, $submib) {
    $res = [];
    $code = 0;

    $snmpdata = snmp2_real_walk($host, $com, $subdata['SUB_OID']);
    if ($snmpdata) {
	SNMPData::resetStatic();
	SNMPData::setMIBData($submib);
	foreach ($snmpdata as $key => $v) {
	    $k = str_replace('iso', '1', $key);
	    new SNMPData(1, $k, $v);
	}
	$data = SNMPData::getDataArray();
	$s_data = new SNMPTable('data', $data['DATA'], '結果一覧表');
	$result = $s_data->generate_table();
	
	$err_size = sizeof($data['ERROR']);
	if($err_size == 1 && in_array('〈該当データなし〉', $data['ERROR'])) {
	    $err_size = 0;
	}

	$res = [
	    'SIZE'	=> sizeof($snmpdata),
	    'DATE'	=> date("Y-m-d H:i:s"),
	    'TABLE'	=> $result,
	    'MIB'	=> $subdata['SUB_OID'] . " (" . $subdata['SUB_NAME'] . ")",
	    'CSV'	=> $data['CSV'],
	    'ERROR'	=> $data['ERROR'],
	    'ERR_SIZE'	=> $err_size
	];
    } else {
	$code = 1;
    }
    return ['CODE' => $code, 'DATA' => $res];
}
