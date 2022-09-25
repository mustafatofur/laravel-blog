@section('title', app()->make('settings')->title)
@section('description', app()->make('settings')->description)
@section('image', app()->make('settings')->logo)
@section('keywords', app()->make('settings')->keywords)
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@if (Route::currentRouteNamed('home')){{$main_title}} @elseif (Route::currentRouteNamed('category')) {{$category->category_name}} Category @else  @yield('title', $title) @endif- {{app()->make('settings')->title}}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('/')}}css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('/')}}css/style.css" />

@if (Route::currentRouteNamed('home') || Route::currentRouteNamed('category') || Route::currentRouteNamed('tags'))
  <!-- Primary Meta Tags -->
<meta name="title" content="@yield('title')">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="@if(Route::currentRouteNamed('home')) {{route('home')}}/uploads/images/@yield('image') @else {{route('home')}}/uploads/images/posts/@yield('image') @endif">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="@yield('title')">
<meta property="twitter:description" content="@yield('description')">
<meta property="twitter:image" content="@if(Route::currentRouteNamed('home')) {{route('home')}}/uploads/images/@yield('image') @else {{route('home')}}/uploads/images/posts/@yield('image') @endif">
@elseif (Route::currentRouteName() == "single")

  <!-- Primary Meta Tags -->
  <meta name="title" content="{{$Vtitle}}">
  <meta name="description" content="{{$Vdescription}}">
  <meta name="keywords" content="{{$Vkeywords}}">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{url()->current()}}">
  <meta property="og:title" content="{{$Vtitle}}">
  <meta property="og:description" content="{{$Vdescription}}">
  <meta property="og:image" content="{{route('home')}}/uploads/images/posts/{{$Vimage}}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{url()->current()}}">
  <meta property="twitter:title" content="{{$Vtitle}}">
  <meta property="twitter:description" content="{{$Vdescription}}">
  <meta property="twitter:image" content="{{route('home')}}/uploads/images/posts/{{$Vimage}}">


@else
  <!-- Primary Meta Tags -->
<meta name="title" content="{{app()->make('settings')->title}}">
<meta name="description" content="{{app()->make('settings')->description}}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="{{app()->make('settings')->title}}">
<meta property="og:description" content="{{app()->make('settings')->description}}">
<meta property="og:image" content="@if(Route::currentRouteNamed('home')) {{route('home')}}/uploads/images/{{app()->make('settings')->logo}}@else{{route('home')}}/uploads/images/posts/{{app()->make('settings')->logo}}@endif">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="{{$title}}">
<meta property="twitter:description" content="{{app()->make('settings')->description}}">
<meta property="twitter:image" content="@if(Route::currentRouteNamed('home')){{route('home')}}/uploads/images/{{app()->make('settings')->logo}} @else{{route('home')}}/uploads/images/posts/{{app()->make('settings')->logo}}@endif">
@endif

{{-- Analytics Code Start  --}}
{!! app()->make('settings')->analytics !!}
{{-- Analytics Code End  --}}

</head>
<body>
<header>
<!-- Intro settings -->
<style>
::selection {
  color:white;
  background: #d81019;
}

#intro {
  /* Margin to fix overlapping fixed navbar */
  margin-top: 58px;
}
@media (max-width: 991px) {
  #intro {
    /* Margin to fix overlapping fixed navbar */
    margin-top: 45px;
  }
}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
<div class="container-fluid">
  <!-- Navbar brand -->
  <a class="navbar-brand" target="_blank" href="{{route('home')}}">
    <img src="{{asset('/uploads/images/')}}/{{app()->make('settings')->logo}}" height="50" alt="" loading="lazy"
      style="margin-top: -3px;" />
  </a>
  <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarExample01">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
      </li>


      <div class="dropdown">
<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  Categories
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">


@foreach (app()->make('headerCats') as $cat)


  <li><a class="dropdown-item" href="{{route('category', [$cat->cat_id, $cat->category_slug ])}}">{{$cat->category_name}}  </a></li>

  @endforeach
</ul>
</div>


      <li class="nav-item">
        <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
      </li>

    </ul>

    <ul class="navbar-nav d-flex flex-row">
      <!-- Icons -->
      <form class="text-center" action="{{route('search')}}" method="post">
        @csrf
          <div class="input-group">
              <div class="form-outline">
                  <input name="searchterm" type="search" id="form1" class="form-control " />
                    <label class="form-label" for="form1">Search..</label>
                    </div>
                      <button type="submit" class="btn btn-primary">
                          <i class="fas fa-search"></i>
                          </button>
                          </div>
                          </form>

    </ul>
  </div>
</div>
</nav>
<!-- Navbar -->

</header>
