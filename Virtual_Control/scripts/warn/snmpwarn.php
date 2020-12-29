<?php

include_once ('../general/sqldata.php');
include_once ('./snmptable.php');
include_once ('./snmpdata.php');
include_once ('./ipdata.php');

$requestmg = filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH');

$request = isset($requestmg) ? strtolower($requestmg) : '';
if ($request !== 'xmlhttprequest') {
    http_response_code(403);
    header("Location: ../../403.php");
    exit;
}

function get_warn(): array {
}





