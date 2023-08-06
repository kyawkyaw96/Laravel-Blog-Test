@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				@if (session('message'))
					<div class="alert alert-success">{{ session('message') }}</div>
				@endif
				<h3>Article Detail</h3>
				<div class="my-3">
					{{-- search button --}}
					{{-- <div class="d-flex justify-content-end my-3">
						<form action="{{ route('article.index') }}" class="input-group w-25" method="get">
							<input type="text" name="keyword" id="" class="form-control"
								@if (request()->has('keyword')) value="{{ request()->keyword }}" @endif placeholder="search here">
							@if (request()->has('keyword'))
								<a href="{{ route('article.index') }} " class="btn btn-danger">X</a>
							@endif
							<button class="btn btn-primary">Search</button>
						</form>
					</div> --}}
					<a href="{{ route('article.create') }}" class="btn btn-outline-primary">Create</a>
					<a href="{{ route('article.index') }}" class="btn btn-outline-primary">All List</a>
				</div>
				<p><span class="badge bg-black">{{ $article->category_id }}</span></p>
				<h3> {{ $article->title }}</h3>
				<p>{{ $article->desc }}</p>

			</div>
		</div>
	</div>
@endsection
