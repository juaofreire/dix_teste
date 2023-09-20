@extends('layouts.app', ['page' => __('News'), 'pageSlug' => 'news'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Create News</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('news_store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="string" name='title' class="form-control" id="title"
                                placeholder="Enter the news title here" value="{{ old('title') }}">
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name='description' id="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
