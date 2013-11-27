<?php
$conexion = mysql_connect ("localhost","root","admin");
$base = mysql_select_db("docvox");

$sql = "INSERT INTO  `docvox`.`audio` (
				`idaudio` ,
				`audio` ,
				`paciente` ,
				`transcripto` ,
				`fecha` ,
				`idservicios` ,
				`idmedico`
				)
				VALUES (
				NULL ,  '1234.mp3',  'Dni Pac2',  'NO', 
				CURRENT_TIMESTAMP ,  '1',  '1'
				);";
		if (mysql_query($sql)){echo "SI";}
?>
<!doctype html>
<html>
<head>
    <title>My Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
</head>
<body>
    <div data-role="page">
 
        <div data-role="header" data-position="fixed">
            <h1>My Title</h1>
        </div><!-- /header -->
 
        <div data-role="content">
            <p>Servicios</p>
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Filtrar por servicio..." >
			    <li><a href="#"></a></li>
			    <li><a href="#">Ser1</a></li>
			    <li><a href="#">Ser2</a></li>
			    <li><a href="#">Ser3</a></li>
			    <li><a href="#">Ser4</a></li>
			</ul>
			
			<form>
			    <label for="slider-0">Input slider:</label>
			    <input type="range" name="slider" id="slider-0" value="25" min="0" max="100" />
			    <input type="file"/>
			</form>
			
			<a href="#" data-role="button" data-icon="star">Star button</a>
			<a href="#" data-role="button" data-icon="star" data-theme="a">Button</a>
        </div><!-- /content -->
 
        <div data-role="footer">
            <h4>My Footer</h4>
        </div><!-- /footer -->
 
    </div><!-- /page -->
</body>
</html>