<!--Footer-->
<style media="screen">
  .footerC ::selection {

      color:#d81019;
      background: white;

  }
</style>

<footer class="footerC bg-primary text-white text-center text-lg-start">
<!-- Grid container -->
<div class="container p-4">
 <!--Grid row-->
 <div class="row">
   <!--Grid column-->
   <div class="col-md mb-6 mb-md-0">


     <h5 class="text-uppercase">{{app()->make('footerContents')->footer_title}}</h5>

     <p>
      {{app()->make('footerContents')->footer_content}}
     </p>
   </div>


   <!--Grid column-->
   <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
     <h5 class="text-uppercase mb-0">{{app()->make('footerContents')->footer_main_link_title}}</h5>

     <ul class="list-unstyled">
       @forelse (app()->make('footerLinks') as $links)
         <li>
          <a href="{{$links->footer_link}}" class="text-white">{{$links->footer_link_title}}</a>
         </li>
         @empty
       @endforelse

     </ul>
   </div>
   <!--Grid column-->
 </div>
 <!--Grid row-->
</div>
<!-- Grid container -->

<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
{{app()->make('footerContents')->copyright}}
</div>
<!-- Copyright -->
</footer>


<!-- MDB -->
<script type="text/javascript" src="{{asset('/')}}js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="{{asset('/')}}js/script.js"></script>

<script src="{{asset('/')}}js/bootstrap.bundle.min.js"></script>
<!--Footer-->

</body>
</html>
