<?php

include("header.php");
?>
    <title>listings</title>

<?php

require '../csv-9.5.0/autoload.php';
$page = isset($_GET['pageNum']) ? (int) $_GET['pageNum'] : 1;
$limit = 25;
$offset = (($limit * ($page - 1)));

use League\Csv\Reader;
use League\Csv\Statement;


$csv = Reader::createFromPath('../listings.csv','r');
$csv->setHeaderOffset(0); //set the CSV header offset

//get 25 records starting from the 11th row
$stmt = (new Statement())
    ->offset($offset)
    ->limit($limit)
;

//listings search
echo "Find Listings where <select id='searchOption'>
<option>address</option>
<option>city</option>
<option>state</option>
<option>zip code</option>
<option>bed count</option>
<option>bath count</option>
<option>square footage</option>
<option>price</option>
</select> = <input id='search'><button onclick='location.href=\"listings.php?\" + getSearch() + \"=\" + $(\"#search\").val()'>Search</button><button onclick='location.href=\"listings.php\"'>Reset</button>

<script>
    function getSearch(){
        return $('#searchOption option:selected').val();
    }
</script>";



echo "<h1>Listings</h1>";
echo "<div class='card-columns'>";
$records = $stmt->process($csv);
foreach ($records as $record) {
    $address = $record['address'];
    $city = $record['city'];
    $state = $record['state'];
    $zipCode = $record['zipCode'];
    //$images = explode("%",$record['images']);
    $images = $record['images'];
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
    if (isset($_GET['address'])) {
        if ($address == $_GET['address']){
            echo "
                <div class=\"card w-75\" style=\"width: 18rem;\">
                    <img class=\"card-img-top\" src=\"../images/$images\" alt=\"Housing Image\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$address</h5>
                        <p class=\"card-text\">$desc</p>
                        <p class=\"card-text\">Bed:$bed Bath:$bath Sqft:$sqft</p>
                        <a href=\"listing.php?id=$record[id]\" class=\"btn btn-primary\">More info</a>
                    </div>
                </div>";
        }
    } elseif (isset($_GET['city'])) {
        if ($city == $_GET['city']){
            echo "
                <div class=\"card w-75\" style=\"width: 18rem;\">
                    <img class=\"card-img-top\" src=\"../images/$images\" alt=\"Housing Image\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$address</h5>
                        <p class=\"card-text\">$desc</p>
                        <p class=\"card-text\">Bed:$bed Bath:$bath Sqft:$sqft</p>
                        <a href=\"listing.php?id=$record[id]\" class=\"btn btn-primary\">More info</a>
                    </div>
                </div>";
        }
    }
    else {
        echo "
    <div class=\"card w-75\" style=\"width: 18rem;\">
        <img class=\"card-img-top\" src=\"../images/$images\" alt=\"Housing Image\">
        <div class=\"card-body\">
            <h5 class=\"card-title\">$address</h5>
            <p class=\"card-text\">$desc</p>
            <p class=\"card-text\">Bed:$bed Bath:$bath Sqft:$sqft</p>
            <a href=\"listing.php?id=$record[id]\" class=\"btn btn-primary\">More info</a>
      </div>
    </div>";
    }
}
echo "</div>";

include("footer.php");

?>
