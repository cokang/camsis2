<?php $array = [
	['General<br />Info',base_url().'index.php/contentcontroller/assetupdate?asstno='.$this->input->get('asstno').'&tab=0&parent=assets'],
	['Asset<br />Statutory',base_url().'index.php/contentcontroller/assetstatutory?asstno='.$this->input->get('asstno').'&tab=1'],
	['Service<br />Contract',base_url().'index.php/contentcontroller/assetcontract?asstno='.$this->input->get('asstno').'&tab=2'],
	['Work<br />Orders',base_url().'index.php/contentcontroller/assetworkorder?asstno='.$this->input->get('asstno').'&tab=3'],
	['<br />Accessories',base_url().'index.php/contentcontroller/assetaccessories?asstno='.$this->input->get('asstno').'&tab=4'],
	['<br />Licenses',base_url().'index.php/contentcontroller/assetlicenses?asstno='.$this->input->get('asstno').'&tab=5'],
	['PPM<br />Job Register',base_url().'index.php/contentcontroller/assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6'],
	['PPM<br />Planner',base_url().'index.php/assetppmplanner?asstno='.$this->input->get('asstno').'&tab=7'],
	['Log<br />Cards',base_url().'index.php/contentcontroller/assetlogcards_M?asstno='.$this->input->get('asstno').'&tab=8'],
	['Print<br />Form',base_url().'index.php/contentcontroller/assetwn?asstno='.$this->input->get('asstno').'&tab=9&pf=1'],
	['Fail<br />Bank',base_url().'index.php/contentcontroller/fail_bank?asstno='.$this->input->get('asstno').'&tab=10'],
	//['Warranty<br />Notification',base_url().'index.php/contentcontroller/assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets'],
	//['Equipment<br />Transfer',base_url().'index.php/contentcontroller/assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets'],
	//['Warranty<br />Expiry',base_url().'index.php/contentcontroller/assetwe?asstno='.$this->input->get('asstno').'&tab=11&parent=assets'],
	//['Warranty<br />Form',base_url().'index.php/contentcontroller/assetwf?asstno='.$this->input->get('asstno').'&tab=12&parent=assets'],
	['Variation<br />History',base_url().'index.php/contentcontroller/assetvariationhistory?asstno='.$this->input->get('asstno').'&tab=13'],
	['Cost<br />Cummulative',base_url().'index.php/contentcontroller/assetcostcummulative?asstno='.$this->input->get('asstno').'&tab=14'],
]?>

<?php 
$tabber = $this->input->get('tab');

switch ($tabber) {
	case "0":
		$tulis	= "General<br />Info";
		$tulis1 = "General Info";
		$left	= "";
		$right	= base_url().'index.php/contentcontroller/assetstatutory?asstno='.$this->input->get('asstno').'&tab=1';
		break;
	case "1":
		$tulis	= "Asset<br />Statutory";
		$tulis1	= "Asset Statutory";
		$left	= base_url().'index.php/contentcontroller/assetupdate?asstno='.$this->input->get('asstno').'&tab=0&parent=assets';
		$right	= base_url().'index.php/contentcontroller/assetcontract?asstno='.$this->input->get('asstno').'&tab=2';
		break;
	case "2":
		$tulis	= "Service<br />Contract";
		$tulis1	= "Service Contract";
		$left	= base_url().'index.php/contentcontroller/assetstatutory?asstno='.$this->input->get('asstno').'&tab=1';;
		$right	= base_url().'index.php/contentcontroller/assetworkorder?asstno='.$this->input->get('asstno').'&tab=3';
		break;
	case "3":
		$tulis	= "Work<br />Orders";
		$tulis1	= "Work Orders";
		$left	= base_url().'index.php/contentcontroller/assetcontract?asstno='.$this->input->get('asstno').'&tab=2';
		$right	= base_url().'index.php/contentcontroller/assetaccessories?asstno='.$this->input->get('asstno').'&tab=4';
		break;
	case "4":
		$tulis	= "<br />Accessories";
		$tulis1	= "Accessories";
		$left	= base_url().'index.php/contentcontroller/assetworkorder?asstno='.$this->input->get('asstno').'&tab=3';
		$right	= base_url().'index.php/contentcontroller/assetlicenses?asstno='.$this->input->get('asstno').'&tab=5';
		break;
	case "5":
		$tulis	= "<br />Licenses";
		$tulis1	= "Licenses";
		$left	= base_url().'index.php/contentcontroller/assetaccessories?asstno='.$this->input->get('asstno').'&tab=4';;
		$right	= base_url().'index.php/contentcontroller/assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6';
		break;
	case "6":
		$tulis	= "PPM<br />Job Register";
		$tulis1	= "PPM Job Register";
		$left	= base_url().'index.php/contentcontroller/assetlicenses?asstno='.$this->input->get('asstno').'&tab=5';
		$right	= base_url().'index.php/assetppmplanner?asstno='.$this->input->get('asstno').'&tab=7';
		break;
	case "7":
		$tulis	= "PPM<br />Planner";
		$tulis1	= "PPM Planner";
		$left	= base_url().'index.php/contentcontroller/assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6';
		$right	= base_url().'index.php/contentcontroller/assetlogcards_M?asstno='.$this->input->get('asstno').'&tab=8';
		break;
	case "8":
		$tulis	= "Log<br />Cards";
		$tulis1 = "Log Cards";
		$left	= base_url().'index.php/assetppmplanner?asstno='.$this->input->get('asstno').'&tab=7';
		$right	= base_url().'index.php/contentcontroller/assetwn?asstno='.$this->input->get('asstno').'&tab=9&pf=1';
		// $right = base_url().'index.php/contentcontroller/assetvariationhistory?asstno='.$this->input->get('asstno').'&tab=13';
		break;
	case "9":
		$tulis	= "Print<br />Form";
		$tulis1	= "Print Form";
		$left	= base_url().'index.php/contentcontroller/assetlogcards_M?asstno='.$this->input->get('asstno').'&tab=8';
		$right	= base_url().'index.php/contentcontroller/fail_bank?asstno='.$this->input->get('asstno').'&tab=10';
		break;
	case "10":
		$tulis = "Fail<br />Bank";
		$tulis1 = "Fail Bank";
		// $left = base_url().'index.php/contentcontroller/assetwn?asstno='.$this->input->get('asstno').'&tab=9&pf=1&parent=assets';
		$left = base_url().'index.php/contentcontroller/assetwn?asstno='.$this->input->get('asstno').'&tab=9&pf=1';
		// $right = base_url().'index.php/contentcontroller/assetwe?asstno='.$this->input->get('asstno').'&tab=11';
		$right = base_url().'index.php/contentcontroller/assetvariationhistory?asstno='.$this->input->get('asstno').'&tab=13';
		break;
	// case "11":
	// 	$tulis = "Warranty<br />Expiry";
	// 	$tulis1 = "Warranty Expiry";
	// 	$left = base_url().'index.php/contentcontroller/fail_bank?asstno='.$this->input->get('asstno').'&tab=10';
	// 	$right = base_url().'index.php/contentcontroller/assetwf?asstno='.$this->input->get('asstno').'&tab=12';
	// 	break;
	// case "12":
	// 	$tulis = "Warranty<br />Form";
	// 	$tulis1 = "Warranty Form";
	// 	$left = base_url().'index.php/contentcontroller/assetwe?asstno='.$this->input->get('asstno').'&tab=11&parent=assets';
	// 	$right = base_url().'index.php/contentcontroller/assetvariationhistory?asstno='.$this->input->get('asstno').'&tab=13';
	// 	break;
	case "13":
		$tulis	= "Variation<br />History";
		$tulis1	= "Variation History";
		$left	= base_url().'index.php/contentcontroller/fail_bank?asstno='.$this->input->get('asstno').'&tab=10';
		$right	= base_url().'index.php/contentcontroller/assetcostcummulative?asstno='.$this->input->get('asstno').'&tab=14';
		break;
	case "14":
		$tulis	= "Cost<br />Cummulative";
		$tulis1	= "Cost Cummulative";
		$left	= base_url().'index.php/contentcontroller/assetvariationhistory?asstno='.$this->input->get('asstno').'&tab=13';
		$right	= "";
		break;
}?>
<div id='cssmenu'>
	<ul>
		<?php foreach ($array as $list) {?>
			<?= ($list[0] == $tulis) ? '<li class="active">' : '<li>'?><a href="<?php echo $list[1]; ?>"><?php echo $list[0]; ?></a></li>
		<?php } ?>
	</ul>
</div>
<?php if ($this->input->get('tab') == $tabber) {?>
<div class="divmenu"> 
	<div class="divmenuleft">
	<?php if ($left == ""){?>
	 &nbsp;
	<?php }else{ ?>
		<a href="<?php echo $left; ?>"><span class="icon-arrow-left"></span></a>
	<?php } ?>
	</div>
	<?php echo $tulis1; ?>
	<div class="divmenuright">
	<?php if ($right == '') {?>
	 &nbsp;
	<?php }else{ ?>
		<a href="<?php echo $right; ?>"><span class="icon-arrow-right"></span></a>
	<?php } ?>
	</div>
</div>
<?php } ?>