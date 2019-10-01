<div class="ui-middle-screen">
	<?php include 'content_vo3_menu.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" style="color:black; margin:auto;" cellpadding="4" cellspacing="0" width="98%">
		<?php include 'content_vo3_tab_menu.php';?>	
			<tr class="bgvvf"><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold; padding-left:15px;"><?=$this->input->get('rpt_no')?></td></tr>
			<tr class="bgvvf"><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold; padding-left:15px;">Variation Status and Authorization</td></tr>
			<tr class="bgvvf"><td colspan="3"style="font-size:14px; padding-left:15px;" valign="top">This analysis shows VO items that has not been processed by PMSB, as well as those that has been authorized or rejected by PMSB.</td></tr>
			
			<tr class="bgvvf">
				<td colspan="3">
					<div class="ui-main-form-1">
							<?php if($GotData == "TRUE") { ?>
							
							<div id="container" style="height: 400px; margin-left:0px;"></div>
							<?php } else { ?>
							
							<div style="height: 400px margin-left:0px; display:block; color:grey;">No Chart To Display</div>
							<?php } ?>
					</div>
					<div class="ui-main-form-2">
						<table class="tbl-vvf">
							<tr><th colspan="4"><?=$period?></th></tr>
							<tr class="FieldLabelCenter">
								<td>Variation<br>Status</td>
								<td>Unprocessed<br><img src="<?php echo base_url(); ?>images/icoappvohq0.gif"></td>
								<td>Authorized<br><img src="<?php echo base_url(); ?>images/icoappvohq1.gif"></td>
								<td>Rejected<br><img src="<?php echo base_url(); ?>images/icoappvohq2.gif"></td>
							</tr>
							<?php foreach($records as $row): ?>
							<tr>
								<td class="tbl-vvf-b">V2</td>
								<td><?=isset($row->V20) ? ($row->V20 > 0 ? "<b>".$row->V20."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V21) ? ($row->V21 > 0 ? "<b>".$row->V21."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V22) ? ($row->V22 > 0 ? "<b>".$row->V22."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V3</td>
								<td><?=isset($row->V30) ? ($row->V30 > 0 ? "<b>".$row->V30."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V31) ? ($row->V31 > 0 ? "<b>".$row->V31."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V32) ? ($row->V32 > 0 ? "<b>".$row->V32."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V4</td>
								<td><?=isset($row->V40) ? ($row->V40 ? "<b>".$row->V40."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V41) ? ($row->V41 ? "<b>".$row->V41."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V42) ? ($row->V42 ? "<b>".$row->V42."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V4L</td>
								<td><?=isset($row->V4L0) ? ($row->V4L0 ? "<b>".$row->V4L0."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V4L1) ? ($row->V4L0 ? "<b>".$row->V4L0."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V4L2) ? ($row->V4L0 ? "<b>".$row->V4L0."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V5</td>
								<td><?=isset($row->V50) ? ($row->V50 ? "<b>".$row->V50."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V51) ? ($row->V51 ? "<b>".$row->V51."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V52) ? ($row->V52 ? "<b>".$row->V52."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V6</td>
								<td><?=isset($row->V60) ? ($row->V60 ? "<b>".$row->V60."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V61) ? ($row->V61 ? "<b>".$row->V61."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V62) ? ($row->V62 ? "<b>".$row->V62."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V7</td>
								<td><?=isset($row->V70) ? ($row->V70 ? "<b>".$row->V70."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V71) ? ($row->V71 ? "<b>".$row->V71."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V72) ? ($row->V72 ? "<b>".$row->V72."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V8</td>
								<td><?=isset($row->V80) ? ($row->V80 ? "<b>".$row->V80."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V81) ? ($row->V81 ? "<b>".$row->V81."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V82) ? ($row->V82 ? "<b>".$row->V82."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V9</td>
								<td><?=isset($row->V90) ? ($row->V90 ? "<b>".$row->V90."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V91) ? ($row->V91 ? "<b>".$row->V91."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($row->V92) ? ($row->V92 ? "<b>".$row->V92."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b"><span style="color:red;">OTHERS</span></td>
								<td><span style="color:red;"><?=isset($row->OTHER) ? $row->OTHER : 0 ?></span></td>
								<td><span style="color:red;">-</span></td>
								<td><span style="color:red;">-</span></td>
							</tr>
						<?php endforeach; ?>
						</table>
					</div>
				</td>
			</tr>
			<?php if($GotData == "TRUE") { ?>
			<?php $numrow = 1; foreach($recordchart2 as $row): ?>
			<?php foreach ($row as $key=>$value): ?>
			<?php switch ($numrow) {
    					case "1":
    					if (substr($period,0,2) == 'P1')  {
        				$tulis = 'January '.substr($period,2,2).' Submission';
        				break;
        				}
        				elseif (substr($period,0,2) == 'P2') {
        				$tulis = 'July '.substr($period,2,2).' Submission';
        				break;
        				}	
        				case "2":
        				if (substr($period,0,2) == 'P1') {
        				$tulis = 'February '.substr($period,2,2).' Submission';
        				break;
        				}
        				elseif (substr($period,0,2) == 'P2') {
        				$tulis = 'August '.substr($period,2,2).' Submission';
        				break;
        				}	
        				case "3":
        				if (substr($period,0,2) == 'P1') {
        				$tulis = 'March '.substr($period,2,2).' Submission';
        				break;
        				}
        				elseif (substr($period,0,2) == 'P2') {
        				$tulis = 'September '.substr($period,2,2).' Submission';
        				break;
        				}	
        				case "4":
        				if (substr($period,0,2) == 'P1') {
        				$tulis = 'April '.substr($period,2,2).' Submission';
        				break;
        				}
        				elseif (substr($period,0,2) == 'P2') {
        				$tulis = 'October '.substr($period,2,2).' Submission';
        				break;
        				}	
    					case "5":
        				if (substr($period,0,2) == 'P1') {
        				$tulis = 'May '.substr($period,2,2).' Submission';
        				break;
        				}
        				elseif (substr($period,0,2) == 'P2') {
        				$tulis = 'November '.substr($period,2,2).' Submission';
        				break;
        				}	
        				case "6":
        				if (substr($period,0,2) == 'P1') {
        				$tulis = 'June '.substr($period,2,2).' Submission';
        				break;
        				}
        				elseif (substr($period,0,2) == 'P2') {
        				$tulis = 'December '.substr($period,2,2).' Submission';
        				break;
        				}	
    					default:
        				
        				}
     					?>
     			<tr class="bgvvf"><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold; padding-left:15px;"><?php echo $tulis ?></td></tr>
				<tr class="bgvvf">
				<td colspan="3">
					<div class="ui-main-form-1">
							<?php if($GotData == "TRUE") { ?>
							<div id="chart<?php echo $numrow?>" style="height: 400px; margin-left:0px;"></div>
							<?php } else { ?>
							<div style="height: 400px margin-left:0px; display:block; color:grey;">No Chart To Display</div>
							<?php } ?>
					</div>
					<div class="ui-main-form-2">
						<table class="tbl-vvf">
							
							<tr class="FieldLabelCenter">
								<td>Variation<br>Status</td>
								<td>Unprocessed<br><img src="<?php echo base_url(); ?>images/icoappvohq0.gif"></td>
								<td>Authorized<br><img src="<?php echo base_url(); ?>images/icoappvohq1.gif"></td>
								<td>Rejected<br><img src="<?php echo base_url(); ?>images/icoappvohq2.gif"></td>
							</tr>
							
							<tr>
								<td class="tbl-vvf-b">V2</td>
								<td><?=isset($value->V20) ? ($value->V20 > 0 ? "<b>".$value->V20."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V21) ? ($value->V21 > 0 ? "<b>".$value->V21."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V22) ? ($value->V22 > 0 ? "<b>".$value->V22."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V3</td>
								<td><?=isset($value->V30) ? ($value->V30 > 0 ? "<b>".$value->V30."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V31) ? ($value->V31 > 0 ? "<b>".$value->V31."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V32) ? ($value->V32 > 0 ? "<b>".$value->V32."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V4</td>
								<td><?=isset($value->V40) ? ($value->V40 ? "<b>".$value->V40."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V41) ? ($value->V41 ? "<b>".$value->V41."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V42) ? ($value->V42 ? "<b>".$value->V42."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V4L</td>
								<td><?=isset($value->V4L0) ? ($value->V4L0 ? "<b>".$value->V4L0."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V4L1) ? ($value->V4L0 ? "<b>".$value->V4L0."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V4L2) ? ($value->V4L0 ? "<b>".$value->V4L0."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V5</td>
								<td><?=isset($value->V50) ? ($value->V50 ? "<b>".$value->V50."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V51) ? ($value->V51 ? "<b>".$value->V51."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V52) ? ($value->V52 ? "<b>".$value->V52."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V6</td>
								<td><?=isset($value->V60) ? ($value->V60 ? "<b>".$value->V60."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V61) ? ($value->V61 ? "<b>".$value->V61."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V62) ? ($value->V62 ? "<b>".$value->V62."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V7</td>
								<td><?=isset($value->V70) ? ($value->V70 ? "<b>".$value->V70."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V71) ? ($value->V71 ? "<b>".$value->V71."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V72) ? ($value->V72 ? "<b>".$value->V72."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V8</td>
								<td><?=isset($value->V80) ? ($value->V80 ? "<b>".$value->V80."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V81) ? ($value->V81 ? "<b>".$value->V81."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V82) ? ($value->V82 ? "<b>".$value->V82."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b">V9</td>
								<td><?=isset($value->V90) ? ($value->V90 ? "<b>".$value->V90."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V91) ? ($value->V91 ? "<b>".$value->V91."</b>" : 0 ) : 0 ?></td>
								<td><?=isset($value->V92) ? ($value->V92 ? "<b>".$value->V92."</b>" : 0 ) : 0 ?></td>
							</tr>
							<tr>
								<td class="tbl-vvf-b"><span style="color:red;">OTHERS</span></td>
								<td><span style="color:red;"><?=isset($value->OTHER) ? $value->OTHER : 0 ?></span></td>
								<td><span style="color:red;">-</span></td>
								<td><span style="color:red;">-</span></td>
							</tr>
						
						</table>
					</div>
				</td>
			</tr>
			<?php $numrow++ ?>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<?php } ?>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>			
		</table>
	</div>
</div>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts-3d.js"></script>
<?php foreach($records as $row): ?>
<script type="text/javascript">
		(function($){ // encapsulate jQuery
			$(function () {
    $('#container').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 1,
                viewDistance: 25,
                depth: 50
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Variation Status'
        },

        xAxis: {
            categories: ['V2', 'V3', 'V4', 'V4L', 'V5','V6','V7','V8','V9']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'Unprocessed',
            data: [<?=isset($row->V20) ? $row->V20 : 0 ?>,<?=isset($row->V30) ? $row->V30 : 0 ?>,<?=isset($row->V40) ? $row->V40 : 0 ?>,<?=isset($row->V4L0) ? $row->V4L0 : 0 ?>,<?=isset($row->V50) ? $row->V50 : 0 ?>,<?=isset($row->V60) ? $row->V60 : 0 ?>,<?=isset($row->V70) ? $row->V70 : 0 ?>,<?=isset($row->V80) ? $row->V80 : 0 ?>,<?=isset($row->V90) ? $row->V90 : 0 ?>],
            stack: 'Unprocessed'
        }, {
            name: 'Authorized',
            data: [<?=isset($row->V21) ? $row->V21 : 0 ?>,<?=isset($row->V31) ? $row->V31 : 0 ?>,<?=isset($row->V41) ? $row->V41 : 0 ?>,<?=isset($row->V4L1) ? $row->V4L1 : 0 ?>,<?=isset($row->V51) ? $row->V51 : 0 ?>,<?=isset($row->V61) ? $row->V61 : 0 ?>,<?=isset($row->V71) ? $row->V71 : 0 ?>,<?=isset($row->V81) ? $row->V81 : 0 ?>,<?=isset($row->V91) ? $row->V91 : 0 ?>],
            stack: 'Authorized'
        }, {
            name: 'Rejected',
            data: [<?=isset($row->V22) ? $row->V22 : 0 ?>,<?=isset($row->V32) ? $row->V32 : 0 ?>,<?=isset($row->V42) ? $row->V42 : 0 ?>,<?=isset($row->V4L2) ? $row->V4L2 : 0 ?>,<?=isset($row->V52) ? $row->V52 : 0 ?>,<?=isset($row->V62) ? $row->V62 : 0 ?>,<?=isset($row->V72) ? $row->V72 : 0 ?>,<?=isset($row->V82) ? $row->V82 : 0 ?>,<?=isset($row->V92) ? $row->V92 : 0 ?>],
            stack: 'Rejected'
        }]
    });
});

		})(jQuery);
	</script>
	<?php endforeach; ?>

<?php if($GotData == "TRUE") { ?>
<?php $numrow=1; foreach($recordchart2 as $row): ?>
<?php foreach ($row as $key=>$value): ?>
<script type="text/javascript">
		(function($){ // encapsulate jQuery
			$(function () {
    $('#chart<?php echo $numrow?>').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 1,
                viewDistance: 25,
                depth: 50
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Variation Status'
        },

        xAxis: {
            categories: ['V2', 'V3', 'V4', 'V4L', 'V5','V6','V7','V8','V9']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'Unprocessed',
            data: [<?=isset($value->V20) ? $value->V20 : 0 ?>,<?=isset($value->V30) ? $value->V30 : 0 ?>,<?=isset($value->V40) ? $value->V40 : 0 ?>,<?=isset($value->V4L0) ? $value->V4L0 : 0 ?>,<?=isset($value->V50) ? $value->V50 : 0 ?>,<?=isset($value->V60) ? $value->V60 : 0 ?>,<?=isset($value->V70) ? $value->V70 : 0 ?>,<?=isset($value->V80) ? $value->V80 : 0 ?>,<?=isset($value->V90) ? $value->V90 : 0 ?>],
            stack: 'Unprocessed'
        }, {
            name: 'Authorized',
            data: [<?=isset($value->V21) ? $value->V21 : 0 ?>,<?=isset($value->V31) ? $value->V31 : 0 ?>,<?=isset($value->V41) ? $value->V41 : 0 ?>,<?=isset($value->V4L1) ? $value->V4L1 : 0 ?>,<?=isset($value->V51) ? $value->V51 : 0 ?>,<?=isset($value->V61) ? $value->V61 : 0 ?>,<?=isset($value->V71) ? $value->V71 : 0 ?>,<?=isset($value->V81) ? $value->V81 : 0 ?>,<?=isset($value->V91) ? $value->V91 : 0 ?>],
            stack: 'Authorized'
        }, {
            name: 'Rejected',
            data: [<?=isset($value->V22) ? $value->V22 : 0 ?>,<?=isset($value->V32) ? $value->V32 : 0 ?>,<?=isset($value->V42) ? $value->V42 : 0 ?>,<?=isset($value->V4L2) ? $value->V4L2 : 0 ?>,<?=isset($value->V52) ? $value->V52 : 0 ?>,<?=isset($value->V62) ? $value->V62 : 0 ?>,<?=isset($value->V72) ? $value->V72 : 0 ?>,<?=isset($value->V82) ? $value->V82 : 0 ?>,<?=isset($value->V92) ? $value->V92 : 0 ?>],
            stack: 'Rejected'
        }]
    });
});

	})(jQuery);
	</script>
<?php $numrow++ ?>
<?php endforeach; ?>
<?php endforeach; ?>
<?php } ?>