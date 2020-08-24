@extends('backend.layouts.master') 
@section('title', 'DrugIntroduction List') 
@section('content')
<div class="container">
    <section class="page-section my-5 p-5">
        <div class="row">
            <div class="col-sm-1">
                <a href="{{ route('admin.drug_introduction.create') }}" class="btn btn-primary">新增藥品</a>
            </div>
        </div>
        <div class="row">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">藥品名稱</th>
                        <th scope="col">藥品學名</th>
                        <th scope="col">圖片</th>
                        <th scope="col">使用方式</th>
                        <th scope="col">藥品資訊</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($drug_introduction as $drug) 
                        <tr>
                            <th class="align-middle" scope="row">{{ $drug->id }}</th>
                            <td class="align-middle">{{ $drug->name }}</td>
                            <td class="align-middle">{{ $drug->generic_name }}</td>
                            <td class="align-middle"><img src="{{ asset('uploads/drugs/drug_introduction/'. $drug->image) }}" width="100px"></td>
                            <td class="align-middle">
                                <a href="{{ route('admin.drug_introduction.edit', $drug->id) }}" class="btn btn-primary">修改</a>
                                <form method="POST" action="{{ route('admin.drug_introduction.destroy', $drug->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-secondary">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No DrugIntroduction</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection