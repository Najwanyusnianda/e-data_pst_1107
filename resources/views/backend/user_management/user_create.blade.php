@extends('layout.master_back')
@section('section_header')
@if (empty($user))
<h1>Tambah User</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item  active"><a href="{{ route('admin.dashboard_index') }}">Home</a></div>
  <div class="breadcrumb-item  active"><a href="{{ route('user.index') }}">Kelola User</a></div>
  <div class="breadcrumb-item"><a href="#">Tambah User</a></div>
 
</div>
@else
<h1>Update User</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item  active"><a href="{{ route('admin.dashboard_index') }}">Home</a></div>
  <div class="breadcrumb-item  active"><a href="{{ route('user.index') }}">Kelola User</a></div>
  <div class="breadcrumb-item"><a href="#">Update User</a></div>
 
</div>
@endif

@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @if (empty($user))
                <h4>Tambah Pengguna Baru</h4>
                @else
                <h4>Update Data Pengguna</h4>
                @endif
            </div>
            <div class="card-body">
                @if (empty($user))
                <form action="{{route('user.store')}}" method="post" >
                    {{ csrf_field() }}
     
                    <div class="form-group">
                        <label for="indikator">Nama</label>
                        <input type="indikator" class="form-control" id="name" name="name" value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    

                    <div class="form-group">
                        <label for="indikator">Password</label>
                        <input type="password" class="form-control" id="password" name="password"  value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role </label>
                        <select class="form-control" id="role" name="role">
                            <!--<option value="2" >Admin</option>-->
                            <option value="2" >Admin</option>
                            <option value="3" >Operator</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @else
                <form action="{{route('user.storeUpdate',[$user->id])}}" method="post" >
                    {{ csrf_field() }}
     
                    <div class="form-group">
                        <label for="indikator">Nama</label>
                        <input type="indikator" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>


                    <div class="form-group">
                        <label for="indikator">Password</label>
                        <input type="password" class="form-control" id="password" name="password"  value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role </label>
                        <select class="form-control" id="role" name="role">
                            <option disabled >Pilih Role</option>
                           <option value="2"  {{ $user->typeId==2 ? 'selected' : '' }}>Admin</option>
                            <option value="3" {{ $user->typeId==3 ? 'selected' : '' }} >Operator</option>
                            <!--<1<option value="4" >User</option>-->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif

         

               
            </div>
            </div>
        </div>
    </div>
@endsection