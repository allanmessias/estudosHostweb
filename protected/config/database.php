<?php

// db configpara a hostweb
// return array(
// 	'class' => 'system.db.CDbConnection',
//     'connectionString' => 'sqlsrv:Server=10.177.48.140; Database=SNETD-TESTE;',
//     //'connectionString' => 'dblib:dbname=Manager2003;host=10.177.48.140;',
//     'username' => 'nsnteste', //'SNETD-SNWEB',
//     'password' => 'nsnteste', //'-6+8147684fwrgrwe4heth3sdfgh',
//     'charset' => 'GB2312',
//     'schemaCachingDuration' => 0,
// );


// Db para testes em casa
return array(
	'class' => 'system.db.CDbConnection',
	'connectionString' => 'mysql:host=localhost; dbname=yiiteste;', 
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
    'schemaCachingDuration' => 0,
);

