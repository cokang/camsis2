<html>
<head>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/iconcam.png" type="image/x-icon" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ias.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/modernizr.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<link rel='stylesheet' type='text/css' media='all' href="<?php echo base_url(); ?>css/jquery-ui-1.10.0.custom.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ias.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/modernizr.js"></script>
<script>
 $(document).ready(function() {
$("#date0,#date1,#date2,#date3,#date4,#date5,#date6,#date7,#date8,#date9,#date10,#date11,#date12,#date13,#date14,#date15").datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>
<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>all-ie-only.css" />
<![endif]-->
<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>css/animsition.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/animsition.min.js"></script>
<link rel='stylesheet' type='text/css' media='all' href="<?php echo base_url(); ?>css/styleprinter.css">
<link rel="stylesheet" type='text/css' media='all' href="<?php echo base_url(); ?>icon/style.css">
<style type="text/css" media="print">

	html {border:0px solid red;margin:0;}
	body {border:0px solid red;font-size:1px;margin:0px;}
	div.body{
		border:0px solid red;   
		font-size:1px; 
		margin:0px;
		display: 
		block;
	}
	@page {	margin:0.5cm 0.5cm 0.5cm 0.5cm; }


	a{text-decoration: none;}
	div.page {
		position:absolute;
		margin:6% 1% 0% 1%;
		size:A4;
	}
	div.pagewn {
		position:absolute;
		margin:8% 10% 0% 10%;
		size:A4;
	}
	div.StartNewPage { page-break-before: always	}	

	div#divpagebreak {display:none;}

	hr#hrpagebreak {display:none;}


	#pagebreak {display:none;}

	#Instruction {display:none;}
	.tbl-wo-1 tr .tbl-wo-data2{width: 30%;}
	textarea.xxtextareaxx{font-size:9px;}
	td.tbl-wo-data{width: 25%;}
	table.tbl-wo-1 tr td , table.tbl-wo tr td{font-size: 12px;}
	table.tbl-wo tr .ui-td-tulis{
		font-size:6px;
	}
	table.tbl-wo tr .ui-td-size{
		width: 43.6%;
	}
	table.tbl-wo tr .ui-td-size2{
		width: 50%;
	}
	table.tbl-wo tr .td-solid3{
		border-bottom:1px solid black;
		width: 25%;
		border-width: 1px;padding: 5px;
	}
	table.tbl-wo tr .td-size{
		width: 15%;
	}
	table.tbl-wo tr .td-size2{
		width: 25%;
	}
	.noprint {display:none;}
	.tbl-wo-2 tr td {
		font-size: 14px;
	}
	.rport-content2 tr .td-r{
		font-size: 10px;
	}
	.rport-content2 tr td{
		font-size: 10px;
	}
	table.tbl-wo th {
		color:white;
		background: black;
		font-size: 10px;
	}
	/*table font*/
	/*table.tftabler th {font-size:8px;}
	table.tftabler tr td {font-size:7.5px;}*/
	table.tftabler th {font-size:12px;}
	table.tftabler tr td {font-size:12px;}
	
	.td-class{width:40%;}
	.td-class2{width:30%;}
	table.wnctable{
		border:1px solid black;
		width: 96%;
	}
	table.wnctable th{
		font-size: 10px;
		border:1px solid black;
		}
	.B-sign{
		border-bottom:1px solid black;
		width: 100px;
		margin-left:5px;
		}
	.f-span{
		margin-right:13%;
	}
	.tbl-wo tr .ui-td-kk{
		background:black;
		color:white;
		width: 100px;
	}
	.tbl-wo tr .ui-td-kkm{
		width: 15%;
	}
	table.tbl-wo tr .td-solid{
		border-bottom:1px solid black;
		width: 85%;
	}
	.tbl-wo tr .ui-td-kkm2{width: 45%;}
	table.tbl-wo tr td.tbl-wo-vovf{
		font-size: 12px;
		line-height: 1.2;
	}
	span.tblbox{
		width: 100px;
		height: 15px;
	}
	td.tbl-tls-font{
		font-size:15px;
	}
	table.tbl-wo-vff tr td b{
		font-size: 12px;
	}
	table.tablevvf {font-size: 10px;}
	/*table.tftable th {font-size:1px; padding:4px;}*/
	table.tftable th {font-size:8px; padding:4px;}
	table {	border-collapse: collapse;border-spacing:0px;	}
	table.tftable td  { 
		font-size:8px;  
		padding:1px; 
		word-wrap: break-word;
		margin-bottom:0px;
		margin-left:0px;
		margin-right:0px;
		margin-top:0px;
	}
		
	table#adtable td  {
		font-size:12px;
		padding:1px; 
		word-wrap: break-word;
		margin-bottom:0px;
		margin-left:0px;
		margin-right:0px;
		margin-top:0px;
		height: 35px;
	}
		
	table#tblwo td  { 	font-size:10px;  padding:1px; word-wrap: break-word;	}
			
	table#adtable th {font-size:11px; padding:4px;}

			
	.tb-class{
		height: 10px;
	}
	table.tbl-wovvf{
		width: 100%;
	}		
	table.tftable2 tr.greyii th.td-r{
		font-size: 10px;
	}
	table.tftable2 tr td{
		font-size: 10px;
	}
	.icon-green,.icon-yellow,.icon-red{
		background:green;
		color:black;
	}
	.tbl-is tr:nth-child(2){
		font-size: 10px;
	}
	div.closed{
		display: none;
	}
	.box2 {
		width: 5px;
		height: 5px;
	}
	.img-tick{ height: 10px; width: 10px;position:absolute; margin-top:-3px;margin-left:-2px;}
	.container {
		overflow: auto;
		display:initial;
	}
	#constrainer,.scrolltable,.bodytd  {
		overflow: none;
		height: initial;
		display: initial;
	}
	.header-alr tr th:nth-child(4) ,.tbl-fixed-td td:nth-child(4){width:299px;}
	.header-alr tr th:nth-child(8) ,.tbl-fixed-td td:nth-child(8),
	.header-alr tr th:nth-child(9) ,.tbl-fixed-td td:nth-child(9),
	.header-alr tr th:nth-child(10) ,.tbl-fixed-td td:nth-child(10),
	.header-alr tr th:nth-child(11) ,.tbl-fixed-td td:nth-child(11),
	.header-alr tr th:nth-child(12) ,.tbl-fixed-td td:nth-child(12),
	.header-alr tr th:nth-child(13) ,.tbl-fixed-td td:nth-child(13),
	.header-alr tr th:nth-child(14) ,.tbl-fixed-td td:nth-child(14),
	.header-alr tr th:nth-child(15) ,.tbl-fixed-td td:nth-child(15),
	.header-alr tr th:nth-child(16) ,.tbl-fixed-td td:nth-child(16),
	.header-alr tr th:nth-child(17) ,.tbl-fixed-td td:nth-child(17),
	.header-alr tr th:nth-child(18) ,.tbl-fixed-td td:nth-child(18),
	.header-alr tr th:nth-child(19) ,.tbl-fixed-td td:nth-child(19),
	.header-alr tr th:nth-child(20) ,.tbl-fixed-td td:nth-child(20),
	.header-alr tr th:nth-child(21) ,.tbl-fixed-td td:nth-child(21),
	.header-alr tr th:nth-child(22) ,.tbl-fixed-td td:nth-child(22),
	.header-alr tr th:nth-child(23) ,.tbl-fixed-td td:nth-child(23),
	.header-alr tr th:nth-child(25) ,.tbl-fixed-td td:nth-child(25),
	.header-alr tr th:nth-child(24) ,.tbl-fixed-td td:nth-child(24)
	{padding:0px;margin:0px;font-size:0px;display:none}	
	section{width:100%;}
	table.tbl-size tr th,table.tbl-size tr td,table.ui-float-asset-reg tr th {font-size:9px;}
	div.divFooter {
		position: fixed;
		bottom: 0;
	}
	.inputdate{
		border:none;
		font-size:10px;
		font-weight:bold;
	}
	.inputtext{
		border:none;
		font-size:7.5px;
	}
	div.qapgraf2{width:100%; margin-bottom:5px;margin-top:5px;}

	table.tbl-go{word-wrap:break-word; table-layout: fixed;"}
	table.font-size tr td{font-size:100px;}

</style>

<style>
#load {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url();?>images/pIkfp.gif') 
                50% 50% 
                no-repeat;
}

</style>
<script type="text/javascript">
function myFunction(a) {
    var w = window.open(a, 'name', 'width=900,height=500,left=' + ((screen.width - 900) / 2) +',top=' + ((screen.height - 600) / 2));
    w.onload = w.print;
    w.focus();
  }
  function myFunction2(a) {
    var w = window.open(a, 'name', 'width=900,height=500,left=' + ((screen.width - 900) / 2) +',top=' + ((screen.height - 600) / 2));
    w.onload = w.print;
    w.focus();
  }
  function myFunctionprint(){
  	print();
  }
   function closed(){
  	close();
  }
$('.disable').click(function(){
    $("a").replaceWith(function(){
        return $("<span>" + $(this).html() + "</span>");
    });
});
</script>
</head>
<body>
<?php if ($this->input->get('none') == 'closed') {
	echo "<div class='closed'><a href='' onclick='javascript:closed();'>Closed this Window !</a></div>";
	echo "<div class='body'>";
} else {
	echo "<div>";
}
?>
