<?php echo form_open('LoginController/chgPassword');?>
<script type='text/javascript' src='<?php echo base_url(); ?>js/gen_validatorv31.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/fg_ajax.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/fg_moveable_popup.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/fg_form_submitter.js'></script>
<div id='fg_formContainer'>
    <div id="fg_container_header">
        <div id="fg_box_Title">Change Your Password</div>
        <div id="fg_box_Close"><a href=><label class="login-field-icon"><span align="center" class="icon-cancel-circle"></label></a></div>
    </div>

    <div id="fg_form_InnerContainer">
    <form id='contactus'>
		<div align="center">
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Username" name="username" size="35"/>
              <label class="login-field-icon" for="login-name"><span align="center" class="icon-user2"></label>
         	</div>
         	<div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Old Password" name="oldpass" size="35"/>
              <label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key2"></span></label>
            </div>
            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="New Password" name="npassword" size="35"/>
              <label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key2"></span></label>
            </div>
            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Confirm New Password" name="cpassword" size="35"/>
              <label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key2"></span></label>
            </div>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="mysubmit" value="Submit" /></td>
           
         </div>
    </form>
    </div>
</div>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->


<div id='fg_backgroundpopup'></div>

<div id='fg_submit_success_message'>
    <h2>Thanks!</h2>
    <p>
    Thanks for contacting us. We will get in touch with you soon!
    <p>
        <a href="javascript:fg_hideform('fg_formContainer','fg_backgroundpopup');">Close this window</a>
    <p>
    </p>
</div>
