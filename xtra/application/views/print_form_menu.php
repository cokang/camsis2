<style>
@media screen and (min-device-width: 1200px){
	ul.pf_menu {
		list-style-type: none;
		margin: 0 auto;
		padding: 0;
		overflow: hidden;
		background-color: #398074;
		width:98%;	
	}

	ul.pf_menu li {
		float: left;
		width:23.08%;
		text-align:center;
		padding:10px;
	}

	ul.pf_menu a li{
		display: block;
		color: white;
		text-align: center;
		text-decoration: none;
	}

	ul.pf_menu a li:hover:not(.active) {
		background-color: #4CAF50;
	}

	ul.pf_menu li.active {
	background-color: #4CAF50;
	}
}
@media screen and (max-device-width: 1199px){
	ul.pf_menu {
		list-style-type: none;
		margin: 0 auto;
		padding: 0;
		background-color: #398074;
		width:100%;
		display: inline-block;
	}

	ul.pf_menu div.sa{
		width: 100%;
		display: table;
	}

	ul.pf_menu div.sa a{
		display: table-cell;
		width:50%;
		padding-top: 10px;
		padding-bottom: 10px;
		align-content: center;
	}

	ul.pf_menu div.sa a {
		text-align:center;
	}

	ul.pf_menu div.sa a li{
		color: white;
		text-align: center;
		text-decoration: none;
	}

	ul.pf_menu div.sa a:hover:not(.active) {
		background-color: #4CAF50;
	}

	ul.pf_menu div.sa a.active {
		background-color: #4CAF50;
	}
}
</style>

<div class="ui-main-form-5">
	<div class="middle_d2">
		<ul class="pf_menu">
			<div class="sa">
				<a <?php if($this->input->get('pf') == 1){ echo 'class="active"';} ?> href="<?php echo base_url()?>index.php/contentcontroller/assetwn?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=1">
					<li>Warranty Notificationering</li>
				</a>
				<a <?php if($this->input->get('pf') == 2){ echo 'class="active"';} ?> href="<?php echo base_url()?>index.php/contentcontroller/assetet?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=2">
					<li>Equipment Transfer</li>
				</a>
			</div>
			<div class="sa">
				<a <?php if($this->input->get('pf') == 3){ echo 'class="active"';} ?> href="<?php echo base_url()?>index.php/contentcontroller/assetwe?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=3">
					<li>Warranty Expiry</li>
				</a>
				<a <?php if($this->input->get('pf') == 4){ echo 'class="active"';} ?> href="<?php echo base_url()?>index.php/contentcontroller/assetwf?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=4">
					<li>Warranty Form</li>
				</a>
			</div>
		</ul>
	</div>
</div>