<style>
.butang{
	    padding: 5px 8px;
    font-size: 15px;
    width: 100px;
    font-weight: normal;
    line-height: 1.4;
    border: none;
    border-radius: 0px;
}
</style>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php 
		if ($this->input->get('ex') != 'excel') {
		include 'content_asset_tab.php';
		}
		$url='assetlogcards_M';
		?>	
		
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="5" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Asset Log Card</span></b>
							<?php if ($this->input->get('ex') != 'excel') { ?>
							<?php if($this->input->get('card') == '0'){
							$url='assetlogcards_M';		
							?>
							  <span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/logprintmain?asstno='.$this->input->get('asstno'), '<button type="button" class="btn-button btn-primary-button" style="background-color: #0d8f80;">Print</button>'); ?>
							</span>
							<?php } ?>
							<?php if($this->input->get('card') == '1'){
							$url='assetlogcards_U';	
							?>
							  <span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/logprint_U?asstno='.$this->input->get('asstno'), '<button type="button" class="btn-button btn-primary-button" style="background-color: #0d8f80;">Print</button>'); ?>
							</span>
							<?php } ?>
							  <span class="textmenu1" style="float:right;padding-top:0px;<?=($this->input->get('card') <>'') ? 'padding-right:10px;' : ''?>">
							<?php echo anchor ('contentcontroller/'.$url.'?asstno='.$this->input->get('asstno')."&tab=".$this->input->get('tab')."&ex=excel", '<button type="button" class="butang btn-primary-button" style="background-color: #0d8f80;">Excel</button>'); ?>
							</span>
							<?php } ?>
							</td>
						</tr>