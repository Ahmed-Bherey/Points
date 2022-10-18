@extends('admin.layouts.includes.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-8 col-xl-8">
                <div class="card card-info ">
                    <div class="card-header">
                        <h3 class="card-title "><i class="fas fa-user-plus mr-2"></i>Add User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @include('admin.layouts.alerts.success')
                    @include('admin.layouts.alerts.errors')
                    <form class="form-horizontal" action="{{ route('users.create.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label"> First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" required
                                        placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" required
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTell1" class="col-sm-2 col-form-label">password </label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" required id="inputTell1"
                                        placeholder="password">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info "><i class="fas fa-check m-1"></i></button>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-times m-1"></i> </button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\User::get() as $key=> $item)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$item->name}}</td> >
                            <td>{{$item->email}}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{route('users.edit.index',$item->id)}}" class="btn btn-warning"><i
                                        class="far fa-edit mr-1"></i> </a>
                                <a type="button" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                    href="{{route('users.delete',$item->id)}}"><i class="fas fa-trash-alt mr-1"></i></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    document.onkeydown = function(t) {
            if (t.which == 9) {
                return false;
            }
            if (t.which == 13) {
                return false;
            }
            if (t.which == 37) {
                return false;
            }
            if (t.which == 38) {
                return false;
            }
            if (t.which == 39) {
                return false;
            }
            if (t.which == 40) {
                return false;
            }
        } <
        /script
    @endsection
