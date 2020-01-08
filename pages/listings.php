<?php

include("header.php");
?>
    <title>listings</title>

<?php

require '../csv-9.5.0/autoload.php';
$page = isset($_GET['pageNum']) ? (int) $_GET['pageNum'] : 1;
$limit = 25;
$offset = (($limit * ($page - 1))+1);

use League\Csv\Reader;
use League\Csv\Statement;


$csv = Reader::createFromPath('../listings.csv','r');
$csv->setHeaderOffset(0); //set the CSV header offset

//get 25 records starting from the 11th row
$stmt = (new Statement())
    ->offset(0)
    ->limit(25)
;
echo "<h1> listings </h1>";
$records = $stmt->process($csv);
foreach ($records as $record) {
    $address = $record['address'];
    $city = $record['city'];
    $state = $record['state'];
    $zipCode = $record['zipCode'];
    $images = explode("%",$record['images']);
    $bed = $record['bed'];
    $bath = $record['bath'];
    $sqft = $record['sqft'];
    $desc = $record['desc'];
    $price = $record['price'];
    $available = $record['available'];
    $availabilityDate = $record['availabilityDate'];
    $location = $record['location'];
    $features = $record['features'];
    $leaseTerms = $record['leaseTerms'];
echo "
    <div class=\"card\" style=\"width: 18rem;\">
  <img class=\"card-img-top\" src=\"$images[0]\" alt=\"Housing Image\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">$address</h5>
    <p class=\"card-text\">$desc</p>
    <p class=\"card-text\">Bed:$bed Bath:$bath Sqft:$sqft</p>
    <a href=\"#\" class=\"btn btn-primary\">More info</a>
  </div>
</div>";
}

include("footer.php");