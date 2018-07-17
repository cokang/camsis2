<div class="div-p"></div>
<div class="main-box">
	<div class="box4">
		<div class="small-box bg-purple">
			<div class="inner2" >
				<p>Monthly Asset Listing</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_assets_main/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box4">
		<div class="small-box bg-fuchsia">
			<div class="inner2" >
				<p>All Sites VO Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_C_main/'.$this->session->userdata('usersess').'?&p='.$Period,'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box4">
		<div class="small-box bg-fuchsia">
			<div class="inner2" >
				<p>VO Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box4">
		<div class="small-box bg-fuchsia">
			<div class="inner2" >
				<p>Rates Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_rates_main','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>