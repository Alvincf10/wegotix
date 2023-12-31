@extends('layouts/dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h3>Users</h3>
            </div>
            <div class="col-4 text-right">
                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash mr-2"></i>Delete</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="{{ route('dashboard.users.update'['id'=>$user->id]) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name}}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <button type="button" onclick="window.history.back()" class="btn btn-danger btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-pen mr-2"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete</h5>
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin ingin menghapus user {{$user->name}}</p>
            </div>
            <div class="modal-footer">
                <form action="{{route ('dashboard.users.delete',['id'=>$user->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash mr-2"></i>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
