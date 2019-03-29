<?php
    session_start();
    $location = $_POST['location'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="card m-5">
                <h2 class="card-header" id="text-center">Location Information:</h2>
                <div class="card-body">
                    <form id="location-form">
                        <input class="form-control disabled" type="text" id="location-input" value="<?php echo $location; ?>" class="form-control form-control-lg"readonly>
                        <br>
                        <button type="submit" class="btn btn-dark">Get Info</button>
                        <button id="HomeButton" type="button" class="btn btn-info">Save Info</button>
                    </form>
                </div>
            </div>
            <div class="card-block" id="formatted-address"></div>
            <div class="card-block" id="address-components"></div>
            <div class="card-block" id="geometry"></div>
        </div>

        <script>
          var locationForm = document.getElementById('location-form');

          locationForm.addEventListener('submit', geocode);

          function geocode(e){

            e.preventDefault();

            var location = document.getElementById('location-input').value;

            axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
              params:{
                address:location,
                key:'AIzaSyAterLUD3ux06RkcRtRqHH7S1cdWzNy0HI'
              }
            })
            .then(function(response){
              console.log(response);
              var formattedAddress = response.data.results[0].formatted_address;
              var formattedAddressOutput = `
                <ul class="list-group">
                  <li class="list-group-item">${formattedAddress}</li>
                </ul>
              `;

              var addressComponents = response.data.results[0].address_components;
              var addressComponentsOutput = '<ul class="list-group">';
              for(var i = 0;i < addressComponents.length;i++){
                addressComponentsOutput += `
                  <li class="list-group-item"><strong>${addressComponents[i].types[0]}</strong>: ${addressComponents[i].long_name}</li>
                `;
                document.cookie= addressComponents[i].types[0] +'='+ addressComponents[i].long_name ;
              }
              addressComponentsOutput += '</ul>';

              var lat = response.data.results[0].geometry.location.lat;
              var lng = response.data.results[0].geometry.location.lng;

              var geometryOutput = `
                <ul class="list-group">
                  <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
                  <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
                </ul>
              `;

              document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
              document.getElementById('address-components').innerHTML = addressComponentsOutput;
              document.getElementById('geometry').innerHTML = geometryOutput;
              document.cookie="latitude = "+lat ;
              document.cookie="longitude = "+lng ;
            })
            .catch(function(error){
              console.log(error);
            });
          }
        </script>
        <script>
            document.getElementById("HomeButton").onclick = function () {
                location.href = "session.php";
            };
        </script>
    </body>
</html>
