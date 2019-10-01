<?php $array = [
	['SHIPMENT / INVOICE & DO One',base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=0'],
	['SHIPMENT / INVOICE & DO Two',base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=1'],
	['SHIPMENT / INVOICE & DO Three',base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=2'],
	['Payment One',base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=3'],
	['Payment Two',base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=4'],
	['Payment Three',base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=5']
]?>

<?php
$tabber = $this->input->get('tab');

switch ($tabber) {
	case "0":
        $tulis = "SHIPMENT / INVOICE & DO One";
		$tulis1 = "SHIPMENT / INVOICE & DO One";
		$left = "";
		$right = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=1';
        break;
    case "1":
        $tulis = "SHIPMENT / INVOICE & DO Two";
		$tulis1 = "SHIPMENT / INVOICE & DO Two";
		$left = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=0&parent=assets';
		$right = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=2';
        break;
    case "2":
        $tulis = "SHIPMENT / INVOICE & DO Three";
		$tulis1 = "SHIPMENT / INVOICE & DO Three";
		$left = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=1';;
		$right = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=3';
        break;
    case "3":
        $tulis = "Payment One";
		$tulis1 = "Payment One";
		$left = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=2';
		$right = base_url().'index.php/Procurement/po_follow_up2?pr='.$this->input->get('pr').'&tab=4';
        break;
    case "4":
        $tulis = "Payment Two";
		$tulis1 = "Payment Two";
		$left = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=3';
		$right = base_url().'index.php/Procurement/po_follow_up2?pr='.$this->input->get('pr').'&tab=5';
        break;
    case "5":
        $tulis = "Payment Three";
		$tulis1 = "Payment Three";
		$left = base_url().'index.php/Procurement/po_follow_up2?po='.$this->input->get('po').'&tab=4';
		//$right = base_url().'index.php/Procurement/po_follow_up2?pr='.$this->input->get('pr').'&tab=4';
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
