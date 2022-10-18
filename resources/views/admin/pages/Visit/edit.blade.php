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
                                <h3 class="card-title header-title">زيارة عميل</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal" action="{{ route('visits.edit.update',$visits->id) }} " method="post">
                               @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating mb-3">
                                            <select class="form-control" name="client_id" id="customar">
                                                <option> اضافه عميل</option>
                                                @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{$visits->clients->name }}</option>
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customar" class="col-form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-sm-3 form-floating mb-3">
                                            <input type="date" class="form-control" id="date" value="{{$visits->date }}" placeholder="تاريخ الزيارة"
                                                name="date">
                                            <label for="date" class="col-form-label">تاريخ الزيارة </label>
                                        </div>

                                        <div class="col-sm-3 form-floating mb-3">
                                            <select class="form-control" name="representative_id" id="represent">

                                                @foreach ($representatives as $representative)
                                                <option value="{{ $representative->id }}">{{$visits->representatives->name }}</option>
                                                <option value="{{ $representative->id }}">{{ $representative->name }}</option>
                                            @endforeach

                                            </select>
                                            <label for="represent" class="col-form-label">اسم المندوب</label>
                                        </div>
                                        <div class="col-sm-3 form-floating mb-3">
                                            <textarea class="form-control" rows="3" placeholder="نبذة عن الزيارة ..." name="description" id="note">{{ $visits->description }}</textarea>
                                            <label for="note" class="col-sm-4 col-xl-3 col-form-label">نبذة عن
                                                الزيارة</label>
                                        </div>
                                        <div class="form-check col-sm-3">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">زيارة بتكلفة </label>
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


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
