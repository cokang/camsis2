<div class="main-box">
	<div class="box3">
	<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor);?>
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p>New Request</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('workorder?parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box <?php echo $autocolor[4];?>">
			<div class="inner2" >
				<p>New Complaint</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('bems_desk?parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box <?php echo $autocolor[2];?>">
			<div class="inner2" >
				<p>Complaint Catalog</p>
			</div>
			<div class="icon"><i class="icon-stats-bars"></i></div>
			<?php echo anchor ('contentcontroller/desk?parent='.$this->input->get('parent'),'<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>
