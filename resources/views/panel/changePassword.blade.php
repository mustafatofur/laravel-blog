@extends('panel.layout')

@section('content')


  <div class="col-lg-12">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <h5>User Settings <br> <small>You can change your admin password here.</small></h5>
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
                                  {{session('success')}}
                            </div>
                          @endif

                          @if (session('failed'))
                            <div class="alert alert-danger">
                                  {{session('failed')}}
                            </div>
                          @endif

                          <div class="ibox-content">

                              <form method="post" action="{{route('changepassword')}}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group  row"><label class="col-sm-3 col-form-label">Current Password</label>

                                      <div class="col-sm-4"><input id="pass" name="currentpassword1" type="password" class="form-control"></div>
                                  </div>

                                  <div class="form-group row"><label class="col-sm-3 col-form-label">Re-type Current Password</label>
                                      <div class="col-sm-4"><input id="pass2" name="currentpassword2" type="password" class="form-control"> <span class="form-text m-b-none">
                                        <div id="match"> </div>
                                        <small>Please retype your current password.</small></span>


                                        <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#pass2').focusout(function(){
                                                var pass = $('#pass').val();
                                                  var pass2 = $('#pass2').val();
                                                    if(pass != pass2){
                                                        //alert('şifreler eşleşemedi.');
                                          document.getElementById('match').innerHTML = '<small><p style="color:red;font-weight:800;"> Please ensure the passwords match!</p></small>';
                                                        }
                                                        if(pass == pass2){
                                                            //alert('şifreler eşleşemedi.');
                                              document.getElementById('match').innerHTML = '<p style="color: #00c700;text-shadow: 0px 0px 1px #004600;"> Passwords match</p>';
                                                            }

                                                        });
                                                      });
                                        </script>

                                      </div>
                                  </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group  row"><label class="col-sm-3 col-form-label">New Password</label>

                                      <div class="col-sm-4"><input name="futurepassword" type="password" class="form-control"></div>
                                  </div>


                                  <div class="form-group row">
                                      <div class="col-sm-4 col-sm-offset-2">
                                          <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                          <button class="btn btn-primary btn-sm" type="submit">Save!</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>

<br>
@endsection
