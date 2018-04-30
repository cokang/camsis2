<tr class="ui-left_web">
	<td style="height:20px;"></td>
</tr>
<tr class="ui-left_web">
			
		<?= ($this->input->get('vppm') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php echo anchor ('contentcontroller/wo?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=0', 'Work Order'); ?></td>
		

		<?php  // echo ($this->input->get('vppm') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php  // echo anchor ('contentcontroller/visitone?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=1', 'Visit One'); ?><!--</td>-->



		<?php  // echo ($this->input->get('vppm') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php  // echo anchor ('contentcontroller/visittwo?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=2', 'Visit Two'); ?><!--</td>-->


		<?php  // echo ($this->input->get('vppm') == '3') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php  // echo anchor ('contentcontroller/visitthree?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=3', 'Visit Three'); ?><!--</td>-->


		<?= ($this->input->get('vppm') == '4') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php echo anchor ('contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=4', 'Visit +'); ?></td>


		<?= ($this->input->get('vppm') == '5') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php echo anchor ('contentcontroller/personnelinvolved?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=5', 'Personnel Involved'); ?></td>




		<?= ($this->input->get('vppm') == '7') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php echo anchor ('contentcontroller/tech?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=7', 'Technical Summary'); ?></td>

		<?= ($this->input->get('vppm') == '8') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
		<?php echo anchor ('contentcontroller/clau?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=8', 'Clause'); ?></td>
</tr>
<tr class="ui-color-contents-style-1">
	<td colspan="5">
<?php $tabber = $this->input->get('vppm');?>
<?php switch ($tabber) {
case "0":
        $tulis = "Work Order";
		$left = '';
		$right = base_url().'index.php/contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord').'&vppm=1';
        break;
    case "1":
        $tulis = "Visit +";
		$left = base_url().'index.php/contentcontroller/wo?wrk_ord='.$this->input->get('wrk_ord').'&vppm=0';
		$right = base_url().'index.php/contentcontroller/personnelinvolved?wrk_ord='.$this->input->get('wrk_ord').'&vppm=2';
        break;
	case "2":
        $tulis = "Personnel Involved";
		$left = base_url().'index.php/contentcontroller/visitplus?wrk_ord='.$this->input->get('wrk_ord').'&vppm=1';
		$right = base_url().'index.php/contentcontroller/tech?wrk_ord='.$this->input->get('wrk_ord').'&vppm=3';
        break;
	case "3":
        $tulis = "Technical Summary";
		$left = base_url().'index.php/contentcontroller/personnelinvolved?wrk_ord='.$this->input->get('wrk_ord').'&vppm=2';
		$right = base_url().'index.php/contentcontroller/clau?wrk_ord='.$this->input->get('wrk_ord').'&vppm=4';
        break;
	case "4":
        $tulis = "Clause Summary ";
		$left = base_url().'index.php/contentcontroller/tech?wrk_ord='.$this->input->get('wrk_ord').'&vppm=2';
		$right = '';
        break;
} ?>
	<?php if ($this->input->get('vppm') == $tabber) {?>
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