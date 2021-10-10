
<div class="footer" style="">
    <div class="float-right">
        <strong>MT</strong>
    </div>

</div>

</div>
</div>


<!-- Mainly scripts -->
<script src="{{asset('admin/')}}/js/jquery-3.1.1.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('admin/')}}/js/popper.min.js"></script>
<script src="{{asset('admin/')}}/js/bootstrap.js"></script>
<script src="{{asset('admin/')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{asset('admin/')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('admin/')}}/js/inspinia.js"></script>
<script src="{{asset('admin/')}}/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="{{asset('admin/')}}/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

@if (Route::currentRouteNamed('posts') || Route::currentRouteNamed('categories') || Route::currentRouteNamed('messages'))

      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function () {
  $('.aktifPasif').click(function (event) {
      var id = $(this).attr("id");  //id değerini alıyoruz

      var durum = ($(this).is(':checked')) ? '1' : '0';
      //checkbox a göre aktif mi pasif mi bilgisini alıyoruz.

      $.ajax({
          type: 'POST',
          url: '{{route('activepassive')}}/' + id,  //işlem yaptığımız sayfayı belirtiyoruz
          data: { "id":id, "durum": durum, "_token": "{{csrf_token()}}" }, //datamızı yolluyoruz
          success: function (result) {
              $('#sonuc').text(success);
              //gelen sonucu h2 tagında gösteriyoruz
          },
          error: function () {
              alert('Hata');
          }
      });
  });
});
      </script>

      <script type="text/javascript">
      $(document).ready(function() {
        $('#postsBlog').DataTable( {
          // "order": [[ 3, "desc" ]];
          "language": {
            "search": "Search:",
            }
        });
        } )
      </script>
@endif

</body>

</html>
