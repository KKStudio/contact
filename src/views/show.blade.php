@extends('admin.template')

@section('content')

	<h3 class="pull-left">Wiadomość #{{ $message->id }}</h3>
	<a href="{{ url('admin/contact') }}" class="btn btn-lg btn-primary pull-warning">Powrót do wiadomości</a>

	<br>

	<div class=""> 

			<h3><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></h3>
			<br>
			<h3>{{ $message->title }}</h3>
			<hr>
			<p>{{ $message->content }}</p>

	</div>

@stop