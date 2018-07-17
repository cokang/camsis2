<?php $col=1; for($i=1;$i<13;$i++){ $col += count($kalender[$i]); }$col=$col+5;?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td class="ui-header-new">
								<b><span class="textmenu" style="float:left;">All Assets PPM Yearly Planner</span></b>
								<?php 
								if ($this->session->userdata('usersess') == 'FES'){
									$mar = '3';
								}else{
									$mar = '0';
								}
								?>
								<span class="textmenu1" style="float:right;padding-top:<?=$mar?>px;?>">
									<a href="<?php echo base_url();?>index.php/contentcontroller/ppm_planer_export?act=exp&y=<?=$year;?>" style="float:right; margin-right:40px;">
										<img src="<?php echo base_url();?>images/excel.png" style="width:30px; height:28px; position:absolute;" title="export to excel">
									</a>
								</span>
								<?php if ($this->session->userdata('usersess') == 'FES'){?>
								<span class="textmenu1" style="float:right;padding-top:0px;margin-right:5px">
									<?php 
										$fic_list = array(
											'Engineering' => 'Engineering',
											'Civil' => 'Civil',
											'Electrical' => 'Electrical'
										);
									?>
									<?php echo form_dropdown('fic', $fic_list, set_value('fic') , 'class="dropdown" style="width:150px;"'); ?>
								</span>
								<span class="textmenu1" style="float:right;padding-top:7px;margin-right:20px">
									FACILITY GROUP :
								</span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td class="ui-desk-style-table">
								<table class="ui-content-middle-menu-workorder2 ui-left_web" width="100%" border="0">
									<tr class="ui-color-contents-style-1">
										<td colspan="<?=$col;?>" height="40px">
											<table width="100%" class="ui-content-middle-menu-desk">
												<tr style="background:#B3130A;">
													<td width="3%" height="30px">
														<a href="?y=<?= $year-1?>">
															<img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
														</a>
													</td>
													<td width="88%" align="center">
														<?=$year?>
													</td>
													<td width="3%">
														<a href="?y=<?= $year+1?>">
															<img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								
									<tr class="ui-menu-color-header" style="color:white;" align="center">
										<td>Asset No</td>
										<td>Asset Name</td>
										<td>Department Name</td>
										<td>Freq</td>
										<td width="8.33%" style="padding-top:3px; padding-bottom:3px;" class="ui-content-menu-desk-color">MONTH</td>

										<td width="8.33%" colspan="<?=count($kalender[1])?>">JAN</td>
										<td width="8.33%" colspan="<?=count($kalender[2])?>">FEB</td>
										<td width="8.33%" colspan="<?=count($kalender[3])?>">MAR</td>
										<td width="8.33%" colspan="<?=count($kalender[4])?>">APR</td>
										<td width="8.33%" colspan="<?=count($kalender[5])?>">MEI</td>
										<td width="8.33%" colspan="<?=count($kalender[6])?>">JUN</td>
										<td width="8.33%" colspan="<?=count($kalender[7])?>">JUL</td>
										<td width="8.33%" colspan="<?=count($kalender[8])?>">AUG</td>
										<td width="8.33%" colspan="<?=count($kalender[9])?>">SEP</td>
										<td width="8.33%" colspan="<?=count($kalender[10])?>">OCT</td>
										<td width="8.33%" colspan="<?=count($kalender[11])?>">NOV</td>
										<td width="8.33%" colspan="<?=count($kalender[12])?>">DEC</td>
									</tr>
					
									<?php foreach ($records as $row) {?>
									<tr class="" style="color:black; font-size:10px; background:white;" align="center">
										<td><?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
										<td><?=isset($row->V_Asset_name) ? $row->V_Asset_name : ''?></td>
										<td><?=isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?></td>
										<td><?=isset($row->v_JobType) ? $row->v_JobType : ''?></td>
										<td width="8.33%" style="padding-top:3px; padding-bottom:3px; color:white;" class="ui-content-menu-desk-color">WEEK</td>
											<?php $weeksch = explode(',',$row->v_Weeksch); ?>
											<?php for ($i = 1; $i <= $count; $i++){ ?>
										<td <?= isset($weeksch) && in_array($i,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>><?=$i?></td>
											<?php } ?>
									</tr>
									<?php } ?>															
									<tr style="background:white;">
										<td colspan="<?=$col;?>" height="150px" valign="bottom">
											<!--<table style="color:black">
												<tr>
													<td>Summary</td>
													<td></td>
												</tr>
												<tr>
													<td>Frequency :</td>
													<td><?=isset($records[0]->v_jobtype) ? $records[0]->v_jobtype : 'NOT FOUND'?></td>
												</tr>
												<tr>
													<td>Planned Weeks :</td>
													<td><?=isset($records[0]->v_weeksch) ? $records[0]->v_weeksch : 'NOT FOUND'?></td>
												</tr>
											</table>
											-->
										</td>
									</tr>
								</table>
							</td>
						</tr>	
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
