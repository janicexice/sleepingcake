@extends('backend.layouts.master') 
@section('title', 'Diet Ways List') 
@section('content')
<div class="container">
    <section class="page-section my-5 p-5">
        <div class="row">
            <div class="col-sm-1">
                <a href="{{ route('admin.diet.create') }}" class="btn btn-primary">新增健康飲食方法</a>
            </div>
        </div>
        <div class="row">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">標題</th>
                       
                        <th scope="col">圖片</th>
                        <th scope="col">描述</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($diet as $way) 
                        <tr>
                            <th class="align-middle" scope="row">{{ $way->id }}</th>
                            <td class="align-middle">{{ $way->title }}</td>
                            <td class="align-middle"><img src="{{ asset('uploads/health/diet/'. $way->image) }}" width="100px"></td>
                            <td class="align-middle">
                                <a href="{{ route('admin.diet.edit', $way->id) }}" class="btn btn-primary">修改</a>
                                <form method="POST" action="{{ route('admin.diet.destroy', $way->id) }}">  
                                    <!-- 原admin.product.destroy -->
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-secondary">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Diet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection