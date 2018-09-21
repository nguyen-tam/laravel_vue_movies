@extends('layouts.app')

@section('script')
    <script>      
      const app = new Vue({
          el: '#app'
      });
</script>
@endsection
@section('content')

<div id="app">
	<list-film></list-film>
</div>
@endsection
