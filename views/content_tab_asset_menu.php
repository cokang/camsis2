<tr class="ui-left_web">
	<?= ($this->input->get('assets') == '0') ? '<td width="120px" class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td width="120px" class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
<?php echo anchor ('contentcontroller/assets?assets=0', 'All Assets'); ?></td>


<?= ($this->input->get('assets') == '1') ? '<td width="150px" class="ui-highlight" align="center" colspan="0" style="">' : '<td width="150px" class="ui-content-menu-desk-color" align="center" colspan="0" style="">' ?>
<?php echo anchor ('contentcontroller/assetsC?assets=1', 'No-PPM Assets'); ?></td>
	<td>&nbsp;</td>
</tr>
<tr class="ui-color-contents-style-1">
	<td colspan="2">
	<?php $tabber = $this->input->get('assets');?>
<?php switch ($tabber) {
case "0":
        $tulis = "Asset";
		$left = '';
		$right = base_url().'index.php/contentcontroller/assetsC?&assets=1';
        break;
    case "1":
        $tulis = "No-PPM Assets";
		$left = base_url().'index.php/contentcontroller/assets?assets=0';
		$right = '';
        break;
} ?>
	<?php if ($this->input->get('assets') == $tabber) {?>
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