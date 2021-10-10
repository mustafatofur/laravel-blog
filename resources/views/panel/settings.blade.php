@extends('panel.layout')

@section('content')


  <div class="col-lg-12">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <h5>General Settings <br> <small>You can change here your site settings.</small></h5>
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
                          </div><br>

                          @if (session('success'))
                            <div class="alert alert-success">
                              <strong>{{session('success')}}</strong>
                            </div>
                          @endif
                          <div class="ibox-content">

                              <form method="post" action="{{route('settingsUpdate')}}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Site Title</label>

                                      <div class="col-sm-10"><input name="title" type="text" class="form-control" value="{{$mainTitle}}"></div>
                                  </div>
                                  <div class="hr-line-dashed"></div>
                                  <div class="form-group row"><label class="col-sm-2 col-form-label">Site Description</label>
                                      <div class="col-sm-10"><input name="description" type="text" class="form-control" value="{{$description}}"> <span class="form-text m-b-none"><small>Please introduce your website using with 160 characters</small></span>
                                      </div>
                                  </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Keywords</label>

                                      <div class="col-sm-10"><input name="keywords" type="text" class="form-control" value="{{$keywords}}"></div>
                                  </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Site Logo</label>

                                        <div class="col-sm-10"><input name="logo" type="file" class="form-control"></div>
                                          <small style="padding:10px;">current logo: <img src="{{asset('uploads/images/')}}/{{$logo}}" /></small>
                                  </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Favicon</label>

                                      <div class="col-sm-10"><input name="favicon" type="file" class="form-control"></div>
                                      <small style="padding:10px;">current favicon:<img src="{{asset('uploads/images/')}}/{{$favicon}}" /></small>
                                  </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Site URL</label>

                                      <div class="col-sm-10"><input name="url" type="text" class="form-control" value="{{$url}}"></div>
                                  </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Analytics Code</label>

                                      <div class="col-sm-10"><textarea rows ="10" name="analytics" type="text" class="form-control" value="">{{$analytics}}</textarea></div>
                                  </div>
                                  <div class="hr-line-dashed"></div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-sm-offset-2">
                                          <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                          <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>

<br>
@endsection
