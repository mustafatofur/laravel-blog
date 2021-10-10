@extends('panel.layout')

@section('content')
  <div class="col-lg-12">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <h5>Edit Category : {{$category->category_name}} <br> <small>You can edit category here.</small></h5>
                              <div class="ibox-tools">
                                  <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                  </a>
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                      <i class="fa fa-wrench"></i>
                                  </a>
                                  <ul class="dropdown-menu dropdown-user">
                                      <li><a href="#" class="dropdown-item">Config option 1</a>
                                      </li>
                                      <li><a href="#" class="dropdown-item">Config option 2</a>
                                      </li>
                                  </ul>
                                  <a class="close-link">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </div>
                          </div> <br>
                          @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                          @endif


                          <div class="ibox-content">
                              <form id="edit" method="post" action="{{route('catEdit', $category->cat_id)}}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group  row"><label class="col-sm-2 col-form-label"><strong>Category Name</strong></label>

                                      <div class="col-sm-10"><input name="title" type="text" class="form-control" value="{{$category->category_name}}"></div>
                                  </div>
                                  <div class="hr-line-dashed"></div>




                                  <div class="form-group row">
                                      <div class="col-sm-4 col-sm-offset-2">
                                          <button class="btn btn-white btn-sm">Cancel</button>
                                          <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div><br>
@endsection
