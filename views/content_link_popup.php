<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="10">Link Work Order</th>
	</tr>
	<?php echo form_open("contentcontroller/pop_link", array('method'=>'get')); ?>
	<tr>
		<td height="40px" colspan="10">
        <div style="display:inline-block; width:30%;">
            Work Order <br />
			<input type="text"  name="n_asset_number" value="<?php echo $this->input->get('n_asset_number'); ?>" class="form-control-button2" style="width:100%;" onchange="javascript:this.form.submit();">
        </div>
        </td>
		
	</tr>
	<?php echo form_hidden('parent',$this->input->get('parent'));?>
	<?php echo form_close(); ?>
	<tr>
		<th >No</th>
		<th >No Workorder</th>
	</tr> 
	<?php $numrow = 1;foreach ($record as $row): ?>    			
	<tr align="center" id="n_tag">
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>')" ><?=$numrow++?></td>
		<td><a href="javascript:Setasset('<?=$row->V_Request_no?>')" ><?=$row->V_Request_no?></td>
    </tr> 
    <?php endforeach; ?>  			 
</table>	
<script type="text/javascript">
    function Setasset(a_number) {
        if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_link");
            anumber.value =  a_number;
        }
        window.close();
    }
</script>
</body>