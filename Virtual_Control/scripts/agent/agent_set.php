<?php

/**
 * 
 * エージェント情報に対する変更要求を受け取った際の処理をここで行います
 */

$requestmg = filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH');

$request = isset($requestmg) ? strtolower($requestmg) : '';
if ($request !== 'xmlhttprequest') {
    http_response_code(403);
    header('Location: ../../403.php');
    exit;
}

include_once __DIR__ . '/../general/sqldata.php';
include_once __DIR__ . '/agentfunction.php';
include_once __DIR__ . '/../session/session_chk.php';

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);
if ($method === 'POST') {
    $functionid = filter_input(INPUT_POST, 'functionid', FILTER_SANITIZE_STRING);
    $pre_agentid = filter_input(INPUT_POST, 'pre_agentid', FILTER_SANITIZE_STRING);
    $agenthost = filter_input(INPUT_POST, 'in_ag_hs', FILTER_SANITIZE_STRING);
    $community = filter_input(INPUT_POST, 'in_ag_cm', FILTER_SANITIZE_STRING);
    $a_pass = filter_input(INPUT_POST, 'in_at_ps', FILTER_SANITIZE_STRING);
    $mib = filter_input(INPUT_POST, 'sl_mb', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    
    $set = new AgentSet($functionid, $a_pass, $agenthost, $pre_agentid, $community, $mib);
    $set->check_functionid();
    $r = $set->run();
    
    //ob_get_clean();
    echo json_encode($r);
}