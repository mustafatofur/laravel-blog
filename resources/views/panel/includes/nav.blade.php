

  <nav class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                <img alt="image" style="width: 90%;" src="{{route('home')}}/uploads/images/{{app()->make('settings')->logo}}"/>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold">Admin Panel</span>
                    <span class="text-muted text-xs block">Actions <b class="caret"></b></span>
                </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">


                    <li><a class="dropdown-item" href="{{route('home')}}" target="_blank">Visit The Website</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                BLOG
            </div>
        </li>
        <li>
            <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Panel</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{{route('settings')}}">General Settings</a></li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Posts</span> <span class="fa arrow"></span></a>

              <ul class="nav nav-second-level collapse">
                <li><a href="{{route('posts')}}">Posts</a></li>
                <li><a href="{{route('postAdd')}}">Add New Post</a></li>
                <li><a href="{{route('categories')}}">Categories</a></li>
                <li><a href="{{route('catAdd')}}">Add New Category</a></li>
              </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-exchange"></i> <span class="nav-label">Footer</span> <span class="fa arrow"></span></a>

              <ul class="nav nav-second-level collapse">
                <li><a href="{{route('footerEdit')}}">General</a></li>
                <li><a href="{{route('footerLinks')}}">Edit Footer Links</a></li>
              </ul>
        </li>





        <li>
            <a href="{{route('messages')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Contact Form</span></a>
        </li>

        <li>
            <a href="{{route('changepassword')}}"><i class="fa fa-lock"></i> <span class="nav-label">Change Password</span></a>
        </li>
    </ul>

</div>
</nav>
