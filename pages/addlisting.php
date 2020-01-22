<?php

include("header.php");
if (isset($_SESSION['superUser'])){
    if ($_SESSION['superUser'] == 1) {

        echo '
        <title>add listing</title>
        
        
        <script>
            function addListing(address,city,state,zipCode,bed,bath,sqft,availabilityDate,price,location,features,leaseTerms,desc) {
              $.ajax({
                type: "POST",
                data: {
                    address: address,
                    city: city,
                    state: state,
                    zipCode: zipCode,
                    bed: bed,
                    bath: bath,
                    sqft: sqft,
                    availabilityDate: availabilityDate,
                    price: price,
                    location: location,
                    features: features,
                    leaseTerms: leaseTerms,
                    desc: desc
                },
                url:"createListing.php",
                success: function(data) {
                  document.location.reload();
                }
              });
            }
        </script>
        
        <h1>Add Listing</h1>
        <form>
        <p><label for="address">Listing Address: </label><input required="required" type="text" id="address"/></p>
        <p><label for="city">Listing City: </label><input required="required" type="text" id="city"/></p>
        <p><label for="state">Listing State: </label><input required="required" type="text" id="state"/></p>
        <p><label for="zipCode">Listing Zip Code: </label><input required="required" type="text" id="zipCode"/></p>
        <p><label for="bed">Listing Bedroom Count: </label><input required="required" type="text" id="bed"/></p>
        <p><label for="bath">Listing Bathroom Count: </label><input required="required" type="text" id="bath"/></p>
        <p><label for="sqft">Listing Square Footage: </label><input required="required" type="text" id="sqft"/></p>
        <p><label for="availabilityDate">Listing Availability Date: </label><input required="required" type="date" id="availabilityDate"/></p>
        <p><label for="price">Listing Price: </label><input required="required" type="text" id="price"/></p>
        <p><label for="location">Listing Location -- for use in google maps: </label><input required="required" type="text" id="location"/></p>
        <p><label for="features">Listing Features: </label><input required="required" type="text" id="features"/></p>
        <p><label for="leaseTerms">Listing Terms: </label><input required="required" type="text" id="leaseTerms"/></p>
        <p><label for="desc">Listing Description: </label><textarea required="required" id="desc"></textarea></p>
        <button type="button" onclick="addListing(
            $(\'#address\').val(),$(\'#city\').val(),$(\'#state\').val(),$(\'#zipCode\').val(),$(\'#bed\').val(),$(\'#bath\').val(),$(\'#sqft\').val(),$(\'#availabilityDate\').val(),$(\'#price\').val(),$(\'#location\').val(),$(\'#features\').val(),$(\'#leaseTerms\').val(),$(\'#desc\').val(),
        )">Submit</button>
        </form>
        ';
    }
}
include("footer.php");
?>

<!--
$images = explode("%",$record['images']);
