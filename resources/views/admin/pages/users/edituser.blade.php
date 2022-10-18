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

                        <form class="form-horizontal"  action="{{route('users.edit.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inputLName" class="col-sm-2 col-form-label">  Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"  value="{{$user->name}}" class="form-control" id="inputLName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email"  name="email" value="{{$user->email}}"  class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputTell1" class="col-sm-2 col-form-label">password </label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password"  class="form-control" id="inputTell1" placeholder="Password">
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-around">

                                <button type="submit" class="btn btn-warning"><i class="far fa-edit mr-1"></i></button>
                                <button type="reset" class="btn btn-danger"><i class="fas fa-times m-1"></i> </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </section>
    <script>
        document.onkeydown = function (t) {
            if(t.which == 9){
                return false;
            }
            if(t.which == 13){
                return false;
            }
            if(t.which == 37){
                return false;
            }
            if(t.which == 38){
                return false;
            }
            if(t.which == 39){
                return false;
            }
            if(t.which == 40){
                return false;
            }
        }
    </script
@endsection
