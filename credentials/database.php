<?php

$mysql_host = getenv('MYSQL_DBHOST') ? getenv('MYSQL_DBHOST') : '127.0.0.1';
$mysql_user = 'root';
$mysql_pw   = getenv('MYSQL_DBPASS') ? getenv('MYSQL_DBPASS') : 'Webuslega1';
$mysql_db   = 'mini_imdb';
$mysql_port = '3306';
$mysql_ca_cert = null;
$mysql_host_readonly = '127.0.0.1';
$mysql_user_readonly = $mysql_user;
$mysql_pw_readonly = $mysql_pw;
$mysql_db_readonly = $mysql_db;
$mysql_ca_cert_readonly = $mysql_ca_cert;
