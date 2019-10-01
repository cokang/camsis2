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
	<?php echo anchor ('contentcontroller/stockDtail?id='.$this->input->get('id'), 'Item Information'); ?></td>

	<?= ($this->input->get('wo') == '1') ? '<td class="ui-highlight" align="center" colspan="0"  width="">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="" width="">'?>
	<?php echo anchor ('contentcontroller/stockact?id='.$this->input->get('id'), 'Stock Activity'); ?></td>
	


</tr>
<tr class="ui-color-contents-style-1">
	<td colspan="5">
	<?php $tabber = $this->input->get('wo');?>
<?php switch ($tabber) {
case "0":
        $tulis = "Request";
		$left = '';
		$right = base_url().'index.php/contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord').'&wo=1';
        break;
    case "1":
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