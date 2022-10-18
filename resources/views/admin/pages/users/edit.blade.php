@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- /.row -->
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">المستخدمين</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('users.update' , $users->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row ">
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$users->name}}"
                                            placeholder="الاسم" name="name" required>
                                        <label for="store" class="col-form-label"> الاسم</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$users->address}}"
                                            placeholder="العنوان" name="address">
                                        <label for="store" class="col-form-label"> العنوان</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="email" class="form-control" value="{{$users->email}}"
                                            placeholder="الايميل" name="email" required>
                                        <label for="store" class="col-form-label"> الايميل</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="password" class="form-control" placeholder="الايميل"
                                            name="password">
                                        <input type="password" class="form-control" hidden value="{{$users->password}}"
                                            placeholder="الايميل" name="oldPassword">
                                        <label for="store" class="col-form-label"> كلمة السر</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input class="form-check-input" type="checkbox" value="1" name="active"
                                            @if($users->active == 1) checked @endif
                                        id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            تفعيل
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button class="btn bg-secondary" onclick="history.back()" type="submit">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
