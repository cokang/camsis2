<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" class="<?php if (!($this->input->get('login') == "login")){ ?>id<?php } ?>">
<head>
<?php
if (!isset($_GET["login"])) {  //redirect(base_url()."index.php?login=login", 'refresh');
redirect(base_url()."index.php/Logincontroller/index?login=login", 'refresh');?>
<!--<meta http-equiv="refresh" content="3;url=<?php echo base_url(); ?>index.php/LoginController/index?login=login" />-->
<!--<meta http-equiv="refresh" content="3;url=<?php echo base_url(); ?>index.php?login=login" />-->
<?php } ?>
<meta charset="utf-8">
<meta name="viewport" content= "width=device-width, user-scalable=nomaximum-scale=1.0, minimum-scale=1.0,">
<meta name='viewport' content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0 user-scalable=no" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/iconcam2.png" type="image/x-icon" />
<link rel="STYLESHEET" type="text/css" media='all' href="<?php echo base_url(); ?>css/popup-contact.css">
<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/style.css">
<link rel='stylesheet' type='text/css' media='all' href="<?php echo base_url(); ?>css/style.css">
<link href="<?php echo base_url(); ?>css/Color-skin3.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type='text/css' media='screen' href="<?php echo base_url(); ?>icon/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/login.css">
<title>Login</title>

<!-- css3-mediaqueries.js for IE less than 9 -->
 <!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<!-- <div style="height: 65px; width: 100%;position: relative;margin:0 auto;line-height: 1.4em;"> -->

			<!--<span style="font-size:11px; display:inline-block;">Facility Management Services Contractor</span><br />-->
			<!-- <img src="<?php echo base_url(); ?>images/logo.png" style="width: 180px; height: 70px;"/><br /> -->
			<!-- <img src="<?php echo base_url(); ?>images/logo.png" style="height: 60px; margin-left: 5%; margin-top: 10px;"/><br /> -->
			<!--<span style="font-size:11px;">Copyright &copy; <?php echo date("Y"); ?>. Advance Pact Sdn Bhd 2-3A, Perdana The Place, Jalan PJU 8/5G, Bandar Damansara Perdana, 47820, Petaling Jaya, Selangor, MALAYSIA.</span><br />-->
			<!-- <div class="bttm-pen" style=" width: 350px; display:inline-block; margin-top:20px;"> -->

			<!--<span style="font-size:11px;">Concession Company</span><br />
			<img src="<?php echo base_url(); ?>images/penmedic.png" style=" width: 120px; height: 40px;"/>-->
			<!-- <img src="<?php echo base_url(); ?>images/Myapbesys2.png" style=" height: 65px; width: 150px; display:inline-block; margin-top:0px;"/> -->
			<!--<span style="font-size:10px; display:inline-block; margin-top:50px;">Copyright &copy; <?php echo date("Y"); ?> Advance Pact Sdn Bhd [412168-v]. All rights reserved.</span>-->
<!-- </div> -->
<div class="ui-left_web">
<div class="header-page">
<table style="width: 100%;" class="logo">
	<tr style="width: 2%;"><td></td>
		<td style="width: 10%; padding: 0;"><img src="<?php echo base_url().'images/logo.png'?>"  class="ap"/></td>
		<td style="width: 8%;"><!-- <img src="<?php echo base_url().'images/myapbesys3.png'?>" width=100; height=50;/> --></td>
		<td style="width: 80%;text-align: right;"><img src="<?php echo base_url().'images/iso.png'?>" class="iso"/></td></tr>
</table>
</div>
<body onload="" class="body_login">


	<!-- <div style="background-color: white;margin:150px;background-color: white;max-width:100%;height:auto;""> -->
		<div class="div-main">
			<div class="div-putih" <?php if ($this->input->get('login') == ""){ ?> <?php } ?>>
			<?php if ($this->input->get('login') == "login"){ $np = !($this->input->get('pass')) ? "0" : $this->input->get('pass');?>
				<?php echo form_open('logincontroller/validate_credentials');?>
				<!-- <img src="<?php echo base_url(); ?>images/logo.png" style="height: 60px; margin-top: 10px;"/> -->
			<table align="center">
			<tr><td valign="rights">WELCOME TO </td>
			<td valign="left" style= text-align: left;">
			<img src="<?php echo base_url().'images/myapbesys3.png'?>" class="myapbesys3" />
			</td>
			</tr>
			</table>
				<div>PLEASE LOGIN</div>
					<div class="form-group">
						<input type="text" class="input-form form-control login-field<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo '2'; }else{ echo ''; } ?>" value=""
						placeholder="<?php if ($np == 'no'){ echo 'Invalid Validation : Enter your name'; } elseif ($np == 'exp') { echo 'Password expired : Change your password'; } else { echo 'Enter your name'; } ?>" name="name" id="input-login"/>
						<label class="login-field-icon fui-user" for="login-name"><span align="center" class="icon-user"></label>
					</div>
					<div class="form-group">
						<input type="password" class="form-control login-field<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo '2'; }else{ echo ''; } ?>" value="" placeholder="Password" name="password" id="input-login"
						"/>
						<label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key"></span></label>
					</div>
				<button type="submit" name="submit" class='btn btn-primary' id="input-submit" style="width: 100px; background-color: #bb0808;">LOGIN</button>
				<?php //echo form_submit ('submit ','Login',"class='btn btn-primary' style='width:100%;'");?>
				<?php echo form_hidden('continue', $this->input->get('continue'));?>
				<?php echo form_close();?>
				<a style="text-align: center; color: blue; font-weight: bolder; font-size: 15px;" class="login-link" href='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");'>Change your password</a>
				<?php }else{ ?>
				<button type="cancel" name="submit" class='btn btn-primary submitcamsis' onclick="window.location.href='<?php echo base_url(); ?>index.php/Logincontroller/index?login=login'">ENTER TO CAMSIS</button><br>
				<!--<button type="cancel" name="submit" class='btn btn-primary' onclick="window.location.href='<?php echo base_url(); ?>index.php?login=login'" style="width:75%;margin-top:50px;margin-left:55px;">ENTER TO CAMSIS</button><br>-->
				Redirecting to CAMSIS in <span id="countdown">3</span> seconds...
				<?php } ?>

			</div>
			</label>
			</div>
			<div id="footer">
		<div class="footer-id">
			<div class="footer-login">
			<span style=" color: black; font-size: 13px;">ADVANCE PACT SDN BHD (412168-v)<br>
Copyright©-2019,  2-3A, Perdana The Place, 1, Jalan PJU 8/5g, Damansara Perdana, 47820 Petaling Jaya, Selangor Darul Ehsan, Malaysia.</span><br/>
			</div>
		</div>
	</div>
			</div>




		<!-- </div> -->

	<!-- <?php if ($this->input->get('login') == "login"){ ?> -->

	<!-- <?php } ?> -->
	<!--<button onclick="myFunction()">Try it</button>

	<p id="demo"></p>

	<script>
	function myFunction() {
		var x = "Total Height: " + screen.height + "px width" + screen.width + "px";
		document.getElementById("demo").innerHTML = x;
	}
	</script>-->




<?php if ($this->input->get('login') != "login"){
echo "
<script>
	var timeLeft = 2;
	var elem = document.getElementById('countdown');
	var timerId = setInterval(countdown, 1000);

	function countdown() {
		if (timeLeft == -1) {
			clearTimeout(timerId);
			doSomething();
		} else {
			elem.innerHTML = timeLeft;
			timeLeft--;
		}
	}
</script>";
}?>

<div class="ui-left_mobile">
<div class="header-page">
<table style="width: 100%;" class="logo">
	<tr style="width: 2%;">
	    <tr><td style="width: 100%;text-align: center;"><img src="<?php echo base_url().'images/iso.png'?>" class="iso"/></td></tr>
</table>
</div>
<body onload="" class="body_login">
	<!-- <div style="background-color: white;margin:150px;background-color: white;max-width:100%;height:auto;""> -->
		<div class="div-main">
			<div class="div-putih" <?php if ($this->input->get('login') == ""){ ?> <?php } ?>>
			<?php if ($this->input->get('login') == "login"){ $np = !($this->input->get('pass')) ? "0" : $this->input->get('pass');?>
				<?php echo form_open('logincontroller/validate_credentials');?>
				<!-- <img src="<?php echo base_url(); ?>images/logo.png" style="height: 60px; margin-top: 10px;"/> -->
				<div><img src="<?php echo base_url().'images/logo.png'?>"  class="ap"/></div>
			<table align="center">
			<tr>
			<td valign="rights">WELCOME TO </td>
			<td valign="left" style= text-align: left;">
			<img src="<?php echo base_url().'images/myapbesys3.png'?>" class="myapbesys3" />
			</td>
			</tr>
			</table>
				<div>PLEASE LOGIN</div>
					<div class="form-group">
						<input type="text" class="input-form form-control login-field<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo '2'; }else{ echo ''; } ?>" value=""
						placeholder="<?php if ($np == 'no'){ echo 'Invalid Validation : Enter your name'; } elseif ($np == 'exp') { echo 'Password expired : Change your password'; } else { echo 'Enter your name'; } ?>" name="name" id="input-login"/>
						<label class="login-field-icon fui-user" for="login-name"><span align="center" class="icon-user"></label>
					</div>
					<div class="form-group">
						<input type="password" class="form-control login-field<?php if('logincontroller/validate_credentials/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ echo '2'; }else{ echo ''; } ?>" value="" placeholder="Password" name="password" id="input-login"
						"/>
						<label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key"></span></label>
					</div>
				<button type="submit" name="submit" class='btn btn-primary' id="input-submit" style="width: 100px; background-color: #bb0808;">LOGIN</button>
				<?php //echo form_submit ('submit ','Login',"class='btn btn-primary' style='width:100%;'");?>
				<?php echo form_hidden('continue', $this->input->get('continue'));?>
				<?php echo form_close();?>
				<a style="text-align: center; color: blue; font-weight: bolder; font-size: 15px;" class="login-link" href='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");'>Change your password</a>
				<?php }else{ ?>
				<button type="cancel" name="submit" class='btn btn-primary submitcamsis' onclick="window.location.href='<?php echo base_url(); ?>index.php/Logincontroller/index?login=login'">ENTER TO CAMSIS</button><br>
				<!--<button type="cancel" name="submit" class='btn btn-primary' onclick="window.location.href='<?php echo base_url(); ?>index.php?login=login'" style="width:75%;margin-top:50px;margin-left:55px;">ENTER TO CAMSIS</button><br>-->
				Redirecting to CAMSIS in <span id="countdown">3</span> seconds...
				<?php } ?>

			</div>
			</label>
			</div>
			<div id="footer">
		<div class="footer-id">
			<div class="footer-login">
			<span style=" color: black; font-size: 13px;">ADVANCE PACT SDN BHD (412168-v)<br>
Copyright©-2019,  2-3A, Perdana The Place, 1, Jalan PJU 8/5g, Damansara Perdana, 47820 Petaling Jaya, Selangor Darul Ehsan, Malaysia.</span><br/>
			</div>
		</div>
	</div>
			</div>




		<!-- </div> -->

	<!-- <?php if ($this->input->get('login') == "login"){ ?> -->

	<!-- <?php } ?> -->
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
