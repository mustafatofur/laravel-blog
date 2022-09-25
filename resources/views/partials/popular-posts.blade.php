<div class="col-4">
    <h4 class="mb-5"><strong>Popular Posts</strong></h4>

      @forelse (\App\Models\posts::where('active', 1)->orderByDesc('counter')->limit(3)->get() as $popularPost)
        <div class="card">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{asset('uploads/images/posts')}}/{{$popularPost->image}}" class="img-fluid" />
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
        @empty
    @endforelse
  </div>