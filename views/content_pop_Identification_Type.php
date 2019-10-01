
<head>

</head>
<body style="margin:0px;">
<table style="width:100%;border:0px solid #999999;border-collapse:collapse;" border="0" align="center">
	<tr class="ui-header-list"style="height:50px;">
	<form action="" method="POST">
		<td style="padding-left:20px; color:white;">License Holder Type :  
			<?php 
				$lictype_list = array(
				'Personnel' => 'Personnel',
                'Vendor' => 'Vendor',
                'Hospital' => 'Hospital',
                'Free Text' => 'Free Text',
                'Consumables' => 'Consumables',
                'Asset' => 'Asset',
                );

				$dd_type = "n_lic_type";
 				$sl_val = $this->input->post($dd_type);

				?>		
		        <?php echo form_dropdown($dd_type, $lictype_list, set_value($dd_type,(!empty($sl_val) ? $sl_val : 'Free Text')) , 'class="dropdown" style="width: 150px;" id="n_Identification_Type" onchange="javascript: submit()"'); ?>
	</form>		
	</td>
	</tr>
</table>
<?php if(isset($_POST['n_lic_type']) ? $_POST['n_lic_type'] : $_POST['n_lic_type'] = 'Free Text') { ?>

<?php if ($_POST['n_lic_type'] == 'Personnel') { ?>
<table class="tftable" border="1" style="text-align:center;">
		<tr align="center" class="tftable-tr">
			<th>No</td>
			<th>Code</td>
			<th>Personnel</td>
		</tr>
		<?php $numrow = 1; foreach($records as $row):?>  
		<tr align="center">
			<td><?=$numrow++?></td>
			<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_PersonalCode?></a></td>
			<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_PersonalName?></a></td>
		</tr>
		<?php endforeach;?>
	</table>
<?php } ?>

<?php if ($_POST['n_lic_type'] == 'Vendor') { ?>
<table class="tftable" border="1" style="text-align:center;">
		<tr align="center" class="tftable-tr">
			<th>No</td>
			<th>Code</td>
			<th>Vendor</td>
		</tr>
		<?php $numrow = 1; foreach($record as $row):?>  
		<tr align="center">
			<td><?=$numrow++?></a></td>
			<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>')" ><?=$row->v_vendorcode?></a></td>
			<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>')" ><?=$row->v_vendorname?></a></td>
		</tr>
		<?php endforeach;?>
	</table>
<?php } ?>

<?php if ($_POST['n_lic_type'] == 'Hospital') { ?>
<table class="tftable" border="1" style="text-align:center;">
	<tr align="center" class="tftable-tr">
		<th>No</td>
		<th>Code</td>
		<th>Hospital</td>
	</tr>
	<?php $numrow = 1; foreach($hosprecord as $row):?>  
	<tr align="center">
		<td><?=$numrow++?></a></td>
		<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_HospitalCode?>','<?=$row->v_HospitalName?>')" ><?=$row->v_HospitalCode?></a></td>
		<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_HospitalCode?>','<?=$row->v_HospitalName?>')" ><?=$row->v_HospitalName?></a></td>
	</tr>
	<?php endforeach;?>
</table>
<?php } ?>

<?php if ($_POST['n_lic_type'] == 'Free Text') { ?>
<table style="width:;border:0px solid #999999;border-collapse:collapse; margin-left:10px; margin-top:10px;" border="0" align="center">
<?php $hidden = array('name' => 'frmFree') ?>
<?php echo form_open('',$hidden);?>
<tr>
	<td>Identification Code	:</td>
	<td><input type="text" name="n_Identification_Code" id="n_Identification_Code" value="<?php echo set_value('n_Identification_Code'); ?>" class="form-control-button2" style="width: 60%; margin-left:2px;"></td>
</tr>
<tr>
	<td width="25%" valign="top">Description :</td>
	<td><textarea name="n_Description" id="n_Description" cols="25" rows="1" class="input"><?php echo set_value('n_Description'); ?></textarea></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="btn-button btn-primary-button" style="width: 20%;" name="mysubmit" value="Ok" onclick="javascript:fPostFreeText();"></td>
</tr>
</table>
<?php form_close() ?>
<?php } ?>

<?php if ($_POST['n_lic_type'] == 'Consumables') { ?>
<table class="tftable" border="1" style="text-align:center;">
	<tr align="center" class="tftable-tr">
		<th>No</td>
		<th>Code</td>
		<th>Consumables</td>
	</tr>
	<?php $numrow = 1; foreach($consrecord as $row):?>  
		<tr align="center">
			<td><?=$numrow++?></a></td>
			<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_ConsumableCode?>','<?=$row->v_Description?>')" ><?=$row->v_ConsumableCode?></a></td>
			<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->v_ConsumableCode?>','<?=$row->v_Description?>')" ><?=$row->v_Description?></a></td>
		</tr>
		<?php endforeach;?>
	</table>
<?php } ?>

<?php if ($_POST['n_lic_type'] == 'Asset') { ?>
<table class="tftable" border="1" style="text-align:center;">
	<tr align="center" class="tftable-tr">
		<th>No</td>
		<th>Code</td>
		<th>Asset</td>
	</tr>
<?php $numrow = 1; foreach($assetrecord as $row):?>  
	<tr align="center">
		<td><?=$numrow++?></a></td>
		<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->V_Tag_no?>','<?=$row->V_Asset_name?>')" ><?=$row->V_Tag_no?></a></td>
		<td><a href="javascript:Setasset('<?php echo $_POST['n_lic_type'] ?>','<?=$row->V_Tag_no?>','<?=$row->V_Asset_name?>')" ><?=$row->V_Asset_name?></a></td>
	</tr>
	<?php endforeach;?>
</table>
<?php } ?>
<?php } ?>
<script type="text/javascript">
    function Setasset(a_name,a_category,a_Description) {
        if (window.opener != null && !window.opener.closed) {
            var License_type = window.opener.document.getElementById("n_Identification_Type");
            License_type.value = a_name;
            var License_code = window.opener.document.getElementById("n_Identification_Code");
            License_code.value = a_category;
            var License_desc = window.opener.document.getElementById("n_Description");
            License_desc.value = a_Description;

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<script>
function fPostFreeText()
		{
	 		window.opener.document.getElementById("n_Identification_Type").value = "Free Text";
 			window.opener.document.getElementById("n_Identification_Code").value = document.frmFree.n_Identification_Code.value;
 			window.opener.document.getElementById("n_Description").value = document.frmFree.n_Description.value;
	 		self.close();
		}
</script>
</body>
</html>

