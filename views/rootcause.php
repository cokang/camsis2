<script type="text/javascript">
 $(document).ready(function() {
        $('select[name="n_Type_of_Work"]').on('change', function() {
          // alert($(this).val());
          var e = document.getElementById("sumcr");
            var strUser = e.options[e.selectedIndex].value;
            var sumrcID = $(this).val();
            if(sumrcID>=1){}
            if(sumrcID==2) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="2">Battery Team In Progress</option>');
            }else if(sumrcID==3) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="3">BER - HD</option>');
            }else if(sumrcID==4) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="4">Closing In Progress</option>');
            }else if(sumrcID==5) {
              
              $('select[name="rc"]').append('<option value="5">Double Request</option>');
            }else if(sumrcID==7) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="7">Need Payment – In Advance</option>');
              $('select[name="rc"]').append('<option value="7">Need Payment – With PI</option>');
            }else if(sumrcID==8) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="8">Need PO</option>');
              $('select[name="rc"]').append('<option value="8">Pending Chronology</option>');
            }
            else if(sumrcID==9) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="9">Need Tax Invoice – In Stock</option>');
              $('select[name="rc"]').append('<option value="9">Need Tax Invoice – No Stock</option>');
            }
            else if(sumrcID==10) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="10">Observation</option>');
            }else if(sumrcID==11) {
              
              $('select[name="rc"]').append('<option value="11">Procurement Store</option>');
            }else if(sumrcID==12) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="12">RW – HD</option>');
              $('select[name="rc"]').append('<option value="12">RW – JOHN</option>');
              $('select[name="rc"]').append('<option value="12">RW – SVR</option>');
            }else if(sumrcID==13) {
              
              $('select[name="rc"]').append('<option value="13">Sinking Fund</option>');
            }else if(sumrcID==14) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="14">Sourcing</option>');
            }
            else if(sumrcID==15) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="15">Cires</option>');
              $('select[name="rc"]').append('<option value="15">Specialist</option>');
            }else if(sumrcID==16) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="16">Troubleshoot In Progress</option>');
            }
            else if(sumrcID==17) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="17">Vendor Delay Parts – In Stock</option>');
              $('select[name="rc"]').append('<option value="17">Vendor Delay Parts – No Stock</option>');
              $('select[name="rc"]').append('<option value="17">Vendor Delay Parts – Petty Cash</option>');
            }else if(sumrcID==18) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="18">Vendor Delay Quotation</option>');
            }else if(sumrcID==19) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="19">Vendor Delay Troubleshoot</option>');
            }else if(sumrcID==20) {
              $('select[name="rc"]').empty();
              $('select[name="rc"]').append('<option value="20">Warranty</option>');
            }else{
                $('select[name="rc"]').empty();
                
            }
        });
    });
  </script>
