<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>			
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="5" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Asset Log Card</span></b>
							<?php if($this->input->get('card') == '0'){?>
							  <span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/logprintmain?asstno='.$this->input->get('asstno'), '<button type="button" class="btn-button btn-primary-button">Print</button>'); ?>
							</span>
							<?php } ?>
							<?php if($this->input->get('card') == '1'){?>
							  <span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/logprint_U?asstno='.$this->input->get('asstno'), '<button type="button" class="btn-button btn-primary-button">Print</button>'); ?>
							</span>
							<?php } ?>
							</span>
							</td>
						</tr>