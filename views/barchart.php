<html>
<head>
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
            categories: ['<?=$this->input->get('m')?> <?=$this->input->get('y')?>']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
			<?php if ($this->input->get('bar')  == 'ppm' ){?>
                text: 'PPM Work Order'
			<?php }elseif ($this->input->get('bar')  == 'req' ) {?>
				text: 'Request Work Order'
			<?php }elseif ($this->input->get('bar')  == 'com' ) {?>
				text: 'Complaint'
			<?php }elseif ($this->input->get('bar')  == 'res' ) {?>
				text: 'Response Time'
			<?php }elseif ($this->input->get('bar')  == 'Stat' ) {?>
				text: 'Statutory & Lisense'
			<?php } ?>
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },
		<?php if ($this->input->get('bar')  == 'ppm' ){?>
        series: [{
            name: 'Total PPM Work Order',
            data: [<?=$this->input->get('v1')?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?=$this->input->get('v2')?>],
            stack: '2'
        }
		, {
            name: 'Total Rescheduled',
            data: [<?=$this->input->get('v3')?>],
            stack: '3'
        }
		, {
            name: 'Total Not Done',
            data: [<?=$this->input->get('v4')?>],
            stack: '4'
        }]
		<?php }elseif ($this->input->get('bar')  == 'req' ) {?>
		series: [{
            name: 'Total Work Order Request',
            data: [<?=$this->input->get('v1')?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?=$this->input->get('v2')?>],
            stack: '2'
        }
		, {
            name: 'Total Outstanding',
            data: [<?=$this->input->get('v3')?>],
            stack: '3'
        }]
		<?php }elseif ($this->input->get('bar')  == 'com' ) {?>
		series: [{
            name: 'Total Complaint',
            data: [<?=$this->input->get('v1')?>],
            stack: '1'
        }, {
            name: 'Total Completed',
            data: [<?=$this->input->get('v2')?>],
            stack: '2'
        }
		, {
            name: 'Total Outstanding',
            data: [<?=$this->input->get('v3')?>],
            stack: '3'
        }]
		<?php }elseif ($this->input->get('bar')  == 'res' ) {?>
		series: [{
            name: 'Total Work Order Request',
            data: [<?=$this->input->get('v1')?>],
            stack: '1'
        }, {
            name: 'Total Responded',
            data: [<?=$this->input->get('v2')?>],
            stack: '2'
        }
		, {
            name: 'Total Responded Late',
            data: [<?=$this->input->get('v3')?>],
            stack: '3'
        }]
		<?php }elseif ($this->input->get('bar')  == 'Stat' ) {?>
		series: [{
            name: 'Total of License & Statutory',
            data: [<?=$this->input->get('v1')?>],
            stack: '1'
        }, {
            name: 'Total Expired',
            data: [<?=$this->input->get('v2')?>],
            stack: '2'
        }]
		<?php } ?>
    });
});

		})(jQuery);
	</script>
</head>
<body style="padding:0;margin:0;">
<div id="container" class="qapgraf"></div>
</body>
</html>