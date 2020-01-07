<?php echo form_open('contentcontroller/new_item?p=confirm');?>

<style>
.ui-content-form-baru {
    /* border-bottom-right-radius: 0px; */
    border-bottom-left-radius: 0px;
    color: black;
    border-collapse: collapse;
    font-size: 15px
	}
@media only screen and (max-width: 425px) and (min-width: 0px) {


	table.ui-content-form-baru, table.ui-content-form-baru thead, table.ui-content-form-baru tbody, table.ui-content-form-baru th, table.ui-content-form-baru td, table.ui-content-form-baru tr {
		display: block;
	}
	table.ui-content-form-baru td {
		/* Behave  like a "row" */
		border: none;
		width: 80%;
		border-bottom: 1px solid #eee;
		position: relative;
		padding-left: 50%;
	}

 .paginatediv{

					  display: none;}

					  /** page structure **/
					 .paginatedivm{
					  text-align:center;
					  width: 100%;
					  display: block;}
					.paginate {
					  display: block;
					  width: 80%;
					  font-size: 12px;
					  margin: 0 auto;
					}
					/** clearfix **/
					.clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
					.clearfix { display: inline-block; }
					.paginate.pag2 { /* second page styles */ }

					.paginate.pag2 li { font-weight: bold; list-style-type:none;  }

					.paginate.pag2 li a {
					  font-size:12px;
					  display: block;
					  float: left;
					  color: #585858;
					  text-decoration: none;
					  padding: 6px 11px;
					  margin-right: 6px;
					  border-radius: 3px;
					  border: 1px solid #ddd;
					  background-color: #eee;
					  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#eee));
					  background-image: -webkit-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -moz-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -ms-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -o-linear-gradient(top, #f7f7f7, #eee);
					  background-image: linear-gradient(top, #f7f7f7, #eee);
					  -webkit-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  -moz-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					}
					.paginate.pag2 li a:hover {
					  color: #3280dc;
					}

					.paginate.pag2 li.single, .paginate.pag2 li.current {
					  display: block;
					  float: center;
					  padding: 10px 11px;
					  padding-top: 8px;
					  margin-right: 6px;
					  border-radius: 3px;
					  color: #676767;
					}


}
</style>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;"><?php if (isset($_GET['edit'])){ echo "Update Items";}else{echo "New Item";} ?></span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b><?php if (isset($_GET['edit'])){ echo "Update Items";}else{echo "New Item";} ?></b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form-baru" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Item Code:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_code" value="<?= isset($edititem[0]->ItemCode) == TRUE ? $edititem[0]->ItemCode : ''?>" class="form-control-button2 n_wi-date2" required></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Item Name:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_description" value="<?= isset($edititem[0]->ItemName) == TRUE ? $edititem[0]->ItemName : ''?>" class="form-control-button2 n_wi-date2"></td>

										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Part No:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_partno" value="<?= isset($edititem[0]->PartNumber) == TRUE ? $edititem[0]->PartNumber : ''?>" class="form-control-button2 n_wi-date2"></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Part Description:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_pdescription" value="<?= isset($edititem[0]->PartDescription) == TRUE ? $edititem[0]->PartDescription : ''?>" class="form-control-button2 n_wi-date2"></td>
										</tr>

										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Unit Price:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_unitprice" value="<?= isset($edititem[0]->UnitPrice) == TRUE ? $edititem[0]->UnitPrice : ''?>" class="form-control-button2 n_wi-date2"></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Currency:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <?php
										$Payment = array(
											'' => '',
	        '1' => 'Albania Lek',
            '2' => 'Afghanistan Afghani',
            '3' => 'Argentina Peso',
            '4' => 'Aruba Guilder',
            '5' => 'Australia Dollar',
            '6' => 'Azerbaijan New Manat',
            '7' => 'Bahamas Dollar',
            '8' => 'Barbados Dollar',
            '9' => 'Bangladeshi taka',
            '10' => 'Belarus Ruble',
            '11' => 'Belize Dollar',
            '12' => 'Bermuda Dollar',
            '13' => 'Bolivia Boliviano',
            '14' => 'Bosnia and Herzegovina Convertible Marka',
            '15' => 'Botswana Pula',
            '16' => 'Bulgaria Lev',
            '17' => 'Brazil Real',
            '18' => 'Brunei Darussalam Dollar',
            '19' => 'Cambodia Riel',
            '20' => 'Canada Dollar',
            '21' => 'Cayman Islands Dollar',
            '22' => 'Chile Peso',
            '23' => 'China Yuan Renminbi',
            '24' => 'Colombia Peso',
            '25' => 'Costa Rica Colon',
            '26' => 'Croatia Kuna',
            '27' => 'Cuba Peso',
            '28' => 'Czech Republic Koruna',
            '29' => 'Denmark Krone',
            '30' => 'Dominican Republic Peso',
            '31' => 'East Caribbean Dollar',
            '32' => 'Egypt Pound',
            '33' => 'El Salvador Colon',
            '34' => 'Estonia Kroon',
            '35' => 'Euro Member Countries',
            '36' => 'Falkland Islands (Malvinas) Pound',
            '37' => 'Fiji Dollar',
            '38' => 'Ghana Cedis',
            '39' => 'Gibraltar Pound',
            '40' => 'Guatemala Quetzal',
            '41' => 'Guernsey Pound',
            '42' => 'Guyana Dollar',
            '43' => 'Honduras Lempira',
            '44' => 'Hong Kong Dollar',
            '45' => 'Hungary Forint',
            '46' => 'Iceland Krona',
            '47' => 'India Rupee',
            '48' => 'Indonesia Rupiah',
            '49' => 'Iran Rial',
            '50' => 'Isle of Man Pound',
            '51' => 'Israel Shekel',
            '52' => 'Jamaica Dollar',
            '53' => 'Japan Yen',
            '54' => 'Jersey Pound',
            '55' => 'Kazakhstan Tenge',
            '56' => 'Korea (North) Won',
            '57' => 'Korea (South) Won',
            '58' => 'Kyrgyzstan Som',
            '59' => 'Laos Kip',
            '60' => 'Latvia Lat',
            '61' => 'Lebanon Pound',
            '62' => 'Liberia Dollar',
            '63' => 'Lithuania Litas',
            '64' => 'Macedonia Denar',
            '65' => 'Malaysia Ringgit',
            '66' => 'Mauritius Rupee',
            '67' => 'Mexico Peso',
            '68' => 'Mongolia Tughrik',
            '69' => 'Mozambique Metical',
            '70' => 'Namibia Dollar',
            '71' => 'Nepal Rupee',
            '72' => 'Netherlands Antilles Guilder',
            '73' => 'New Zealand Dollar',
            '74' => 'Nicaragua Cordoba',
            '75' => 'Nigeria Naira',
            '76' => 'Norway Krone',
            '77' => 'Oman Rial',
            '78' => 'Pakistan Rupee',
            '79' => 'Panama Balboa',
            '80' => 'Paraguay Guarani',
            '81' => 'Peru Nuevo Sol',
            '82' => 'Philippines Peso',
            '83' => 'Poland Zloty',
            '84' => 'Qatar Riyal',
            '85' => 'Romania New Leu',
            '86' => 'Russia Ruble',
            '87' => 'Saint Helena Pound',
            '88' => 'Saudi Arabia Riyal',
            '89' => 'Serbia Dinar',
            '90' => 'Seychelles Rupee',
            '91' => 'Singapore Dollar',
            '92' => 'Solomon Islands Dollar',
            '93' => 'Somalia Shilling',
            '94' => 'South Africa Rand',
            '95' => 'Sri Lanka Rupee',
            '96' => 'Sweden Krona',
            '97' => 'Switzerland Franc',
            '98' => 'Suriname Dollar',
            '99' => 'Syria Pound',
            '100' => 'Taiwan New Dollar',
            '101' => 'Thailand Baht',
            '102' => 'Trinidad and Tobago Dollar',
            '103' => 'Turkey Lira',
            '104' => 'Turkey Lira',
            '105' => 'Tuvalu Dollar',
            '106' => 'Ukraine Hryvna',
            '107' => 'United Kingdom Pound',
            '108' => 'United States Dollar',
            '109' => 'Uruguay Peso',
            '110' => 'Uzbekistan Som',
            '111' => 'Venezuela Bolivar',
            '112' => 'Viet Nam Dong',
            '113' => 'Yemen Rial',
            '114' => 'Zimbabwe Dollar'
                					 );

		     $Payment2 = array (
               '1' => 'ALL',
               '2' => 'AFN',
               '3' => 'ARS',
               '4' => 'AWG',
               '5' => 'AUD',
               '6' => 'AZN',
               '7' => 'BSD',
               '8' => 'BBD',
               '9' => 'BDT',
               '10' => 'BYR',
               '11' => 'BZD',
               '12' => 'BMD',
               '13' => 'BOB',
               '14' => 'BAM',
               '15' => 'BWP',
               '16' => 'BGN',
               '17' => 'BRL',
               '18' => 'BND',
               '19' => 'KHR',
               '20' => 'CAD',
               '21' => 'KYD',
               '22' => 'CLP',
               '23' => 'CNY',
               '24' => 'COP',
               '25' => 'CRC',
               '26' => 'HRK',
            '27' => 'CUP',
            '28' => 'CZK',
            '29' => 'DKK',
            '30' => 'DOP',
            '31' => 'XCD',
            '32' => 'EGP',
            '33' => 'SVC',
            '34' => 'EEK',
            '35' => 'EUR',
            '36' => 'FKP',
            '37' => 'FJD',
            '38' => 'GHC',
            '39' => 'GIP',
            '40' => 'GTQ',
            '41' => 'GGP',
            '42' => 'GYD',
            '43' => 'HNL',
            '44' => 'HKD',
            '45' => 'HUF',
            '46' => 'ISK',
            '47' => 'INR',
            '48' => 'IDR',
            '49' => 'IRR',
            '50' => 'IMP',
            '51' => 'ILS',
            '52' => 'JMD',
            '53' => 'JPY',
            '54' => 'JEP',
            '55' => 'KZT',
            '56' => 'KPW',
            '57' => 'KRW',
            '58' => 'KGS',
            '59' => 'LAK',
            '60' => 'LVL',
            '61' => 'LBP',
            '62' => 'LRD',
            '63' => 'LTL',
            '64' => 'MKD',
            '65' => 'RM',
            '66' => 'MUR',
            '67' => 'MXN',
            '68' => 'MNT',
            '69' => 'MZN',
            '70' => 'NAD',
            '71' => 'NPR',
            '72' => 'ANG',
            '73' => 'NZD',
            '74' => 'NIO',
            '75' => 'NGN',
            '76' => 'NOK',
            '77' => 'OMR',
            '78' => 'PKR',
            '79' => 'PAB',
            '80' => 'PYG',
            '81' => 'PEN',
            '82' => 'PHP',
            '83' => 'PLN',
            '84' => 'QAR',
            '85' => 'RON',
            '86' => 'RUB',
            '87' => 'SHP',
            '88' => 'SAR',
            '89' => 'RSD',
            '90' => 'SCR',
            '91' => 'SGD',
            '92' => 'SBD',
            '93' => 'SOS',
            '94' => 'ZAR',
            '95' => 'LKR',
            '96' => 'SEK',
            '97' => 'CHF',
            '98' => 'SRD',
            '99' => 'SYP',
            '100' => 'TWD',
            '101' => 'THB',
            '102' => 'TTD',
            '103' => 'TRY',
            '104' => 'TRL',
            '105' => 'TVD',
            '106' => 'UAH',
            '107' => 'GBP',
            '108' => 'USD',
            '109' => 'UYU',
            '110' => 'UZS',
            '111' => 'VEF',
            '112' => 'VND',
            '113' => 'YER',
            '114' => 'ZWD',
        );
										 ?>
										  <?php echo form_dropdown('n_currency', $Payment, isset($edititem[0]->CurrencyID) == TRUE ? $edititem[0]->CurrencyID : '', 'id="n_currency" class="dropdown n_wi-date2"'); ?> </td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Measurement:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">
											<?php
											$Unit_of_measurement = array(
											'' => '',
										'1' => 'KG',
										'2' => 'Litre',
										'3' => 'M3',
										'4' => 'HP',
										'5' => 'Bar',
										'6' => 'Tonnes',
										'7' => 'mmHG',
										'8' => 'cc',
										'9' => 'unit/pcs'
                					 );
										 ?>
										  <?php echo form_dropdown('n_Unit_of_measurement', $Unit_of_measurement, isset($edititem[0]->MeasurementID) == TRUE ? $edititem[0]->MeasurementID : '', 'id="n_Unit_of_measurement" class="dropdown n_wi-date2"'); ?></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Vendor:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_vendor_name"  id="n_vendor_name" value="<?= isset($edititem[0]->v_vendorname) == TRUE ? $edititem[0]->v_vendorname : ''?>" readonly class="form-control-button2 <?php if ("contentcontroller/new_item/" == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ ?>n_wi-eq3"> <span class="icon-windows" onclick="fCallpop_vendor(this)" value="vendorid"></span><?php }else{ echo 'n_wi-date2">';} ?>
							                <input type="hidden" name="n_vendor_code" value="<?= isset($edititem[0]->VendorID) == TRUE ? $edititem[0]->VendorID : ''?>" id="n_vendor_code" >
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Code Category:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_codecat" value="<?= isset($edititem[0]->CodeCat) == TRUE ? $edititem[0]->CodeCat : ''?>" class="form-control-button2 n_wi-date2"></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Equip Category:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_equipcat" value="<?= isset($edititem[0]->EquipCat) == TRUE ? $edititem[0]->EquipCat : ''?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Brand :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_brand" value="<?= isset($edititem[0]->Brand) == TRUE ? $edititem[0]->Brand : ''?>" class="form-control-button2 n_wi-date2"></td>
										  <td style="padding-left:10px;" valign="top">Model :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_model" value="<?= isset($edititem[0]->Model) == TRUE ? $edititem[0]->Model : ''?>"  class="form-control-button2 n_wi-date2"></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Comments :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_comments" value="<?= isset($edititem[0]->Comments) == TRUE ? $edititem[0]->Comments : ''?>" class="form-control-button2 n_wi-date2"></td>
										  <td style="padding-left:10px;" valign="top">Service :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_service" value="<?php echo $this->session->userdata('usersess') ?>" class="form-control-button2 n_wi-date2" readonly></td>

										</tr>
<tr>
										    <td style="padding-left:10px; padding-top:5px;" valign="top">Item Location:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_location" value="<?= isset($edititem[0]->ItemLoc) == TRUE ? $edititem[0]->ItemLoc : ''?>" class="form-control-button2 n_wi-date2"></td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center"> <?php if (isset($_GET['edit'])){ ?> <input type="button" class="btn-button btn-primary-button" style="width: 200px;" name="back" value="Back"  onclick="location.href='<?php echo site_url();?>/contentcontroller/new_item'"> <?php }?>
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm"></td>

				</tr>
			</table>
			<?php echo form_hidden('editid',isset($edititem[0]->InvItemID) == TRUE ? $edititem[0]->InvItemID : '') ?>
			<?php echo form_close(); ?>
			<?php echo form_hidden('m',$this->input->get('m')) ?>
			<?php echo form_hidden('y',$this->input->get('y')) ?>

			<style>
@media screen and (min-device-width: 1200px){
 .paginatedivm{

					  display: none;}
				.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;
			 /*width:100%;*/

			  }
				.ui-menu-color-header2, .ui-color-style-2 {
    background: #0d1b23;}
				.ui-main-form2 {
				margin-top:50px;
    background: #C3E6D8;
    border-radius: 0px;
    width: 98%;
    margin-right: auto;
    margin-left: auto;
    overflow: hidden;
}
  .onloadworkorder{
    margin:5px auto;
	border-collapse:collapse;
	background:#46eace;
	width:98%;
    }

	/** page structure **/

					 .paginatediv{
					  text-align:center;
					  width: 100%;
					  display: block;}
					.paginate {
					  display: block;
					  width: 50%;
					  font-size: 12px;
					  margin: 0 auto;
					}
					/** clearfix **/
					.clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
					.clearfix { display: inline-block; }
					.paginate.pag2 { /* second page styles */ }

					.paginate.pag2 li { font-weight: bold; list-style-type:none;  }

					.paginate.pag2 li a {
					  font-size:12px;
					  display: block;
					  float: left;
					  color: #585858;
					  text-decoration: none;
					  padding: 6px 11px;
					  margin-right: 6px;
					  border-radius: 3px;
					  border: 1px solid #ddd;
					  background-color: #eee;
					  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#eee));
					  background-image: -webkit-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -moz-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -ms-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -o-linear-gradient(top, #f7f7f7, #eee);
					  background-image: linear-gradient(top, #f7f7f7, #eee);
					  -webkit-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  -moz-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					}
					.paginate.pag2 li a:hover {
					  color: #3280dc;
					}

					.paginate.pag2 li.single, .paginate.pag2 li.current {
					  display: block;
					  float: left;
					  padding: 10px 11px;
					  padding-top: 8px;
					  margin-right: 6px;
					  border-radius: 3px;
					  color: #676767;
					}
	}
				</style>



		</div>
			<div class="ui-main-form2">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Item List</span></td>
					</tr>
				</table>

			</div>
			<?php if ($this->input->get('itemcode')) { ?>
			<table id="myElem" class="onloadworkorder">
				<tr>
					<th style="text-align:left; color:#ee4000;">The item have been registered.&nbsp;&nbsp;<span class="blinking"><font color="black">Item Name :</font><?=$this->input->get('itemname')?>&nbsp;&nbsp;<font color="black">Item Code :</font><?=$this->input->get('itemcode')?> </span></th>
				</tr>
			</table>
	<?php }?><div style="overflow-x:auto;">
					<table class="ui-content-middle-menu-workorder2 ui-left_web">
						<tr class="ui-menu-color-header2" style="color:white; font-weight:bold;">
							<td width="">Item Code</td>
							<td width="">Item Name</td>
							<td width="">Part No</td>
							<td width="">Part Description</td>
							<td width="">Unit Price</td>
							<td width="">Currency</td>
							<td width="">Measurement</td>
							<!--<td width="">Vendor</td>-->
							<td width="">Code Category</td>
							<td>Equip Category</td>
							<td>Brand</td>
							<td>Model</td>
							<td>Comments</td>

						</tr>
						<?php  if (!empty($records)) {?>
						
				<?php $numrow = 1; foreach($records as $row):?>

	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					<td style="text-transform: capitalize;"><a href="?edit=<?=$row->ItemCode?>&search=<?=$search ?>" style="font-size:14px;"><?=$row->ItemCode?></a></td>
		        			<td><?=$row->ItemName?></td>
		        			<td><?=$row->PartNumber?></td>
		        			<td><?=$row->PartDescription?></td>
		        			<td><?=$row->UnitPrice?></td>
		        			<td><?php if(!empty($row->CurrencyID)){echo $Payment2[1];}?></td>
		        			<td><?php if(!empty($row->MeasurementID)){echo $Unit_of_measurement[$row->MeasurementID];}?></td>
		        			<!--<td><?=$row->v_vendorname?></td>-->
		        			<td><?=$row->CodeCat?></td>
		        			<td><?=$row->EquipCat?></td>
		        			<td><?=$row->Brand?></td>
		        			<td><?=$row->Model?></td>
		        			<td><?=$row->Comments?></td>
		        			<!---<td style="width:200px; text-align:left;"></td>-->
	        			</tr>
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="13"><span style="color:red; text-transform: uppercase;">NO RECORD FOUND</span>
							</td>
	    				</tr>
						<?php } ?>
					</table></div>
					<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php  if (!empty($records)) {?>
							<?php $numrow=1;  foreach($records as $row):?>
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Item Code</td>
							<td class="td-desk">: <a href="?edit=<?=$row->ItemCode?>" style="font-size:14px;"><?=$row->ItemCode?></a> </td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Item Name</td>
							<td class="td-desk">: <?=isset($row->ItemName) == TRUE ? $row->ItemName : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td>Item Location</td>
							<td class="td-desk">: <?=isset($row->ItemLoc) == TRUE ? $row->ItemLoc : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Part No</td>
							<td class="td-desk">: <?=isset($row->PartNumber) == TRUE ? $row->PartNumber : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Part Description</td>
							<td class="td-desk">: <?=isset($row->PartDescription) == TRUE ? $row->PartDescription : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Unit Price</td>
							<td class="td-desk">: <?=isset($row->UnitPrice) == TRUE ? $row->UnitPrice : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Currency</td>
							<td class="td-desk">: <?php if(!empty($row->CurrencyID)){echo $Payment2[$row->CurrencyID];}?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Measurement</td>
							<td class="td-desk">: <?php if(!empty($row->MeasurementID)){echo $Unit_of_measurement[$row->MeasurementID];}?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Vendor</td>
							<td class="td-desk">: <?=isset($row->v_vendorname) == TRUE ? $row->v_vendorname : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Code Category</td>
							<td class="td-desk">: <?=isset($row->CodeCat) == TRUE ? $row->CodeCat : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Equip Category</td>
							<td class="td-desk">: <?=isset($row->EquipCat) == TRUE ? $row->EquipCat : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Brand</td>
							<td class="td-desk">: <?=isset($row->Brand) == TRUE ? $row->Brand : 'N/A'?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Model</td>
							<td class="td-desk">: <?=isset($row->Model) == TRUE ? $row->Model : 'N/A'?></td>
						</tr></tr><tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Comments</td>
							<td class="td-desk">: <?=isset($row->Comments) == TRUE ? $row->Comments : 'N/A'?></td>
						</tr>
		        		<?php $numrow++?>
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO Record Found</td>
							</tr>
							<?php } ?>
					</table>
				</div>

						<div class="paginatediv ui-left_web">
					  <ul class="paginate pag2 clearfix">
					  	<?php if ($rec[0]->jumlah > $limit){ ?>
					  	<li class="single">Page <?=($this->input->get('pa') ? $this->input->get('pa') : 1)?> of <?php echo $maxpage?></li>
						<li><a href="?tabIndex=1&pa=1&search=<?=$search ?>"> << First Page </a></li>
						<?php if ($this->input->get('pa') != ''){ ?>
					  	<li><a href="?tabIndex=1&pa=<?=($this->input->get('pa') > 1 ? $this->input->get('pa')-1 : 1 )?>&search=<?=$search ?>">Prev</a></li>
						<?php } ?>
						<li><a href=""><?=($this->input->get('pa') ? $this->input->get('pa') : 1)?></a></li>
		              	<li><a href="?tabIndex=1&pa=<?php echo $page?>&search=<?=$search ?>">Next</a></li>
						<li><a href="?tabIndex=1&pa=<?php echo ceil($rec[0]->jumlah/$limit);?>&search=<?=$search ?>">Last Page >></a></li>
		              	<?php } ?>

					  </ul>
					</div>
					<div class="paginatedivm">

					  <ul class="paginate pag2 clearfix">
					  	<?php if ($rec[0]->jumlah > $limit){ ?>
					  	<li class="single">Page <?=($this->input->get('pa') ? $this->input->get('pa') : 1)?> of <?php echo $page?></li>
						<li><a href="?tabIndex=1&pa=1"> << </a></li>
						<?php if ($this->input->get('pa') != ''){ ?>
					  	<li><a href="?tabIndex=1&pa=<?=($this->input->get('pa') < 1 ? $this->input->get('pa')-1 : 1 )?>"><</a></li>
						<?php } ?>
						<li><a href=""><?=($this->input->get('pa') ? $this->input->get('pa') : 1)?></a></li>
		              	<li><a href="?tabIndex=1&pa=<?php echo $page?>">></a></li>
						<li><a href="?tabIndex=1&pa=<?php echo ceil($rec[0]->jumlah/$limit);?>"> >></a></li>
		              	<?php } ?>

					  </ul>
					</div>
		</div>
	</div>
</div>
</body>
<?php include 'content_jv_popup.php';?>

</html>
<script>
$( window ).load(function() {
  $("#myElem").show();
  setTimeout(function() { $("#myElem").hide(); }, 20000);
});
function blinker() {
	$('.blinking').fadeOut(500);
	$('.blinking').fadeIn(500);
}
setInterval(blinker, 1000);
</script>
