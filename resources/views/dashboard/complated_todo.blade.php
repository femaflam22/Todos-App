@extends('layout')

@section('content')
<div class="container mt-3 mb-4">
    @if (Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif
    @if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::get('undo'))
        <div class="alert alert-success">
            {{ Session::get('undo') }} <a href="{{route('todo',Auth::user()->id)}}" class="alert-link">lihat disini</a>
        </div>
    @endif
    <div class="wraper d-flex flex-wrap">
        @if ($todos->count() > 0)
        @foreach ($todos as $todo)
        <div class="todo">                
            <div class="left-item">
                <h3>Selesai Dikerjakan</h3>
                <p>Target Selesai : {{$todo->date}}</p>
            </div>
            <div class="right-item">
                <h2>{{$todo->title}}</h2>
                <p>{{$todo->description}}</p>
                <p>Selesai tanggal : {{$todo->created_at->toDateString()}}</p>
                <div class="action">
                    <a href="{{route('complated.undo',$todo->id)}}">
                        <img src="{{ asset('img/undo-ouline.svg') }}" alt="complated" width="20">
                    </a>
                    <a href="{{route('complated.destroy',$todo->id)}}">
                        <img src="{{ asset('img/trash-fill.svg') }}" alt="delete" width="20">
                    </a>
                </div>
            </div>
        </div>
         @endforeach
    </div>
    @else
    <div class="d-flex flex-column w-50 m-auto">
        <img src="{{ asset('img/not_found.svg') }}" alt="admin" width="300" class="d-block ml-auto mr-auto">
        <p class="h5 mt-3 text-center d-block ml-auto mr-auto">Data tidak ditemukan, kamu belum membuat daftar ToDo. Silahkan membuatnya terlebih dahulu.</p>
        <button type="button" class="btn btn-info d-block mr-auto ml-auto mt-3 btn-lg text-white" data-toggle="modal" data-target="#addTodo">Buat ToDo</button>
    </div>
    @include('dashboard.add_modal')
    @endif
</div>
@endsection