
			<tr class="ui-left_web">
				<?= ($this->input->get('ppm') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px; width:25%;">'?>
				<?php echo anchor ('contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), 'All'); ?></td>
				<?= ($this->input->get('ppm') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="width:37.5%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:37.5%;">'?>
				<?php echo anchor ('contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), ' Completed'); ?></td>
				<?= ($this->input->get('ppm') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="width:37.5%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:37.5%;">'?>
				<?php echo anchor ('contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent'), ' Open'); ?></td>
			</tr>

<tr class="ui-color-contents-style-1">
	<td colspan="5">
<?php $tabber = 0;	if( $this->input->get('ppm') ){	$tabber=$this->input->get('ppm');	}?>
<?php switch ($tabber) {
	case "0":
        $tulis = "All";
		$left = '';
		$right = base_url().'index.php/contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
    case "1":
        $tulis = "Completed";
		$left = base_url().'index.php/contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=0'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = base_url().'index.php/contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=2'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
        break;
	case "2":
        $tulis = "Open";
		$left = base_url().'index.php/contentcontroller/catalogppm/'.$this->session->userdata('usersess').'?&tab=1&ppm=1'.'&y='.$year.'&m='.$month. '&parent='.$this->input->get('parent');
		$right = '';
        break;
} ?>
	<?php if ($this->input->get('ppm') == $tabber) {?>
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