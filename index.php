<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    .cardview{
        background-color :black;
        box-shadow: 70px black;
        margin: auto;
        margin-top: 50px; 
        color: white;
        border: 3px;
        width: 500px;
        border: 10px solid #f6d784;
    }
    .card:hover {
        box-shadow: 60px black;
    }
    .container {
        padding: 3px 18px;

    }
    .dataweather{
        padding-left: 30px;
        padding-bottom: 10px;
        color : white;
        font-family: 'Times New Roman', Times, serif;
    }
    .searchdataweather{
        padding-left: 30px;
        font-family: 'Times New Roman', Times, serif;
    }
    h3{
        padding-top: 20px;
    }
    
</style>
<body>
   
    <div class="container">  
           <div class="cardview"> <br>
            <h2><b><center>Card View</center></b></h2>
            <div class="row">
                <input type="text" id="la" placeholder="Latitude" class="form-control" style="width: 180px; margin-left: 50px; margin-top: 20px;" >
                <input type="text" id="lo" placeholder="Longitude" class="form-control" style="width:180px;margin-left: 50px;  margin-top: 20px; ">
                <button id="load" class="btn btn-primary btn-sm" style=" width: 150px; margin-left: 180px; margin-top: 20px;"><b>Load</b></button>
              </div><br>
           <center><img src="https://1.bp.blogspot.com/-aloAuq4BhFg/WozvoHT1-HI/AAAAAAAAABc/5YpEgDp8XxEoTPO2gTCz14l91x2Sz6AGQCLcBGAs/s1600/%25E0%25B8%25AB%25E0%25B8%25B2%25E0%25B8%2594%25E0%25B8%2597%25E0%25B8%25A3%25E0%25B8%25B2%25E0%25B8%25A2%25E0%25B9%2581%25E0%25B8%2581%25E0%25B9%2589%25E0%25B8%25A72.jpg"  alt="map" style="width:80%"></center>
          
           
              <div class="dataweather">      
              <h3> Weather <span id="name"> at </span><br> </h3>
                  <span id="country">Country: </span><br>
                  <span id="temp">Temp: </span> Celsius<br>
                  <span id="temp_max">Temp max: </span> Celsius<br>
                  <span id="temp_min">Temp min: </span> Celsius<br>
                  <span id="humidity">Humidity: </span> %<br>
                  <span id="sunrise">Sunrise: </span> unix<br>
                  <span id="sunset">Sunset: </span> unix<br>
                  <span id="wind_deg">Wind deg: </span> degree<br>
                  <span id="wind_speed">Wind speed: </span> m/s<br>
                  <span id="cloud">Cloud: </span> %<br>
              </div>
              <div class="searchdataweather">
                <h3>Weather at <span id="name1"> </span><br> </h3>
                Country: <span id="country1"> </span><br>
                Temp: <span id="main_temp1"> </span> Celsius<br>
                Temp max: <span id="temp_max1"> </span> Celsius<br>
                Temp min: <span id="temp_min1"> </span> Celsius<br>
                Humidity: <span id="humidity1"> </span>%<br>
                Sunrise: <span id="sunrise1"> </span> unix<br>
                Sunset: <span id="sunset1"> </span> unix<br>
                Wind deg: <span id="wind_deg1"></span> degree<br>
                Wind speed: <span id="wind_speed1"> </span> m/s<br>
                Cloud: <span id="cloud1"> </span> %<br>
              </div>
            </div>
           </div>
      </div>  
            
   <script> 
     function loadweather(){ 
       $(".searchdataweather").hide();
       var url ="https://api.openweathermap.org/data/2.5/weather?lat=8.700278&lon=99.942389&appid=1c707a3557feb4731a810eaa0383f5ed&units=metric";
       
             $.getJSON(url)
              .done((data)=>{
                console.log(data)
                  $("#name").append(data.name);
                  $("#temp").append(data.main.temp);
                  $("#temp_max").append(data.main.temp_max);
                  $("#temp_min").append(data.main.temp_min);
                  $("#humidity").append(data.main.humidity);
                  $("#country").append(data.sys.country);
                  $("#sunrise").append(data.sys.sunrise);
                  $("#sunset").append(data.sys.sunset);
                  $("#wind_deg").append(data.wind.deg);
                  $("#wind_speed").append(data.wind.speed);
                  $("#cloud").append(data.clouds.all);
                        })         
             .fail((xhr, status, err)=>{
                      console.log("error")
                  });
                   
            }
     
     function searchweather(){ 
             $(".dataweather").hide();
             $(".searchdataweather").show();
             var url ="https://api.openweathermap.org";
             var a = $("#la").val();
             var b = $("#lo").val();
  
             url = url + "/data/2.5/weather?lat=" + a + "&lon=" + b +"&appid=1c707a3557feb4731a810eaa0383f5ed&units=metric"; 
             
              $.getJSON(url)
              .done((data)=>{
                console.log(data)
                $("#name1").append(data.name);
                $("#main_temp1").append(data.main.temp);
                $("#temp_max1").append(data.main.temp_max);
                $("#temp_min1").append(data.main.temp_min);
                $("#humidity1").append(data.main.humidity);
                $("#country1").append(data.sys.country);
                $("#sunrise1").append(data.sys.sunrise);
                $("#sunset1").append(data.sys.sunset);
                $("#wind_deg1").append(data.wind.deg);
                $("#wind_speed1").append(data.wind.speed);
                $("#cloud1").append(data.clouds.all);
  
                        })         
             .fail((xhr, status, err)=>{
                      console.log("error")
                  });
            }
           
      function remove (){
           $("#name1").empty();
           $("#temp1").empty();
           $("#temp_max1").empty();
           $("#temp_min1").empty();
           $("#humidity1").empty();
           $("#country1").empty();
           $("#sunrise1").empty();
           $("#sunset1").empty();
           $("#wind_deg1").empty();
           $("#wind_speed1").empty();
           $("#cloud1").empty();
  
      }
      $(()=>{ 
              loadweather();
              $("#load").click(()=>{ 
                 searchweather();
              });
              $("#load").click(()=>{
                  remove ();
              }); 
              
       });
     </script>        
    </body>
  </html>
   
    