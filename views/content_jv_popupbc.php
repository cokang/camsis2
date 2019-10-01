<script>
function fCallVendor()
		{
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/E_Code', 'Vendor', winProp);
			Win.window.focus();
		}
function fCalllocation()
		{
			winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "location";
		
	}
	else {
		echo "contentcontroller/location";
		
	}?>', 'location', winProp);
			Win.window.focus();
		}
function fCalltc_r_number()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/tc_r_number', 'tc_r_number', winProp);
			Win.window.focus();
		}
function fCallpop_vendor()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/pop_vendor', 'pop_vendor', winProp);
			Win.window.focus();
		}
function fCallpop_vendor2()
{
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('pop_vendor', 'pop_vendor', winProp);
	Win.window.focus();
}
function fCallassetdetailname()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/assetdetailname', 'assetdetailname', winProp);
			Win.window.focus();
		}
function fCallR_number()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('contentcontroller/R_number', 'R_number', winProp);
			Win.window.focus();
		}
function fCallassetsnumber()
		{
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('<?php 
if ($this->uri->slash_segment(1) == 'contentcontroller/') {
	echo "assetnumber";
		
	}
	else {
		echo "contentcontroller/assetnumber";
		
	}?>', 'assetnumber', winProp);
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
</script>
