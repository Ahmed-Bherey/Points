@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> إستيراد بالدولار </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="اسم المصروف"
                                                name="">
                                            <label for="name" class="col-form-label"> اسم المصروف </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="value"
                                                placeholder="قيمة المصروف" name="">
                                            <label for="value" class="col-form-label"> قيمة المصروف </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="total"
                                                placeholder=" إجمالى المصروفات" name="">
                                            <label for="total" class="col-form-label"> إجمالى المصروفات
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="totalprice"
                                                placeholder=" إجمالى ثمن الشحنة بالدولار" name="">
                                            <label for="totalprice" class="col-form-label"> إجمالى ثمن الشحنة بالدولار
                                            </label>
                                            <div class="col-sm-8">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="diffrent"
                                                placeholder="فرق ثمن الدولار" name="">
                                            <label for="diffrent" class="col-form-label"> فرق ثمن الدولار
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="dollarprice"
                                                placeholder="سعر الدولار الحالى" name="">
                                            <label for="dollarprice" class="col-form-label"> سعر الدولار الحالى</label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="finalprice"
                                                placeholder=" سعر الدولار النهائى" name="">
                                            <label for="finalprice" class="col-form-label"> سعر الدولار النهائى
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
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-12 mt-1">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">إستيراد بالدولار </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr>



                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم المصروف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            قيمة المصروف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">s</td>
                                                        <td>dsdf </td>
                                                        <td>
                                                            <button type="submit" class="btn bg-secondary "> <i
                                                                    class="far fa-edit " aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-danger "><i
                                                                    class="fas fa-trash-alt "></i> </button>
                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
