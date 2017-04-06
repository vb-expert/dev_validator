﻿<?php
//utf8 support:
header('Content-Type: text/html; charset=utf-8');
?>
<html>
  <head>
    <!-- title -->
    <title>Завдання Click_01</title>
    <!-- utf8 support: -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- jq CDN (bootsrtrap reqired): -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
    <!-- tether	CDN (bootsrtrap reqired): -->
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
	<!-- bootstrap CDN: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <!-- favicon: -->
	<link rel="icon" href="favicon.ico?v=2" />
	<!-- external CSS: -->
    <link rel="stylesheet" type="text/css" href="../../_css/global.css">
</head>
 <body>
   <div class="container">
     <div class="starter-template">
      <!-- header info block start: -------------------------------------------------------------------------------->
		<?php
			include_once("../../header.php");
		?>
       <!-- header info block end: -------------------------------------------------------------------------------->
	
       <div class="jumbotron">
	   
		 <!-- task info block start --------------------------------------------------------------------------------->
         <h2 class=''><a href = "../../index.php">Доступні завдання:</a></h2>
         <hr>
		 <h1 class="">Завдання Click_01</h1>
         <h3 class="">Створення програми з подією</h3>
		 
		 <p class="lead lead-top-fix">1. Створити форму відповідно специфікації</p>
		 <p class="lead lead-top-fix">2. Завантажити програму у <b>DEV-VALIDATOR</b>.</p>
		 <p class="lead lead-top-fix">3. Добитися повної валідації програми.</p>
		 <p class="lead lead-top-fix">4. Зберегти скріншот результатів у папку <b>Release</b>.</p>
		 <p class="lead lead-top-fix">5. Зберегти програму у папку <b>Release</b>.</p>
		 
		 		<!-- Form -->
		<table style="width: 100%" class="table table-striped table-condensed">
		<caption style="caption-side: top">Form</caption>
 		 <thead>
		  <tr>
		   <th>Properties</th>
		   <th>Властивість</th>
		   <th>Значення</th>
		   <th>Стан</th>
		  </tr>
		 </thead>
		  <tr>
		   <td>Solution</td>
		   <td>Ім'я рішення</td>
		   <td><b>Lesson_50</b></td>
		   <td><input type="checkbox" value=""></td>
		  </tr>
		  <tr>
		   <td>Project name</td>
		   <td>Ім'я проекту</td>
		   <td><b>Click_01</b></td>
		   <td><input type="checkbox" value=""></td>
		  </tr>
		  
		</table>

		


        <div class="row pic-centered">
           <img src="target_form.png" alt="Скріншот програми" class="">
         </div>
		
		<!-- task info block end ----------------------------------------------------------------------------------->

		<!-- help block start ----------------------------------------------------------------------------------->
			<hr>
				<?php
					include_once("../../help.php");
				?>
			<hr> 
		<!-- help block end ----------------------------------------------------------------------------------->

         <!-- task validation block start --------------------------------------------------------------------------->
         <h2 class=''>Перевірка:</h2>
           <!-- uploader start -->
           <form action="..\..\validator_fe.php" method="post" enctype="multipart/form-data">
             Оберіть файл програми, для валідації:
             <label class="btn btn-success btn-browse" for="fileToUpload">
             <input id="fileToUpload" name="fileToUpload" type="file" style="display:none;">
               Обрати файл
             </label>
             <input class='btn btn-primary btn-upload' type="submit" value="Відправити файл" name="submit"></input>
			 <!-- uploader end -->
			 <input type="hidden" name="codefile" value="50_Click_01"> <!-- task id -->
         </form>
		 <!-- task validation block end ------------------------------------------------------------------------------>
		
		</div>
		
      </div>
    </div>
  </body>
</html>