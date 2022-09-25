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
                                <div class="links">
                                  @csrf
                                  @forelse ($links as $key => $link)
                                  <div class="form-group row d-flex align-items-center footerlink">
                                   <div class="col-sm-4">
                                     <label class="col-sm-5 col-form-label">
                                       <strong>{{$key+1}}. Link Title </strong></label>
                                   <input name="link[{{$link->id}}][title]" type="text" class="form-control" value="{{$link->footer_link_title}}" required>
                                 </div>
 
                                 <div class="col-sm-4">
                                   <label class="col-sm-5 col-form-label">
                                     <strong>{{$key+1}}. Link Href</strong></label>
                                 <input name="link[{{$link->id}}][href]" type="text" class="form-control" value="{{$link->footer_link}}" required>
                                 </div>
                                 <div class="col-sm-2 mt-4 d-flex align-items-center removeLink">
                                    <span class="d-inline-block" style="font-size:16px;cursor: pointer;"> <i class="fa fa-times"></i> Remove</span>
                                 </div>
                               </div>
                                  @empty
                                    <h2>No footer links yet.</h2>
                                  @endforelse
                                </div>
                                <div class="addLink mt-2" style="max-width:150px;cursor: pointer;">
                                  <h4><i class="fa fa-plus"></i> Add New Link</h4>
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

  <script type="text/html" id="addLinkTemplate">
    <div class="form-group row d-flex align-items-center footerlink">
        <div class="col-sm-4">
          <label class="col-sm-5 col-form-label">
            <strong>[[COUNT]]. Link Title </strong></label>
         <input name="newLink[[[COUNT]]][title]" type="text" class="form-control" required>
        </div>

      <div class="col-sm-4">
        <label class="col-sm-5 col-form-label">
          <strong>[[COUNT]]. Link Href</strong></label>
        <input name="newLink[[[COUNT]]][href]" type="url" class="form-control" required>
      </div>
      <div class="col-sm-2 mt-4 d-flex align-items-center removeLink">
        <span class="d-inline-block" style="font-size:16px;cursor: pointer;"> <i class="fa fa-times"></i> Remove</span>
      </div>
  </div>
  </script>

  <script>
    $(function(){
      $(document).on('click', '.removeLink', function(){
        $(this).parents('.row').remove()
      })

      $(document).on('click', '.addLink', function(){
        let template = $('#addLinkTemplate').html();
        let count = $('.footerlink').length + 1;
        template = $(template.replaceAll('[[COUNT]]', count));
        $(document).find('.links').append(template);
      })
    })
  </script>
@endsection
