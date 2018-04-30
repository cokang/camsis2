<tr class="ui-left_web">
	<?= ($this->input->get('desk') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style=" height:30px; width:25%;">'?>
	<?php echo anchor ('contentcontroller/desk?&desk=0'.'&y='.$year.'&m='.$month, 'ALL'); ?></td>
	<?= ($this->input->get('desk') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:37.5%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:37.5%;">'?>
	<?php echo anchor ('contentcontroller/desk?&desk=1'.'&y='.$year.'&m='.$month, 'OPEN'); ?></td>
	<?= ($this->input->get('desk') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="width:37.5%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:37.5%;">'?>
	<?php echo anchor ('contentcontroller/desk?&desk=2'.'&y='.$year.'&m='.$month, 'CLOSED'); ?></td>
</tr>
<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php


if (!is_null($this->input->get('desk'))){
	if ($this->input->get('desk') == 0){ 
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo $tulis;
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=1'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('desk') == 1){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=0'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo $tulis;
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=2'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('desk') == 2){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=1'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo $tulis;
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		//echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=3'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
}
?>
	</td>
</tr>


			