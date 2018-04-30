<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>			
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">PPM Yearly Planner</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ("ppm_set?assetno=".$this->input->get('asstno')."&y=".date("Y")."&assetjt=".$ajobtype, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" width="100%" border="0">
								<?php if ($records){ ?>
								<form method="get" action="">
									<?php 
										foreach ($records as $row){
											$assetjobtype[$row->id] = $row->v_jobtype;
										}
									?>
									<?php echo form_dropdown('assetjt', $assetjobtype, set_value('assetjt',$ajobtype) , 'class="dropdown" style="width:140px;" onchange="this.form.submit()"'); ?>
									<input type="hidden" value="<?php echo set_value('asstno', ($this->input->get('asstno')) ? $this->input->get('asstno') : ''); ?>" name="asstno">
									<input type="hidden" value="<?php echo set_value('cal', ($this->input->get('cal')) ? $this->input->get('cal') : ''); ?>" name="cal">
									<input type="hidden" value="7" name="tab">
								</form>
								<?php } ?>
								<tr style="background:white; height:50px;">
									<td colspan="55"><span style="float:right; margin:5px;"><a href="<?php echo base_url();?>index.php/assetppmplanner?asstno=<?=$this->input->get('asstno');?>&tab=7&cal=full&y=<?= $year?>&assetjt=<?=($records) ? $ajobtype : ''?>">Full Year Calendar </a>| <a href="<?php echo base_url();?>index.php/assetppmplanner?asstno=<?=$this->input->get('asstno');?>&tab=7&y=<?= $year?>&assetjt=<?=($records) ? $ajobtype : ''?>"> Weekly Summary Calendar  </a></td>
								</tr>
								<tr style="background:#B3130A;">
									<td colspan="55" height="40px">
										<table width="100%" class="ui-content-middle-menu-desk">
											<tr style="background:#B3130A;">
												<td width="3%" height="30px">
												<a href="?y=<?= $year-1?>&asstno=<?=$this->input->get('asstno')?>&tab=7&cal=<?=$cals?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
												</td>
												<td width="88%" align="center">
												<?=$year?>
												</td>
												<td width="3%">
												<a href="?y=<?= $year+1?>&asstno=<?=$this->input->get('asstno')?>&tab=7&cal=<?=$cals?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<?php if($this->input->get('cal') == 'full'){?>
								<tr class="ui-menu-color-header" style="color:white;" align="center">
									<td width="8.33%" style="padding-top:3px; padding-bottom:3px;" class="ui-content-menu-desk-color">Week</td>
									<td width="8.33%">MON</td>
									<td width="8.33%">TUE</td>
									<td width="8.33%">WED</td>
									<td width="8.33%">THU</td>
									<td width="8.33%">FRI</td>
									<td width="8.33%">SAT</td>
									<td width="8.33%">SUN</td>
								</tr>
								<?php for($i = 0; $i <= $count-1; $i++) { ?>
									<tr <?= isset($weeksch) && in_array(($i+1),$weeksch) ?  'style="background-color:"#00FFFF;"' : '' ?>>
									<?php echo $kalender[$i]; ?>
									</tr>
  								<?php } ?>	
								<!--<?php

								/* Set the date */
								$date = strtotime(date("Y"));

								$day = date('d', $date);
								$month = date('m', $date);
								$year = date('Y', $date);
								$firstDay = mktime(0,0,0,$month, 1, $year);
								//$title = strftime('%B', $firstDay);
								$dayOfWeek = date('D', $firstDay);
								$daysInMonth = cal_days_in_month(0, $month, $year);
								/* Get the name of the week days */
								$timestamp = strtotime('next Sunday');
								$weekDays = array();
								for ($i = 0; $i < 7; $i++) {
									$weekDays[] = strftime('%a', $timestamp);
									$timestamp = strtotime('+1 day', $timestamp);
								}
								$blank = date('w', strtotime("{$year}"));
								?>
								<?php $ii=1?>
									<tr>
										<td align="center"><b>sdf<?php echo $ii++?></b></td>
										<?php for($i = 0; $i < $blank; $i++): ?>
											<td align="center"></td>
										<?php endfor; ?>
										
										<?php for($i = 1; $i <= $daysInMonth; $i++): ?>
											<?php if($day == $i): ?>
												<td align="center"><strong><?php echo $i ?></strong></td>
											<?php else: ?>
											
												<td align="center"><?php echo $i ?></td>
											<?php endif; ?>
											<?php if(($i + $blank) % 7 == 0): ?>
									</tr>
									<tr>
										<td align="center"><b><?php echo $ii++?></b></td>
										<?php endif; ?>
										<?php endfor; ?>
										<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
										<td></td>
										<?php endfor; ?>
									</tr>-->
								<?php }else{ ?>
								<tr class="ui-menu-color-header" style="color:white;" align="center">
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
								<tr class="" style="color:black; font-size:10px; background:white;;" align="center">
									<td width="8.33%" style="padding-top:3px; padding-bottom:3px; color:white; font-size:15px;" class="ui-content-menu-desk-color">WEEK</td>
									
									<?php for ($i = 1; $i <= $count; $i++){ ?>
										<td <?= isset($weeksch) && in_array($i,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>><?=$i?></td>
									<?php } ?>

									<!--<td <?= isset($weeksch) && in_array(1,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>1</td>
									<td <?= isset($weeksch) && in_array(2,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>2</td>
									<td <?= isset($weeksch) && in_array(3,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>3</td>
									<td <?= isset($weeksch) && in_array(4,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>4</td>
									<td <?= isset($weeksch) && in_array(5,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>5</td>
									<td <?= isset($weeksch) && in_array(6,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>6</td>
									<td <?= isset($weeksch) && in_array(7,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>7</td>
									<td <?= isset($weeksch) && in_array(8,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>8</td>
									<td <?= isset($weeksch) && in_array(9,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>9</td>
									<td <?= isset($weeksch) && in_array(10,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>10</td>
									<td <?= isset($weeksch) && in_array(11,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>>11</td>
									<td <?= isset($weeksch) && in_array(12,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>12</td>
									<td <?= isset($weeksch) && in_array(13,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>13</td>
									<td <?= isset($weeksch) && in_array(14,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>14</td>
									<td <?= isset($weeksch) && in_array(15,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>15</td>
									<td <?= isset($weeksch) && in_array(16,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>16</td>
									<td <?= isset($weeksch) && in_array(17,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>17</td>
									<td <?= isset($weeksch) && in_array(18,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>18</td>
									<td <?= isset($weeksch) && in_array(19,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>19</td>
									<td <?= isset($weeksch) && in_array(20,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>20</td>
									<td <?= isset($weeksch) && in_array(21,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>21</td>
									<td <?= isset($weeksch) && in_array(22,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>22</td>
									<td <?= isset($weeksch) && in_array(23,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>23</td>
									<td <?= isset($weeksch) && in_array(24,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>24</td>
									<td <?= isset($weeksch) && in_array(25,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>25</td>
									<td <?= isset($weeksch) && in_array(26,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>26</td>
									<td <?= isset($weeksch) && in_array(27,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>27</td>
									<td <?= isset($weeksch) && in_array(28,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>28</td>
									<td <?= isset($weeksch) && in_array(29,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>29</td>
									<td <?= isset($weeksch) && in_array(30,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>30</td>
									<td <?= isset($weeksch) && in_array(31,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>31</td>
									<td <?= isset($weeksch) && in_array(32,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>32</td>
									<td <?= isset($weeksch) && in_array(33,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>33</td>
									<td <?= isset($weeksch) && in_array(34,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>34</td>
									<td <?= isset($weeksch) && in_array(35,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>35</td>
									<td <?= isset($weeksch) && in_array(36,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>36</td>
									<td <?= isset($weeksch) && in_array(37,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>37</td>
									<td <?= isset($weeksch) && in_array(38,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>38</td>
									<td <?= isset($weeksch) && in_array(39,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>39</td>
									<td <?= isset($weeksch) && in_array(40,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>40</td>
									<td <?= isset($weeksch) && in_array(41,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>41</td>
									<td <?= isset($weeksch) && in_array(42,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>42</td>
									<td <?= isset($weeksch) && in_array(43,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>43</td>
									<td <?= isset($weeksch) && in_array(44,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>44</td>
									<td <?= isset($weeksch) && in_array(45,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>45</td>
									<td <?= isset($weeksch) && in_array(46,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>46</td>
									<td <?= isset($weeksch) && in_array(47,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>47</td>
									<td <?= isset($weeksch) && in_array(48,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>48</td>
									<td <?= isset($weeksch) && in_array(49,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>49</td>
									<td <?= isset($weeksch) && in_array(50,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>50</td>
									<td <?= isset($weeksch) && in_array(51,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>51</td>
									<td <?= isset($weeksch) && in_array(52,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>52</td>
									<td <?= isset($weeksch) && in_array(53,$weeksch) ? 'bgcolor="#00FFFF"' : '' ?>>53</td>-->
								</tr>
								<?php } ?>								
								<tr style="background:white;">
									<td colspan="55" height="150px" valign="bottom">
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
