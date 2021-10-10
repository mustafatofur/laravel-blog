@extends('layout')

@section('content')


  <!-- Jumbotron -->
  <div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-3 h2">{{$main_title}}</h1>
    <p class="mb-3">{{$main_description}}</p>
    <a class="btn btn-primary m-2" href="#look" role="button" rel="nofollow"
      >Browse Posts</a>

  </div>
  <!-- Jumbotron -->


  <!--Main Navigation-->

  <!--Main layout-->
  <main class="my-5">
    <div class="container">
      <div id="look">

      </div>
      <!--Section: Content-->
      <section class="text-center">
  <div class="row">
        <div class="col-8">
        <h4 class="mb-5"><strong>Last Blog Posts</strong></h4>

        <div class="row">




@foreach ($posts as $post)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{asset('uploads/images/posts')}}/{{$post->image}}" class="img-fluid" />
                <a href="{{route('single', [$post->id, $post->slug])}}">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a style="color:#000000;" href="{{route('single', [$post->id, $post->slug])}}">{{$post->title}}</a></h5>
                <p class="card-text">
                  {{substr($post->short_description,0,75)}}..
                </p>
                @foreach ($cats as $cat)

                <p style="    font-style: italic;font-size: 9pt;"> @if ($cat->cat_id == $post->cat_id) {{$cat->category_name}} @endif</p>@endforeach
                <a href="{{route('single', [$post->id, $post->slug])}}" class="btn btn-primary"><i class="fa fa-angle-right"></i> READ MORE</a>
              </div>
            </div>
          </div>
@endforeach



        </div>



        </div>

        <!-- Features Account Links -->


          <div class="col-4">
            <h4 class="mb-5"><strong>Popular Posts</strong></h4>

              @foreach ($popularPosts as $popularPost)


            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{asset('uploads/images/posts')}}/{{$popularPost->image}}" class="img-fluid" />
                <a href="{{route('single', [$popularPost->id, $popularPost->slug])}}">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a style="color:#000000;" href="{{route('single', [$popularPost->id, $popularPost->slug])}}">{{$popularPost->title}}</a></h5>
                <hr>
                <p class="card-text">
                  {{substr($popularPost->short_description,0,75)}}..
                </p>
                <a href="{{route('single', [$popularPost->id, $popularPost->slug])}}" class="btn btn-primary"><i class="fa fa-angle-right"></i> READ MORE</a>
              </div>
            </div>
                @endforeach


          </div>



            <!-- Features Account Links -->

      </div>



      </section>

    </div>
      <!--Section: Content-->


      <!-- Pagination -->


      <div class="d-flex justify-content-center">
         {{$posts->links('vendor.pagination.bootstrap-4')}}
        </div>
      <style>
        .w-5 {display:none;}
      </style>




    </div>
  </main>
  <!--Main layout-->

@endsection
