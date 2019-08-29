<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<link rel="STYLESHEET" type="text/css" media='all' href="<?php echo base_url(); ?>css/popup-contact.css">
	<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/style.css">
	<link rel='stylesheet' type='text/css' media='all' href="<?php echo base_url(); ?>css/style.css"> 
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>css/Color-skin3.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/style.css">
<base href="http://www.highcharts.com/demo/3d-column-stacking-grouping/sand-signika" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="highcharts, charts, javascript charts, ajax charts, plots, line charts, bar charts, pie charts, javascript plots, ajax plots" />
	<meta name="description" content="Highcharts - Interactive JavaScript charts for your web pages." />
	<meta name="generator" content="Joomla! - Open Source Content Management" />
	<script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
	<script src="/media/system/js/core.js" type="text/javascript"></script>
	<script src="/media/system/js/modal.js" type="text/javascript"></script>
	<script src="/lib/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/highcharts-3d.js"></script>
	<!--<script src="http://code.highcharts.com/modules/exporting.js"></script>-->		
	<link type="text/css" rel="stylesheet" href="/samples/highcharts/demo/3d-column-stacking-grouping/demo.css" />
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
            text: 'Total fruit consumption, grouped by gender'
        },

        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Number of fruits'
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'John',
            data: [5, 3, 4, 7, 2],
            stack: 'male'
        }, {
            name: 'Joe',
            data: [3, 4, 4, 2, 5],
            stack: 'male'
        }, {
            name: 'Jane',
            data: [2, 5, 6, 2, 1],
            stack: 'female'
        }, {
            name: 'Janet',
            data: [3, 0, 4, 4, 3],
            stack: 'female'
        }]
    });
});

		})(jQuery);
	</script>

</head>