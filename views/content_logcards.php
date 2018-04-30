
			<tr style="font-size: 14px; font-weight: bold;" class="ui-left_web">
				
				<?= ($this->input->get('card') == '0') ? '<td class="ui-highlight" align="center" colspan="0" width="3%">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" width="3%">'?>
				<?php echo anchor ('contentcontroller/assetlogcards_M?asstno='.$this->input->get('asstno').'&tab=8&card=0', 'LogCard<br />Maintenance'); ?></td>
				<?= ($this->input->get('card') == '1') ? '<td class="ui-highlight" align="center" colspan="0" width="3%">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" width="3%">'?>
				<?php echo anchor ('contentcontroller/assetlogcards_U?asstno='.$this->input->get('asstno').'&tab=8&card=1', 'LogCard<br />Unschedule'); ?></td>
				<?= ($this->input->get('card') == '2') ? '<td class="ui-highlight" align="center" colspan="0" width="3%">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" width="3%">'?>
				<?php echo anchor ('contentcontroller/assetlogcards_C?asstno='.$this->input->get('asstno').'&tab=8&card=2', 'LogCard<br />Complaints'); ?></td>
				<?= ($this->input->get('card') == '3') ? '<td class="ui-highlight" align="center" colspan="0" width="3%">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0"  width="3%">'?>
				<?php echo anchor ('contentcontroller/assetlogcards?asstno='.$this->input->get('asstno').'&tab=8&card=3', 'LogCard<br />Relocation'); ?></td>
				<?= ($this->input->get('card') == '4') ? '<td class="ui-highlight" align="center" colspan="0" width="3%">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" width="3%">'?>
				<?php echo anchor ('contentcontroller/assetlogcards_Re?asstno='.$this->input->get('asstno').'&tab=8&card=4', 'LogCard<br />Reclassification'); ?></td>
			</tr>
<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php
if (!is_null($this->input->get('card'))){
	if ($this->input->get('card') == 0){ 
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Log Card Relocation";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
 		echo anchor ('contentcontroller/assetlogcards_M?asstno='.$this->input->get('asstno').'&tab=8&card=1','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('card') == 1){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/assetlogcards?asstno='.$this->input->get('asstno').'&tab=8&card=0','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Log Card Maintenance";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/assetlogcards_U?asstno='.$this->input->get('asstno').'&tab=8&card=2','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('card') == 2){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/assetlogcards_M?asstno='.$this->input->get('asstno').'&tab=8&card=1','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Log Card Unschedule";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/assetlogcards_C?asstno='.$this->input->get('asstno').'&tab=8&card=3','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('card') == 3){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/assetlogcards_U?asstno='.$this->input->get('asstno').'&tab=8&card=2','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Log Card Complaints";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
	  	echo anchor ('contentcontroller/assetlogcards_Re?asstno='.$this->input->get('asstno').'&tab=8&card=4','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('card') == 4){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/assetlogcards_C?asstno='.$this->input->get('asstno').'&tab=8&card=3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Log Card Reclassification";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		//echo anchor ('contentcontroller/assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
}
?>
	</td>
</tr>