@extends('panel.layout')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
                  <div class="col-lg-10">
                      <h2>Contact Form Messages</h2>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                              <a href="">Homepage</a>
                          </li>

                          <li class="breadcrumb-item active">
                              <strong>Contact Form</strong>
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
                              <h5>Contact Form <br><small>Messages from contact form</small></h5>

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
                <th>Name</th>
                <th>Mail</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)


            <tr>
                <td>{{$message->id}}</td>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->subject}}</td>
                <td class="text-center">
                  <a href="{{route('messagesView', $message->id)}}"><i class="btn btn-success fa fa-eye"></i></a> | <a href="{{route('messagesDelete', $message->id)}}" onclick="return confirm('Are you sure for delete this message?')"><i class="btn btn-danger fa fa-trash"></i></a>
                </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr>
              <th>#id</th>
              <th>Name</th>
              <th>Mail</th>
              <th>Subject</th>
              <th>Actions</th>
            </tr>
        </tfoot>
    </table>


    <!-- End Table -->

</div>
                  </div>
@endsection
