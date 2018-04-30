<div class="div-p"></div>
<div class="main-box">
	<div class="box3">
		<div class="small-box bg-purple">
			<div class="inner2" >
				<p>Back to VO Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3/'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box bg-fuchsia">
			<div class="inner2" >
				<p>VO Detail</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_vvf?rpt_no='.$this->input->get('rpt_no').'&'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box bg-purple">
			<div class="inner2" >
				<p>VO Analysis</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_Analysis?rpt_no='.$this->input->get('rpt_no').'&'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box bg-fuchsia">
			<div class="inner2" >
				<p>VO Reports</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/vo3_report?rpt_no='.$this->input->get('rpt_no').'&'.$this->session->userdata('usersess'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>