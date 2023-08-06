@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3>Edit article</h3>
				<form action="{{ route('article.update', $article->id) }}" method="POST">
					@method('put')
					@csrf
					<div class="mb-3">
						<label for="" class="form-label">article Title</label>
						<input type="text" value="{{ old('title', $article->title) }}" name="title"
							class="form-control @error('title') is-invalid @enderror">
						@error('title')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Select Category</label>
						<select name="category" class="form-select @error('category') is-invalid @enderror">
							@foreach (App\Models\Category::all() as $category)
								<option value="{{ $category->id }}"
									{{ old('category', $article->category_id) == $category->id ? 'selected' : '' }}>
									{{ $category->title }}
								</option>
							@endforeach
						</select>
						@error('category')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="" class="d-block form-label">Description</label>

						<textarea class="@error('desc')
                            is-invalid @enderror" name="desc" cols="80"
						 rows="10">{{ old('desc', $article->desc) }}
                        </textarea>
						@error('desc')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<button class="btn btn-outline-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
@endsection
