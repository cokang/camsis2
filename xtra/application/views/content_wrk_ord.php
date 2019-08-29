<script>
function myFunction() {
    //window.open("http://apbesys.advancepact.com/procurement/camsisredirect.asp?userid=nezam&procno=1");
		create_window("http://apbesys.advancepact.com/procurement/camsisredirect.asp?userid=nezam&procno=1",640,360);
}
</script>

<tr class="ui-left_web">
	<td style="height:20px;"></td>
</tr>
<tr class="ui-left_web">
	<?= ($this->input->get('wo') == '0') ? '<td class="ui-highlight" align="center" colspan="0"  height="30px" >' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;" width="3%">'?>
	<?php echo anchor ('contentcontroller/workorderlist?wrk_ord='.$this->input->get('wrk_ord').'&wo=0', 'Request'); ?></td>
	<!--<?= ($this->input->get('wo') == '1') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="">'?>
	<?php echo anchor ('contentcontroller/response?wrk_ord='.$this->input->get('wrk_ord').'&wo=1', 'Response'); ?></td>-->
	<?php //echo anchor ('contentcontroller/visitone?wrk_ord='.$this->input->get('wrk_ord').'&wo=2', 'Visit One'); ?><!--</td>-->
	<?php //echo ($this->input->get('wo') == '3') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php //echo anchor ('contentcontroller/visittwo?wrk_ord='.$this->input->get('wrk_ord').'&wo=3', 'Visit Two'); ?><!--</td>-->
	<?php //echo($this->input->get('wo') == '4') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php //echo anchor ('contentcontroller/visitthree?wrk_ord='.$this->input->get('wrk_ord').'&wo=4', 'Visit Three'); ?><!--</td>-->
	<?php //echo ($this->input->get('wo') == '5') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?= ($this->input->get('wo') == '1') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php echo anchor ('contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord').'&wo=1', 'Visit +'); ?></td>
	<?= ($this->input->get('wo') == '2') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php echo anchor ('contentcontroller/personnelinvolved?wrk_ord='.$this->input->get('wrk_ord').'&wo=2', 'Personnel Involved'); ?></td>
	<?= ($this->input->get('wo') == '3') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php echo anchor ('contentcontroller/technicalsummary?wrk_ord='.$this->input->get('wrk_ord').'&wo=3', 'Technical Summary'); ?></td>
	<?= ($this->input->get('wo') == '4') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php //echo anchor ('contentcontroller/clause?wrk_ord='.$this->input->get('wrk_ord').'&wo=9', 'Clause'); ?>
	<?php //echo anchor ('href="http://apbesys.advancepact.com/procurement/camsisredirect.asp?userid=ika&procno=1" onclick="javascript:void window.open("http://apbesys.advancepact.com/procurement/camsisredirect.asp?userid=nezam&procno=1","1453261608607","width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0");return false;', 'Clause'); ?>
	<?= ($this->input->get('wo') == '5') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php echo anchor ('contentcontroller/chronologyplus?wrk_ord='.$this->input->get('wrk_ord').'&wo=5', 'Chronology +'); ?></td>
	<!--<a href="" onclick="javascript:void window.open('http://apbesys.advancepact.com/procurement/camsisredirect.asp?userid=nezam&procno=1','1453261608607','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">MRIN</a>--></td>
</tr>
<tr class="ui-color-contents-style-1">
	<td colspan="6">
	<?php $tabber = 0;if($this->input->get('wo')){$tabber=$this->input->get('wo');}?>
<?php switch ($tabber) {
	case "0":
		$tulis = "Request";
		$left = '';
		$right = base_url().'index.php/contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord').'&wo=1';
		break;
    case in_array($tabber, array("1","5"))://"1":
		$tulis = "Visit +";
		$left = base_url().'index.php/contentcontroller/workorderlist?wrk_ord='.$this->input->get('wrk_ord').'&wo=0';
		$right = base_url().'index.php/contentcontroller/personnelinvolved?wrk_ord='.$this->input->get('wrk_ord').'&wo=2';
		break;
	case "2":
		$tulis = "Personnel Involved";
		$left = base_url().'index.php/contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord').'&wo=1';
		$right = base_url().'index.php/contentcontroller/technicalsummary?wrk_ord='.$this->input->get('wrk_ord').'&wo=3';
		break;
	case "3":
		$tulis = "Technical Summary";
		$left = base_url().'index.php/contentcontroller/personnelinvolved?wrk_ord='.$this->input->get('wrk_ord').'&wo=2';
		$right = '';
		break;
} ?>
	<?php if ($this->input->get('wo') == $tabber) {?>
		<div class="divmenu">
			<div class="divmenuleft">
			<?php if ($left == ""){?>
			 &nbsp;
			<?php }else{ ?>
			<a href="<?php echo $left; ?>"><span class="icon-arrow-left"></span></a>
			<?php } ?>
			</div>
			<?php echo $tulis; ?>
			<div class="divmenuright">
			<?php if ($right == '') {?>
			 &nbsp;
			<?php }else{ ?>
			<a href="<?php echo $right; ?>"><span class="icon-arrow-right"></span></a>
			<?php } ?>
		</div>
	<?php } ?>
	</td>
</tr>
