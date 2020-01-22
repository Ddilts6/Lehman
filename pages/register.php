<?php
require '../csv-9.5.0/autoload.php';

session_start();

use League\Csv\Statement;
use League\Csv\Writer;
use League\Csv\Reader;

$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password,PASSWORD_DEFAULT);

$csvR = Reader::createFromPath('../users.csv','r');
$csvR->setHeaderOffset(0); //set the CSV header offset

try {
    $stmt = (new Statement())
        ->offset(1)
        ->limit(10000);
} catch (\League\Csv\Exception $e) {

}

$uid = '0';

$records = $stmt->process($csvR);
foreach ($records as $record) {
    if ((int) $record['userID'] >= (int) $uid) {
        $uid = $record['userID'] + 1;
    }
    if ($record['username'] == $username){
        return 'Cannot create account';
    }
}

$record = [$uid,$username,$password,0];

$csvW = Writer::createFromPath('../users.csv','a+');

try {
    $csvW->insertOne($record);
} catch (\League\Csv\CannotInsertRecord $e) {
    return 'Cannot create account';
}

