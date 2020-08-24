@extends('backend.layouts.master') 

@section('title', 'Hobbies Edit') 

@section('content')

<div class="container">
    
    <section class="page-section my-5 p-5">

        <form method="POST" action="{{ route('admin.hobbies.update',  $hobby->id) }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="ways">標題</label>
                <div class="col-sm-10">
                    <input class="form-control" type="varchar" name="title" value="{{$hobby->title}}">
                </div>
            </div>

            <div class="form-group">
                <label for="description">描述</label>
                <textarea class="form-control" type="text" name="description" rows="5">{{$hobby->description}}</textarea>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="image">圖片</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="image">ss
                </div>
                <img src="{{ asset('uploads/health/hobbies/' . $hobby->image) }}" class="mt-3" style="height: 100%; width: 100%; object-fit: contain" onerror="this.src='{{ asset('uploads/health/hobbies/default.jpg') }}'">
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </div>
            
        </form>

    </section>
    
</div>


@endsection