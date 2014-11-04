@extends('admin.template')

@section('content')

	<h3 class="pull-left">Wiadomość #{{ $message->id }}</h3>
	<a href="{{ url('admin/contact') }}" class="btn btn-lg btn-warning pull-right">Powrót do wiadomości</a>

	<a class="btn btn-lg btn-primary pull-right" href="mailto:{{ $message->email }}?subject=Odpowiedź%20ze%20strony%20{{ url('/')}}&body=Twoja%20wiadomość:%0A%0A{{$message->content}}%0A%0A%0A%0AOdpowiedź:%0A%0A">

	<br>

	<div class="clearfix"></div>

	<div class=""> 

			<p><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
			<br>
			<h3>{{ $message->title }}</h3>
			<hr>
			<p>{{ $message->content }}</p>

	</div>

@stop