<?php
 if ($this->input->get('broughtfwd') != ''){ $tajuk = 'Unscheduled Brought Forward Work Order Details';}else{ $tajuk = 'Work Order Listing Unscheduled';}
 $array = [
    ['contentcontroller/report_vols/', 'PPM Listing'],
	['contentcontroller/report_volu/', $tajuk ],
	['contentcontroller/root_cause/', 'Root Cause Work Order Listing'],
	['contentcontroller/report_Incidences_Listing/', 'Incidences Report Listing'],
	['contentcontroller/report_volc/', 'Complaint Listing'],
	['contentcontroller/report_rtlu/', 'TIME RESPONDED'],
	['contentcontroller/assetnextppm/', 'ASSET NEXT PPM'],
	['contentcontroller/report_fdreport/', 'Fes Daily Report'],
    ['contentcontroller/D_Assessement/', 'D Assessement Report'],
	 ['contentcontroller/D_Mapping/', 'D Mapping Report'],
    ['contentcontroller/deductmapping_2/', 'D Mapping Deduction 2'],
	['contentcontroller/report_rsls/', 'Statutory & License Summary'],
	['contentcontroller/report_a2/', 'A2 Listing'],
    ['Procurement/e_po_print/', 'Purchase Order_'],
    ['procurement/print_release_note/', 'Release Note'],
];

foreach ($array as $list) {
	if ($list[0] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
    $content = ob_get_contents();
	ob_end_clean();
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->Output($list[1]. '('.date('F', mktime(0, 0, 0, $month, 10)).')'.$year.'.pdf' , 'I');
	//$obj_pdf->Output("filename.pdf",'D');
	exit;
	}
}
?>