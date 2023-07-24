@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				@if (session('message'))
					<div class="alert alert-success">{{ session('message') }}</div>
				@endif
				<h3>User list</h3>
				<div class="d-flex justify-content-between my-3">
					<a href="{{ route('article.create') }}" class="btn btn-outline-primary">Create</a>
					<div class="">
						<form action="{{ route('article.index') }}" class="input-group" method="get">
							<input type="text" name="keyword" id="" class="form-control"
								@if (request()->has('keyword')) value="{{ request()->keyword }}" @endif placeholder="search here">
							@if (request()->has('keyword'))
								<a href="{{ route('article.index') }} " class="btn btn-danger">X</a>
							@endif
							<button class="btn btn-primary">Search</button>
						</form>
					</div>
				</div>
				<table class="table-success table-striped table">
					<thead class="rounded-1">
						<tr class="border">
							<th class="rounded-1 border p-3">#</th>
							<th class="border p-3">User Info</th>
							<th class="border p-3">Created at</th>
							<th class="border p-3">Updated up</th>

						</tr>
					</thead>
					<tbody class="border">
						@forelse ($users as $user)
							<tr class="border">
								<td class="border p-3">{{ $user->id }}</td>
								<td class="border p-3">
									<p class="mb-0">{{ $user->name }}</p>
									<p class="mb-0">{{ $user->email }}</p>
								</td>

								<td class="border p-3">{{ $user->created_at->diffforhumans() }}</td>
								<td class="border p-3">{{ $user->updated_at->diffforhumans() }}</td>
							</tr>
						@empty
							<tr>
								<td colspan="6" class="text-center">
									There is no record <br>
									<a href="{{ route('article.create') }}" class="btn btn-primary my-2">Create </a>
								</td>
							</tr>
						@endforelse

					</tbody>
				</table>
				{{ $users->onEachSide(1)->links() }}
			</div>
		</div>
	</div>
@endsection
