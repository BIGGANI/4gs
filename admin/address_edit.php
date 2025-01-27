<?php session_start(); 

if(!isset($_SESSION['admin_id']))
{
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    exit();
}

if($_SESSION['authority']<3)
	{
	echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
     exit();
	}

include('lib/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Address | Leather Bags</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="./css/bootstrap.css" rel="stylesheet">
<link href="./css/bootstrap-responsive.css" rel="stylesheet">
<link href="./css/bootstrap-overrides.css" rel="stylesheet">
<link href="./css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href="./css/slate.css" rel="stylesheet">
<link href="./css/slate-responsive.css" rel="stylesheet">


<script>
function showcat(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("catdiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","catajax.php?q="+str,true);
xmlhttp.send();
}
</script>

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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php
// Make sure you are using a correct path here.
//include_once 'ckeditor/ckeditor.php';
//$ckeditor = new CKEditor();
$ckeditor->basePath = '/ckeditor/';
$ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
$ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
$ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
$ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
$ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
//$ckeditor->editor('CKEditor1');
?>

</head>
<body>
  	
<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<div id="content">		
	<div class="container">	
	
<?php 

if(isset($_GET['address_id']))
{
	$aid = $_GET['address_id'];

    $queryAddDetail="SELECT * FROM address
					 WHERE address_id=".$aid;
    $sqlAdd = mysql_query($queryAddDetail);	
	$bcheck="";
	$ucheck="";
	$dcheck="";
	while($rowAdd = mysql_fetch_array($sqlAdd))
	{
	$name=$rowAdd["name"];
	$address1=$rowAdd["address1"];
	$address2=$rowAdd["address2"];
	$city=$rowAdd["city"];
	
	$state=$rowAdd["state"];
	$zip=$rowAdd["zip"];
	$country=$rowAdd["country"];
	$uemail=$rowAdd["uemail"];
	
	$pemail=$rowAdd["pemail"];
	$phone=$rowAdd["phone"];
	
	if($rowAdd["billing_add"]==1)
	{
	$bcheck=" checked";
	
	}
	if($rowAdd["delivery_add"]==1)
	{
	$dcheck=" checked";
	
	}
	
	if($rowAdd["user_add"]==1)
	{
	$ucheck=" checked";
	
	}
	
	
	
	}
	
	
	
}



?> 			

<div class="row">			
<div class="span8">	      		
<div id="horizontal" class="widget widget-form">	      			
<div class="widget-header">	      				
<h3>
<i class="icon-pencil"></i>
Edit Address	      					
</h3>	
</div> <!-- /widget-header -->

<div class="widget-content">
<form class="form-horizontal" enctype="multipart/form-data" action="edit_sub_address.php" method="post">
<fieldset>


          <input type=hidden name=address_id value=<?php echo $aid;?> >                    


<div class="control-group">
<label class="control-label" for="input01">Name</label>
<div class="controls">
	<input type="text" class="input-large" name="s_full_name" id="input01" value="<?php echo $name;?>" />
</div>
</div>
                              

                                                        
<div class="control-group">
<label class="control-label" for="input01">Address Line1</label>
<div class="controls">
	<input type="text" class="input-large" name="s_address_1" id="input01" value="<?php echo $address1;?>" />
</div>
</div>  

<div class="control-group">
<label class="control-label" for="input01">Address Line2</label>
<div class="controls">
	<input type="text" class="input-large" name="s_address_2" id="input01" value="<?php echo $address2;?>" />					              
</div>
</div>

<div class="control-group">
<label class="control-label" for="input01">City</label>
<div class="controls">
	<input type="text" class="input-large" name="s_city" id="input01" value="<?php echo $city;?>" />					              
</div>
</div>




<div class="control-group">
<label class="control-label" for="input01">State/Province/Region</label>
<div class="controls">
	<input type="text" class="input-large" name="s_state" id="input01" value="<?php echo $state; ?>"/>					              
</div>
</div>

<div class="control-group">
<label class="control-label" for="input01">ZIP</label>
<div class="controls">
	<input type="text" class="input-large" name="s_zip" id="input01" value="<?php echo $zip; ?>" />					              
</div>
</div>

<div class="control-group">
<label class="control-label" for="input01">Country</label>
<div class="controls">
	<input type="text" class="input-large" name="s_country" id="input01" value="<?php echo $country;?>" />					              
</div>
</div>

<div class="control-group">
<label class="control-label" for="input01">Phone</label>
<div class="controls">
	<input type="text" class="input-large" name="s_phone" id="input01" value="<?php echo $phone;?>"/>					              
</div>
</div>


<div class="control-group">
<label class="control-label" for="input01">ecom account email</label>
<div class="controls">
	<input type="text" class="input-large" name="sac_email" id="input01" value="<?php echo $uemail; ?>" />					              
</div>
</div>

<div class="control-group">
<label class="control-label" for="input01">Paypal email</label>
<div class="controls">
	<input type="text" class="input-large" name="spal_email" id="input01" value="<?php echo $pemail; ?>" />					              
</div>
</div>

<div class="control-group">

<label class="control-label" for="input01">Billing Address</label>

<div class="controls">
	<input type="checkbox" class="input-large" name="bill_add" id="input01"<?php echo $bcheck;?>/>					              
</div>
</div>

<div class="control-group">
<label class="control-label" for="input01">Delivery Address</label>

<div class="controls">
	<input type="checkbox" class="input-large" name="delivery_add" id="input01"<?php echo $dcheck;?>/>					              
</div>
</div>




<div class="control-group">

<label class="control-label" for="input01">User Address</label>

<div class="controls">
	<input type="checkbox" class="input-large" name="u_add" id="input01"<?php echo $ucheck;?>/>					              
</div>
</div>





                          

<div class="form-actions">
<button type="submit" name="submit" class="btn btn-primary btn-large">Edit Address</button>
<!--<button type="reset" class="btn btn-large">Delete</button>-->
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