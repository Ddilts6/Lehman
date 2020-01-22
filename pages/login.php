<?php
require '../csv-9.5.0/autoload.php';

session_start();

use League\Csv\Statement;
use League\Csv\Reader;

$username = $_POST['username'];
$password = $_POST['password'];
//$password = password_hash($password,PASSWORD_DEFAULT);

$csvR = Reader::createFromPath('../users.csv','r');
$csvR->setHeaderOffset(0);

try {
    $stmt = (new Statement())
        ->offset(0)
        ->limit(10000);
} catch (\League\Csv\Exception $e) {}

$resultsFound = false;
$records = $stmt->process($csvR);
foreach ($records as $record) {
    if ($username == $record['username']){
        echo 'username working \n';
        if (password_verify($password,$record['passwordHash']) == true){
            $_SESSION['userID'] = $record['userID'];
            if ($record['superUser'] == 1){
                $_SESSION['superUser'] = 1;
            }
            $resultsFound = true;
        }
    }
}
echo $resultsFound;
if ($resultsFound == false) {
    echo 'not working';
    http_response_code(404);
}
