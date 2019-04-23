<script>
	Number.prototype.format = function(n, x) {
	//alert(Number.prototype.format);
    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
};
function fToggle(elementId) {
//alert('asst'+elementId);
 $('.asst'+elementId).load("<?php echo base_url ('index.php/ajaxprocument') ?>?ast="+elementId.trim());
 var e = document.getElementById(elementId);
  var id = (elementId);
  if (false == $(e).is(':visible')) {
    $(e).slideToggle('slow');
    $('span.icon[id="l-'+id+'"]').toggleClass("icon-plus icon-minus");
  }
  else {
    $(e).slideToggle('slow');
    $('span.icon[id="l-'+id+'"]').toggleClass("icon-plus icon-minus");
  }
};   
function fLabour(a,b){
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('update_delete?tab='+a+'&code='+b, '', winProp);
			Win.window.focus();     }   
</script>
<div class="ui-middle-screen6">
<table class="table-middle-screen-1">
<tr>
<td>
	<?php if( $this->session->userdata("total_hosp")>1 ){?>
					<?php echo anchor ('contentcontroller/select?hc=pilih',$this->session->userdata("hosp_name"),'style="font-size:20px;color:white; {
						# code...
					}"'); ?>
				<?php }else{?>
					<p style="font-size: 20px; color: black;"><?=$this->session->userdata("hosp_name");?></p>
				<?php } ?>
				<a href='../contentcontroller/Procurement/' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> Procurement</a>
			
</td>
</tr>
</table>
</table>
<table class="table-middle-screen-2" border="0">
<tr><td>
<div class="div-p"></div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="11"><b>Parts Catalog</b></td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" class="assets-headear">Vendor By Catalog Name</td>
			</tr>			
			<?php foreach($record as $row): ?>
	    	<tr class="asset-ajax">
				<td colspan="3">
				<div class="asset1" style="margin-top:3px;"> 
					<span class='icon icon-plus' id="l-<?=$row->ItemCode?>"></span>
				</div>
				<div class="asset2">
				<a href="javascript:void(0);" onclick="javascript:fToggle('<?=$row->ItemCode?>');"><b><?= isset($row->ItemName) ? $row->ItemName : '' ?> </b></a> <?= isset($row->ItemCode) ? $row->ItemCode : '' ?> <span class="FieldLabel">( <?= isset($row->Qty) ? $row->Qty : '' ?> )</span>
				<a href="javascript:void(0);" style="display:iniline-block; margin-left:5px;"><a href="javascript:void(0);" onclick="fLabour('New','<?=$row->ItemCode?>','','');"><span class="icon-plus" style="font-size:12px; color:green;"></span> <b>Add New</b></a> 
				<?php 
					$status_list = array(
							   '' => '',
							  'JIT' => 'JIT',
							  'FMI' => 'FMI',
				
						   );
					 ?>   
				<?php echo form_dropdown('n_status_list', $status_list ,'', 'class="dropdown n_wi-date2" style="display:inline-block; width:100px; height:30px;"'); ?>
				</td>				
			</tr>
			
			<tr class="asset-ajax">
				<td colspan="3">
					<div id="<?=$row->ItemCode?>" class="asst<?=$row->ItemCode?>" style="display: none; margin-left:20px; width:98%;"></div>
				</td>
			</tr>	
			<?php endforeach; ?>		
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">

				</td>
			</tr>					
		</table>
	</div>
	</td>
	</tr>
	</table>		
</div>

<script language="javascript" type="text/javascript">
	function fToggle2(elementId) {
		var e = document.getElementById(elementId);
		if ( !e.style.display || e.style.display != "none" ) {
			e.style.display = "none";
			 
		} else {
			e.style.display = "block";
			
		}
	}
</script>