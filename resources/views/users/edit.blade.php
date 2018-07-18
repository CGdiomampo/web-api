@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" >

                    <!-- general form elements -->
                    <div class="card">
                    <div class="card-header">
                        <h3 class="m-0">Fill up your information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <!-- PUT Method if we are editing -->
                        {{ method_field("PUT") }}
                        @csrf

                        <div class="card-body">
                            
                            <!-- text input -->
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="firstName" value="@if(isset($user->firstName)){{ $user->firstName }}@endif" type="text" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="lastName" value="@if(isset($user->lastName)){{ $user->lastName }}@endif"  type="text" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Nick Name</label>
                                <input type="text" value="@if(isset($user->nickName)){{ $user->nickName }}@endif" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="@if(isset($user->email)){{ $user->email }}@endif" type="email" class="form-control" placeholder="Enter Email">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter  ">
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" value="@if(isset($user->gender)){{ $user->gender }}@endif" class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                            </div>

                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                            <label>Birthday:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" value="@if(isset($user->birthday)){{ $user->birthday }}@endif" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </div>
                            <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- text input -->
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" value="@if(isset($user->age)){{ $user->age }}@endif" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" value="@if(isset($user->status)){{ $user->status }}@endif" class="form-control">
                                <option>Single</option>
                                <option>Married</option>
                                <option>Single Parent</option>
                                <option>Widow</option>
                                </select>
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" value="@if(isset($user->phone)){{ $user->phone }}@endif" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" value="@if(isset($user->city)){{ $user->city }}@endif" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card -->
            </div>
        </div>
      </div>
</section>
@endsection