<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Stuff -->
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
  <title>{{ config('app.name', 'PHP StackOverflow') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
  @yield('css')  

</head>
<body>  


  <div class="container">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal "><a href="/" class="text-white">Home</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">

        @if (!Auth::guest())          
          <a class="p-2 text-white" href="{{ url('users/'. Auth::user()->id ) }}">Hello, {{ Auth::user()->name }}</a>
          <a class="p-2 text-white" href="{{ url('logout') }}">Log out</a>
        @endif

        @if (Auth::guest())
          <a class="p-2 text-white" href="{{ url('login') }}">Login</a>
          <a class="p-2 text-white" href="{{ url('register') }}">Register</a>
        @endif        
      </nav>
    </div>

    
    @yield('content')    

    <hr>

    <!-- Footer -->
    <footer>
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
    </footer>

  </div>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('script')
</body>
</html>

