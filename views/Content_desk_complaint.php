<?php echo form_open('desk_complaint?cmplnt_no='.$this->input->get('cmplnt_no'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Complaint Details</span>&nbsp;<span style="float: right; padding-right:10px;"><!--<input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update">--><input type="submit" class=" btn btn-button btn-primary-button" name="mysubmit" value="Update"></span></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
					<?php include 'content_complaint_desk.php';?>
				</td>
			</tr>
		</table>
	</div>
		<?php  echo form_hidden('cmplnt_no',$this->input->get('cmplnt_no')); ?>
	</div>
<?php echo form_close(); ?>