

	<div class="ui-left_web">
<tr class="ui-left_web">
	<?= ($this->input->get('tab') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style=" height:30px; width:25%;">'?>
	<?php echo anchor ('Procurement?pro=mrin&tab=0'.'&y='.$year.'&m='.$month, 'Pending MRIN'); ?></td>
	<?= ($this->input->get('tab') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">'?>
	<?php echo anchor ('Procurement?pro=mrin&tab=1'.'&y='.$year.'&m='.$month, 'Approved MRIN'); ?></td>
	<?= ($this->input->get('tab') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">'?>
	<?php echo anchor ('Procurement?pro=mrin&tab=2'.'&y='.$year.'&m='.$month, 'Rejected, Returned MRIN'); ?></td>
	<?= ($this->input->get('tab') == '3') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">'?>
	<?php echo anchor ('Procurement?pro=mrin&tab=3'.'&y='.$year.'&m='.$month, 'All MRIN'); ?></td>
</tr>
</div>
<div class="ui-left_mobile">
<tr class="ui-middle-color">
	<td>
 <?php
	if ($this->input->get('tab') == 0){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo anchor ('Procurement?pro=mrin&tab=1'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif($this->input->get('tab') == 1){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('Procurement?pro=mrin&tab=0'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo anchor ('Procurement?pro=mrin&tab=2'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif($this->input->get('tab') == 2){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('Procurement?pro=mrin&tab=1'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo anchor ('Procurement?pro=mrin&tab=3'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif($this->input->get('tab') == 3){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('Procurement?pro=mrin&tab=2'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo "</div>";
		echo "</div>";
	}

?>
	</td>
</tr>
</div>

			