@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> تحويل العملاء من فنى لاخر </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('changeTechnician.update', $changes->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="technicianFrom_id" id="customer">
                                                <option>Select Technician</option>
                                                @foreach ($technicians as $key => $technician)
                                                    <option value="{{ $technician->id }}">
                                                        {{ $technician->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="transferFrom"
                                                class="col-form-label">تحويل من الفنى
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="technicianTo_id" id="customer">
                                                <option>Select Technician</option>
                                                @foreach ($technicians as $key => $technician)
                                                    <option value="{{ $technician->id }}">
                                                        {{ $technician->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="transferTo" class="col-form-label">
                                                إلى الفنى
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="reset" class="btn bg-secondary" onclick="history.back()" type="submit">
                                        <i class="fas fa-undo"></i>
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end card --}}
                {{-- start card table --}}
                {{-- end card table --}}


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
