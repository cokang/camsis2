<?php if ('contentcontroller/sys_admin/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ ?>
    <?php if ($this->input->get('gbl') == 2){?>
 <script>
 
 
 function fLabour(a)
		{
			//var parent = a.getAttribute('value');
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_syslabour";
		
	}
	else {
		echo "contentcontroller/pop_syslabour";
		
	}?>', '', winProp);
			Win.window.focus();
		}
</script>
	<?php }elseif($this->input->get('ec') == 2){ ?>
	 <script>
 function fsystemcode(a){
//var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_systemcode";
		
	}
	else {
		echo "contentcontroller/pop_systemcode";
		
	}?>', '', winProp);
			Win.window.focus();
		}
function fchecklist(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_checklist";
		
	}
	else {
		echo "contentcontroller/pop_checklist";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
function fWorkgroup(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_fWorkgroup";
		
	}
	else {
		echo "contentcontroller/pop_fWorkgroup";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
		
</script>
<?php }elseif($this->input->get('jt') == 2){ ?>
<script>
function fchecklist(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_checklist";
		
	}
	else {
		echo "contentcontroller/pop_checklist";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
function fEquipment(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_fEquipment";
		
	}
	else {
		echo "contentcontroller/pop_fEquipment";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
function fType(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_fType";
		
	}
	else {
		echo "contentcontroller/pop_fType";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
function fProcedure(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_fProcedure";
		
	}
	else {
		echo "contentcontroller/pop_fProcedure";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
</script>
<?php }elseif($this->input->get('ud') == 2){ ?>	
<script>
function mohcode(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "mohcode";
		
	}
	else {
		echo "contentcontroller/mohcode";
		
	}?>', '', winProp);
			Win.window.focus();
		}
</script>
	<?php } ?>
<?php }elseif($this->uri->slash_segment(2) == 'updatecommissioning/'){ ?>	
<script>
function fRequest12(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_fRequest12";
		
	}
	else {
		echo "contentcontroller/pop_fRequest12";
		
	}?>', '', winProp);
			Win.window.focus();
		}
</script>
<?php }elseif($this->uri->slash_segment(2) == 'fail_bank/'){ ?>	
<script>
function fbank(a,b){
//var parent = a.getAttribute('value');
//var docid = b.getAttribute('value');
winProp = 'width=500,height=100,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_fail";
		
	}
	else {
		echo "contentcontroller/pop_fail";
		
	}?>?assetno='+a+'&docid='+b+'', '', winProp);
			Win.window.focus();
		}
</script>
<?php }elseif($this->uri->slash_segment(2) == 'chronologyupdate/'){ ?>
<script>
function fCalldetailname(a)
		{
			var parent = a.getAttribute('value');
			//var hour = hour;
			//var minute = minute;
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "assetdetailname";

	}
	else {
		echo "contentcontroller/assetdetailname";

	}?>?parent='+parent, 'assetdetailname', winProp);
			Win.window.focus();
		}
</script>
<?php }elseif(($this->uri->slash_segment(1) == 'Procurement/') or ( $this->uri->slash_segment(1) == 'mrinnew_ctrl/')){ ?>
		<?php if(($this->input->get('pro') == 'new') or ($this->input->get('pr') == 'pending') or ($this->input->get('pro') == 'edit')){ ?>
<script>
function pecodes3(id)
{
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pecodes";
		
	}
	else {
		echo "contentcontroller/pecodes";
		
	}?>?mrin=yes&hosp=<?=$this->session->userdata('hosp_code');?>&id='+id, 'assetnumber', winProp);//change hosp to session
	Win.window.focus();
}
function fCallRequestA(){
	var assno = document.getElementById("n_assetnumber");
	winProp = 'width=' + screen.width + ',height=' + screen.height + ',left=,top=,menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
		if (assno.value != ''){
		Win = window.open("<?php if ($this->uri->slash_segment(1) == 'contentcontroller/') { echo "assetupdate";} else { echo "contentcontroller/assetupdate"; }?>?asstno="+assno.value , "AssetDetails", winProp);
		Win.window.focus();
		} else {
		alert('Please Choose Workorder..');
		}
}
function pop_requests(a){
	var value = a.getAttribute('value');
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(1) == 'contentcontroller/') { echo "pop_requests"; } else { echo "contentcontroller/pop_requests"; }?>?p='+value, 'assetnumber', winProp);
	Win.window.focus();
}
function fCallLocationa(mrinno,tag){
	winProp = 'width=450,height=270,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(2) != 'e_pr/') { echo "Procurement/asset3_comm_new";} else { echo "asset3_comm_new"; }?>?mrinno=' + mrinno + '&act=addnew' + '&tag=' + tag, 'Location', winProp);
	Win.window.focus();
	}
function fCallitem(){
	var table = document.getElementById("myTable");
	var rows = document.getElementById("myTable").getElementsByTagName("tr").length;
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);
	var cell7 = row.insertCell(6);
	<?php if ($this->input->get('pro') != 'edit') { ?>
	var cell8 = row.insertCell(7);
	var cell9 = row.insertCell(8);
	<?php } ?>
	
    cell1.innerHTML = rows+'<input type="hidden" name="rows" value="'+rows+'">';
    cell2.innerHTML = '<p id="itemcode'+rows+'"></p><input type="hidden" id="itemcodei'+rows+'" name="itemcode'+rows+'" value="">';
    cell3.innerHTML = '<div id="itemname'+rows+'" style="display:inline-block; padding-right:5px;"></div><span class="icon-windows" style="display:inline-block;" onclick="pecodes3('+rows+')"></span>';
	cell4.innerHTML = '<input type="text" name="n_qty'+rows+'" value="" class="form-control-button2" style=width:100px;">';
	cell5.innerHTML = '<select name="a_rem'+rows+'" class="dropdown"><option value="" selected="selected">None</option><option value="1">Mishandling</option><option value="2">Supplementary</option><option value="3">Upgrading</option><option value="4">Re-Installation</option><option value="5">Other</option></select>'; 	
	cell6.innerHTML = '<INPUT TYPE="text" name="startDate'+rows+'" class="form-control-button2" style=width:100px;" onChange="validDate(this)">';
	cell7.innerHTML = '<input type="text" name="n_discount'+rows+'" value="" class="form-control-button2" style=width:100px;">';
	<?php if ($this->input->get('pro') != 'edit') { ?>
	cell8.innerHTML = '<input type="text" name="n_price'+rows+'" id="n_price'+rows+'" value="" class="form-control-button2" style=width:100px;"><span class="icon-windows" style="display:inline-block; padding-left:5px;" id="itemc'+rows+'" onclick="fCallpricexx(\'n_price'+rows+'\',\'vendor'+rows+'\', this.value)" value=""></span>';
	cell9.innerHTML = '<p id="vendor'+rows+'"></p><input type="hidden" id="vendori'+rows+'" name="vendor'+rows+'" value="">';
	<?php } ?>
	
}
function validDate(fld) {
    var testMo, testDay, testYr, inpMo, inpDay, inpYr, msg
    var inp = fld.value
    status = ""
    // attempt to create date object from input data
    var testDate = new Date(inp)
    // extract pieces from date object
    testMo = testDate.getMonth() + 1
    testDay = testDate.getDate()
    testYr = testDate.getFullYear()
    // extract components of input data
    inpMo = parseInt(inp.substring(0, inp.indexOf("/")), 10)
    inpDay = parseInt(inp.substring((inp.indexOf("/") + 1), inp.lastIndexOf("/")), 10)
    inpYr = parseInt(inp.substring((inp.lastIndexOf("/") + 1), inp.length), 10)
    // make sure parseInt() succeeded on input components
    if (isNaN(inpMo) || isNaN(inpDay) || isNaN(inpYr)) {
        msg = "There is some problem with your date entry."
    }
    // make sure conversion to date object succeeded
    if (isNaN(testMo) || isNaN(testDay) || isNaN(testYr)) {
        msg = "Couldn't convert your entry to a valid date. Try again."
    }
    // make sure values match
    if (testMo != inpMo || testDay != inpDay || testYr != inpYr) {
        msg = "Check the range of your date format MM/DD/YYYY."
    }
    if (msg) {
        // there's a message, so something failed
        alert(msg)
        // work around IE timing problem with alert by
        // invoking a focus/select function through setTimeout();
        // must pass along reference of fld (as string)
        setTimeout("doSelection(document.forms['" + 
        fld.form.name + "'].elements['" + fld.name + "'])", 0)
        return false
    } else {
        // everything's OK; if browser supports new date method,
        // show just date string in status bar
        status = (testDate.toLocaleDateString) ? testDate.toLocaleDateString() : 
            "Date OK"
        return true
    }
}
// separate function to accommodate IE timing problem
function doSelection(fld) {
    fld.focus()
    fld.select()
}
function fCallLocatioaxox() {
    alert();
}
function fCallitemxx(name,code){
	var url		=	'<?php echo base_url ('index.php/Procurement/pop_item') ?>?name='+name+'&code='+code;
	winProp = 'width=1050,height=370,left=' + ((screen.width - 1050) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open(url, 'Location', winProp);
	Win.window.focus();
}
function fCallpricexx(price,vendor,itemcode){
	var url		=	'<?php echo base_url ('index.php/Procurement/pop_price') ?>?price='+price+'&vendor='+vendor+'&itemcode='+itemcode;
	winProp = 'width=1050,height=370,left=' + ((screen.width - 1050) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open(url, 'Location', winProp);
	Win.window.focus();
}
function fCallLocatioa(pono,tag,payment_no)
	{
		setTimeout(function() {
			var url		=	'<?php echo base_url ('index.php/ajaxproc') ?>?option=pono&pono='+pono+'&tag='+tag;
	 		document.getElementById('spcomma'+tag).innerHTML = '';
			$('#spcomma'+tag).load(url);
	 		document.getElementById('trcomma'+tag).style.display='block';
	 		if (tag == 'component') {
	 		document.getElementById('spcomponent').style.display='none';
	 		}
	 		else {
	 		document.getElementById('spcommaattachment').style.display='none';
	 		}
		document.body.style.cursor='default';
		} ,300);

	}
	function fCallLocatiod(mrinno, id, tag)
	{
		var url		=	'<?php echo base_url ('index.php/Procurement/asset3_comm_new') ?>?mrinno='+mrinno+'&id='+id+'&act=delete'+'&tag='+tag;
 		//document.getElementById('spcomma').innerHTML = '';
		//$('#spcomma').load(url);
 		///document.getElementById('trcomma').style.display='block';
		//document.body.style.cursor='default';
		winProp = 'width=450,height=270,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
		Win = window.open(url, 'Location', winProp);
		Win.window.focus();
 			
	}
	function fCallLocatioe(mrinno, id, tag)
	{
		var url		=	'<?php echo base_url ('index.php/Procurement/asset3_comm_new') ?>?mrinno='+mrinno+'&id='+id+'&act=update'+'&tag='+tag;
 		//document.getElementById('spcomma').innerHTML = '';
		//$('#spcomma').load(url);
 		///document.getElementById('trcomma').style.display='block';
		//document.body.style.cursor='default';
		winProp = 'width=450,height=270,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
		Win = window.open(url, 'Location', winProp);
		Win.window.focus();
 			
	}
	function pop_asset_maint_history(assettag, assetno){
	winProp = 'width=700,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	if(assetno!=''){
	Win = window.open('contentcontroller/pop_maint_history?assettag='+assettag+'&assetno='+assetno, 'assetnumber', winProp);
	Win.window.focus();
	}else
				{
				alert('Please Choose Workorder..');
				}
	}
</script>
<?php }elseif(($this->input->get('po') == 'update') and ($this->input->get('pr') == 'pen')){ ?>
<script>
function fCalldetailname(a)
		{
			var parent = a.getAttribute('value');
			//var hour = hour;
			//var minute = minute;
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'Procurement/') {
	echo "assetdetailname";
		
	}
	else {
		echo "contentcontroller/assetdetailname";
		
	}?>?pr='+parent, 'assetdetailname', winProp);
			Win.window.focus();
		}
</script>

<?php }elseif($this->input->get('pro') != '' || $this->input->get('pr') != ''){ ?>
<script>
function fkmrin(a)
		{
			var parent = a.getAttribute('value');
  		        var parentx = a.getAttribute('valuex');
			winProp = 'width=1200,height=500,left=' + ((screen.width - 1200) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			//Win = window.open('contentcontroller/assetupdate?asstno='+parent+'&tab=0&parent=assets', 'assetdetailname', winProp);
			Win = window.open('contentcontroller/assetupdate?asstno='+parent+'&tab=0&parent=assets&mrinhosp='+parentx, 'assetdetailname', winProp);
			Win.window.focus();
		}
function fCallpricexx(price,itemcode){
	var url		=	'<?php echo base_url ('index.php/Procurement/pop_price') ?>?price='+price+'&itemcode='+itemcode+'&pro=pending';
	winProp = 'width=1050,height=370,left=' + ((screen.width - 1050) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open(url, 'Location', winProp);
	Win.window.focus();
}
function pop_store(a, b, c, d, e){
  //var http = new XMLHttpRequest();
//alert("I am an alert box!"+a);
	//var value = a.getAttribute('value');
	if (confirm("Use store item!")) {
        //alert("I am an alert box!"+a);
				//http.open('get', 'ajaxstore?itemcd='+a+'&mirncd='+b+'&wo='+c+'&sQtyb='+d+'&sQtyt='+e, true);
  	// Send the XMLHttpRequest
    	  //http.send(null);
				$.post("<?php echo base_url('index.php/ajaxstore'); ?>",
        {
          itemcd: a,
          mirncd: b,
          wo: c,
          sQtyb: d,
          sQtyt: e
        },
        function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
        });
				alert('Stock Used');
				window.location.reload();
    } else {
        alert("U press cancel!!");
    }
}
</script> 
<?php } ?>
<?php } elseif(($this->uri->slash_segment(1).$this->uri->slash_segment(2) == 'contentcontroller/bar_code/') or ( $this->uri->slash_segment(1) == 'mrinnew_ctrl/')){ ?>
<script>
function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
function searchKeyPress(e)
{
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {//alert("lalalallazzzzzzzzzzz");
		
		e.preventDefault();
		
		var nilai = document.getElementById('n_barput').value;
		var textcontrol = document.getElementById("n_barput");
    textcontrol.value = "";
		
		
		var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        //alert(this.responseText); //Will alert: 42
				var data = JSON.parse(this.responseText);
				//alert(data.ItemCode)
				//alert(data.Price);
				//alert(data.ItemName);
				//alert("lalalallazzzzzzzzzzz" + nilai);
		var table = document.getElementById("myTable");
	var rows = document.getElementById("myTable").getElementsByTagName("tr").length;
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);
	<?php if ($this->input->get('pro') != 'edit') { ?>
	var cell7 = row.insertCell(6);
	var cell8 = row.insertCell(7);
	<?php } ?>
    cell1.innerHTML = rows+'<input type="hidden" name="rows" value="'+rows+'"><input type="hidden" name="itemcode7'+rows+'" value="'+data.Price+'"><input type="hidden" name="itemcode8'+rows+'" value="'+data.ItemName+'"><input type="hidden" name="itemcode'+rows+'" value="'+data.ItemCode+'">';
		cell2.innerHTML = '<p id="itemcode'+rows+' value="'+data.ItemCode+'">'+data.ItemCode+'</p>';
		cell3.innerHTML = '<div id="itemcode2'+rows+'" style="display:inline-block; padding-right:5px;">'+data.ItemName+'</div>';
		<?php if ($this->input->get('bcwhat') != 'add') { ?>
		cell4.innerHTML = '<p id="itemcode3'+rows+' value="'+data.Qty+'">'+data.Qty+'</p><input type="hidden" id="itemcode3'+rows+'" name="itemcode3'+rows+'" value="'+data.Qty+'">';
		<?php } else {?>
		cell4.innerHTML = '<INPUT TYPE="text" name="itemcode9'+rows+'" value="" class="form-control-button2" style=width:100px;"><input type="hidden" name="itemcode3'+rows+'" value="'+data.Qty+'">';
		<?php } ?>
	cell5.innerHTML = '<input type="text" name="itemcode4'+rows+'" value="" class="form-control-button2" style=width:100px;">';	
	cell6.innerHTML = '<INPUT TYPE="text" name="itemcode5'+rows+'" class="form-control-button2" style=width:100px;">';
	
	cell7.innerHTML = '<input type="text" name="itemcode6'+rows+'" id="itemcode6'+rows+'" value="" class="form-control-button2" style=width:100px;"><!--<span class="icon-windows" style="display:inline-block; padding-left:5px;" id="itemc'+rows+'" onclick="fCallpricexx(\'n_price'+rows+'\',\'vendor'+rows+'\', this.value)" value=""></span>-->';
	cell8.innerHTML = '<p id="vendor'+rows+'"></p><span class="" style="display:inline-block; padding-left:5px;" id="itemc'+rows+'" onclick="deleteRow(this)" value=""><img class="manImg" src="<?=base_url()?>images/trash-can.jpg" height="42" width="42"></img></span>';
	
	
        //document.getElementById('btnSearch').click();
        return false;
    };
    oReq.open("get", "<?php echo base_url ('index.php/ajaxjson?itemape=') ?>"+nilai, true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
		
		
		//tmpt asal
    }
    return true;
}
 
function fCallitem(){
	 e = e || window.event;
    if (e.keyCode == 13)
    {alert("lalalalla");
		
				var table = document.getElementById("myTable");
	var rows = document.getElementById("myTable").getElementsByTagName("tr").length;
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);
	<?php if ($this->input->get('pro') != 'edit') { ?>
	var cell7 = row.insertCell(6);
	var cell8 = row.insertCell(7);
	<?php } ?>
	var cell9 = row.insertCell(8);
    cell1.innerHTML = rows+'<input type="hidden" name="rows" value="'+rows+'">';
    cell2.innerHTML = '<p id="itemcode'+rows+'"></p><input type="hidden" id="itemcodei'+rows+'" name="itemcode'+rows+'" value="">';
    cell3.innerHTML = '<div id="itemname'+rows+'" style="display:inline-block; padding-right:5px;"></div><span class="icon-windows" style="display:inline-block;" onclick="fCallitemxx(\'itemname'+rows+'\',\'itemcode'+rows+'\')"></span>';
	cell4.innerHTML = '<input type="text" name="n_qty'+rows+'" value="" class="form-control-button2" style=width:100px;">';
	cell5.innerHTML = '<select name="a_rem'+rows+'" class="dropdown"><option value="" selected="selected">None</option><option value="1">Mishandling</option><option value="2">Supplementary</option><option value="3">Upgrading</option><option value="4">Re-Installation</option><option value="5">Other</option></select>'; 	
	cell6.innerHTML = '<INPUT TYPE="text" name="startDate'+rows+'" class="form-control-button2" style=width:100px;" onChange="validDate(this)">';
	<?php if ($this->input->get('pro') != 'edit') { ?>
	cell7.innerHTML = '<input type="text" name="n_price'+rows+'" id="n_price'+rows+'" value="" class="form-control-button2" style=width:100px;"><span class="icon-windows" style="display:inline-block; padding-left:5px;" id="itemc'+rows+'" onclick="fCallpricexx(\'n_price'+rows+'\',\'vendor'+rows+'\', this.value)" value=""></span>';
	cell8.innerHTML = '<p id="vendor'+rows+'"></p><input type="hidden" id="vendori'+rows+'" name="vendor'+rows+'" value="">';
	<?php } ?>	
	cell9.innerHTML = '<input type="text" name="n_discount'+rows+'" value="" class="form-control-button2" style=width:100px;">';	
		
        //document.getElementById('btnSearch').click();
        return false;
    }
    return true;
				 
				 
	
}
</script> 
<?php } else{ ?>
<script>
function fchecklist(a){
var parent = a.getAttribute('value');
winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_checklist";
		
	}
	else {
		echo "contentcontroller/pop_checklist";
		
	}?>?id='+parent+'', '', winProp);
			Win.window.focus();
		}
function fCallVendor()
		{
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/E_Code', 'Vendor', winProp);
			Win.window.focus();
		}
function fCalllocation(value,object = false)
		{
		//alert(value);
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "location";
		
	}
	else {
		echo "contentcontroller/location";
		
	}?>?parent='+value, 'location', winProp);
			Win.window.focus();
		}
function rel()
		{
			var span_Text = document.getElementById("n_location").value;
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "relworkorder";
		
	}
	else {
		echo "contentcontroller/relworkorder";
		
	}?>?loc='+span_Text, 'location', winProp);
			Win.window.focus();
			
		}
function fCalltc_r_number()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/tc_r_number', 'tc_r_number', winProp);
			Win.window.focus();
		}
function fCallpop_vendor(a)
		{
			var parent = a.getAttribute('value');
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_vendor";
		
	}
	else {
		echo "contentcontroller/pop_vendor";
		
	}?>?parent='+parent+'', 'location', winProp);
			Win.window.focus();
		}
function fCallpop_vendor2()
{
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('pop_vendor', 'pop_vendor', winProp);
	Win.window.focus();
}
function fCalldetailname(a,hour,minute)
		{
			var parent = a.getAttribute('value');
			//var hour = hour;
			//var minute = minute;
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "assetdetailname";
		
	}
	else {
		echo "contentcontroller/assetdetailname";
		
	}?>?parent='+parent+'&hour='+hour+'&minute='+minute, 'assetdetailname', winProp);
			Win.window.focus();
		}
		function fCallassetdetailname(a)
		{
			var parent = a.getAttribute('value');
			//var hour = hour;
			//var minute = minute;
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			//alert('nilai <?=$this->uri->slash_segment(1).' dan '.$this->uri->slash_segment(2)?>');
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "assetdetailname";
		
	}elseif (($this->uri->slash_segment(1) != 'contentcontroller/') && ($this->uri->slash_segment(2) != '/')){
	echo "../contentcontroller/assetdetailname";
	}
	else {
		echo "contentcontroller/assetdetailname";
		
	}
	?>?parent='+parent, 'assetdetailname', winProp);
			Win.window.focus();
		}
function fCallR_number()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/R_number', 'R_number', winProp);
			Win.window.focus();
		}
function fCallassetsnumber(a)
		{
			var parent = a.getAttribute('value');
			winProp = 'width=1200,height=500,left=' + ((screen.width - 1200) / 2) +',top=' + ((screen.height - 600) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "assetnumber";
		
	}
	else {
		echo "contentcontroller/assetnumber";
		
	}?>?parent='+parent, 'assetnumber', winProp);
			Win.window.focus();
		}
function flink(m,y)
		{
			//var parent = a.getAttribute('value');
			//var month = m.getAttribute('value');
			//var year = y.getAttribute('value');
			winProp = 'width=1200,height=500,left=' + ((screen.width - 1200) / 2) +',top=' + ((screen.height - 600) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_link";
		
	}
	else {
		echo "contentcontroller/pop_link";
		
	}?>?m='+m+'&y='+y, 'assetnumber', winProp);
			Win.window.focus();
		}
function fCallIdentification_Type()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('Identification_Type', 'assetnumber', winProp);
			Win.window.focus();
		}
function fCallpop_Agency_Code()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('pop_Agency_Code', 'assetnumber', winProp);
			Win.window.focus();
		}
function fCallpop_Job_Type()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('pop_Job_Type', 'assetnumber', winProp);
			Win.window.focus();
		}
function fCallpop_Checklist_Code()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('pop_Checklist_Code', 'assetnumber', winProp);
			Win.window.focus();
		}
function fpop_location_user()
{
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_location_user";
		
	}
	else {
		echo "contentcontroller/pop_location_user";
		
	}?>', 'assetnumber', winProp);
	Win.window.focus();
}
function pecodes()
{
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pecodes";
		
	}
	else {
		echo "contentcontroller/pecodes";
		
	}?>?hosp=<?php echo $this->input->get('id');?>', 'assetnumber', winProp);//change hosp to session
	Win.window.focus();
}
function pecodes2()
{
	var assno = document.getElementById("n_agent");
			if (assno.value != '')
				{
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pecodes2";
		
	}
	else {
		echo "contentcontroller/pecodes2";
		
	}?>?ic='+assno.value , 'assetnumber', winProp);
	Win.window.focus();
	}
				else
				{
				alert('Please Choose Equipment First..');
				}
}
function pop_requests(a)
{
var value = a.getAttribute('value');
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_requests";
		
	}
	else {
		echo "contentcontroller/pop_requests";
		
	}?>?p='+value, 'assetnumber', winProp);
	Win.window.focus();
}
function Schduler(a)
		{
			var assno = a.getAttribute('value');
			winProp = 'width=1300,height=600,left=' + ((screen.width - 1300) / 2) +',top=' + ((screen.height - 700) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "p_Schduler";
		
	}
	else {
		echo "contentcontroller/p_Schduler";
		
	}?>?loct='+assno, 'location', winProp);
			Win.window.focus();
		}
	function popauthority()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "pop_authority";
		
	}
	else {
		echo "contentcontroller/pop_authority";
		
	}?>', '', winProp);
			Win.window.focus();
		}
function fCallRequestA()
		{
			var assno = document.getElementById("n_assetnumber");
			winProp = 'width=' + screen.width + ',height=' + screen.height + ',left=,top=,menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
				if (assno.value != '')
				{
				Win = window.open("<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "assetupdate";
		
	}
	else {
		echo "contentcontroller/assetupdate";
		
	}?>?asstno="+assno.value , "AssetDetails", winProp);
				Win.window.focus();
				}
				else
				{
				alert('Please Choose Workorder..');
				}
}

	function fCallCmisPhoto(wo,tag){
	winProp = 'width=450,height=270,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(2) != 'e_pr/') { if($this->uri->slash_segment(1) != 'rootcause_ctrl/'){ echo "rootcause_image";}else{echo "contentcontroller/rootcause_image";}} else { echo "asset3_comm_new"; }?>?wo=' + wo + '&act=addnew' + '&tag=' + tag, 'Location', winProp);
	Win.window.focus();
	}
	function fCallCmisPhotoDel(wo, id, tag)
	{
		var url		=	'<?php echo base_url ('index.php/contentcontroller/rootcause_image') ?>?wo='+wo+'&id='+id+'&act=delete'+'&tag='+tag;
		winProp = 'width=450,height=270,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
		Win = window.open(url, 'Location', winProp);
		Win.window.focus();
 			
	}
	function fCallCmisPhotoEdit(wo, id, tag)
	{
		var url		=	'<?php echo base_url ('index.php/contentcontroller/rootcause_image') ?>?wo='+wo+'&id='+id+'&act=update'+'&tag='+tag;
		winProp = 'width=450,height=270,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
		Win = window.open(url, 'Location', winProp);
		Win.window.focus();
 			
	}
	function refresh_cmisphoto(wo,tag)
	{
		setTimeout(function() {
			var url		=	'<?php echo base_url ('index.php/ajaxrootcause') ?>?wo='+wo+'&tag='+tag;
	 		document.getElementById('spcomma'+tag).innerHTML = '';
			$('#spcomma'+tag).load(url);
	 		document.getElementById('trcomma'+tag).style.display='block';
	 		if (tag == 'CMIS') {
	 		document.getElementById('spcmis').style.display='none';
			 document.getElementById('addcmis').style.display='none';
	 		}
	 		else {
	 		document.getElementById('spphoto').style.display='none';
	 		}
		document.body.style.cursor='default';
		} ,300);
 			
	}
</script>
<?php } ?>