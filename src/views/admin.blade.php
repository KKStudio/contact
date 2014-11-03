@extends('admin.template')

@section('content')

	<h3 class="pull-left">Wiadomości</h3>

	<div class=""> 

		<a href="{{ url('admin/contact/settings') }}" class="btn btn-default btn-lg pull-right" style="margin-left: 10px;">
			<i class="glyphicon glyphicon-cog"></i>
		</a>

		<div class="clearfix"></div>
		@if(count($message))

		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Nadawca</th>
				<th>Temat</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				@foreach($message as $message)
				<tr>
					<td>{{ $message->id }}</td>
					<td><a href="{{ url('admin/contact/' . $message->id ) }}">{{ $message->email }}</a></td>
					<td><a href="{{ url('admin/contact/' . $message->id ) }}">{{ $message->title }}</a></td>
					<td>
						<a href="{{ url('admin/contact/' . $message->id ) }}" class="btn btn-sm btn-secondary">pokaż</a>
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