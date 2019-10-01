<script>
// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
</script>
<body class="body-screen">
	<?php include 'content_menu.php';?>
	<div class="ui-left-screen">
		<?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'), '<div align="center" style="background:#B3130A;  font-size:20px; font-weight:bold; padding-top:15px; padding-bottom:15px; margin-top:0px; color:white;">Facility Management Information<br /> System</div>'); ?>
		<div align="center" class="ui-header-left-color" style="font-weight:bold; margin-top:; padding-top:15px; padding-bottom:15px; color:white;"><span>Hospital Alor Gajah</span>
			<div style="float:right; padding-right:10px; margin-top:-5px;">
				<a href="" id="loginButton" class="" style="color:black;"><img src="<?php echo base_url(); ?>images/user2.png" style="width:30px; height:30px;"/></a>   
		            <div id="loginBox">                
		              <form id="loginForm">
		                <fieldset id="body">
		                    <div class="user-info">
			        			<div class="ui-header-new" style="margin-top:-7px; width:240px; margin-left:-17px; margin-right:-17px;">WELCOME <br /> <span style="font-size:14px;"><?php echo $this->session->userdata('v_UserName');?></span></div>
			        			<div style="float:left; width:50%; margin-left:-10px; margin-top:5px; "><img src="<?php echo base_url(); ?>images/user2.png" style="width:70px; height:70px;"/></div>
			        			<div style="float:left; width:50%; margin-left:-10px; margin-top:18px; font-size:14px; color:black;"> Location <br />Staff No <br /> Email</div>
			        			
			        		</div>			                            
		                </fieldset>
		            </form>
		        </div>
		    </div>
		</div>
		<div align="center" class="color_style_1" style="font-weight:bold; font-size:25px; margin-top:; padding-top:15px; padding-bottom:15px; color:black;"><span><?php echo $this->session->userdata('usersess');?></span>
		    </div>
			<p style=" color:black;" align="center">Alor Gajah<br  />Melaka,78000 <br  />Phone: 06-5562333<br />Email: hd.alorgajah@cmis.com.my</p>
		<span style="float:; padding-right:10px;"><?php echo anchor ('contentcontroller/print_ppm', '<button class="btn-button btn-primary-button" style="width:100%; height:33px;">Print This Work Order <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');?></span>
		<div style="height:2px;"></div>
		<div align="center"> <?php echo anchor ('LoginController/logout','<button type="submit" class="btn btn-primary" style="width: 100%;"><span style="color:white;">Logout</span></button>');?></div>	
	</div>	