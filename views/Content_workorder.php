<div class="ui-middle-screen">
<?php if ($this->input->get('parent') == 'complaint' ){?>
<?php include 'content_tab_desk.php';?>
<?php } elseif ($this->input->get('parent') == 'wrkodr'){?>
<?php include 'content_tab_wo.php';?>
<?php } ?>

	<div class="content-workorder" align="center">
	<?php if ($this->input->get('wonos')) { ?>
			<table id="myElem" class="onloadworkorder">
				<tr>
					<th style="text-align:left;"><span class="blinking">The New WO Number is</span> <?=$this->input->get('wonos')?></th>
				</tr>
			</table>
	<?php }?>
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
				<?php switch ($tabber) {
    case "1":
        $tulis = "A1";
        break;
    case "2":
        $tulis = "A2";
        break;
    case "3":
        $tulis = "A3";
        break;
    case "4":
        $tulis = "A4";
        break;
    case "5":
        $tulis = "A5";
        break;
    case "6":
        $tulis = "A6";
        break;
    case "7":
        $tulis = "A7";
        break;
    case "8":
        $tulis = "A8";
        break;
    case "9":
        $tulis = "A9";
        break;
		case "10":
        $tulis = "A10";
        break;
    case "11":
        $tulis = "Opened & BO";
        break;
    default:
        $tulis = "All";
} ?>
				<?php include 'content_workorder_tab.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="12" height="40px" style="padding-left:10px; color:black;"><?=$tulis?> Requests <span style="color:red;"><?= $totalrec > 0 ? ': Total WO '.$totalrec : ''?> <?=$status?></span></td>
			</tr>
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
				<td height="25px" colspan="12"></td>
				</tr>		
			<tr class="ui-color-contents-style-1">
				<td colspan="12" style="">
				<style>
				.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
				</style>
					<table class="ui-content-middle-menu-workorder2 ui-left_web" width="100%" height="25px">
						<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
							<td width="">Requestor</td>
							<td width="">Type</td>
							<td width="">Hosp</td>
							<td width="">Request Number</td>
							<td width="">QAP</td>
							<td width="">Priority</td>
							<td width="">Location</td>
							<td width="">Date</td>
							<td width="">Status</td>
							<td>Summary</td>
						</tr>
						<?php  if (!empty($records)) {?>
				<?php $numrow = 1; foreach($records as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					<td style="text-transform: capitalize;"><?=$row->V_requestor?></td>
		        			<td><?=$row->V_servicecode?></td>
		        			<td><?=$row->V_request_type?></td>
		        			<td><?php echo anchor ('contentcontroller/workorderlist?&wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'','style="font-size:16px; font-weight:bold;"' ) ?></td>
		        			<td></td>
		        			<td><?=$row->V_priority_code?></td>
		        			<td><?=isset($row->V_Location_code) ? $row->V_Location_code.'<br>'.$row->v_Location_Name : ''?></td>
		        			<td><?=date("d-m-Y",strtotime($row->D_date))?></td>
		        			<td><?=$row->V_request_status?></td>
		        			<td style="width:200px; text-align:left;"><?=$row->V_summary?></td>
	        			</tr>	
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="10"><span style="color:red; text-transform: uppercase;">NO <?=$tulis?> <?php if ($this->input->get('parent') == 'desk' ){?>
								COMPLAINTS 
								<?php } elseif ($this->input->get('parent') == 'wrkodr'){?>
								REQUEST 
								<?php } ?> FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>.</span>
							</td>
	    				</tr>
						<?php } ?>	 
					</table>
					<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;width:100%;">
						<?php  if (!empty($records)) {?>
						<?php $rownum = 1; foreach($records as $row):?>  			
		    			<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Requestor</td>
							<td class="td-desk">: <?=$row->V_requestor?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>	
							<td >Type</td>
							<td class="td-desk">: <?=$row->V_servicecode?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Hosp</td>
							<td class="td-desk">: <?=$row->V_request_type?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Request&nbsp;Number</td>
							<td class="td-desk">: <?php echo anchor ('contentcontroller/workorderlist?&wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'' ) ?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td>QAP</td>
							<td class="td-desk">: </td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td>Priority</td>
							<td class="td-desk">: <?=$row->V_priority_code?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Status</td>
							<td class="td-desk">:</td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Date</td>
							<td class="td-desk">: <?=$row->D_date?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Asset Number</td>
							<td class="td-desk">: <?=$row->V_Asset_no?></td>
						</tr>
						<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
							<td >Summary</td>
							<td class="td-desk">: <?=$row->V_summary?></td>
						</tr>
		        		<?php $rownum++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
						<tr align="center" style="height:400px;">
						<td colspan="12" class="ui-color-color-color default-NO">NO <?=$tulis?> <?php if ($this->input->get('parent') == 'desk' ){?>
								COMPLAINTS 
								<?php } elseif ($this->input->get('parent') == 'wrkodr'){?>
								REQUEST 
								<?php } ?> FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>.</span></td>
						</tr>
							<?php } ?>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="12">
				</td>
			</tr>
		</table>
	</div>
</div>