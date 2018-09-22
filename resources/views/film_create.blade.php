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
	<film-create></film-create>
</div>
@endsection
