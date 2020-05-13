<?php
session_start(); 
session_destroy(); // destroy session
?> 

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
<center><br><br><br><br><br><p>Logging out. Please wait...</p></center>

<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 47%;
  top: 30%;
  //z-index: 1;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid blue;
  border-color: blue transparent grey transparent;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

p {
  text-indent: 50px;
  letter-spacing: 2px;
}
</style>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 500);
}

function showPage() {
  location.replace("./index.php")
}
</script>

</body>
</html>


