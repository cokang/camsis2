
<body style="margin:0px;">
<table class="ui-content-middle-menu-workorder" width="100%" border="0">
	<tr class="color-pop-asset">
		<td valign="middle" colspan="10"><b>ASSET</b></td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="13%" colspan="2" height="60px">Asset Number :</td>
		<td style="padding-left:10px;" colspan="2"><input type="text" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2"></td>
		<td style="padding-left:10px;" width="13%" colspan="2">Asset Number :  </td>
		<td style="padding-left:10px;" colspan="2"><input type="text" name="n_asset_number" value="<?php echo set_value('n_asset_number'); ?>" class="form-control-button2"></td>
	</tr>
	<tr class="color-pop-asset2" align="center" style="font-weight:bold; border-radius:5px;">
		<td width="5%">No</td>
		<td width="12%">Asset Number</td>
		<td width="12%">Tag Number</td>
		<td width="12%">Serial Number</td>
		<td width="12%">User Department</td>
		<td width="12%">Location</td>
		<td width="12%">Condition</td>
		<td width="12%">Status</td>
		<td width="12%">Variation Status</td>
	</tr>
      			
	<?php foreach($records as $row):?>        			
	<tr align="center" id="n_tag">
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->V_requestor?></a></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->V_request_type?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->V_Request_no?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->V_servicecode?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->V_priority_code?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->D_date?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?=$row->V_Asset_no?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>','<?=$row->V_Asset_no?>','<?=$row->V_priority_code?>','<?=$row->D_date?>')" ><?php echo $this->session->userdata('v_UserName');?></td>
	</tr>   			 
	<?php endforeach;?>			 
    		
<!--<select id="n_tag">
    <option value="Mudassasdar Khan">Mudassar Khan</option>
    <option value="John Hsadammond">John Hammond</option>
    <option value="Mike Stsadanley">Mike Stanley</option>
</select>-->

<script type="text/javascript">
    function Setasset(a_number,t_number,s_number,a_name) {
        if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_asset_number");
            anumber.value =  a_number;
            var tag_number = window.opener.document.getElementById("n_tag_number");
            tag_number.value = t_number;
            var snumber = window.opener.document.getElementById("n_serial_number");
            snumber.value =s_number;
            var n_n = window.opener.document.getElementById("n_name");
            n_n.value = a_name;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<!--<script type="text/javascript">
function fPostAsset(assetno, tagno, sn, name)
		{
	 		window.opener.document.getElementById("n_asset_number").value = assetno;
 			window.opener.document.getElementById("n_tag_number").value = tagno;
 			window.opener.document.getElementById("n_serial_number").value = sn;
 			window.opener.document.getElementById("n_name").value = name;
	 		self.close();
		}
</script>-->


</table>


</body>