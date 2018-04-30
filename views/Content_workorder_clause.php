<?php echo form_open('contentcontroller/clause_update?wrk_ord='.$this->input->get('wrk_ord'));?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_wrk_ord.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="11" height="40px" style="padding-left:10px;">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="11" valign="top">
					<table width="100%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Clause Summary</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
						</tr>
						<tr>
							<td style="color:red; text-align:center; height:200px; background:white;">CLAUSE SUMMARY DETAILS NOT FOUND FOR THIS WORK ORDER.</td>
						</tr>			
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>