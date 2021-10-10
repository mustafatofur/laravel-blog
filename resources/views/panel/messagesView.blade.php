@extends('panel.layout')

@section('content')

<div class="container">
  <div class="row message-wrapper rounded shadow mb-20">

      <div class="col-md-12 message-sideright">
          <div class="panel">
              <div class="panel-heading">
                  <div class="media">
                      <a href="{{route('messages')}}" class="btn btn-success pull-right rounded"><i class="fa fa-arrow-left"></i></a>


                  </div>
              </div><!-- /.panel-heading -->
              <div class="panel-body">
                  <p class="lead">
                      <strong>Subject :</strong> {{$subject}}
                  </p>
                  <p class="lead">
                      <strong>Name: </strong> {{$name}}
                  </p>
                  <p class="lead">
                      <strong>Mail: </strong> {{$email}}
                  </p>
                  <p class="lead">
                    <strong>  Date :</strong> {{$date}}
                  </p>

                  <p class="lead">
                    <strong>  newsletter :</strong> {{$formCheck}}
                  </p>

                  <hr>

                    <p class="lead" style="word-break: break-all;"><strong>Message:</strong>  {{$message}}</p>

                  <br>

              </div><!-- /.panel-body -->
          </div><!-- /.panel -->

      </div><!-- /.message-sideright -->
  </div>
  </div>

@endsection
