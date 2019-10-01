<div class="divFooter ">
Copyright product of Advance Pact Sdn Bhd. All rights reserved.
</div>
<?php 
$array = [
	['contentcontroller/report_ppmwos/'],
	['contentcontroller/report_reqwos/'],
	['contentcontroller/report_cwos/'],
	['contentcontroller/report_reswos/'],
	['contentcontroller/report_sls/'],
	['contentcontroller/report_reqwosbya2/'],
	]

?>
<?php 
foreach ($array as $list) {
if($list[0] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ ?>
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
            categories: ['<?= substr(date('M',mktime(0, 0, 0, $month, 10)),0,3).' '.$year ?>']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
			<?php if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_ppmwos/'){?>
                text: 'PPM Work Order'
			<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_reqwos/') {?>
				text: 'Request Work Order'
			<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_cwos/') {?>
				text: 'Complaint'
			<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_reswos/') {?>
				text: 'Response Time'
			<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_sls/') {?>
				text: 'Statutory & Lisense'
			<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_reqwosbya2/') {?>
				text: 'A2'
			<?php } ?>
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40,
				<?php if($this->input->get('none') == 'closed'){?>
				animation: false
				<?php } ?>
            },
        },
		<?php if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_ppmwos/'){?>
        series: [{
            name: 'Total PPM Work Order',
            data: [<?php if ($ppmsum[0]->total == 0) { echo "0"; } else {echo $ppmsum[0]->total;} ?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?php if ($ppmsum[0]->comp == 0) { echo "0"; } else {echo $ppmsum[0]->comp; } ?>],
            stack: '2'
        }
		, {
            name: 'Total Rescheduled',
            data: [<?php if ($ppmsum[0]->resch == 0) { echo "0"; } else {echo $ppmsum[0]->resch;} ?>],
            stack: '3'
        }
		, {
            name: 'Total Not Done',
            data: [<?php if ($ppmsum[0]->notcomp == 0) { echo "0"; } else {echo $ppmsum[0]->notcomp;} ?>],
            stack: '4'
        }]
		<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_reqwos/') {?>
		series: [{
            name: 'Total Work Order Request',
            data: [<?php if ($rqsum[0]->total == 0){ echo '0';}else{echo $rqsum[0]->total;}?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?php if ($rqsum[0]->comp == 0){ echo '0';}else{echo $rqsum[0]->comp;}?>],
            stack: '2'
        }
		, {
            name: 'Total Outstanding',
            data: [<?php if ($rqsum[0]->notcomp == 0){ echo '0';}else{echo $rqsum[0]->notcomp;}?>],
            stack: '3'
        }]
		<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_cwos/') {?>
		series: [{
            name: 'Total Complaint',
            data: [<?php if ($complntsum[0]->total == 0){ echo '0';}else{echo $complntsum[0]->total;}?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?php if ($complntsum[0]->comp == 0){ echo '0';}else{echo $complntsum[0]->comp;}?>],
            stack: '2'
        }
		, {
            name: 'Total Outstanding',
            data: [<?php if ($complntsum[0]->notcomp == 0){ echo '0';}else{echo $complntsum[0]->notcomp;}?>],
            stack: '3'
        }]
		<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_reswos/') {?>
		series: [{
            name: 'Total Work Order Request',
            data: [<?php if ($rqsum[0]->total == 0){ echo '0';}else{echo $rqsum[0]->total;}?>],
            stack: '1'
        }, {
            name: 'Total Responded',
            data: [<?php if ($rqsum[0]->resp == 0){ echo '0';}else{echo $rqsum[0]->resp;}?>],
            stack: '2'
        }
		, {
            name: 'Total Responded Late',
            data: [<?php if ($rqsum[0]->resplate == 0){ echo '0';}else{echo $rqsum[0]->resplate;}?>],
            stack: '3'
        }]
		<?php }elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_sls/') {?>
		series: [{
            name: 'Total of License & Statutory',
            data: [<?php if ($licsatsum[0]->notlicsat+$satsum[0]->notlicsat == 0){ echo '0';}else{echo $licsatsum[0]->notlicsat+$satsum[0]->notlicsat;}?>],
            stack: '1'
        }, {
            name: 'Total Expired',
            data: [<?php if ($licsatsum[0]->licsat+$satsum[0]->licsat == 0){ echo '0';}else{echo $licsatsum[0]->licsat+$satsum[0]->licsat;}?>],
            stack: '2'
        }]
		<?php } elseif ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/report_reqwosbya2/') {?>
		series: [{
            name: 'Total Work Order Request',
            data: [<?php if ($rqsum[0]->total == 0){ echo '0';}else{echo $rqsum[0]->total;}?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?php if ($rqsum[0]->comp == 0){ echo '0';}else{echo $rqsum[0]->comp;}?>],
            stack: '2'
        }
		, {
            name: 'Total Outstanding',
            data: [<?php if ($rqsum[0]->notcomp == 0){ echo '0';}else{echo $rqsum[0]->notcomp;}?>],
            stack: '3'
        }]
		<?php } ?>
    });
});

		})(jQuery);
	</script>
<?php } } ?>
</body>
</html>