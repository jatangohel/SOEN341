<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width">
   <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<title>Profile Page</title>
  <style>


   .radio_buttons {
       padding-top: 20px;
       padding-bottom: 20px;
       background-color: rgb(45, 45, 45);
       color:white;
   }
   body
  {
   background-image: linear-gradient(to bottom, rgba(255, 255, 255,9), rgba(230, 247, 255,9)), url("concordia.jpg");
   background-image: -moz-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
   background-image: -o-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
   background-image: -ms-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,9)), url(concordia.jpg);
   background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255,9)), to(rgba(230, 247, 255,9))), url(../../../../../Downloads/concordia.jpg);
   background-image: -webkit-linear-gradient(top, rgba(230, 247, 255,9), rgba(230, 247, 255,0)), url(concordia.jpg);
     background-repeat: no-repeat;
     background-size: cover;
     background-attachment: fixed;
  }

  .infobox{
      width: 400px;
      height: 700px;
      background: #D0D3D4;
      color: #000;
      opacity: 0.80;
      top: 20%;
      left: 50%;
      right: 50%;
      transform: translate(-50%,-50%)
      box-sizing: border-box;
      padding: 70px 30px;


  }

  .center {
  display: block;
  margin-left: -30%;
  margin-right: auto;
  color: #000;
}

h1{

  font-size: 22px;
  color: #000;

}

.middle {
display: block;
margin-left: -60%;
margin-right: auto;
color: #000;
}

.infobox input{
  width: 80%;
  margin-bottom: 20px;
  margin-left: 20px;
  color: #000;
}

.infobox input[type="text"], input[type="Email"], input[type="password"], input[type="password"]
{
  border: none;
  border-bottom: 1px solid #000;
  background: transparent;
  outline: none;
  height: 40px;
}

tr{
    background-color:white;
    color:black;
}
table.gridtable {
width: 750px;

margin:50px auto;
}

table.gridtable th {
background: #3498db;
color: white;
font-weight: bold;
}

table.gridtable td, th {
padding: 10px;
border: 1px solid #ccc;
text-align: center;
font-size: 18px;
}

.labels tr td{
cursor:pointer;
background-color: rgba(128, 191, 255);
font-weight: bold;
color: #fff;
}

.label tr td label{
display: block;
}

.dropdown-menu{
background-color: #00b38f;
opacity:0.96;
}




  </style>

  </head>

  <body>
  



<center>

<div class="infobox">



      <img src="https://www.qualiscare.com/wp-content/uploads/2017/08/default-user.png" alt="avatar" width="100" height="100">

          <h1>Profile Information</h1>


      <form>

          <br>

          <p>Current Username</p>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Change
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <input type="text" name="" value="new username" ><br>
                <input type="button" class="btn btn-success btn-sm"style="float:right; margin-right:20px;" value="submit"/>
              </ul>
            </div>

          <br><br>

          <p>Current Email Address</p>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Change
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <input type="text" name="" value="new Email" ><br>
                <input type="button" class="btn btn-success btn-sm"style="float:right; margin-right:20px;" value="submit"/>
              </ul>
            </div>
<br><br>


          <p>Password</p>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Change
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <input type="text" name="" value="new Password" ><br>
                <input type="text" name="" value="Cofirm Password" ><br>
                <input type="button" class="btn btn-success btn-sm"style="float:right; margin-right:20px;" value="submit"/>
              </ul>
            </div>
<br><br><br><br>



            <button class="submit-button btn-lg btn-primary" id="submit" name="submit"> Submit </button>

        </div>

     </form>
      </div>

<br><br>

    </center>




	<br><br><br><br><br>
    <footer>

      <div class="navbar navbar-inverse bg-dark fixed-bottom">
      <div class="navbar-text text-white pull-left">
        <p> Copyright Error404 Team 2019</p>
      </div>
      <div class="navbar-text text-success text-center">
        <p> Please Share this Website to your friends, thanks!</p>
      </div>
      <div class="navbar-text pull-right">
      <a href="#"><i class="fab fa-facebook-square"></i></a>
      <a href="#"><i class="fab fa-google"></i></a>
      <a href="#"><i class="fab fa-twitter-square"></i></a>
      <a href="#"><i class="fas fa-share-square"></i></a>
      </div>
    </div>

      </footer>

  <script>




     </script>


  </body>
  <html>
