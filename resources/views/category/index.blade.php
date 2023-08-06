@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">

				@if (session('message'))
					<div class="alert alert-success">{{ session('message') }}</div>
				@endif
				<h3>Category list</h3>
				<hr>
				<div class="d-flex justify-content-between my-3">
					<a href="{{ route('category.create') }}" class="btn btn-outline-primary">Create</a>
					<div class="">
						<form action="{{ route('category.index') }}" class="input-group" method="get">
							<input type="text" name="keyword" id="" class="form-control"
								@if (request()->has('keyword')) value="{{ request()->keyword }}" @endif placeholder="search here">
							@if (request()->has('keyword'))
								<a href="{{ route('category.index') }} " class="btn btn-danger">X</a>
							@endif
							<button class="btn btn-primary">Search</button>
						</form>
					</div>
				</div>
				<table class="table-success table-striped table">
					<thead class="rounded-1">
						<tr class="border">
							<th class="rounded-1 border p-3">#</th>
							<th class="border p-3">Title</th>
							<th class="border p-3">Owner</th>
							<th class="border p-3">Control</th>
							<th class="border p-3">Created at</th>
							<th class="border p-3">Updated up</th>

						</tr>
					</thead>
					<tbody class="border">
						@forelse ($categories as $category)
							<tr class="border">
								<td class="border p-3">{{ $category->id }}</td>
								<td class="border p-3">{{ $category->title }}</td>
								<td class="border p-3">{{ $category->user_id }}</td>
								<td>
									<div class="btn-group">

										<a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-dark"><i
												class="bi bi-pencil"></i></a>
										<button form="categoryDeleteForm{{ $category->id }}" class="btn btn-sm btn-outline-dark"><i
												class="bi bi-trash"></i></button>
									</div>
									<form id="categoryDeleteForm{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}"
										class="d-inline-block my-1" method="post">
										@method('delete')
										@csrf
									</form>
								</td>
								<td class="border p-3">{{ $category->created_at->diffforhumans() }}</td>
								<td class="border p-3">{{ $category->updated_at->diffforhumans() }}</td>
							</tr>
						@empty
							<tr>
								<td colspan="8" class="text-center">
									There is no record <br>
									<a href="{{ route('category.create') }}" class="btn btn-primary my-2">Create </a>
								</td>
							</tr>
						@endforelse

					</tbody>
				</table>
				{{-- {{ $categories->onEachSide(1)->links() }} --}}
			</div>
		</div>
	</div>
@endsection
