@extends('layout')

@section('content')

  <!-- Jumbotron -->
  <div id="intro" class="p-5 text-center bg-light">
  <img style="width: 230px;border-radius: 15px;" src="{{asset('uploads/images/posts')}}/{{$image}}" alt=""> <br><br>
  <h1 class="mb-3 h2">{{$title}}</h1>
  <p class="mb-3 subText">{{$short_description}}

  </p>
  <a class="btn btn-primary m-2" href="#ArticleTitle" role="button" rel="nofollow"><i class="fa fa-angle-down"></i> QUICK READ</a>

  </div>
  <!-- Jumbotron -->


<!--Main Navigation-->

<!--Main layout-->
<main class="my-5">
        <div id="ArticleTitle"></div>
  <div class="container">
    <!--Section: Content-->

    <section class="">
<div class="row g-5">

      <div class="col-8">

        <article class="blog-post">
        <h2 class="blog-post-title">{{$title}}</h2>
        <p class="blog-post-meta">{{$date}}</p>

      {!!$description!!}

<p></p>
    <p>Tags: @foreach ($keywords as $keyword)
              <a href="{{route('tags',$keyword)}}">{{$keyword}}</a>
              @php $count_num = $count_num + 1  @endphp
              @if ($count_num < $countkeywords)
                    @php echo ","; @endphp

              @endif
    @endforeach </p>



      </article>

      </div>

      <!-- Features Account Links -->

        <div class="col-4">

          <div class="position-sticky" style="top:0;">

          <h4 class="mb-5"><strong>Popular Posts</strong></h4>

          @foreach ($popularPosts as $popularPost)


        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <a href="{{route('single', [$popularPost->id, $popularPost->slug])}}"><img src="{{asset('uploads/images/posts')}}/{{$popularPost->image}}" class="img-fluid" /></a>
            <a href="{{route('single', [$popularPost->id, $popularPost->slug])}}">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$popularPost->title}}</h5>
            <hr>
            <p class="card-text">
              {{substr($popularPost->short_description,0,75)}}..
            </p>
            <a href="{{route('single', [$popularPost->id, $popularPost->slug])}}" class="btn btn-primary"><i class="fa fa-angle-right"></i> READ MORE</a>
          </div>
        </div>
            @endforeach
          </div>



          </div>


        </div>

          <!-- Features Account Links -->

    </div>
    </section>

    <!--Section: Content-->

  </main>
  <!--Main layout-->
  @endsection
