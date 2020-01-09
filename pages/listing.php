<?php
require '../csv-9.5.0/autoload.php';

use League\Csv\Reader;
use League\Csv\Statement;
$csv = Reader::createFromPath('../listings.csv', 'r');

include("header.php");

if (isset($_GET['id'])) {
    $csv->setHeaderOffset(0); //set the CSV header offset

    $stmt = (new Statement())
        ->offset($_GET['id'] - 1)
        ->limit(1)
    ;

    $records = $stmt->process($csv);
    foreach ($records as $record) {
        echo $record['address'];
    }

}
else{
    //kick
}

include("footer.php");