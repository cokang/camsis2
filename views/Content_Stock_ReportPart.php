<?php $number = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" style="color:black;" cellpadding="4" cellspacing="0" width="90%">
		<form method="get" action="">
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="7"><span style="float: left; margin-top:5px; font-weight: bold; margin-right:7px;">Reports By Group </span>
				<?php
						$assetgroup = array(
							'' => 'All',
							'1' => 'Group 1',
							'2' => 'Group 2',
							'3' => 'Group 3',
							);
					?>
				 <?php echo form_dropdown('grp', $assetgroup, set_value('grp',$grpsel) , 'class="dropdown" style="width:140px;" onchange="this.form.submit()"'); ?>
					<input type="hidden" value="<?php echo set_value('m', ($this->input->get('m')) ? $this->input->get('m') : ''); ?>" name="m">
					<input type="hidden" value="<?php echo set_value('y', ($this->input->get('y')) ? $this->input->get('y') : ''); ?>" name="y">
				</td>
			</tr>
			</form>
			<tr style="background:#B3130A;display: block;">
				<td width="3%" height="30px">
						   <a href="?y=<?= $year-1?>&m=<?= $month?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center" style="color:white; font-weight:bold;">
							 <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
			</tr>
	    <?php

			function evenodd($numberx) {
			//$number++;
			if ($numberx % 2 == 0) {
  			 return "ui-rpt-color-style2";
  			 echo "hai";
				}
			else {
			   return "ui-rpt-color-style";
			   echo "hai";
			}

			}

		?>
		<!-- <?php if (!in_array("contentcontroller/Attendance", $chkers)) { ?> -->
			<tr class="<?php  $number++; echo evenodd($number); ?> ">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/Report_part?id='.$this->input->get('id'),'<img src="'. base_url() .'images/user.png" alt="" style="width:75px; height:75px;vertical-align: middle;"/>&nbsp;&nbsp;&nbsp;&nbsp;Stock Report'); ?>
				</td>
			</tr>
		    <!-- <?php  } ?> -->
		    <!-- <?php if (!in_array("contentcontroller/Attendance", $chkers)) { ?> -->
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/store_report','<img src="'. base_url() .'images/user.png" alt="" style="width:75px; height:75px;vertical-align: middle;"/>&nbsp;&nbsp;&nbsp;&nbsp;Store Report'); ?>
				</td>
			</tr>
		    <!-- <?php  } ?>  -->
</table>
</div>
</div>
