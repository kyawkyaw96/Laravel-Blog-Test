@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3>Edit category</h3>
				<form action="{{ route('category.update', $category->id) }}" method="POST">
					@method('put')
					@csrf
					<div class="mb-3">
						<label for="" class="form-label">Category Title</label>
						<input type="text" value="{{ old('title', $category->title) }}" name="title"
							class="form-control @error('title') is-invalid @enderror">
						@error('title')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<button class="btn btn-outline-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
@endsection
