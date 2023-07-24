@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3>Create New Article</h3>
				<hr>
				<form action="{{ route('article.store') }}" method="POST">
					@csrf
					<div class="mb-3">
						<label for="" class="form-label">Article Title</label>
						<input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
							value="{{ old('title') }}">
						@error('title')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="" class="d-block form-label">Description</label>
						<textarea name="desc" cols="80" rows="10" class="@error('title')is-invalid @enderror"
						 value="{{ old('desc') }}"></textarea>
						@error('desc')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<button class="btn btn-outline-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
@endsection
