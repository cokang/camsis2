<tr class="ui-left_web">
			
		<?= ($this->input->get('vo') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px;" width="25%">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px; width:25%;">' ?>
		<?php echo anchor ('contentcontroller/vo3_vvf?rpt_no='.$this->input->get('rpt_no'). '&vo=0', 'General'); ?></td>
		

		<?= ($this->input->get('vo') == '1') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" >' ?>
		<?php echo anchor ('contentcontroller/vo3_Signatories?rpt_no='.$this->input->get('rpt_no'). '&vo=1', 'Signatories'); ?></td>



		<?= ($this->input->get('vo') == '2') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">' ?>
		<?php echo anchor ('contentcontroller/vo3_Assets?rpt_no='.$this->input->get('rpt_no'). '&vo=2', 'Assets'); ?></td>


		<?= ($this->input->get('vo') == '3') ? '<td class="ui-highlight" align="center" colspan="0">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0">' ?>
		<?php echo anchor ('contentcontroller/vo3_Rates?rpt_no='.$this->input->get('rpt_no'). '&vo=3', 'Rates and Fees'); ?></td>

</tr>
<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php
if (!is_null($this->input->get('vo'))){
	if ($this->input->get('vo') == 0){ 
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "General";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
 		echo anchor ('contentcontroller/vo3_Signatories?rpt_no='.$this->input->get('rpt_no'). '&vo=1','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('vo') == 1){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/vo3_vvf?rpt_no='.$this->input->get('rpt_no'). '&vo=0','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Signatories";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/vo3_Assets?rpt_no='.$this->input->get('rpt_no'). '&vo=2','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('vo') == 2){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/vo3_Signatories?rpt_no='.$this->input->get('rpt_no'). '&vo=1','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Service Contract";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/vo3_Rates?rpt_no='.$this->input->get('rpt_no'). '&vo=3','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('vo') == 3){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/vo3_Assets?rpt_no='.$this->input->get('rpt_no'). '&vo=2','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Work Orders";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		//echo anchor ('contentcontroller/assetaccessories?asstno='.$this->input->get('asstno').'&tab=4','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
}
?>
	</td>
</tr>

