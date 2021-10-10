@extends('panel.layout')

@section('content')
  <div class="col-lg-12">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <h5>Edit Footer Links <br> <small>You can edit links in the footer area.</small></h5>
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
                              <form id="edit" method="post" action="{{route('footerLinks')}}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group  row">



                                      <div class="col-sm-4">
                                        <label class="col-sm-5 col-form-label">
                                          <strong>Link 1 Title </strong></label>

                                      <input name="link_1_title" type="text" class="form-control" value="{{app()->make('footerLinks')[0]->footer_link_title}}">
                                    </div>

                                    <div class="col-sm-4">
                                      <label class="col-sm-5 col-form-label">
                                        <strong>Link 1 Href</strong></label>
                                    <input name="link_1_href" type="text" class="form-control" value="{{app()->make('footerLinks')[0]->footer_link}}">
                                  </div>


                                  </div>

                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row">



                                      <div class="col-sm-4">
                                        <label class="col-sm-5 col-form-label">
                                          <strong>Link 2 Title </strong></label>
                                      <input name="link_2_title" type="text" class="form-control" value="{{app()->make('footerLinks')[1]->footer_link_title}}">
                                    </div>

                                    <div class="col-sm-4">
                                      <label class="col-sm-5 col-form-label">
                                        <strong>Link 2 Href</strong></label>
                                    <input name="link_2_href" type="text" class="form-control" value="{{app()->make('footerLinks')[1]->footer_link}}">
                                  </div>


                                  </div>

                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row">



                                      <div class="col-sm-4">
                                        <label class="col-sm-5 col-form-label">
                                          <strong>Link 3 Title </strong></label>
                                      <input name="link_3_title" type="text" class="form-control" value="{{app()->make('footerLinks')[2]->footer_link_title}}">
                                    </div>

                                    <div class="col-sm-4">
                                      <label class="col-sm-5 col-form-label">
                                        <strong>Link 3 Href</strong></label>
                                    <input name="link_3_href" type="text" class="form-control" value="{{app()->make('footerLinks')[2]->footer_link}}">
                                  </div>


                                  </div>

                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row">



                                      <div class="col-sm-4">
                                        <label class="col-sm-5 col-form-label">
                                          <strong>Link 4 Title </strong></label>
                                      <input name="link_4_title" type="text" class="form-control" value="{{app()->make('footerLinks')[2]->footer_link_title}}">
                                    </div>

                                    <div class="col-sm-4">
                                      <label class="col-sm-5 col-form-label">
                                        <strong>Link 4 Href</strong></label>
                                    <input name="link_4_href" type="text" class="form-control" value="{{app()->make('footerLinks')[3]->footer_link}}">
                                  </div>


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
