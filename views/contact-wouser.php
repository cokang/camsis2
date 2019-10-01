<?php $this->load->library('form_validation');?>
<?php echo validation_errors();?>
<script type='text/javascript' src='<?php echo base_url(); ?>js/gen_validatorv31.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/fg_ajax.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/fg_moveable_popup.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/fg_form_submitter.js'></script>
<form>
<div id='fg_formContainer'>
    <div id="fg_container_header">
        <div id="fg_box_Title">User Verification</div>
        <div id="fg_box_Close"><a onclick="javascript:fg_hideform('fg_formContainer','fg_backgroundpopup');"><label class="login-field-icon" style="padding-left:60px;"><span align="center" class="icon-cancel-circle"></label></a></div>
    </div>
    

    <div id="fg_form_InnerContainer">
    <form id='contactus'>
    <div align="center">
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Username" name="name" size="35"/>
              <label class="login-field-icon" for="login-name"><span align="center" class="icon-user2"></label>
          </div>
          <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Password" name="password" size="35"/>
              <label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key2"></span></label>
            </div>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="mysubmit" onclick="javascript: form.action='<?php echo base_url(); ?>index.php/userverification_ctrl/woresponse_verification';" value="Submit" /></td>
           
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