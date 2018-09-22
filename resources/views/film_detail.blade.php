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
	<film-detail slug = "{{ $slug }}"></film-detail>
	<film-comment slug = "{{ $slug }}" name="{{ isset(Auth::user()->name) ? Auth::user()->name : ''}}"></film-comment>
</div>
@endsection
