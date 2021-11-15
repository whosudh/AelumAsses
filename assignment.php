<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Form</title>
<style>
	body{
		background-color: #FFFFCC;
		background-image: url('https://images.pexels.com/photos/10139688/pexels-photo-10139688.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');
		height: 500px;
  		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
	}
	form{
		margin-left: 40vh;
		width: 50%;
	}
	p{
		margin-left: 40vh;
		width: 50%;
	}
	}
	fieldset{
		padding: 5px;
	}
	.btn{
		background-color:black; color:white;
	}
	#para{
		background-color: red;
		color: white;
		border: 2px solid black;
	}
	form{
		border: 1px solid #000;
		border-radius :2px;
		background-color: #6040B0;
	}
	#leg{

	text-align: center;
	font-size:  25px;
	font-weight:  bold;
	}

	label{
		padding-left: 5px;
	}
	.btn{
		margin-bottom: 10px;
  		margin-left:  70%;
	}
</style>
<script> 
        /* Function to Generat Captcha */  
        function GenerateCaptcha() {  
            var chr1 = Math.ceil(Math.random() * 10) + '';  
            var chr2 = Math.ceil(Math.random() * 10) + '';  
            var chr3 = Math.ceil(Math.random() * 10) + '';  
  
            var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
            var captchaCode = str + chr1 + ' ' + chr2 + ' ' + chr3;  
            document.getElementById("txtCaptcha").value = captchaCode  
        }  
  
        /* Validating Captcha Function */  
        function ValidateCaptcha() {  
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);  
            var str2 = removeSpaces(document.getElementById('txtCompare').value);  
  
            if (str1 == str2) return true;  
            return false;  
        }  
  
        /* Remove spaces from Captcha Code */  
        function removeSpaces(string) {  
            return string.split(' ').join('');  
        }

        	window.onload = function () {
            var minute = 2;
            var sec = 59;
            myVar = setInterval(function () {
                  document.getElementById("timer").innerHTML =
                  minute + " : " + sec;
                  sec--;
               if (sec == 00) {
                  minute--;
                  sec = 60;
              }else
			   if (minute == 0 && sec == 0) {
                     minute = 0;
                     sec = 0;
                     clearInterval(myVar)
                  } 
            }, 1000);
            }; 
</script>
</head>
<body onload="GenerateCaptcha();">
	<div class="container">
    <p id="para">Hurry-Up !! only <span id="timer">03:00</span> minutes left!</p>
	<form action="displayData.php" method="POST">
		<fieldset>
			<legend id="leg"><b>Profile</b></legend>
<div class="form-group">
	<label for="name"> FULL NAME</label>
<input type="text" class="form-control" placeholder="Full Name" id="name" name="fullname" value="" required><br>
</div>
<div class="form-group">
	<label for="name">Email</label>
<input type="text" class="form-control" placeholder="Email ID" id="email" name="email" value="" required><br>
</div>
<div class="form-group">
	<label for="dob"> Date Of Birth</label>
<input type="date" class="form-control" placeholder="D.O.B" id="dob" name="dob" value="" required><br>
</div>
<div class="form-group">
	<label for="msg"> ABOUT</label>
<textarea rows="6" col="8" class="form-control" placeholder="About Yourself" name="msg" value="">
</textarea>
</div>
<div class="form-group">
	<label for="cap">Captcha</label>
<input type="text" class="form-control"  id="txtCaptcha" name="cap" readonly><br>
</div>
<div class="form-group">
	<label for="cap1">Enter captcha</label>
<input type="text" class="form-control" id="txtCompare" name="cap1"><br>
</div>
<div class=" form-group text-left">
<button onclick="GenerateCaptcha();" class="btn" name="button">Refresh</button>
</div>
<div class=" form-group text-left">
<button onclick="validateCaptcha();" class="btn" name="button">Confirm & Submit</button>
</div>
</fieldset>
</form>
</div>
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['button'])){
$name=$_POST['fullname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$about=$_POST['msg'];
$insertquery= "insert into profile(Name,Email,DOB,About)values('$name','$email','$dob','$about')";
$res= mysqli_query($con,$insertquery);
if($res){
?>
<script>
alert('data inserted properly');
</script>
<?php
}
else{
	?>
<script>
alert('data not found');
</script>
<?php
}
}
?>
