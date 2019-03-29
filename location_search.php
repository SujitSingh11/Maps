<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="content-wrapper">
            <div class="container">
                <div style="margin-top: 25vh;">
                    <div class="card m-5">

                        <div class="card-body">
                            <form class="m-2" action="location_show.php" method="post">
                                <input id="autocomplete" class="form-control" type="text" name="location" placeholder="Type a Location">
                                <div class="card-footer mt-4">
                                    <button type="submit" class="btn btn-dark" name="submit">Get Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAterLUD3ux06RkcRtRqHH7S1cdWzNy0HI&libraries=places&callback=initMap" async defer></script>
        <script type="text/javascript">
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});
            google.maps.event.addListener(autocomplete, 'place_changed', function(){
            var place = autocomplete.getPlace();
          })
        </script>
    </body>
</html>
