@extends('backend.layouts.master') 
@section('title', 'Drugs List') 
@section('content')
<div class="container">
    <section class="page-section my-5 p-5">
        <div class="row">
            <div class="col-sm-1">
                <a href="{{ route('admin.treatments.create') }}" class="btn btn-primary">新增藥物治療方式</a>
            </div>
        </div>
        <div class="row">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">治療名稱</th>
                        <th scope="col">圖片</th>
                        <th scope="col">治療資訊</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($treatments as $treatment) 
                        <tr>
                            <th class="align-middle" scope="row">{{ $treatment->id }}</th>
                            <td class="align-middle">{{ $treatment->title }}</td>
                            <td class="align-middle"><img src="{{ asset('uploads/drugs/treatments/'. $treatment->image) }}" width="100px"></td>
                            <td class="align-middle">
                                <a href="{{ route('admin.treatments.edit', $treatment->id) }}" class="btn btn-primary">修改</a>
                                <form method="POST" action="{{ route('admin.treatments.destroy', $treatment->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-secondary">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Treatment</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection