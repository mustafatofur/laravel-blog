@extends('panel.layout')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
                  <div class="col-lg-10">
                      <h2>Posts</h2>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                              <a href="">Homepage</a>
                          </li>

                          <li class="breadcrumb-item active">
                              <strong>Blog Posts</strong>
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
                              <h5>Post Management <br><small></small></h5>

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


    <table data-order='[[ 0, "desc" ]]' id="postsBlog" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#id</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($posts as $allposts)


            <tr>
                <td>{{$allposts->id}}</td>
                <td>{{$allposts->title}}</td>
                <td>@php
                foreach ($categories as $v) {

                  if ($allposts->cat_id == $v->cat_id)

                  echo $v->category_name;
                  }
                @endphp</td>
                <td class="text-center"> <label class="switch">
                        <!-- checkbox a id ve checked bilgilerini ekliyoruz -->
                        <input type="checkbox" id='{{$allposts->id}}' class="aktifPasif" @if ($allposts->active == 1) checked @else @endif />
                        <span class="slider round"></span>
                    </label>
                </td>
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
                  <a href="{{route('postEdit', $allposts->id)}}"><i class="btn btn-success fa fa-edit"></i></a> | <a href="{{route('postdelete', $allposts->id)}}" onclick="return confirm('Are you sure delete for this post?')"><i class="btn btn-danger fa fa-trash"></i></a>
                </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr>
              <th>#id</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
        </tfoot>
    </table>


    <!-- End Table -->

</div>
                  </div>
@endsection
