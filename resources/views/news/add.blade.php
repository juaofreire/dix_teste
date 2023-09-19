@extends('layouts.app', ['page' => __('News'), 'pageSlug' => 'news'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('news_store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="string" name='title' class="form-control" id="title"
                                        placeholder="Enter the news title here">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name='description' id="description" rows="3"></textarea>
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
        </div>
    </div>
@endsection
