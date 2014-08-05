<?php
session_start();
if(!isset($_SESSION['id']))
{
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    exit();
}
	if($_SESSION['authority']==6)
	{
	echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
     exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Menu Edit | ADMIN </title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Styles -->
<link href="./css/bootstrap.css" rel="stylesheet">
<link href="./css/bootstrap-responsive.css" rel="stylesheet">
<link href="./css/bootstrap-overrides.css" rel="stylesheet">

<link href="./css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">

<link href="./css/slate.css" rel="stylesheet">
<link href="./css/slate-responsive.css" rel="stylesheet">


<!-- Javascript -->
<script src="./js/jquery-1.7.2.min.js"></script>
<script src="./js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="./js/jquery.ui.touch-punch.min.js"></script>
<script src="./js/bootstrap.js"></script>

<script src="./js/plugins/validate/jquery.validate.js"></script>

<script src="./js/Slate.js"></script>

<script src="./js/demos/demo.validate.js"></script>


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>

  	
<div id="header">
	
	<div class="container">			
		
		<img src="img/logo.png" height="70" width="400" style="position:relative; top:20px">			
		
		<div id="info">				
			
			<a href="javascript:;" id="info-trigger">
				<i class="icon-cog"></i>
			</a>
			
			<div id="info-menu">
				
				<div class="info-details">
				
					<h4>Welcome back, <font color="#CC6600"><?php echo $_SESSION['name']; ?></font></h4>
					
					<p>
						
						<br>
						Want to logout, click <a href="logout.php">here.</a>
					</p>
					
				</div> <!-- /.info-details -->
				
				<!-- /.info-avatar -->
				
			</div> <!-- /#info-menu -->
			
		</div> <!-- /#info -->
		
	</div> <!-- /.container -->

</div> <!-- /#header -->


<?php include('menu.php'); ?>



<div id="content">
		
	<div class="container">
		
		<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			  <li>
			    <a href="./">Home</a> <span class="divider">/</span>
			  </li>
			  <li class="active">Menu</li>
			</ul>
			
		</div> <!-- /.page-title -->
<?php
include('lib/connect.php');


if(isset($_POST['submit']))
{
    $id=$_POST['id'];
	$result=mysql_query("UPDATE menu SET menu_name='$_POST[mname]', menu_details='$_POST[mdesc]' WHERE menu_id=$id");

	if($result)
	{
		$con = "<b><font face='Arial, Helvetica, sans-serif' size='2' color='#006600'>Menu saved successfully.</font></b>";
	}
	else
	{
		$con = "<b><font face='Arial, Helvetica, sans-serif' size='2' color='#FF0000'>Menu could not be saved.</font></b>";
	}
}
else
{
	$con = "";
    $id=$_GET['id'];
	
}
?> 			
		<div class="row">
			
			<div class="span8">
	      		
	      		<div id="horizontal" class="widget widget-form">
	      			
	      			<div class="widget-header">	      				
	      				<h3>
	      					<i class="icon-pencil"></i>
	      					Edit Menu      					
      					</h3>	
      				</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<?php echo $con; ?>	
					
					
					
						<form class="form-horizontal" action="edit_main_menu.php" method="post">
					        <fieldset>
					         
								<?php
								$sqlcat = mysql_query("SELECT * FROM menu WHERE menu_id=$id");
								while($row2 = mysql_fetch_array($sqlcat))
								{
								?>                             
																	
							 <div class="control-group">
					            <label class="control-label" for="input01">Menu ID</label>
					            <div class="controls">
					             <?php echo $row2['menu_id']; 
									echo "<input type=hidden name=id value=".$row2['menu_id'].">";					          
								?>  
								<!--<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>-->
					            </div>
					          </div>	
								

							 <div class="control-group">
					            <label class="control-label" for="input01">Menu Name</label>
					            <div class="controls">
					              <input type="text" class="input-large" name="mname" id="input01" value="<?php echo $row2['menu_name']; ?>">
					              <!--<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>-->
					            </div>
					          </div>
							 

                              <div class="control-group">
					            <label class="control-label" for="input01">Menu Content</label>
					            <div class="controls">
					              <textarea name="mdesc" style="height:100px;"><?php echo $row2['menu_details']; ?></textarea>
					              <!--<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>-->
					            </div>
					          </div>
                              <div class="control-group">
					            <label class="control-label" for="input01">Status</label>
					            <div class="controls">
                                 		


								 </div>
					          </div>	



							  
							  <div class="control-group">
					            <label class="control-label" for="input01">Published</label>
					            <div class="controls">



								 </div>
					          </div>	
							
                              
					          <?php
								}
							  ?> 
					          <div class="form-actions">
					            <button type="submit" name="submit" class="btn btn-primary btn-large">Edit Menu</button>
					            <button class="btn btn-large">Delete</button>
					          </div>
					        </fieldset>
					      </form>	
						
					</div> <!-- /widget-content -->
						
				</div>	
                </div>
                
				
			
		    	
				
				
			
		    
		
		
	</div> <!-- /.container -->
	
</div> <!-- /#content -->

<?php include('footer.php'); ?>

  </body>
</html>
