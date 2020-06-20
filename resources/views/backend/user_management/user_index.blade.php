@extends('layout.master_back')
@section('section_header')
    <h1>Kelola User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard_index') }}">Home</a></div>
      <div class="breadcrumb-item "><a href="#">Kelola User</a></div>
     
    </div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
       
            <h4>User Management</h4>
            <div class="card-header-action">
            <a href="{{route('user.create') }}" class="btn btn-info btn-border btn-round btn-sm mr-2">
                    <span class="btn-label">
                        <i class="fa fa-plush"></i>
                    </span>
                    Tambah Pengguna
                </a>

            </div>
      
    </div>
    <div class="card-body">
        @if ($users->isEmpty())
            
        @else

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->typeId==1 ? 'Superadmin' : ($user->typeId==2 ? 'admin' : ($user->typeId==3 ? 'operator' : 'user')) }}</td>

                    <td>
                        <a href="{{ route('user.update',['user_id'=>$user->id]) }}" class="btn btn-sm btn-success"> Update Data</a>
                        <a href="{{ route('user.delete',['user_id'=>$user->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah ingin menghapus pengguna ini?');"> Hapus Data</a>
                    </td>
                </tr>
                @endforeach

                @endif
            </tbody>
        </table>

    </div>
</div>
@endsection

