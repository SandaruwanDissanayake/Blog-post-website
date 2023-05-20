@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        <div class="form-group">
                          <label >Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $post->title }}"  placeholder="Enter title" required>
                        
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter Description" rows="10" required>{{ $post->description }}</textarea>
                          
                          </div>
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
