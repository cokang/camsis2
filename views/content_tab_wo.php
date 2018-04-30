<div class="main-box">
	<div class="box6">
	<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue','bg-teal'); shuffle($autocolor); ?>
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p>New Request</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('workorder?parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box6">
		<div class="small-box <?php echo $autocolor[5];?>">
			<div class="inner2" >
				<p>Booking Wo No.</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/Booking_no/'.$this->session->userdata('usersess'). '?&tab=0&parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box6">
		<div class="small-box <?php echo $autocolor[1];?>">
			<div class="inner2" >
				<p>Request Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/workorder/'.$this->session->userdata('usersess'). '?&tab=0&parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box6">
		<div class="small-box <?php echo $autocolor[2];?>">
			<div class="inner2" >
				<p>PPM Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/catalogppm/'.$this->session->userdata('usersess'). '?&tab=1&parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box6 ui-left_web">
		<div class="small-box <?php echo $autocolor[3];?>">
			<div class="inner2" >
				<p>PPM Generator</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('ppm_gen','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box6">
		<div class="small-box <?php echo $autocolor[4];?>">
			<div class="inner2" >
				<p>Report</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/report_workorder/'.$this->session->userdata('usersess'). '?&tab=2&parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>