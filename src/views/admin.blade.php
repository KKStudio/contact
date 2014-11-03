@extends('admin.template')

@section('content')

	<h3 class="pull-left">Kontakt</h3>

	<div class=""> 

		<a href="{{ url('admin/contact/settings') }}" class="btn btn-default btn-lg pull-right" style="margin-left: 10px;">
			<i class="glyphicon glyphicon-cog"></i>
		</a>

		{!! Form::open([ 'url' => 'admin/menu/create']) !!}

			{!! Form::hidden('display_name', 'Kontakt') !!}
			{!! Form::hidden('route', 'contact') !!}
			{!! Form::hidden('params', json_encode([])) !!}

			{!! Form::submit('Dodaj do menu', [ 'class' => 'pull-right btn btn-lg btn-warning']) !!}

		{!! Form::close() !!}

		<div class="clearfix"></div>
		@if(count($messages))

		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Nadawca</th>
				<th>Temat</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				@foreach($messages as $message)
				<tr>
					<td>{{ $message->id }}</td>
					<td>{{ $message->email }}</td>
					<td>{{ $message->title }}</td>
					<td>
						<a href="{{ url('admin/contact/' . $message->id ) }}" class="btn btn-sm btn-primary">pokaż</a>
					</td>
					<td>
						<a href="{{ url('admin/contact/' . $message->slug . '/delete') }}" class="btn btn-sm btn-danger">usuń</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p class="text-muted">Brak wiadomości.</p>
		@endif

	</div>

@stop