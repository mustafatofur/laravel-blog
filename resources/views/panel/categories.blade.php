@extends('panel.layout')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
                  <div class="col-lg-10">
                      <h2>Categories</h2>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                              <a href="">Homepage</a>
                          </li>

                          <li class="breadcrumb-item active">
                              <strong>Categories</strong>
                          </li>
                      </ol>
                  </div>
                  <div class="col-lg-2">

                  </div>
              </div>


          <div class="wrapper wrapper-content animated fadeInRight">
@if (session('success'))
    <div class="alert alert-success">{{session('success')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
@endif

@if (session('successDelete'))
    <div class="alert alert-warning">{{session('successDelete')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
@endif

              <div class="row">
                  <div class="col-lg-12">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <h5>Category Manager <br><small>You can edit and delete categories here.</small></h5>

                              <div class="ibox-tools">
                                  <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                  </a>

                                  <a class="close-link">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </div>
</div>


<div class="ibox-content" style="display: block;">

    <!-- Table Begining -->


    <table id="postsBlog" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#cat_id</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)


            <tr>
                <td>{{$category->cat_id}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->category_slug}}</td>
                {{-- <td>@if ($allposts->active == 1)
                  <p style="color:green;font-weight:800;">
                    Active
                  </p>

              @else <p style="color:darkred;font-weight:800;">


                Deactive
              </p>
            @endif
                </td> --}}
                {{-- <td>@if ($allposts->status == 1)
                    <strong style="color:green;">Active</strong>
                @endif

                @if ($allposts->status == 0)
                    <strong style="color:darkred;">Deactive</strong>
                @endif
              </td> --}}
                <td class="text-center">
                  <a href="{{route('catEdit', $category->cat_id)}}"><i class="btn btn-success fa fa-edit"></i></a> | <a href="{{route('catDelete', $category->cat_id)}}" onclick="return confirm('Are you sure delete for this category?')"><i class="btn btn-danger fa fa-trash"></i></a>
                </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr>
              <th>#cat_id</th>
              <th>Category Name</th>
              <th>Slug</th>
              <th>Actions</th>
            </tr>
        </tfoot>
    </table>


    <!-- End Table -->

</div>
                  </div>
@endsection
