<tr class="ui-left_web">
	<?= ($this->input->get('car') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px; width:33.33%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style=" height:30px; width:25%;">'?>
	<?php echo anchor ('contentcontroller/qap3_SIQ_Number_update?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y'),'SIQ'); ?></td>
	<?= ($this->input->get('car') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:33.33%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:33.33%;">'?>
	<?php echo anchor ('contentcontroller/qap3_car?ssiq='.$this->input->get('ssiq').'&carid='.$this->input->get('carid').'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&car=1', 'CAR'); ?></td>
	<?= ($this->input->get('car') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="width:33.33%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:33.33%;">'?>
	<?php echo anchor ('contentcontroller/qap3_action?ssiq='.$this->input->get('ssiq').'&carid='.$this->input->get('carid').'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&car=2', 'ACTION TAKEN'); ?></td>
</tr>
<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php
if (!is_null($this->input->get('siq'))){
	if ($this->input->get('siq') == 0){ 
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo 'CAR';
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/qap3_car?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&siq=1','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('siq') == 1){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/qap3_SIQ_Number_update?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y'),'<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo 'ACTION TAKEN';
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=2'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('siq') == 2){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/qap3_car?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&siq=1','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo 'ACTION TAKEN';
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		//echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=2'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
}
?>
	</td>
</tr>


			