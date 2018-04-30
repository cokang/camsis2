	<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor); 
	$random_keys=array_rand($autocolor,5);?>
	<div class="main-box">
	<div class="box5">
		<div class="small-box <?php echo $autocolor[$random_keys[0]];?>">
			<div class="inner2" >
				<p>Parameter Setup</p>
			</div>
			<div class="icon"><i class="icon-gear"></i></div>
			<?php echo anchor ('contentcontroller/acg','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box5">
		<div class="small-box <?php echo $autocolor[$random_keys[1]];?>">
			<div class="inner2" >
				<p>Request</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box5">
		<div class="small-box <?php echo $autocolor[$random_keys[2]];?>">
			<div class="inner2" >
				<p>PPM</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box5">
		<div class="small-box <?php echo $autocolor[$random_keys[3]];?>">
			<div class="inner2" >
				<p>Complaint</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<!--<div class="box3">
		<div class="small-box <?php echo $autocolor[3];?>">
			<div class="inner2" >
				<p>PPM Generator</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('ppm_gen','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>-->
	<div class="box5">
		<div class="small-box <?php echo $autocolor[$random_keys[4]];?>">
			<div class="inner2" >
				<p>Report</p>
			</div>
			<div class="icon"><i class="icon-home"></i></div>
			<?php echo anchor ('contentcontroller/acg_report?tabIndex=1','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<!--<div class="box3">
		<div class="small-box <?php echo $autocolor[4];?>">
			<div class="inner2" >
				<p>Report</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/report_workorder/'.$this->session->userdata('usersess'). '?&tab=2&parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>-->
</div>