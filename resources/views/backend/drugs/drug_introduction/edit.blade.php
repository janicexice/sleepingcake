@extends('backend.layouts.master') 

@section('title', 'Drug Edit') 

@section('content')

<div class="container">
    
    <section class="page-section my-5 p-5">

        <form method="POST" action="{{ route('admin.drug_introduction.update',  $drug->id) }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">藥品名稱</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{$drug->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="generic_name">藥品學名</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="generic_name" value="{{$drug->generic_name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="uses">使用方式</label>
                <textarea class="form-control" type="text" name="uses" rows="5">{{$drug->uses}}</textarea>
            </div>

            <div class="form-group">
                <label for="description">藥品資訊</label>
                <textarea class="form-control" type="text" name="description" rows="5">{{$drug->description}}</textarea>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="image">圖片</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="image">
                </div>
                <img src="{{ asset('uploads/drugs/drug_introduction/' . $drug->image) }}" class="mt-3" style="height: 100%; width: 100%; object-fit: contain" onerror="this.src='{{ asset('uploads/drugs/drug_introduction/default.jpg') }}'">
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