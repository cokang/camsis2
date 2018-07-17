
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="6">VENDOR</th>
	</tr>
	<tr align="center">
		<th >No</th>
		<th >Code</th>
		<th >Name</th>
		<th >Region</th>
		<th >Remarks</th>
	</tr>
	<?php $rownom=1; foreach($records as $row):?>
	<?php if ($this->input->get('parent') == 'Update' ){?>
	<tr align="center">
		<td style="width:20px;"><?=$rownom++;?></a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>','<?=date_format(new DateTime($row->d_gradingdate), 'Y-m-d')?>','<?=$row->v_region?>','<?=$row->v_GovtReg?>','<?=$row->v_grade?>','<?=$row->v_email?>','<?=$row->v_pagerno?>','<?=$row->v_url?>','<?=$row->v_currency?>','<?=$row->v_payment?>','<?=$row->v_terms?>','<?=$row->v_termmode?>','<?=$row->v_contact?>','<?=$row->v_CompanyType?>','<?=$row->v_vendorType?>','<?=$row->v_RegType?>','<?=$row->v_remark?>','<?=$row->v_hphone?>','<?=$row->v_phone?>','<?=$row->v_fax?>','<?=$row->v_address1?>','<?=$row->v_address2?>','<?=$row->v_address3?>')" ><?=$row->v_vendorcode?></a></td>
		<td style="width:300px;"><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>','<?=date_format(new DateTime($row->d_gradingdate), 'Y-m-d')?>','<?=$row->v_region?>','<?=$row->v_GovtReg?>','<?=$row->v_grade?>','<?=$row->v_email?>','<?=$row->v_pagerno?>','<?=$row->v_url?>','<?=$row->v_currency?>','<?=$row->v_payment?>','<?=$row->v_terms?>','<?=$row->v_termmode?>','<?=$row->v_contact?>','<?=$row->v_CompanyType?>','<?=$row->v_vendorType?>','<?=$row->v_RegType?>','<?=$row->v_remark?>','<?=$row->v_hphone?>','<?=$row->v_phone?>','<?=$row->v_fax?>','<?=$row->v_address1?>','<?=$row->v_address2?>','<?=$row->v_address3?>')" ><?=$row->v_vendorname?></a></td>
		<td style="width:80px;"><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>','<?=date_format(new DateTime($row->d_gradingdate), 'Y-m-d')?>','<?=$row->v_region?>','<?=$row->v_GovtReg?>','<?=$row->v_grade?>','<?=$row->v_email?>','<?=$row->v_pagerno?>','<?=$row->v_url?>','<?=$row->v_currency?>','<?=$row->v_payment?>','<?=$row->v_terms?>','<?=$row->v_termmode?>','<?=$row->v_contact?>','<?=$row->v_CompanyType?>','<?=$row->v_vendorType?>','<?=$row->v_RegType?>','<?=$row->v_remark?>','<?=$row->v_hphone?>','<?=$row->v_phone?>','<?=$row->v_fax?>','<?=$row->v_address1?>','<?=$row->v_address2?>','<?=$row->v_address3?>')" ><?=$row->v_region?></a></td>
		<td style=""><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>','<?=date_format(new DateTime($row->d_gradingdate), 'Y-m-d')?>','<?=$row->v_region?>','<?=$row->v_GovtReg?>','<?=$row->v_grade?>','<?=$row->v_email?>','<?=$row->v_pagerno?>','<?=$row->v_url?>','<?=$row->v_currency?>','<?=$row->v_payment?>','<?=$row->v_terms?>','<?=$row->v_termmode?>','<?=$row->v_contact?>','<?=$row->v_CompanyType?>','<?=$row->v_vendorType?>','<?=$row->v_RegType?>','<?=$row->v_remark?>','<?=$row->v_hphone?>','<?=$row->v_phone?>','<?=$row->v_fax?>','<?=$row->v_address1?>','<?=$row->v_address2?>','<?=$row->v_address3?>')" ><?=$row->v_remark?></a></td>
	</tr>
	<?php }else{?>
	<tr align="center">
		<td style="width:20px;"><?=$rownom++;?></a></td>
		<td style="width:150px;"><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>')" ><?=$row->v_vendorcode?></a></td>
		<td style="width:300px;"><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>')" ><?=$row->v_vendorname?></a></td>
		<td style="width:80px;"><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>')" ><?=$row->v_region?></a></td>
		<td style=""><a href="javascript:Setasset('<?=$row->v_vendorcode?>','<?=$row->v_vendorname?>')" ><?=$row->v_remark?></a></td>
	</tr>
	<?php } ?>
	<?php endforeach;?>
</table>
<?php if ($this->input->get('parent') == 'Update' ){?>	   		
<script type="text/javascript">
    function Setasset(Vendor_code,Vendor_name,grading_D,region,gov_reg,grade,email,pager_no,url,currency,payment,term,term_mode,contact,company_type,vendor_type,reg_type,remarks,hphone_no,phone_no,fax_no,address1,address2,address3) {
        if (window.opener != null && !window.opener.closed) {
            var v_code = window.opener.document.getElementById("n_vendor_code");
            v_code.value = Vendor_code;
            var v_name = window.opener.document.getElementById("n_vendor_name");
            v_name.value = Vendor_name;
            var gradingD = window.opener.document.getElementById("n_grading_date");
            gradingD.value = grading_D;
            var v_region = window.opener.document.getElementById("n_region");
            v_region.value = region;
            var v_govreg = window.opener.document.getElementById("n_group_register");
            v_govreg.value = gov_reg;
            if (grade == "G1"){
            	window.opener.document.getElementById("radio-1-1").checked = true;
            }
            else{
            	window.opener.document.getElementById("radio-1-2").checked = true;
            }
            var V_email = window.opener.document.getElementById("n_vendor_email");
            V_email.value = email;
            var v_pagerno = window.opener.document.getElementById("n_pageno");
            v_pagerno.value = pager_no;
            var v_url = window.opener.document.getElementById("n_url");
            v_url.value = url;
            var v_currency = window.opener.document.getElementById("n_currency");
            v_currency.value = currency;
            var v_payment = window.opener.document.getElementById("n_payment");
            v_payment.value = payment;
            if (term == "Credit"){
            	window.opener.document.getElementById("radio-1-4").checked = true;
            }
            else{
            	window.opener.document.getElementById("radio-1-5").checked = true;
            }
            if (term_mode == "30"){
            	window.opener.document.getElementById("radio-1-6").checked = true;
            }
            else{
            	window.opener.document.getElementById("radio-1-7").checked = true;
            }
            var v_contact = window.opener.document.getElementById("n_contact");
            v_contact.value = contact;
            var v_comptype = window.opener.document.getElementById("n_company_type");
            v_comptype.value = company_type;
            var v_vendtype = window.opener.document.getElementById("n_vendor_type");
            v_vendtype.value = vendor_type;
            if (reg_type == "BUMI"){
            	window.opener.document.getElementById("radio-1-8").checked = true;
            }
            else{
            	window.opener.document.getElementById("radio-1-9").checked = true;
            }
            var v_remarks = window.opener.document.getElementById("n_remark");
            v_remarks.value = remarks;
            var v_hphone = window.opener.document.getElementById("n_hand_phone_nombor");
            v_hphone.value = hphone_no;
            var v_phone = window.opener.document.getElementById("n_phone_nombor");
            v_phone.value = phone_no;
            var v_fax = window.opener.document.getElementById("n_fax_nombor");
            v_fax.value = fax_no;
            var v_add1 = window.opener.document.getElementById("n_Address");
            v_add1.value = address1;
            var v_add2 = window.opener.document.getElementById("n_Address_2");
            v_add2.value = address2;
            var v_add3 = window.opener.document.getElementById("n_Address_3");
            v_add3.value = address3;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php }elseif (($this->input->get('parent') == 'woresponse') or ($this->input->get('parent') == 'updateacqu')) {?>
<script type="text/javascript">
    function Setasset(a_agent,a_agent2) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_agent");
            a_ag.value = a_agent;
            var a_ag2 = window.opener.document.getElementById("n_agent2");
            a_ag2.value = a_agent2;

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php }elseif ($this->input->get('parent') == 'vendorid') {?>
<script type="text/javascript">
    function Setasset(vendorcode,vendorname) {
        if (window.opener != null && !window.opener.closed) {
		    var a_ag = window.opener.document.getElementById("n_vendor_name");
            a_ag.value = vendorname;
            var a_ag = window.opener.document.getElementById("n_vendor_code");
            a_ag.value = vendorcode;
		
    

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php }else{?>
<script type="text/javascript">
    function Setasset(a_agent,a_agent2) {
        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_supplier");
            a_ag.value = a_agent;
            var a_ag2 = window.opener.document.getElementById("n_supplier2");
            a_ag2.value = a_agent2;

            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
</script>
<?php } ?>