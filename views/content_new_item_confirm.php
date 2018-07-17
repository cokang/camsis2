<?php echo form_open('contentcontroller/new_item?p=save');?>

<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">Confirm New Item</span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>New Item</b></td>
							</tr>
							<tr >
							<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Item Code:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_code"  value="<?php echo $this->input->post('n_code');?>" class="form-control-button2 n_wi-date2" readonly></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Item Name:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_description"  value="<?php echo $this->input->post('n_description');?>" class="form-control-button2 n_wi-date2" readonly></td>
										</tr>
										
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Part No:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_partno" value="<?php echo $this->input->post('n_partno');?>" class="form-control-button2 n_wi-date2" readonly></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Part Description:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_pdescription" value="<?php echo $this->input->post('n_pdescription');?>" class="form-control-button2 n_wi-date2" readonly></td>
										</tr>
										
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Unit Price:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_unitprice" value="<?php echo $this->input->post('n_unitprice');?>" class="form-control-button2 n_wi-date2" readonly></td>
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
										 ?>
										  <?php echo form_dropdown('n_currency', $Payment, set_value('n_currency'), 'id="n_currency" class="dropdown n_wi-date2"'); ?> </td>
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
                					 );
										 ?>
										  <?php echo form_dropdown('n_Unit_of_measurement', $Unit_of_measurement, set_value('n_Unit_of_measurement'), 'id="n_Unit_of_measurement" class="dropdown n_wi-date2"'); ?></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Vendor:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name=""  id=""  class="form-control-button2 n_wi-date2" value="<?php echo set_value('n_vendor_name'); ?>" disabled></td>
											 <input type="hidden" name="n_vendor_code" id="n_vendor_code" value="<?php echo set_value('n_vendor_code'); ?>" >
								
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" >Code Category:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_codecat" class="form-control-button2 n_wi-date2" value="<?php echo set_value('n_codecat'); ?>" readonly></td>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Equip Category:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_equipcat" class="form-control-button2 n_wi-date2" value="<?php echo set_value('n_equipcat'); ?>" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Brand :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_brand" class="form-control-button2 n_wi-date2" value="<?php echo set_value('n_brand'); ?>" readonly></td>
										  <td style="padding-left:10px;" valign="top">Model :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_model" class="form-control-button2 n_wi-date2" value="<?php echo set_value('n_model'); ?>" readonly></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Comments :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_comments" class="form-control-button2 n_wi-date2" value="<?php echo set_value('n_comments'); ?>" readonly></td>
										  <td style="padding-left:10px;" valign="top">Service :   </td>
										  <td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_service" value="<?php echo $this->session->userdata('usersess') ?>" class="form-control-button2 n_wi-date2" readonly></td>
										
										</tr>
                                        <tr>	
										    <td style="padding-left:10px; padding-top:5px;" valign="top">Item Location:</td>
											<td style="padding-left:10px; padding-top:5px;" valign="top"> <input type="text" name="n_location" value="<?php echo $this->input->post('n_location');?>"" class="form-control-button2 n_wi-date2"></td>
										</tr>										
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
                        <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
					</td>
				</tr>
			</table>
			<?php echo form_hidden('editid',set_value('editid')) ?>
			<?php echo form_hidden('m',$this->input->get('m')) ?>
			<?php echo form_hidden('y',$this->input->get('y')) ?>
		</div>
	</div>
</div>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
