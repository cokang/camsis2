<body>
<!-- Header -->
	<div id="header">
		<div class="top">
		<!-- Logo -->
		<div id="logo">
			<?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'), '<img src="'.base_url().'images/camsis2.png" class="avatar48" />'); ?>
			<h1 id="title">BUSINESS INTELIGENT REPORTS</h1>
		</div>
		<!-- Nav -->
			<?php if ($this->input->get('parent') == 'AssetSummary' ){?>
			<a id="scrollUp" href="#"><div class="scrollUp"><span class="arrow-up"></span></div></a>
			<?php }else {}?>
			<div id="content">
	        	<nav id="nav">
	        		<?php if ($this->input->get('parent') == 'AssetSummary' ){?>
					<ul>
						<li>&nbsp;</li>
						<li><?php echo anchor('contentcontroller/ASummaryListing?&parent=AssetSummary&tab=0&', 'Total of asset by asset type',($this->input->get('tab') == '0') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetmodel?&parent=AssetSummary&tab=1&', 'Total asset by model',($this->input->get('tab') == '1') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetmanufacturer?&parent=AssetSummary&tab=2&', 'Total asset by manufacturer',($this->input->get('tab') == '2') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassettype?&parent=AssetSummary&tab=3&', 'Total of purchase cost by asset type',($this->input->get('tab') == '3') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetpcmodel?&parent=AssetSummary&tab=4&', 'Total of purchase cost by model',($this->input->get('tab') == '4') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetpcmanufacturer?&parent=AssetSummary&tab=5&', 'Total of purchase cost by manufacturer',($this->input->get('tab') == '5') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetdepart?&parent=AssetSummary&tab=6&', 'Total asset by department',($this->input->get('tab') == '6') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetgroupasset?&parent=AssetSummary&tab=7&', 'Total asset by group asset',($this->input->get('tab') == '7') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetyearpurchase?&parent=AssetSummary&tab=8&', 'Total asset by year purchase',($this->input->get('tab') == '8') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetlocation?&parent=AssetSummary&tab=9&', 'Total asset by location',($this->input->get('tab') == '9') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetstatus?&parent=AssetSummary&tab=10&', 'Total asset by asset status',($this->input->get('tab') == '10') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetcondition?&parent=AssetSummary&tab=11&', 'Total asset by asset condition',($this->input->get('tab') == '11') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetvariation?&parent=AssetSummary&tab=12&', 'Total asset by asset variation',($this->input->get('tab') == '12') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetwarranty?&parent=AssetSummary&tab=13&', 'Total asset by still in warranty',($this->input->get('tab') == '13') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetexceedwarranty?&parent=AssetSummary&tab=14&', 'Total asset by exceed warranty',($this->input->get('tab') == '14') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetaging?&parent=AssetSummary&tab=15&', 'Total asset by aging',($this->input->get('tab') == '15') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetrequiment?&parent=AssetSummary&tab=16&', 'Total asset by legal requiment',($this->input->get('tab') == '16') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetPartCost?&parent=AssetSummary&tab=17&', 'Cumulative part cost',($this->input->get('tab') == '17') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttassetLaborCost?&parent=AssetSummary&tab=18&', 'Cumulative labor cost',($this->input->get('tab') == '18') ?array('id' => 'active'):'');?></li>
						<li>&nbsp;</li>
					</ul>
				<?php }elseif ($this->input->get('parent') == 'ServiceRequest' ){?>
					<ul>
						<li><?php echo anchor('contentcontroller/ttrrlate?&parent=ServiceRequest&tab=0&', 'Total of request responded late',($this->input->get('tab') == '0') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrrontime?&parent=ServiceRequest&tab=1&', 'Total of request responded on time',($this->input->get('tab') == '1') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrrdepartment?&parent=ServiceRequest&tab=2&', 'Total of request by department',($this->input->get('tab') == '2') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrraging?&parent=ServiceRequest&tab=3&', 'Total of request by aging',($this->input->get('tab') == '3') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrrtechnical?&parent=ServiceRequest&tab=4&', 'Responded by technical',($this->input->get('tab') == '4') ?array('id' => 'active'):'');?></li>
					</ul>
				<?php }elseif ($this->input->get('parent') == 'UnscheduledReport' ){?>
					<ul>
						<li><?php echo anchor('contentcontroller/ttrtimeframe?&parent=UnscheduledReport&tab=0&', 'Total of request completed by time frame',($this->input->get('tab') == '0') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttroutstandingtimeframe?&parent=UnscheduledReport&tab=1&', 'Total of request outstanding by time frame',($this->input->get('tab') == '1') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrassettmm?&parent=UnscheduledReport&tab=2&', 'Total of request by asset type/model/manufacturer',($this->input->get('tab') == '2') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrld?&parent=UnscheduledReport&tab=3&', 'Total of request by location/department',($this->input->get('tab') == '3') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrttrassetscv?&parent=UnscheduledReport&tab=4&', 'Total of request by asset status/condition/variation',($this->input->get('tab') == '4') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrts?&parent=UnscheduledReport&tab=5&', 'Completed by technical/staff efficiency',($this->input->get('tab') == '5') ?array('id' => 'active'):'');?></li>
					</ul>
				<?php }elseif ($this->input->get('parent') == 'ScheduledWorkOrderReport' ){?>
					<ul>
						<li><?php echo anchor('contentcontroller/ttrctimeframe?&parent=ScheduledWorkOrderReport&tab=0&', 'Total of request compeled by time frame',($this->input->get('tab') == '0') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrcoutstandingtimeframe?&parent=ScheduledWorkOrderReport&tab=1&', 'Total of request outstanding by time frame',($this->input->get('tab') == '1') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrcdiscipline?&parent=ScheduledWorkOrderReport&tab=2&', 'Total of request by discipline (ppm /RI)',($this->input->get('tab') == '2') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrcassettmm?&parent=ScheduledWorkOrderReport&tab=3&', 'Total of request by asset type/model/manufacturer',($this->input->get('tab') == '3') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrcld?&parent=ScheduledWorkOrderReport&tab=4&', 'Total of request by location/department',($this->input->get('tab') == '4') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrcttrassetscv?&parent=ScheduledWorkOrderReport&tab=5&', 'Total of request by asset status/condition/variation',($this->input->get('tab') == '5') ?array('id' => 'active'):'');?></li>
						<li><?php echo anchor('contentcontroller/ttrcts?&parent=ScheduledWorkOrderReport&tab=6&', 'Completed by technical/staff efficiency',($this->input->get('tab') == '6') ?array('id' => 'active'):'');?></li>
					</ul>
				<?php }?>
				</nav>       
	    	</div>
		</div>
	    	<?php if ($this->input->get('parent') == 'AssetSummary' ){?>
	    	<a id="scrollDown" href="#"><div class="bottom"><span class="arrow-down"></span></div></a>
	    	<script type="text/javascript">
				var step = 45;
				var scrolling = false;
				// Wire up events for the 'scrollUp' link:
				$("#scrollUp").bind("click", function(event) {
				    event.preventDefault();
				    // Animates the scrollTop property by the specified
				    // step.

				    $("#content").animate({
				        scrollTop: "-=" + step + "px"
				    });
				}).bind("onclick", function(event) {
				    scrolling = true;
				    scrollContent("up");
				}).bind("onclick", function(event) {
				    scrolling = false;
				});


				$("#scrollDown").bind("click", function(event) {
				    event.preventDefault();
				    $("#content").animate({
				        scrollTop: "+=" + step + "px"
				    });
				}).bind("onclick", function(event) {
				    scrolling = true;
				    scrollContent("down");
				}).bind("onclick", function(event) {
				    scrolling = false;
				});

				function scrollContent(direction) {
				    var amount = (direction === "up" ? "-=1px" : "+=1px");
					//alert(amount);
				    $("#content").animate({
				        scrollTop: amount
				    }, 1, function() {
				        if (scrolling) {
				            scrollContent(direction);
				        }
				    });
				}
				</script>
	    	<?php }else {}?>
	</div>
	<!-- Main -->
	<div id="main">
		<!-- Intro -->
		<section id="top">
			<div class="container">
				<?php if ($this->input->get('parent') == 'AssetSummary' ){?>
				<h1>Asset Summary Listing</h1>
				<?php }elseif ($this->input->get('parent') == 'ServiceRequest' ){?>
				<h1>Service Request</h1>
				<?php }elseif ($this->input->get('parent') == 'UnscheduledReport' ){?>
				<h1>Unscheduled Report</h1>
				<?php }elseif ($this->input->get('parent') == 'ScheduledWorkOrderReport' ){?>
				<h1>Scheduled Work Order Report</h1>
				<?php }?>