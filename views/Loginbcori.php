<?php echo  doctype("html"); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<meta name='viewport' content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0 user-scalable=no" />-->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/iconcam.png" type="image/x-icon" />
<link rel="STYLESHEET" type="text/css" media='all' href="<?php echo base_url(); ?>css/popup-contact.css">
<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/style.css">
<link rel='stylesheet' type='text/css' media='all' href="<?php echo base_url(); ?>css/style.css"> 
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>css/Color-skin3.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type='text/css' media='screen' href="<?php echo base_url(); ?>icon/style.css">
<title>CAMSIS Login</title>
<!-- css3-mediaqueries.js for IE less than 9 -->
 <!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>  
<body onload="" class="body_login">
	<div class="login">
		<div class="login-screen">
			<div class="login-menu">
				<div class="menum"> 
					<span style="line-height: 25px; display:inline-block;">(IIUMMC)<br/> International Islamic University Malaysia Medical Centre</span>
					<img src="<?php echo base_url(); ?>images/iium.png" class="img-login"/>
				</div>
				<div class="menum2"> 
					<i>Welcome To</i><br />
					<span><b>Computerised Asset Management Services Information System</b></span>
				</div>
			</div>
			<div class="login-form">
				<?php echo form_open('logincontroller/validate_credentials');?>
					<div class="form-group">
					<input type="text" class="form-control login-field<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo '2'; }else{ echo ''; } ?>" value="" 
					placeholder="<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo 'Invalid Validation : Enter your name'; }else{ echo 'Enter your name'; } ?>" name="name" id="input-login" style="height: 47px;"/>
					<label class="login-field-icon fui-user" for="login-name"><span align="center" class="icon-user"></label>
					</div>
				
					<div class="form-group">
					<input type="password" class="form-control login-field<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo '2'; }else{ echo ''; } ?>" value="" placeholder="Password" name="password" id="input-login" 
					style="height: 47px;"/>
					<label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key"></span></label>
					</div>
				<button type="submit" name="submit" class='btn btn-primary' id="input-submit">Login</button>
				<?php //echo form_submit ('submit ','Login',"class='btn btn-primary' style='width:100%;'");?>
				<?php echo form_hidden('continue', $this->input->get('continue'));?>
				<?php echo form_close();?>
				<a class="login-link" href='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");'>Change your password</a>
			</div>
		</div>
	</div>
	<div id="footer" style="width:100%;">
		<div class="footer-id">
			<div class="bttm-pen" style=" width: 350px;">
			
			<!--<span style="font-size:11px;">Concession Company</span><br />
			<img src="<?php echo base_url(); ?>images/penmedic.png" style=" width: 120px; height: 40px;"/>-->
			<br><br>
			<span style="font-size:10px; display:inline-block;">Copyright &copy; <?php echo date("Y"); ?> Advance Pact Sdn Bhd [412168-v]. All rights reserved.</span>
			</div>
			<!--<span style="font-weight:bold;">PenMedic Sdn. Bhd.</span><br />-->
			<div class="bttm-ap">
			<span style="font-size:11px; display:inline-block;">Facility Management Services Contractor</span><br />
			<img src="<?php echo base_url(); ?>images/logo.png" class="img-login2" style=""/><br />
			<!--<span style="font-size:11px;">Copyright &copy; <?php echo date("Y"); ?>. Advance Pact Sdn Bhd 2-3A, Perdana The Place, Jalan PJU 8/5G, Bandar Damansara Perdana, 47820, Petaling Jaya, Selangor, MALAYSIA.</span><br />-->
			</div>
		</div>
	</div>
	
	<!--<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x = "Total Height: " + screen.height + "px width" + screen.width + "px";
    document.getElementById("demo").innerHTML = x;
}
</script>-->
</body>
<?php require_once('contactform-code.php');?>
</html>