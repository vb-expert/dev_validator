﻿<?php
error_reporting(E_ALL); //debug:
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8'); //utf8 support:
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); //no cache:
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//aux code:
$s_task_page = $_SERVER["REQUEST_URI"];
$_SESSION['s_task_page'] = $s_task_page;
//access wall:
if($b_use_access_wall){
  include($s_v_app_root."access_wall.php");
}
$_SESSION["s_task_id"] = $cls_Task->s_id;
?>
<html>
  <head>
    <title>
	  <?php echo($cls_Task->s_title); ?>
	</title>
	<?php include_once("head_includes.php"); ?>
</head>
<body>
  <div class="container">
    <div class="starter-template">
      <div class="jumbotron task_jumbotron_height_fix">
	    <?php include("../../nav_menu.php"); ?>
		<!-- task display code start ---------------------------------------->
		
		<!-- headers -------------------------------------------------------->
        <h2 class="centered"><?php echo($cls_Task->s_title) . ": " . $cls_Task->s_description; ?></h2>
		<hr>
		<!-- steps ---------------------------------------------------------->
	    <?php
	      foreach ($cls_Task->oa_steps as $s_step){
			if(strpos($s_step, 'youtu.be') !== false){
			  echo("<p class='lead lead-top-fix'>
			          <a href='$s_step' target='_blank'>
			            <img src='../../_img/_watch_on_youtube.png'> Подивитися, як це робити, на YouTube!
			            </img>
					  </a>
			       </p>");
			}else{
			  echo("<p class='lead lead-top-fix'>$s_step</p>");
			}
		  }
	    ?>
		<hr>
		<!-- help links --------------------------------------------------->
        <div style="text-align: center;"> 
           <a class="btn btn-info regular_button" href="<?php echo($cls_Task->s_learn_url); ?>" role="button" target="_blank">Читати навчальний матеріал</a>
           <a class="btn btn-danger regular_button" href="<?php echo($cls_Task->s_youtube_url); ?>" role="button" target="_blank">Дивитись відеоурок</a>
           <a class="btn btn-warning regular_button" href="<?php echo($cls_Task->s_discuss_url) ?>" role="button" target="_blank">Обговорити у спільноті</a>
        </div>
		<hr>
		<!-- image ---------------------------------------------------------->
		<!--
        <div class="row f_img_holder">
          <img class='f_img' src="target_form.png" />
        </div>
        <hr>
		-->
		<!-- properties ----------------------------------------------------->
		<?php
		  $i_ctr = 0;
		  foreach ($cls_Task->oa_properties as $cls_property){
			echo("<tr>");
			  switch($cls_property->s_type){
			    case "": //default
				  //--------------------------------------------------------->
			      echo("<td>".$cls_property->s_name."</td>");
			      echo("<td>".$cls_property->s_title."</td>");
			      echo("<td>".$cls_property->s_master_value."</td>");
                  $s_checked = "";
                  if($cls_property->b_validated == true){
                    $s_checked = "checked=\"checked\"";
				  }
	              echo("<td>
				          <div class='chkbox-v-value'>
						    <input type='checkbox' $s_checked data-off-icon-cls=\"gluphicon-thumbs-down\" data-on-icon-cls=\"gluphicon-thumbs-up\">
							</input>
						  </div>
						</td>");
				  break;
				  //--------------------------------------------------------->
			    case "code":
				  echo("<td>$cls_property->s_name</td>");
				  echo("<td colspan='3'>
				          <div onselectstart='return false'>
						    <pre>
							  <code class='cs hljs'>$cls_property->s_master_value
							  </code>
							</pre>
					      </div>
						</td>");
				  break;
				  //--------------------------------------------------------->
			    case "youtube":
				  echo("<td>$cls_property->s_name</td>");
				  echo("<td colspan='3'>
				          <div class='youtube'>
						    <a href='$cls_property->s_master_value'>
						      <img src='../../_img/'>
							  </img>
							  $cls_property->s_name
							</a>
					      </div>
						</td>");
                  break;
				  //--------------------------------------------------------->
			    case "screen":
				  echo("<td>$cls_property->s_title</td>");
				  echo("<td colspan='3'>
				          <div class='screen'>
						    <img src='$cls_property->s_master_value'>
							</img>
					      </div>
						</td>");
                  break;
				  //--------------------------------------------------------->
				case "obj_creator":
				  echo("<td>$cls_property->s_name</td>");
				  echo("<td colspan='3'>$cls_property->s_title</td>");
				  break;
				  //--------------------------------------------------------->
				case "block_start":
				  _table_start("<span>
				                  <img class='property_type_img' src='../../_img/$cls_property->s_title'>
								   </img>
								   <span class='app_specs_text'>$cls_property->s_master_value
								   </span>
							    </span>");
				  break;
				  //--------------------------------------------------------->
				case "block_end":
				  _table_end();
				  break;
				  //--------------------------------------------------------->
			  }
			echo("</tr>");
			$i_ctr++;
          }
		  _table_end();
		  echo("</div>")
		?>
		<!-- progress ----------------------------------------------------->
        <div class="progress">
		  <div class="progress-bar progress-bar-success progress-bar-striped pb-v-progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo($_SESSION["vr_percent"]); ?>%">
			<div class='pb-v-text'>
			  <?php 
			    if(isset($_SESSION["vr_percent"])){
			      echo($_SESSION["vr_percent"]); 
				}
			    else{
				  echo(0);
				}
			  ?> % вірно!
			</div>
		  </div>
		</div>
		<!-- validation upload -------------------------------------------->
		<div class="container">
		  <div class="row">
			<div class="col-md-2">
			  <div class='check_btn_label'>Перевірка:</div>
			</div>
			<div class="col-md-8">
			<form id='upload_file' class='upload_file' action="..\..\validator_fe.php" method="post" enctype="multipart/form-data">
			  <label class="btn btn-success btn-block btn-lg">
				Вибрати файл програми для валідації<input type="file" hidden id="fileToUpload" name="fileToUpload">
			  </label>
			  <input type="hidden" name="codefile" value="<?php echo($cls_Task->s_id) ?>"/><!-- task id -->
			</form>
			</div>
			<div class="col-md-4">
			  
			</div>
		  </div>
		</div>
		<div class='footer_spacer'></div>
		<!-- -------------------------------------------------------------->
    </div>
  </div>
</div>
	
<!-- modal msg start ------------------------------------>
<div class="container">
  <!-- test rigger -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Вітаємо із маленькою перемогою!</h4>
        </div>
        <div class="modal-body modal-task-complete">
		  <div class='task-completed-img'><img src='../../_img/task-completed.png' /></div>
          <div>Завдання виконано на 100%!</div>
		  <div>Програмуй наступне!</div>
        </div>
        <div class="modal-footer">
		  <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='../../index.php';">Всі завдання</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='history.go(1);'>Закрити</button>
        </div>
      </div>
   
    </div>
  </div>
  
</div>
<!-- modal msg end -------------------------------------->

<!-- js ------------------------------------------------->
<script>
  $('#fileToUpload').change(function(){ 
    $('#upload_file').submit();
  });
  <!-- Initialize checkboxpicker -->
  $(':checkbox').checkboxpicker();
  <!-- Initialize highlight -->
  hljs.initHighlightingOnLoad();
</script>
<!-- js ------------------------------------------------->

</body>
  
<?php

//show completed window on 100%:
if($_SESSION["vr_percent"] == 100){
  //show completed screen:
  echo("<script>$('#myModal').modal('show');</script>");
}

//destory session vars with validation results:
$_SESSION["vr_percent"] = "0";

if(isset($_SESSION["vr_percent"])){
  if($b_do_debug){
    echo("<pre>");
    var_dump($_SESSION);
    echo("</pre>");
  }
}

function _table_start($tbl_title){
  $s_data = "<table class='table table-striped table-bordered'>
        <caption class='app_specs' align='top'>$tbl_title</caption>
          <thead >
            <tr >
              <th>Об`єкт (англ.):</th>
              <th>Об`єкт \ властивість (укр.):</th>
              <th>Потрібне значення:</th>
              <th>Валідація:</th>
            </tr>
          </thead>
          <colgroup>
            <col style='width:20%'>
            <col style='width:30%'>
            <col style='width:30%'>
            <col style='width:10%'>
         </colgroup>";
  echo($s_data);
}
function _table_end(){
  $s_data = "</table>";
  echo("$s_data");
}

?>

</html>