@extends('admin.template')

@section('content')

	<h3 class="pull-left">Usuń wiadomość</h3>

	<div class=""> 

		{!! Form::open([ 'url' => 'admin/contact/' . $message->slug . '/delete']) !!}

			{!! Form::submit('Potwierdź usunięcie', [ 'class' => 'btn btn-lg btn-danger pull-right']) !!}

			<div class="clearfix"></div>

			<p>Potwierdź usunięcie wiadomości <b>{{ $message->title }}</b> klikając przycisk powyżej.</p>

		{!! Form::close() !!}

	</div>

@stop