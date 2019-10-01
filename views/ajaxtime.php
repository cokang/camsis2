  <script type="text/javascript">
  $(document).ready(
    function Responder() {

        $('#Stime_h').change(
          function () {
            var startDate = new Date(0, 0, 0, $('#Stime_h').val(), $('#Stime_m').val(), 0);
            var endDate = new Date(0, 0, 0, $('#Etime_h').val(), $('#Etime_m').val(), 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            $('#n_End_Time_h1').val(hours);
            $('#n_End_Time_m1').val(minutes);

            $('#n_End_Time_h1').change();
            $('#n_End_Time_m1').change();

          }
        );
        $('#Stime_m').change(
          function () {
            var startDate = new Date(0, 0, 0, $('#Stime_h').val(), $('#Stime_m').val(), 0);
            var endDate = new Date(0, 0, 0, $('#Etime_h').val(), $('#Etime_m').val(), 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            $('#n_End_Time_h1').val(hours);
            $('#n_End_Time_m1').val(minutes);

            $('#n_End_Time_h1').change();
            $('#n_End_Time_m1').change();
          }
        );
        $('#Etime_h').change(
          function () {
            var startDate = new Date(0, 0, 0, $('#Stime_h').val(), $('#Stime_m').val(), 0);
            var endDate = new Date(0, 0, 0, $('#Etime_h').val(), $('#Etime_m').val(), 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            $('#n_End_Time_h1').val(hours);
            $('#n_End_Time_m1').val(minutes);

            $('#n_End_Time_h1').change();
            $('#n_End_Time_m1').change();
          }
        );
        $('#Etime_m').change(
          function () {
            var startDate = new Date(0, 0, 0, $('#Stime_h').val(), $('#Stime_m').val(), 0);
            var endDate = new Date(0, 0, 0, $('#Etime_h').val(), $('#Etime_m').val(), 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            $('#n_End_Time_h1').val(hours);
            $('#n_End_Time_m1').val(minutes);

            $('#n_End_Time_h1').change();
            $('#n_End_Time_m1').change();
          }
        );
        $('#n_End_Time_h1').change(
          function () {
            var T_rate1 = ($('#n_End_Time_h1').val() * $('#n_personnel_rate1').val()) + ($('#n_End_Time_m1').val() * ($('#n_personnel_rate1').val()/60));
            var r1 = T_rate1.toFixed(2);
            $('#T_rate1').val(r1);
          }
        );
        $('#n_End_Time_m1').change(
          function () {
            var T_rate1 = ($('#n_End_Time_h1').val() * $('#n_personnel_rate1').val()) + ($('#n_End_Time_m1').val() * ($('#n_personnel_rate1').val()/60));
            var r1 = T_rate1.toFixed(2);
            $('#T_rate1').val(r1);
          }
        );

        $('#n_End_Time_h2').change(
          function () {
            var T_rate2 = ($('#n_End_Time_h2').val() * $('#n_personnel_rate2').val()) + ($('#n_End_Time_m2').val() * ($('#n_personnel_rate2').val()/60));
            var r2 = T_rate2.toFixed(2);
            $('#T_rate2').val(r2);
          }
        );
        $('#n_End_Time_m2').change(
          function () {
            var T_rate2 = ($('#n_End_Time_h2').val() * $('#n_personnel_rate2').val()) + ($('#n_End_Time_m2').val() * ($('#n_personnel_rate2').val()/60));
            var r2 = T_rate2.toFixed(2);
            $('#T_rate2').val(r2);
          }
        );

        $('#n_End_Time_h3').change(
          function () {
            var T_rate3 = ($('#n_End_Time_h3').val() * $('#n_personnel_rate3').val()) + ($('#n_End_Time_m3').val() * ($('#n_personnel_rate3').val()/60));
            var r3 = T_rate3.toFixed(2);
            $('#T_rate3').val(r3);
          }
        );
        $('#n_End_Time_m3').change(
          function () {
            var T_rate3 = ($('#n_End_Time_h3').val() * $('#n_personnel_rate3').val()) + ($('#n_End_Time_m3').val() * ($('#n_personnel_rate3').val()/60));
            var r3 = T_rate3.toFixed(2);
            $('#T_rate3').val(r3);
          }
        );
        $('#V_reqRM').keyup(
          function () {
            var VenRate = $('#V_reqRM').val() * $('#V_reqRate').val()
            var VenTRate = VenRate.toFixed(2);
            $('#V_reqtotal').val(VenTRate);
          }
        ); 
        $('#V_partRM').keyup(
          function () {
            var V_parttotal = $('#V_partRM').val() * $('#V_partRate').val();
            var Pr = V_parttotal.toFixed(2);
            $('#V_parttotal').val(Pr);
          }
        );
    }
  );
  </script>
