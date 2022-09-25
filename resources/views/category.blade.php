@extends('layout')

@section('content')


  <!-- Jumbotron -->
  <div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-3 h2">{{$category->category_name}}</h1>
  <p>All posts in {{$category->category_name}} category.</p>
  </div>
  <!-- Jumbotron -->


  <!--Main Navigation-->

  <!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
  <div class="row">
        <div class="col-8">
        <h4 class="mb-5"><strong>{{$category->category_name}} Posts</strong></h4>

        <div class="row">




@forelse ($posts as $post)
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
                <a href="{{route('single', [$post->id, $post->slug])}}" class="btn btn-primary"><i class="fa fa-angle-right"></i> READ MORE</a>
              </div>
            </div>
          </div>
          @empty
@endforelse



        </div>
        </div>

        <!-- Popular Posts Start -->
          @include('partials.popular-posts')
        <!-- Popular Posts End -->
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
