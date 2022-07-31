@extends('layout')

@section('content')
<div class="container mt-3 mb-4">
    <h2 class="mt-4">Edit ToDo</h2>
    <div class="wraper d-flex flex-wrap">
        @foreach ($todos as $todo)
        <div class="todo">
            <div class="left-item">
                <h3>Belum Selesai Dikerjakan</h3>
                <p>{{$todo->date}}</p>
            </div>
            <div class="right-item">
                <h2>{{$todo->title}}</h2>
                <p>{{$todo->description}}</p>
            </div>
        </div>
        <form method="POST" action="{{route('todo.update')}}" class="form_edit">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="id" name="id" value="{{$todo->id}}" hidden>
            </div>
            <div class="form-group">
                <label for="title" class="col-form-label">Nama Kegiatan:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
                <span class="text-danger mt-2">@error('title'){{ $message }}@enderror</span>
            </div>i
            <div class="form-group">
                <label for="description" class="col-form-label">Deskripsi Kegiatan:</label>
                <textarea name="description" class="form-control" id="description" rows="2">{{$todo->description}}</textarea>
                <span class="text-danger mt-2">@error('description'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="date" class="col-form-label">Target Selesai:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$todo->date}}">
                <span class="text-danger mt-2">@error('date'){{ $message }}@enderror</span>
            </div>
            <a type="button" class="btn btn-secondary" href="{{route('todo',Auth::user()->id)}}">Kembali</a>
            <button type="submit" class="btn btn-primary">Tambahkan</button>           
        </form>
        @endforeach
    </div>
</div>
@endsection