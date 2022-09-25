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
    <p>Tags: @forelse ($keywords as $keyword)
              <a href="{{route('tags',$keyword)}}">{{$keyword}}</a>
              @php $count_num = $count_num + 1  @endphp
              @if ($count_num < $countkeywords)
                    @php echo ","; @endphp

              @endif
              @empty
    @endforelse </p>
      </article>
      </div>
    <!-- Popular Posts Start -->
    @include('partials.popular-posts')
    <!-- Popular Posts End -->
    </div>
    </section>

    <!--Section: Content-->

  </main>
  <!--Main layout-->
  @endsection
