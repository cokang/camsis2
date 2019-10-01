
<?php if ( $this->input->get('parent') == 'assets' ){ 
	if ($this->input->get('tab') == 0){ ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.carousel-3d.default.css" />
	<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/daftspunk/css/font-autumn.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alertify.default.css" id="toggleCSS" />
	<meta name="viewport" content="width=device-width">
	<script src="<?php echo base_url(); ?>js/carousel/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/jquery.resize.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/waitforimages.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/modernizr.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/carousel-3d.js"></script>
	<script src="<?php echo base_url(); ?>js/alertify.min.js"></script>
		<div style="text-align: right;float: right;">
			<div class="wrapper-title"><?=$asset_UMDNS[0]->Type_Desc?>
			<?php $num = 0;$xxx = 0;?>
		  <?php if (($asset_images) && $datacount > 1 ) { ?> 
		  <div data-carousel-3d>
		  	<?php foreach ($asset_images as $row){ ?>
		  	<div class="divimgcarousel">
		  		<img src="<?php echo base_url(); ?>uploadassetimages/<?= $row->file_name ?>" name="filename<?= $row->file_name ?>" id="Img<?php echo $num++ ;?>" onclick="javascript:image('<?php echo base_url(); ?>uploadassetimages/<?= $row->file_name ?>');"/>
		  		<?php if ($datacount < 6) { ?>
				<span class="icon-plus-circle pluseimg" title="Add Image" onclick="getFile()"></span><span class="fa-minus-circle deleteimg" title="Delete Image" id="confirm" onclick="javascript:del('<?= $row->imageid ?>','<?=$this->input->get('asstno')?>','<?=$this->session->userdata('usersess')?>','<?=$this->session->userdata('hosp_code')?>');"></span>
				<?php } else { ?>
				<span class="icon-plus-circle pluseimg" title="Max Images Exceed" ></span><span class="fa-minus-circle deleteimg" id="my_image17" title="Delete Image" id="confirm" onclick="javascript:del('<?= $row->imageid ?>','<?=$this->input->get('asstno')?>','<?=$this->session->userdata('usersess')?>','<?=$this->session->userdata('hosp_code')?>');"></span>
				<?php } ?>
			</div>
		  	<?php } ?>
		  </div>
		  <?php } elseif (($asset_images) && $datacount == 1 ) { ?>
		  	<div class="divimgcar">
		  		<img src="<?php echo base_url(); ?>uploadassetimages/<?= $asset_images[0]->file_name ?>" class="imagenone"   id="Img<?php echo $num++ ;?>" onclick="javascript:image('<?php echo base_url(); ?>uploadassetimages/<?= $asset_images[0]->file_name ?>');"/>
		  		<span class="icon-plus-circle pluseimgnone" title="Add Image" onclick="getFile()" ></span>
		  		<span class="fa-minus-circle deleteimgnone" title="Delete Image" id="confirm" onclick="javascript:del('<?= $asset_images[0]->imageid ?>','<?=$this->input->get('asstno')?>','<?=$this->session->userdata('usersess')?>','<?=$this->session->userdata('hosp_code')?>');" ></span>
		  	</div>
		  <?php } else { ?>
		  	<div class="divimgcar">
			    <img src="<?php echo base_url(); ?>uploadassetimages/No_image_available.jpg" class="imagenone" selected/>
			    <span class="icon-plus-circle" title="Add Image" onclick="getFile()" style=" position: relative;color:black;display: block;font-size: 18px;opacity: .5;top:-50 ;"></span>
			</div>
		  <?php } ?>
		</div>
		<?php $hidden = array('name' => 'myForm');?>
		<?php echo form_open_multipart('contentcontroller/assetupdatepic?asstno='.$this->input->get('asstno').'&tab=0&parent=assets',$hidden); ?>
		<div id="assets-picture"></div>
		<div style="height: 0px;width: 0px; overflow:hidden;"><input id="upfile" type="file" value="upload" name="userfile" onchange="sub(this)"/></div>
		<div id="del-picture"></div>
		
				<!-- The Modal -->
				<div id="myModal" class="modal">
				  <span class="close">&times;</span>
				  <img class="modal-content" id="img01">
				  <div id="caption"></div>
				</div>
		</form>

<style>
.wrapper{
	padding-top: 10px;
	padding-bottom: 10px;
	width: 60%;
}
.wrapper-title{
	color: black;
	text-align: center;
	padding-bottom: 5px;
	display: block;
	font-weight: bold;
	float: left;
}
.button-image-asset{
	padding-bottom: 10px;
	display: block;
	text-align: center;
}
.button-image-asset span{
	padding: 5px;
	color: black;
	display: inline-block;
	width: 30px;
	font-size: 20px;
}
.button-image-asset span.fa-minus-circle{
	font-size: 24px;
}
 img.imagenone{
	height:100%;
	width:100%;
	display: block; 
	margin-left: auto; 
	margin-right: auto; 
	border: 5px solid #EE4000;
}
div.divimgcar{
	display: block;
	margin-right: auto;
	margin-left: auto;
	width: 60px; 
	height: 60px;
}
div.divimgcarousel{
	display: block;
	min-width: 320px; 
	min-height: 253px; 
	max-width: 320px; 
	max-height: 273px;
}
div.divimgcarousel img {
	height:100%;
	width:100%;
}
span.deleteimg{
	position: absolute;
	color:black;
	display: block;
	font-size: 50px;
	padding-top: 10px;
	opacity: .5;
	left:215px;
    top:190px;
}
span.pluseimg{
	position: absolute;
	color:black;
	display: block;
	font-size: 44px;
	padding-top: 10px;
	opacity: .5;
	left:270px;
    top:192px;
}
span.deleteimgnone{
	position: absolute;
	color:black;
	display: block;
	font-size: 21px;
	opacity: .5;
	left:150px;
    top:427px;
}
span.pluseimgnone{
	position: absolute;
	color:black;
	display: block;
	font-size: 18px;
	opacity: .5;
	left:170px;
    top:428px;
}
span.deleteimg:hover , span.deleteimgnone:hover{
	color:red;
	opacity: 1;
}
span.pluseimg:hover , span.pluseimgnone:hover{
	color:green;
	opacity: 1;
}
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

	<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption

//var img = document.getElementById('myImg0');
function image(e){
	//var img = document.getElementById(e);
	var modalImg = document.getElementById("img01");
	//var captionText = document.getElementById("caption");
	
//alert(e+'e');
//alert(captionText+'captionText');
//alert(modalImg+'modalImg');
//alert(e+'e');
	//img.onclick = function(){
	//alert(this.src);
	//alert(this.alt);
		modal.style.display = "block";
		//modalImg.src = this.src;
		modalImg.src = e;
		//captionText.innerHTML = e;
	//}
}


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<script>
		function reset () {
			$("#toggleCSS").attr("href", "<?php echo base_url(); ?>css/alertify.default.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 5000,
				buttonReverse : false,
				buttonFocus   : "ok"
			});
		}
		function del (imgid,asset,sess,hosp) {
			//var $del = del ;
			reset();
			alertify.confirm("Delete selected image?", function (e) {
				if (e) {
					alertify.success("You've clicked OK");
					window.location.href = "<?php echo site_url('contentcontroller/delpic');?>?imgid=" + imgid + "&assetno=" + asset + "&sess=" + sess + "&hosp=" + hosp;
					
					//var $img       = $($del),$container = $(".divimgcarousel");
					//$img.remove();
					//$container.html();
					//$container.removeClass().removeAttr("id");
				} else {
					alertify.error("You've clicked Cancel");
				}
			});
			return false;
		}
		
		// ==============================
		// Custom Themes
		$("#bootstrap").on( 'click', function () {
			reset();
			$("#toggleCSS").attr("href", "<?php echo base_url(); ?>css/alertify.bootstrap.css");
			alertify.prompt("Prompt dialog with bootstrap theme", function (e) {
				if (e) {
					alertify.success("You've clicked OK");
				} else {
					alertify.error("You've clicked Cancel");
				}
			}, "Default Value");
			return false;
		});
	</script>
	<script type="text/javascript">
	 function getFile(){
	 //alert("test");
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
	  function delFile(){
	 //alert("test");
	   //$(function(){
		 //$('#del-picture').on('click',function(){
		    window.location.href = "<?php echo site_url('contentcontroller/delpic'); ?>";
		 //});
		//});				
	 }
	</script>
<?php 	} ?>
<?php }elseif($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/assetlicenses_new/' || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/assetlicenses_confirm_updatesv/' || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/assetlicenses_detail/' || $this->input->get('parent') == 'license'){ ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.carousel-3d.default.css" />
	<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/daftspunk/css/font-autumn.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alertify.default.css" id="toggleCSS" />
	<meta name="viewport" content="width=device-width">
	<script src="<?php echo base_url(); ?>js/carousel/jquery.resize.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/waitforimages.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/modernizr.js"></script>
	<script src="<?php echo base_url(); ?>js/carousel/carousel-3d.js"></script>
	<script src="<?php echo base_url(); ?>js/alertify.min.js"></script>
		<div class="wrapper">
			<div class="wrapper-title"></div>
			<?php if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/assetlicenses_new/' || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/assetlicenses_confirm_updatesv/') { ?>
				<?php if ($licimg) { ?>
				<?php foreach($licimg as $row): ?>
					<div class="divimgcar">
						<img src="<?php echo base_url(); ?>uploadlicenseimages/<?=isset($row->file_name) ? $row->file_name : ''?>" class="imagenone" id="image" selected/>
						<?php if ($add != 0) { ?>
						<span class="icon-new pluseimgnone" title="Add Image" id="activateFile" ></span>
						<?php } ?>
						<!--<span class="fa-minus-circle deleteimgnone" title="Delete Image" id="confirm" onclick="javascript:del('z');" ></span>-->
					</div>
				<?php endforeach; ?>
				<?php } else if ($upload_data) { ?>
				  	<div class="divimgcar">
				  		<img src="<?php echo base_url(); ?>uploadlicenseimages/<?=$upload_data['file_name']?>" class="imagenone" id="image" selected/>
						<?php if ($add != 0) { ?>
				  		<span class="icon-plus-circle pluseimgnone" title="Add Image" id="activateFile" ></span>
						<?php } ?>	
				  		<!--<span class="fa-minus-circle deleteimgnone" title="Delete Image" id="confirm" onclick="javascript:del('z');" ></span>-->
				  	</div>
				<?php } else { ?>
				  	<div class="divimgcar" style="margin-bottom: 1%; float: right;">
					    <img src="<?php echo base_url(); ?>uploadlicenseimages/No_image_available.jpg" class="imagenone" id="image" selected/>
					    <?php if ($add != 0) { ?>
					    <span class="icon-plus-circle pluseimgnone" title="Add Image" id="activateFile" style=" position: relative;color:black;display: block;font-size: 18px;opacity: .5;top:-50 ;"></span>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } else { ?>
				<?php if ($licimg) { ?>
				<?php foreach($licimg as $row): ?>
					<div class="divimgcar">
						<img src="<?php echo base_url(); ?>uploadlicenseimages/<?=isset($row->file_name) ? $row->file_name : ''?>" class="imagenone" id="myImg" selected/>
						<!-- The Modal -->
						<div id="myModal" class="modal">
						  <span class="close">&times;</span>
						  <img class="modal-content" id="img01">
						  <div id="caption"></div>
						</div>
					</div>

				<?php endforeach; ?>
				<?php } else { ?>
					<div class="divimgcar">
					    <img src="<?php echo base_url(); ?>uploadlicenseimages/No_image_available.jpg" class="imagenone" id="image" selected/>
					</div>
				<?php } ?>
			<?php } ?>
		  <!--<div data-carousel-3d>
		  	<div class="divimgcarousel">
		  		<img src="<?php echo base_url(); ?>uploadlicenseimages/<?=$upload_data['file_name']?>" name="filename"/>
		  		<?php if ($datacount < 6) { ?>
				<span class="icon-plus-circle pluseimg" title="Add Image" onclick="getFile()"></span><span class="fa-minus-circle deleteimg" title="Delete Image" id="confirm" onclick="javascript:del('z');"></span>
				<?php } else { ?>
				<span class="icon-plus-circle pluseimg" title="Max Images Exceed" ></span><span class="fa-minus-circle deleteimg" id="my_image17" title="Delete Image" id="confirm" onclick="javascript:del('z');"></span>
				<?php } ?>
			</div>
		  </div>-->
		</div>
		<?php if ($error == 2){?>

		<?php echo form_open('contentcontroller/assetlicenses_new');?>
		<?php }elseif ($error == 1){ ?>
		
		<?php echo form_open('contentcontroller/confirmation_assetlicenses_updatesv');?>
		<?php }elseif ($error == 0){ ?>

		<?php $hidden = array('name' => 'myForm');?>
		<?php echo form_open_multipart('contentcontroller/assetlicenses_confirm_updatesv',$hidden); ?>
		<?php } ?>
		<div id="assets-picture"></div>
		<div style="height: 0px;width: 0px; overflow:hidden;"><input id="upfile" type="file" value="upload" name="userfile" id="upfile"/></div>
		<!--<div id="del-picture"></div>-->

<style>
.wrapper-title{
	color: black;
	text-align: center;
	padding-bottom: 5px;
	display: block;
	font-weight: bold;
	width:100%;
	float:left;
	text-align:right;
}
.button-image-asset{
	padding-bottom: 10px;
	display: block;
	text-align: center;
}
.button-image-asset span{
	padding: 5px;
	color: black;
	display: inline-block;
	width: 30px;
	font-size: 20px;
}
.button-image-asset span.fa-minus-circle{
	font-size: 24px;
}
 img.imagenone{
	height:100%;
	width:100%;
	display: block; 
	margin-left: auto; 
	margin-right: auto; 
	border: 5px solid #EE4000;
	
}
div.divimgcar{
	display: block;
	margin-left: auto;
	width: 60px; 
	height: 60px;
	float:left;
}
div.divimgcarousel{
	display: block;
	min-width: 320px; 
	min-height: 253px; 
	max-width: 320px; 
	max-height: 273px;
}
div.divimgcarousel img {
	height:100%;
	width:100%;
}
span.deleteimg{
	position: absolute;
	color:black;
	display: block;
	font-size: 50px;
	padding-top: 10px;
	opacity: .5;
	left:215px;
    top:190px;
}
span.pluseimg{
	position: absolute;
	color:black;
	display: block;
	font-size: 44px;
	padding-top: 10px;
	opacity: .5;
	left:270px;
    top:192px;
}
span.deleteimgnone{
	position: absolute;
	color:black;
	display: block;
	font-size: 21px;
	opacity: .5;
	left:150px;
    top:427px;
}

span.deleteimg:hover , span.deleteimgnone:hover{
	color:red;
	opacity: 1;
}
span.pluseimg:hover , span.pluseimgnone:hover{
	color:green;
	opacity: 1;
}
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<script>
		function reset () {
			$("#toggleCSS").attr("href", "<?php echo base_url(); ?>css/alertify.default.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 5000,
				buttonReverse : false,
				buttonFocus   : "ok"
			});
		}
		function del (imgid,asset,sess,hosp) {
			//var $del = del ;
			reset();
			alertify.confirm("Delete selected image?", function (e) {
				if (e) {
					alertify.success("You've clicked OK");
					window.location.href = "<?php echo site_url('contentcontroller/delpic');?>?imgid=" + imgid + "&assetno=" + asset + "&sess=" + sess + "&hosp=" + hosp;
					
					//var $img       = $($del),$container = $(".divimgcarousel");
					//$img.remove();
					//$container.html();
					//$container.removeClass().removeAttr("id");
				} else {
					alertify.error("You've clicked Cancel");
				}
			});
			return false;
		}
		
		// ==============================
		// Custom Themes
		$("#bootstrap").on( 'click', function () {
			reset();
			$("#toggleCSS").attr("href", "<?php echo base_url(); ?>css/alertify.bootstrap.css");
			alertify.prompt("Prompt dialog with bootstrap theme", function (e) {
				if (e) {
					alertify.success("You've clicked OK");
				} else {
					alertify.error("You've clicked Cancel");
				}
			}, "Default Value");
			return false;
		});
	</script>
	<script type="text/javascript">
	$("#activateFile").on('click', function(){
	   $("#upfile").click();
	  });
	 $("#upfile").change(function(){
	    readURL(this);
	  });

	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
		reader.onload = function (e) {
		  $('#image').attr('src', e.target.result)
	    };
	  reader.readAsDataURL(input.files[0]);
	  }
	}
	 function getFile(){
	 //alert("test");
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
	  function delFile(){
	 //alert("test");
	   //$(function(){
		 //$('#del-picture').on('click',function(){
		    window.location.href = "<?php echo site_url('contentcontroller/delpic'); ?>";
		 //});
		//});				
	 }
	</script>
	<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<?php 	} ?>