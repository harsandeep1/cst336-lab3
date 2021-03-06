<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Sign Up Page</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="css/styles.css" type="text/css" />
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
</head>
<body>
      <h1 class="jumbotron">Coding Buddy</h1>
      <div class="row">
            <div class="col-md-6 mb-3">
                  <img src="img/CodingBuddy.png" alt="CodingBuddy" class="mainImg"></img>
    
            </div>
      
      
      <div class="mainForm">
            <form id="signupForm" action="welcome.html">
                        <div class="form-row">
                              <div class="col-md-6 mb-3">
                                    <input class="circle" type="text" name="fName" placeholder="First Name"/><br>
                              </div>
                              
                              <div class="col-md-6 mb-3">
                                    <input class="circle" type="text" name="lName" placeholder="Last Name"/><br>
                              </div>
                              
                        </div>
                  
                        
                        <div class="form-row">
                              <div class="col-md-6 mb-3">
                                                <input class="circle" type="text" name="username" id="username" placeholder="Username"/><br>
                                                <span id="usernameError"></span>
                              </div>
                              
                              <div class="col-md-6 mb-3">
                                    <input class="circle" type="email" name="email" placeholder="Email Address"/><br>
                              </div>
                        </div>
                        
                        <div class="form-row">
                              <div class="col-md-6 mb-3">            
                                                <input class="circle" type="password" name="password" id="password" placeholder="Password"/><br>
                                                <input class="circle"type="password" id="passwordAgain" placeholder="Password Again"/>
                                                <span id="passwordAgainError"></span>
                                                <span id="passwordLength"></span><br>
                              </div>
                        </div> 
                        
                        <div class="form-row">
                              <div  class="col-md-6 mb-3">
                                    <input class="circle" type="text" id="zip" name="zip" placeholder="Zip Code"/><br>
                              </div>
                              <div class="col-md-6 mb-3">
                                    City:       <span id="city"></span><br>
                                    Latitude:   <span id="lati"></span><br>
                                    Longitude:  <span id="longi"></span><br>
                          
                              </div>
                        </div>
                        
                        <div class="form-row">
                              <div class="col-md-6 mb-3">
                                    State:
                                                <select class="circle" name="state" id="state">
                                                      <option>Select One</option>
                                                      <option value="ca">California</option>
                                                      <option value="ny">New York</option>
                                                      <option value="tx">Texas</option>
                                                </select><br>
                              </div>
                               <div class="col-md-6 mb-3">
                                    Select a County: <select class="circle" id="county">
                                          <option>Select One</option>
                                    </select>
                              </div> 
                        </div>
                        
                        <div class="form-row">
                              
                        </div>
                        
                        
                        <div class="form-rom">
                              <div class="col-md-6 mb-3">
                                    Gender:     <br><input type="radio" name="gender" value="m"/> Male
                                                <input type="radio" name="gender" value="f"/> Female
                              </div>
                        </div>
                        
                        
                        <div class="form-row">
                              <div class="col-md-6 mb-3">
                                                <input type="submit" value="Sign up!" class="btn btn-outline-primary"/>
                              </div>
                        </div>
            </form>
      
      </div>
      </div>
      
      
      <footer>
            <div class="footer">
                  <p> Coding-Buddy&copy; Copyright Singh 2020</p>
            </div>
      </footer>
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      
      <script>
            
            //Variables
            var usernameAvailable = false;
            //Displaying City from API after typing a zip code
            $("#zip").on("change", async function(){
                  
                  // alert($("#zip").val());
                  let zipCode = $("#zip").val();
                  let url =  `https://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?zip=${zipCode}`;
                  let response = await fetch(url);
                  let data = await response.json();
                  // console.log(data)
                  $("#city").html(data.city);
                  $("#lati").html(data.latitude);
                  $("#longi").html(data.longitude);
            
            }); //zip
            
            $("#state").on("change", async function(){
                  
                  // alert($("#state").val());
                  let state = $("#state").val();
                  let url =  `https://itcdland.csumb.edu/~milara/ajax/countyList.php?state=${state}`;
                  let response = await fetch(url);
                  let data = await response.json();
                  //console.log(data)
                  $("#county").html("<option> Select One </option");
                  // for(let i = 0; i < data.length; i++){
                  //       $("#county").append(`<option> ${data[i].county} </option`);
                  // }
                  data.forEach( function(i){
                        $("#county").append(`<option> ${i.county} </option`);
                  });
            
            });//state
            
            $("#username").on("change", async function(){
                  
                  //alert($("#username").val());
                  let username = $("#username").val();
                  let url = `https://cst336.herokuapp.com/projects/api/usernamesAPI.php?username=${username}`;
                  let response = await fetch(url);
                  let data = await response.json();
                  
                  if(data.available){
                        $("#usernameError").html("Username available!");
                        $("#usernameError").css("color", "green");
                        usernameAvailable = true;
                  }else{
                        $("#usernameError").html("Username not available!");
                        $("#usernameError").css("color", "red");
                        usernameAvailable = false;
                  }
                  
            }); //username
            
            $("#signupForm").on("submit", function(e) {
                
                //alert("Submitting form...");
                if(!isFormValid()){
                      e.preventDefault();
                }
            
            });//form
            
            function isFormValid(){
                  var isValid = true;
                  if(!usernameAvailable){
                        isValid = false;
                  }
                  if($("#username").val().length == 0){
                        isValid = false;
                        $("#username").html("Username is required!");
                  }
                  
                  if($("#password").val() != $("#passwordAgain").val()){
                        $("#passwordAgainError").html("Password mismatch!");
                        isValid = false;
                  }
                  if($("#password").val().length && $("#passwordAgain").val().length < 6){
                        $("#passwordLength").html("Password is short!");
                        isValid = false;
                  }
                  
                  return isValid;
            }
            
      
      </script>

</body>
</html>