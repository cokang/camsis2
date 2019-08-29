				
			<tr class="ui-left_web">
				
				<?= ($this->input->get('work-a') == '0') ? '<td class="ui-highlight" align="center" colspan="6" height="30px" >' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" height="30px" >'?>
				<?php echo anchor ('contentcontroller/Booking_no?&work-a=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'Open Booking'); ?></td>
				<?= ($this->input->get('work-a') == '1') ? '<td class="ui-highlight" align="center" colspan="6">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/Booking_no?&work-a=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'Closed Booking'); ?></td>
			</tr>
			<tr class="ui-color-contents-style-1">
			<td colspan="12">
				<?php switch ($tabber) {
    case "1":
        $tulis = "Closed Booking";
		$left = base_url().'index.php/contentcontroller/Booking_no?&work-a=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/Booking_no?&work-a=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    default:
        $tulis = "Open Booking";
		$left = "";
		$right = base_url().'index.php/contentcontroller/Booking_no?&work-a=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
} ?>
		<?php if ($this->input->get('work-a') == $tabber) {?>
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
		</div>
		<?php } ?>
	</td>
</tr>