<?php echo form_open('Procurement/update_price');?>
<div id='fg_formContainer'>
<?php if(isset($status)==1){
 echo "Item Code: " . $this->input->post('itemcode') . "<br>MRIN No: " . $this->input->post('mrin') . "<br>New Price: " . $this->input->post('newcost');
} ?>
    <div id="fg_form_InnerContainer">
    <form id='contactus'>
		<div align="center">
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Item Code" name="itemcode" required size="35"/>
              <label class="login-field-icon" for="login-name"><span align="center" class="icon-user2"></label>
         	</div>
         	<div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="MRIN No" name="mrin" required size="35"/>
              <label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key2"></span></label>
            </div>
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="New Unit Cost" name="newcost" required size="35"/>
              <label class="login-field-icon" for="login-pass" ><span align="center" class="icon-key2"></span></label>
            </div>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="mysubmit" value="Submit" /></td>
            <button onclick="location.href = '<?php base_url();?>../contentcontroller/Procurement/BES?&tab=4';" id="myButton" class="float-left submit-button" >Back</button>
         </div>
    </form>
    </div>
    
</div>
<?php echo form_close(); ?>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->


