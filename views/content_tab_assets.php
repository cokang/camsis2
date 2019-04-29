<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor); ?>
<?php if ($this->session->userdata('usersess') == 'HKS') { ?>
<div class="main-box">
	<div class="box8">
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p class=" <?php echo $autocolor[0];?>">PERIODIC WORK ( MONTHLY PLANNER )</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('monthly_p_work','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box <?php echo $autocolor[1];?>">
			<div class="inner2" >
				<p class=" <?php echo $autocolor[1];?>">WEEKLY / PERIODIC PLANNER</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('weeklyperiodic_planner','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box <?php echo $autocolor[2];?>">
			<div class="inner2" >
				<p class=" <?php echo $autocolor[2];?>">SCHEDULE OF BI-WEEKLY ROUTINE JOINT INSPECTION</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('sowr_joint_inspection','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box3">
		<div class="small-box <?php echo $autocolor[3];?>">
			<div class="inner2" >
				<p class=" <?php echo $autocolor[3];?>">GENERAL WASTE COLLECTION SCHEDULE</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('gwcollection','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>
<?php  } else {  ?>
<div class="main-box">
	<div class="box7">
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p>New Asset</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('asset','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box7">
		<div class="small-box <?php echo $autocolor[1];?>">
			<div class="inner2" >
				<p>Asset Catalog</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('contentcontroller/assets','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
	<div class="box7">
		<div class="small-box <?php echo $autocolor[3];?>">
			<div class="inner2" >
				<p>Asset PPM Planner</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('ppm_planered','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>
<?php } ?>


<script>
$(function(){
	var screen = window.screen.availWidth;
	if(screen < 733){
		var child = [];
		var childHeight = [];
		$.each($(".main-box div.box4"), function(e){
			child.push($(this).find("p"));
			childHeight.push($(this).find("p").height());
		});

		var maxHeight = Math.max.apply(Math,childHeight);

		$.each(child, function(i){
			$(this).css("padding-bottom", 15);
			$(this).css("margin-bottom", 15);
			if(child[i].height() < maxHeight){
				$(this).css("height", maxHeight);
			}
		});
	}
});
</script>