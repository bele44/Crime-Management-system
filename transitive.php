<!DOCTYPE html>
<html>
<head>
<title>transitive menu
</title>
<style>
body{
	background-image: url('images/bg2.jpg')
	background-size: cover;
	font-family: verdana;
	font-size: 20px;
	margin: 10px;
	line-height: 50px;
	
}
.navigationbar {
	width: 100%;
	text-align: center;
    background-color: #A94C9C;
}
.navigationbar ul{
	margin: 0px;
	padding: 0px;
	list-style: none;
	position: relative;
}
.navigationbar ul li a{
	display: block;
	padding: 0px;
	color: white;
	text-decoration: none;
	width: 120px;
	margin-top: 0px;
}
.navigationbar ul:after{
	content: "";clear:both;
	display: block;
}
.navigationbar ul li{
	list-style: none;
	float: left;	
}
.navigationbar ul ul{
display:none;	
}
.navigationbar ul li:hover>ul{
display: block;	
}
.navigationbar ul li:hover{
background:#D6AE58;
transition:0.9s;	
}
.navigationbar ul li:hover a{
color:white;	
}
.navigationbar ul ul{
background:black;
padding:0px;
margin:0px;
position: absolute;
	
}
.navigationbar ul ul li{
float:none;
position: relative;	
}
.navigationbar ul ul li a{
padding:20px;
color:white;
width:80px;
text-align: left;	
}
.navigationbar ul ul li a hover{
background:lightblue;
color:pink;
transition:0.9s;	
}
</style>
</head>
<body>
<div class="navigationbar">
<ul>
   <li><a href="#home">Home</a></li>
   <li><a href="#home">About Us</a>
   		<ul>
   			<li><a href="#home">Home</a></li>
   	`		<li><a href="#home">Home</a></li>
   			<li><a href="#home">Home</a></li>
   	`		<li><a href="#home">Home</a></li>
   		</ul>
   </li>
   <li><a href="#home">Contact Us</a></li>
   <li><a href="#home">Feadback</a></li>
   <li><a href="#home">Help</a>
   		<ul>
   			<li><a href="#home">Home</a></li>
   	`		<li><a href="#home">Home</a></li>
   			<li><a href="#home">Home</a></li>
   	`		<li><a href="#home">Home</a></li>
   		</ul>
   </li>
</ul>
</div>
</body>
</html>
