@extends('layout')

@section('content')


  <!-- Jumbotron -->
  <div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-3 h2">Contact us</h1>
  <p> You can contact us with the form below.</p>
  </div>
  <!-- Jumbotron -->


  <!--Section: Contact v.2--> <br>
<div class="container">

    <div class="col-md-6" style="margin: 0 auto;">

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
@if (session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
@endif
      <form action="{{route('contact')}}" method="post">
        @csrf
  <!-- Name input -->

  <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input name="name" type="text" id="form3Example1" class="form-control" />
          <label class="form-label" for="form3Example1">Name</label>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input name="email" type="email" id="form4Example2" class="form-control" />
          <label class="form-label" for="form4Example2">Email</label>
        </div>
      </div>
    </div>


  <!-- Email input -->




  <!-- Sucject -->
  <div class="form-outline mb-4">
  <input name="subject" type="text" id="form4Example2" class="form-control" />
  <label class="form-label" for="form4Example2">Subject</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
  <textarea name="message" class="form-control" id="form4Example3" rows="10"></textarea>
  <label class="form-label" for="form4Example3">Message</label>
  </div>
  <center>
    @captcha
  </center><br>
<div class="form-outline mb-4 col-md-5" style="margin:0 auto;">

<input placeholder="write characters" type="text" id="captcha" class="form-control " name="captcha" autocomplete="off">
</div>
  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
  <input
  class="form-check-input me-2"
  type="checkbox"
  value="1"
  name="formCheck"
  id="form4Example4"
  />
  <label class="form-check-label" for="form4Example4">
  Add me to newsletter!
  </label>
  </div>

  <!-- Submit button -->
  <div class=" col-md-4" style="margin: 0 auto;">
      <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
  </div>


  </form>





    </div>
    </div>
<!--Section: Contact v.2-->
@endsection
