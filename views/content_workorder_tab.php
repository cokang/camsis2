
			<tr class="ui-left_web">
				<?php if ($this->session->userdata('usersess')=='HKS' ) {?>
				<?= ($this->input->get('work-a') == '0') ? '<td class="ui-highlight" align="center" colspan="0" height="30px" >' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" height="30px" >'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'All'); ?></td>
				<?= ($this->input->get('work-a') == '2') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A4'); ?></td>
				<?= ($this->input->get('work-a') == '3') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=3'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A5'); ?></td>
				<?= ($this->input->get('work-a') == '5') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=5'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A7'); ?></td>
				<?= ($this->input->get('work-a') == '7') ? '<td class="ui-highlight" align="center" colspan="0"' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=7'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A9'); ?></td>
				<?= ($this->input->get('work-a') == '10') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=10'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'Open & BO'); ?></td>

				<?php } else { ?>

				<?= ($this->input->get('work-a') == '0') ? '<td class="ui-highlight" align="center" colspan="0" height="30px" >' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" height="30px" >'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'All'); ?></td>
				<?= ($this->input->get('work-a') == '1') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A1'); ?></td>
				<?= ($this->input->get('work-a') == '2') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A2'); ?></td>
				<?= ($this->input->get('work-a') == '3') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=3'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A3'); ?></td>
				<?= ($this->input->get('work-a') == '4') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=4'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A4'); ?></td>
				<?= ($this->input->get('work-a') == '5') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=5'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A5'); ?></td>
				<?= ($this->input->get('work-a') == '6') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=6'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A6'); ?></td>
				<?= ($this->input->get('work-a') == '7') ? '<td class="ui-highlight" align="center" colspan="0"' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=7'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A7'); ?></td>
				<?= ($this->input->get('work-a') == '8') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=8'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A8'); ?></td>
				<?= ($this->input->get('work-a') == '10') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=10'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'A10'); ?></td>
				<?= ($this->input->get('work-a') == '12') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=12'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'AP19'); ?></td>
				<?= ($this->input->get('work-a') == '13') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=13'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'AP'); ?></td>
				<?= ($this->input->get('work-a') == '11') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">'?>
				<?php echo anchor ('contentcontroller/workorder?&work-a=11'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'Open & BO'); ?></td>
			</tr>
			<?php } ?>
			<tr class="ui-color-contents-style-1">
			<td colspan="12">
			<?php if ($this->session->userdata('usersess')=='HKS' ) {?>


							<?php switch ($tabber) {
    case "4":
        $tulis = "A4";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=5'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "5":
        $tulis = "A5";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=4'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=7'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "7":
        $tulis = "A7";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=5'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=9'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "9":
        $tulis = "A9";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=7'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=11'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "11":
        $tulis = "Opened & BO";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=9'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = "";
        break;
    default:
        $tulis = "All";
		$left = "";
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=4'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
} ?>
			<?php }else{?>
				<?php switch ($tabber) {
    case "1":
        $tulis = "A1";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "2":
        $tulis = "A2";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=3'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "3":
        $tulis = "A3";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=4'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "4":
        $tulis = "A4";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=3'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=5'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "5":
        $tulis = "A5";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=4'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=6'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "6":
        $tulis = "A6";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=5'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=7'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "7":
        $tulis = "A7";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=6'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=8'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "8":
        $tulis = "A8";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=7'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=9'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "9":
        $tulis = "A9";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=8'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=10'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
	case "10":
        $tulis = "A10";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=9'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=11'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "11":
        $tulis = "Opened & BO";
		$left = base_url().'index.php/contentcontroller/workorder?&work-a=10'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = "";
        break;
				case "12":
			        $tulis = "AP19";
					$left = base_url().'index.php/contentcontroller/workorder?&work-a=12'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
					$right = base_url().'index.php/contentcontroller/workorder?&work-a=11'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
					break;
					case "13":
			        $tulis = "AP";
					$left = base_url().'index.php/contentcontroller/workorder?&work-a=13'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
					$right = base_url().'index.php/contentcontroller/workorder?&work-a=12'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
			        break;
    default:
        $tulis = "All";
		$left = "";
		$right = base_url().'index.php/contentcontroller/workorder?&work-a=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
} ?>
<?php }?>
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
