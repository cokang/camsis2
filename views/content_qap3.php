<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td style="width: 13%; border-style:none;";>
<?php include 'content_tab_qap3.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="80%" align="center">
			<?php include 'content_tab_qap3menu.php';?>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" height="30px" class="t-header" style="padding:10px; color: black; height:40px;">SIQ Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&siq=0"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&siq=0"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&siq=0"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&siq=0"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td style="" width="" colspan="3"  valign="top">
					<?php if ($validPeriod == 'true') { ?>
					<div id="container" class="qapgraf"></div>
					<?php } else { ?>
					<?php  if (strtotime($year . '-' . $month . '-01') > strtotime('2008-09-01')) { ?>
					<div class="vvf-graf">
					<span>NO SIQ EVALUATION HAS BEEN DONE FOR THIS MONTH.</span>
					</div>
					<?php } else { ?>
					<div class="vvf-graf">
					<span>NO SIQ HAS BEEN GENERATED ON THIS MONTH.</span>
					</div>
					<?php } ?>
					<?php } ?>
				</td>
			</tr>
			<style>
			

			</style>
			<tr class="ui-color-contents-style-1">
				<td colspan="3"  valign="top" align="center">
					<div class="ui-left_web">
					<table class="tblqap">
						<tr align="center" class="ui-middle-color">
							<th>Month</th>
							<th>PPM SIQ</th>
							<th>PPM CAR</th>
							<th>Uptime SIQ</th>
							<th>Uptime CAR</th>
							<th>Total SIQ</th>
							<th>Total CAR</th>
						</tr>
						<tr align="center" >
							<td class="ui-menu-color-header"><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							<td><?=$PPMSIQ?></td>
							<td><?=$PPMCAR?></td>
							<td><?=$UptimeSIQ?></td>
							<td><?=$UptimeCAR?></td>
							<td><?=$TotalSIQ?></td>
							<td><?=$TotalCAR?></td>
						</tr>	
					</table>
					</div>
					<div class="ui-left_mobile">
						<table class="tblqap">
							<tr>
								<th>Month</th>
								<th><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></th>
							</tr>
							<tr>
								<td>PPM SIQ</td>
								<td><?=$PPMSIQ?></td>
							</tr>
							<tr>
								<td>PPM CAR</td>
								<td><?=$PPMCAR?></td>
							</tr>
							<tr>
								<td>Uptime SIQ</td>
								<td><?=$UptimeSIQ?></td>
							</tr>
							<tr>
								<td>Uptime CAR</td>
								<td><?=$UptimeCAR?></td>
							</tr>
							<tr>
								<td>Total SIQ</td>
								<td><?=$TotalSIQ?></td>
							</tr>
							<tr>
								<td>Total CAR</td>
								<td><?=$TotalCAR?></td>
							</tr>
						</table>

					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="3">
				</td>
			</tr>
		</table>
	</div>
	</td>
	</tr>
	</table>
</div>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts-3d.js"></script>
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
            text: ''
        },

        xAxis: {
            categories: ['PPM', 'Uptime', 'Total']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Occurance'
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'SIQ',
            data: [<?=$PPMSIQ?>, <?=$UptimeSIQ?>, <?=$TotalSIQ?>],
            stack: 'SIQ'
        }, {
            name: 'CAR',
            data: [<?=$PPMCAR?>, <?=$UptimeCAR?>, <?=$TotalCAR?>],
            stack: 'CAR'
        }]
    });
});

		})(jQuery);
	</script>
	</body>
		</html>