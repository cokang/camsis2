<div class="ui-middle-screen">
	<div class="menu-class" style=""><div class="menu-sub" style=""><span class="icon-play2" valign="middle"></span> <?php echo anchor ('contentcontroller/assets/'.$this->session->userdata('usersess'),'Assets' ,array('class' => 'menu2')); ?></div>
	</div>
	<div class="ph-dot-nav nav" style="font-size:20px;">
		<?php echo anchor ('asset', '<img src="'. base_url().'images/new.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;New Asset'); ?>
		<?php echo anchor ('contentcontroller/assets', '<img src="'. base_url() .'images/catalog2.png" alt="" class="ui-icon-header"/><br /> &nbsp;&nbsp;Asset Catalog'); ?>
		<?php echo anchor ('contentcontroller/Procurement/'.$this->session->userdata('usersess'), 'Procurement<br /> Modules'); ?>
		<?php echo anchor ('contentcontroller/Business/'.$this->session->userdata('usersess'), 'Business Inteligent Reports'); ?>
		<div class="effect"></div>
	</div>
	<div class="content-workorder" style="padding-bottom:10px;">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr>
				<td width="120px" class="ui-highlight" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; height:30px;"><?php echo anchor ('contentcontroller/assets', 'All Assets'); ?></td>
				<td width="150px" class="ui-content-menu-desk-color" align="center" colspan="0" style="border-top-left-radius:10px; border-top-right-radius:10px; "><?php echo anchor ('contentcontroller/assetsC', 'No-PPM Assets'); ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" height="40px" style="padding-left:10px; border-top-right-radius:5px;">Asset Catalog By Equipment Name</td>
			</tr>			
			<tr height="20"  class="ui-color-contents-style-1">
				<td colspan="3" class="font-size-asset">				
					<span class="icon-asset"><span class="icon-play" style="padding-left:10px;">
					<a href="javascript:void(0);" onclick="javascript:fToggle('BEANL03');"><b>ANALYZERS, LABORATORY, BLOOD GAS/PH</b></a>&nbsp;&nbsp;&nbsp;BEANL03&nbsp;&nbsp;&nbsp;<span class="FieldLabel">(2)</span>
					</span>
					<div style="padding-left:50px;">
						<table id="BEANL03" style="display:none; margin:10px;" border="0" class="ui-content-middle-menu-workorder" width="98%">
							<tr class="">
								<td class=""colspan="" style="" valign="top" height="25px">
									<table class="ui-content-middle-menu-workorder2" width="100%" height="25px">
										<tr class="ui-menu-color-header" style="color:white;">
											<td width="5%" style="border-top-left-radius:5px; ">No</td>
											<td width="5%">Asset Number</td>
											<td width="5%">Tag No</td>
											<td width="10%">Asset Name</td>
											<td width="5%">User<br />Dept</td>
											<td width="5%">Location</td>
											<td width="5%">Criticality</td>
											<td width="5%">Condition</td>
											<td width="5%">Status</td>
											<td width="5%">Model</td>
											<td width="5%">Manufacturer</td>
											<td width="5%">Serial no</td>
											<td width="5%" style="border-top-right-radius:5px;">Purchase <br />Cost</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr class="">
								<td class=""colspan="" style="" valign="top" height="25px">
									<table class="ui-content-middle-menu-workorder2" width="100%" height="25px" border="0">
										<tr class="" style="color:black;">
											<td width="5%" style="border-top-left-radius:5px; ">No</td>
											<td width="5%"><?php echo anchor ('contentcontroller/assetupdate','BEANL03-0001'); ?></td>
											<td width="5%">Tag No</td>
											<td width="10%">Asset Name</td>
											<td width="5%">User Dept</td>
											<td width="5%">Location</td>
											<td width="5%">Criticality</td>
											<td width="5%">Condition</td>
											<td width="5%">Status</td>
											<td width="5%">Model</td>
											<td width="5%">Manufacturer</td>
											<td width="5%">Serial no</td>
											<td width="5%" style="border-top-right-radius:5px;">Purchase <br />Cost</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</td>				
			</tr>
			<?php foreach($asset_cat as $row):?>        			
	    				<tr height="20"  class="ui-color-contents-style-1">
				<td colspan="3" class="font-size-asset">				
					<span class="icon-asset"><span class="icon-play" style="padding-left:10px;">
					<a href="javascript:void(0);" onclick="javascript:fToggleAssetList('<?=$row->V_Equip_code?>','<?=strtoupper($row->V_Asset_name)?>');"><b><?=strtoupper($row->V_Asset_name)?></b></a>&nbsp;&nbsp;&nbsp;<?=$row->V_Equip_code?>&nbsp;&nbsp;&nbsp;<span class="FieldLabel">(<?=$row->aTotal?>)</span>
					</span>
				</td>				
			</tr>  
			
			<tr id="tr<?=$row->V_Equip_code?>-<?=strtoupper($row->V_Asset_name)?>" style="display:none;">
		<td><span id="sp<?=$row->V_Equip_code?>-<?=strtoupper($row->V_Asset_name)?>"><img src="images/baru2_06.jpg"></span></td>
	</tr>
	
	<div id='result_table'>
 
</div>
						 
			

    		<?php endforeach;?>
				
				<button type='button' name='getdata' id='getdata'>Get Data.</button>
 
<div id='result_tables'>
 
</div>
				
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
				</td>
			</tr>					
		</table>
	</div>		
</div>

<script type='text/javascript' language='javascript'>
$('#getdata').click(function(){
 
    $.ajax({
            url: '<?php echo base_url().'index.php/contentcontroller/get_all_users';?>',
            type:'POST',
            dataType: 'json',
            success: function(output_string){
                    $('#result_table').append(output_string);
                } // End of success function of ajax form
            }); // End of ajax call 
 
});
</script>

<script language="javascript" type="text/javascript">
	function fToggle(elementId) {
	
		var e = document.getElementById(elementId);
		if ( !e.style.display || e.style.display != "none" ) {
			e.style.display = "none";
			 
		} else {
			e.style.display = "block";
			$.ajax({
            url: '<?php echo base_url().'index.php/contentcontroller/get_all_users';?>',
            type:'POST',
            dataType: 'json',
            success: function(output_string){
                    $('#result_table').append(output_string);
                } // End of success function of ajax form
            }); // End of ajax call 
			
			
		}
	}
	function fToggleAssetList(equipCode, assetName)
		{
			//var uid		=	uniqueid();
			 $.ajax({
            url: '<?php echo base_url().'index.php/contentcontroller/get_all_usersx';?>',
            type:'POST',
            dataType: 'json',
            success: function(output_string){
                    $('#result_table').append(output_string);
                } // End of success function of ajax form
            }); // End of ajax call 
			
			
			
		}

</script>