@extends('backend.layouts.master') 
@section('title', 'Vitamins List') 
@section('content')
<div class="container">
    <section class="page-section my-5 p-5">
        <div class="row">
            <div class="col-sm-1">
                <a href="{{ route('admin.vitamins.create') }}" class="btn btn-primary">新增維生素</a>
            </div>
        </div>
        <div class="row">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">名稱</th>
                        <th scope="col">圖片</th>
                        <th scope="col">描述</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vitamins as $vitamin) 
                        <tr>
                            <th class="align-middle" scope="row">{{ $vitamin->id }}</th>
                            <td class="align-middle">{{ $vitamin->name }}</td>
                            <td class="align-middle">{{ $vitamin->description }}</td>
                            <td class="align-middle"><img src="{{ asset('uploads/supplements/vitamins/'. $vitamin->image) }}" width="100px"></td>
                            <td class="align-middle">
                                <a href="{{ route('admin.vitamins.edit', $vitamin->id) }}" class="btn btn-primary">修改</a>
                                <form method="POST" action="{{ route('admin.vitamins.destroy', $vitamin->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-secondary">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Vitamin</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection