<?php

include("header.php");
?>
<title>add listing</title>


<h1>Add Listing</h1>
<p><label for="address">Listing Address: </label><input type="text" id="address"/></p>
<p><label for="city">Listing City: </label><input type="text" id="city"/></p>
<p><label for="state">Listing State: </label><input type="text" id="state"/></p>
<p><label for="zipCode">Listing Zip Code: </label><input type="text" id="zipCode"/></p>
<p><label for="bed">Listing Bedroom Count: </label><input type="text" id="bed"/></p>
<p><label for="bath">Listing Bathroom Count: </label><input type="text" id="bath"/></p>
<p><label for="sqft">Listing Square Footage: </label><input type="text" id="sqft"/></p>
<p><label for="availabilityDate">Listing Availability Date: </label><input type="date" id="availabilityDate"/></p>
<p><label for="price">Listing Price: </label><input type="text" id="price"/></p>
<p><label for="location">Listing Location -- for use in google maps: </label><input type="text" id="location"/></p>
<p><label for="features">Listing Features: </label><input type="text" id="features"/></p>
<p><label for="leaseTerms">Listing Terms: </label><input type="text" id="leaseTerms"/></p>
<p><label for="desc">Listing Description: </label><textarea id="desc"></textarea></p>
<button type="submit">Submit</button>

<?php
include("footer.php");
?>

<!--
$images = explode("%",$record['images']);
