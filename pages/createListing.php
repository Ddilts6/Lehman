<?php
require '../csv-9.5.0/autoload.php';

use League\Csv\Statement;
use League\Csv\Writer;
use League\Csv\Reader;

$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zipCode'];
$bed = $_POST['bed'];
$bath = $_POST['bath'];
$sqft = $_POST['sqft'];
$availabilityDate = $_POST['availabilityDate'];
$price = $_POST['price'];
$location = $_POST['location'];
$features = $_POST['features'];
$leaseTerms = $_POST['leaseTerms'];
$desc = $_POST['desc'];

$csvR = Reader::createFromPath('../listings.csv','r');
$csvR->setHeaderOffset(0); //set the CSV header offset

try {
    $stmt = (new Statement())
        ->offset(1)
        ->limit(10000);
} catch (\League\Csv\Exception $e) {

}

$id = '0';

$records = $stmt->process($csvR);
foreach ($records as $record) {
    if ((int) $record['id'] >= (int) $id) {
        $id = $record['id'] + 1;
    }
}

$record = [$id,$address,$city,$state,$zipCode,'null',$bed,$bath,$sqft,$desc,$price,1,$availabilityDate,$location,$features,$leaseTerms];

$csvW = Writer::createFromPath('../listings.csv','a+');

try {
    $csvW->insertOne($record);
} catch (\League\Csv\CannotInsertRecord $e) {
    return 'Cannot create account';
}
