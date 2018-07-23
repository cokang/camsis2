<div class="ui-middle-screen">
<?php include 'content_tab_wo.php';?>
	<div class="content-workorder" align="center">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_booking_tab.php';?>
			<?php if ($this->input->get('work-a') == 0){ ?>
			<?php echo form_open('wo_booking_ctrl') ?>
				<tr class="ui-color-contents-style-1 nonetr">
					<td colspan="12" style="padding:10px;">
						<div class="ui-main-form-5">
							<div class="middle_d">
								<table width="100%" class="ui-content-form-reg" style="">
									<tr class="ui-color-contents-style-1" height="30px">
										<td class="ui-header-new"><b>New Booking</b></td>
									</tr>
									<tr >
										<td class="ui-desk-style-table">
											<!-- <table class="ui-content-form" width="100%" border="0">
												<tr>
													<td style="padding-left:10px; width:150px;" >Booking Name :</td>
													<td style="padding-left:10px;" > <input type="text" name="b_booking_name" value="<?php echo set_value('b_booking_name')?>" class="form-control-button2" style="width:300px;" ></td>
													<td style="padding-left:10px; width:170px;" >Total No . of Booking :</td>
													<td style="padding-left:10px;" > <input type="text" name="b_booking_no" value="<?php echo set_value('b_booking_no')?>" class="form-control-button2" style="" ></td>
												</tr>
												<tr>
													<td colspan="3" ></td>
													<td style="padding-left:20px;"><input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="New Booking"></td>
												</tr>
											</table> -->
											<style type="text/css">
												@media screen and (min-device-width: 768px){
													.new-booking{ display: inline-block; padding-top: 15px; padding-bottom: 15px; width: 100%;}
													.new-booking div.form-group{ float: left; width: 45%; margin-left: 15px; }
													.new-booking div.form-group input::-webkit-input-placeholder{color:transparent;}
												}
												@media screen and (max-device-width: 425px){
													.new-booking{ display: block; padding-top: 15px; padding-bottom: 15px; width: 100%;}
													.new-booking div.form-group{ float: left; width: 90%; margin-left: 15px; }
													.new-booking div.form-group input{width: 100%;}
												}
												input[type=submit]{margin: 15px;}
											</style>
											<div  class="new-booking">
												<div class="form-group">
													<label style="color: black;">Booking Name :</label>
													<input type="text" name="b_booking_name" class="form-control" placeholder="Booking Name" value="<?php echo set_value('b_booking_name')?>" >
												</div>

												<div class="form-group">
													<label style="color: black;">Total No . of Booking :</label>
													<input type="text" name="b_booking_no" class="form-control" placeholder="Total No . of Booking" value="<?php echo set_value('b_booking_no')?>">
												</div>
											</div>

											<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="New Booking">
											
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
			</form>
			<?php } ?>
			<tr class="ui-color-contents-style-1">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
								<a href="?y=<?= $year-1?>&m=<?= $month?>&work-a=<?= $tabber?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
								<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&work-a=<?= $tabber?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
								<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
								<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&work-a=<?= $tabber?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
								<a href="?y=<?= $year+1?>&m=<?= $month?>&work-a=<?= $tabber?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1 ui-left_web">
				<td colspan="12" height="25px"></td>
			</tr>		
			<tr class="ui-color-contents-style-1">
				<td colspan="12" style="">
					<style>
						.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
					</style>
					<table class="ui-content-middle-menu-workorder2 ui-left_web" width="100%" height="25px">
						<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
							<td width="">No</td>
							<td width="">Owner</td>
							<td width="">Booking Name</td>
							<td width="">Booking Date</td>
							<td width="">Wo Start No</td>
							<td width="">Wo End No</td>
						</tr>
						
						<?php  if (!empty($recordbook)) {?>
							<?php $numrow = 1; foreach($recordbook as $row):?>
				     			
						<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
    						<td><?=$numrow?></td>
		        			<td><?= ($row->owner) ? $row->owner : 'N/A'?></td>
		        			<td><?= ($row->booking_name) ? anchor ('contentcontroller/booking_list?whatid='.$row->id,''.$row->booking_name.'' ) : 'N/A'?></td>
		        			<td><?= ($row->d_timestamp) ? date("d/m/Y",strtotime($row->d_timestamp)) : 'N/A'?></td>
		        			<td><?= ($row->first_wo) ? $row->first_wo : 'N/A'?></td>
	    	    			<td><?= ($row->last_wo) ? $row->last_wo : 'N/A'?></td>
        				</tr>
        					<?php $numrow++; ?>
		    				<?php endforeach;?>
		    			<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
    						<td colspan="6"><span style="color:red; text-transform: uppercase;">NO BOOKING FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>.</span>
							</td>
    					</tr>
						<?php } ?>	 
					</table>



					<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;width:100%;">
						<?php  if (!empty($recordbook)) {?>
						<?php $rownum = 1; foreach($recordbook as $row):?>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$rownum;?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Owner</td>
							<td class="td-desk">: <?= ($row->owner) ? $row->owner : 'N/A'?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Booking Name</td>
							<td class="td-desk">: <?= ($row->booking_name) ? anchor ('contentcontroller/booking_list?whatid='.$row->id,''.$row->booking_name.'' ) : 'N/A'?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Booking Date</td>
							<td class="td-desk">: <?= ($row->d_timestamp) ? date("d/m/Y",strtotime($row->d_timestamp)) : 'N/A'?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Wo Start No</td>
							<td class="td-desk">: <?= ($row->first_wo) ? $row->first_wo : 'N/A'?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Wo End No</td>
							<td class="td-desk">: <?= ($row->last_wo) ? $row->last_wo : 'N/A'?></td>
						</tr>
		        		<?php $rownum++?> 			 
							<?php endforeach;
						}else{?>
						<tr align="center" style="height:400px;">
							<td colspan="2" class="ui-color-color-color default-NO">
								<span style="color:red; text-transform: uppercase;">NO BOOKING FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>.</span>
							</td>
						</tr>
						<?php } ?>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td colspan="12" align="center">
				</td>
			</tr>
		</table>
	</div>
</div>