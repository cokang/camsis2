<?php if(  $this->uri->slash_segment(2) == 'update_delete_cmisphoto/'){ ?>
<html>
<body >
</body>
</html>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
	opener.location.reload();
    window.close();
    });
    }

    window.onload = closeWindow();
</script>
<?php }else{ ?>
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:left;">
<?php if($this->input->get('MC') == '1') { ?>
	<tr>
		<th style="text-align:left;" colspan="2">Confirm New Request <i style="font-size:9px;">( File(s) not uploaded )</i></th>
	</tr>
	<tr>
		<td style="color:blue;" colspan="2">You have entered the information as shown below. <br /> To change your entry, click on [CHANGE] button at the bottom. <br /> To proceed creating this request, please click on [Save] button.</td>
	</tr>
	<tr>
		<th style="text-align:left;" colspan="2">Components Details</th>
	</tr>
	<tr>
		<td>Component Name</td>
		<td><?php echo $this->input->post('att_name');?></td>
	</tr>
	<tr>
		<td>Picture File</td>
		<td><?php echo $upload_data['client_name']?></td>
	</tr>
	<tr>
		<td colspan="2"><button type="button" value="Change" onclick="location.href = '<?php echo base_url();?>index.php/contentcontroller/rootcause_image?wo=<?php echo $this->input->get('wo')?>&act=<?php echo $this->input->get('act')?>&id=<?=isset($insertid)?$insertid : $this->input->get('id')?>&tag=<?=$this->input->get('tag')?>';" >Change</button> <input type="submit" value="Add" onClick="javascript:showmg('<?php echo $this->input->get('wo');?>','<?php echo $this->input->get('tag') ?>');"> </td>
	</tr>
<?php }else{ ?>
	<tr>
		<th style="text-align:left;">New Root Cause <?=ucwords($this->input->get('tag'))?></th>
	</tr>
	<tr>
		<td>Attachment for <?=$this->input->get('wo')?></td>
	</tr>
	<tr>
		<td>File attachment must be less then 3MB  </td>
	</tr>
	<tr>
		<th style="text-align:left;"><?=ucwords($this->input->get('tag'))?> Details</th>
	</tr>
	<?php if ($this->input->get('act') != 'update' && $this->input->get('act') != 'delete'){ ?>
	<form enctype="multipart/form-data" action="" method="post" id="form">
	<?php } else { ?>
	<form  action="update_delete_cmisphoto?wo=<?php echo $this->input->get('wo')?>&id=<?php echo $this->input->get('id')?>&act=<?=$this->input->get('act')?>&tag=<?=$this->input->get('tag')?>" method="post" id="form" name="form">
	<?php } ?>
	<tr>
	<?php if ($this->input->get('tag') == 'CMIS') { ?>
		<td>Attachment Name : <input type="text" value="<?=$this->input->get('act') != 'addnew' ? $cmisdata[0]->component_name : ''?>" name="att_name" id="att_name"> <a style="color:red;">Compulsary</a> </td>
	<?php } else { ?>
		<td>Attachment Name : <input type="text" value="<?=$this->input->get('act') != 'addnew' ? $photodata[0]->component_name : ''?>" name="att_name" id="att_name"> <a style="color:red;">Compulsary</a> </td> 
	<?php } ?>
	</tr>
	<?php if ( $this->input->get('act') != 'delete'){ ?>
	<tr>
		<td>Select a file to upload: <input type="file" value="" name="image_file" id="image_file"> </td>
	</tr>
	<?php } ?>
	<tr>
		<td>
		<button type="reset" value="Clear All">Clear All</button> 
		<?php if ($this->input->get('act') != 'update' && $this->input->get('act') != 'delete'){ ?>
		<input type="submit" value="Save" onClick="if(verifyFile()){document.fileUpForm.submit();}">
		<?php } else { ?>
		<input type="button" value="<?=($this->input->get('act') != 'update') ? 'Delete' : 'Save'?>" onClick="javascript:showupdate('<?php echo $this->input->get('wo');?>','<?php echo $this->input->get('tag') ?>');">
		<?php } ?>
		<button type="cancel"  onclick="window.parent.close();">Cancel</button> </td>
	</tr>
		</form>
<?php } ?>
<!--<input type="hidden" value="<?= ($this->input->get('enamea')) ? $this->input->get('enamea') : ''?>" name="att_file" id="att_file">
<input type="hidden" value="<?= ($this->input->get('ecode')) ? $this->input->get('ecode') : ''?>" name="att_temp" id="att_temp">-->

</table>
<script type="text/javascript">
<?php if ($this->input->get('act') != 'update' && $this->input->get('act') != 'delete'){ ?>
    function verifyFile()
	{
	if(document.getElementById("image_file").value == "") {
	alert("Must choose a file first!");
	return false;
	}
	if(document.getElementById("image_file").value.length < 5) {
	alert("Invalid filename. Must contain proper extension.");
	return false;
	}
	if(document.getElementById("att_name").value == "") {
	alert("File name is compulsary");
	return false;
	}
	att_name = document.getElementById("att_name").value ;
	image_file = document.getElementById("image_file").value ;
	if (image_file) {
    var startIndex = (image_file.indexOf('\\') >= 0 ? image_file.lastIndexOf('\\') : image_file.lastIndexOf('/'));
    var filename = image_file.substring(startIndex);
    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }
	}
	document.getElementById("form").action = "rootcause_image?wo=<?php echo $this->input->get('wo')?>&id=<?php echo $this->input->get('id')?>&act=<?php echo $this->input->get('act')?>&MC=1&tag=<?=$this->input->get('tag')?>";
	return true;
	}
<?php }else{ ?>
function verifyFile()
	{
	att_name = document.getElementById("att_name").value ;
	att_file = document.getElementById("att_file").value ;
	att_temp = document.getElementById("att_temp").value ;
	document.getElementById("form").action = "update_delete_cmisphoto?wo=<?php echo $this->input->get('wo')?>&id=<?php echo $this->input->get('id')?>&act=<?=$this->input->get('act')?>"
	return true;
	}
<?php } ?>
		function showmg(wo,tag)
		{
			self.close();
			window.opener.refresh_cmisphoto(wo,tag);
			self.close();
		}
		function showupdate(wo,tag)
		{

			window.document.forms['form'].submit();
			window.opener.refresh_cmisphoto(wo,tag);
		}

</script>
<?php } ?>