<?php
if ($this->input->get('asstno') == 'BECEN04-00003'){
	if ($this->input->get('tab') == 0){
	$hidden = array('name' => 'myForm'); 
		echo '<span class="img-assets-update">';
		echo form_open_multipart('contentcontroller/assetupdatepic?asstno=BECEN04-00003',$hidden);
		echo '<div id="assets-picture">';
		echo '<img src="'.base_url().'uploadfile/10171819_10203591384843052_1116687218040306503_n3.jpg" name="file_name" title="click to change profile picture" class="ui-picture-insset"/>';
		echo '</div>';
		echo '<div style="height: 0px;width: 0px; overflow:hidden;"><input id="upfile" type="file" value="upload" name="userfile" onchange="sub(this)"/></div>';
		echo '</span>';
		echo '<span class="boxupdate">';
		echo '<span class="icon-plus" title="Add Picture" onclick="getFile()"></span>';
		echo '<span class="icon-minus" title="Delete Picture"></span>';
		echo '</span>'; 
	}
}
?>
<?php echo $upload_data ?>
<script type="text/javascript">
 function getFile(){
 //alert(test);
   document.getElementById("upfile").click();
 }
 function sub(obj){
 	//alert(test);
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("assets-picture").innerHTML = fileName[fileName.length-1];
    document.myForm.submit();
    event.preventDefault();
  }
	
</script>
<style type="text/css">
span.img-assets-update{
	width: 90%;
	margin: 10px;
	display: inline-block;
}
img.ui-picture-insset{
	display: block;
	margin-left:auto;
	margin-right: auto;
	width: 200px;
	height: 100px;
}
span.boxupdate{
	text-align: center;
	width: 90%;
	margin: 10px;
	display: inline-block;
}
span.boxupdate span{
	padding: 5px;
}
span.boxupdate span:hover{
	cursor: hand;
}
span.boxupdate span.icon-minus{
	color: black;
	border: 3px ridge #DCDCDC;
}
span.boxupdate span.icon-plus{
	color: black;
	border: 3px ridge #DCDCDC;
}
</style>