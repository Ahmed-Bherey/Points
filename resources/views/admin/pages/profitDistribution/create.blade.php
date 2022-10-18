@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-info">
                            <div class="card-header header-bg">
                                <h3 class="card-title" style="float: right"> توزيع ارباح الشركاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('profitDistribution.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="datestart"
                                                placeholder="تاريخ بداية الفترة" name="date">
                                            <label for="datestart" class="col-form-label"> تاريخ بداية الفترة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="profit"
                                                placeholder="صافى الربح خلال الفترة" name="net_profit">
                                            <label for="profit" class="col-form-label"> صافى الربح خلال الفترة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="Drawdate"
                                                placeholder=" تاريخ السحب" name="draw_date">
                                            <label for="Drawdate" class="col-form-label"> تاريخ السحب </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" id="safe" name="treasury_id">
                                                <option value="">Select Treasury</option>
                                                @foreach ($treasuries as $key => $treasury)
                                                    <option value="{{ $treasury->id }}">{{ $treasury->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" id="safe" name="bank_id">
                                                <option value="">Select Bank</option>
                                                @foreach ($banks as $key => $bank)
                                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="bank" class="col-form-label"> البنك </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="dateto" placeholder="حتى"
                                                name="dateTo">
                                            <label for="dateto" class="col-form-label"> حتى </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="profitDis"
                                                placeholder="الربح الذى سيتم توزيعة" name="distributed_profit">
                                            <label for="profitDis" class="col-form-label"> الربح الذى سيتم
                                                توزيعة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="mon"
                                                placeholder="المبلغ المراد سحبة" name="amount">
                                            <label for="mon" class="col-form-label"> المبلغ المراد سحبة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملاحظات</label>
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

                {{-- end card --}}
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;"> توزيع ارباح الشركاء </h3>
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
                                                        <td>#</td>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ بداية الفترة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            حتي</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            صافى الربح خلال الفترة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">الربح
                                                            الذي سيتم توزيعة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ السحب</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            المبلغ المراد سحبة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            ملاحظات</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($profitDistributions as $key => $profitDistribution)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $profitDistribution->date }}</td>
                                                            <td>{{ $profitDistribution->dateTo }}</td>
                                                            <td>{{ $profitDistribution->net_profit }}</td>
                                                            <td>{{ $profitDistribution->distributed_profit }}</td>
                                                            <td>{{ $profitDistribution->draw_date }}</td>
                                                            <td>{{ $profitDistribution->amount }}</td>
                                                            <td>{{ $profitDistribution->notes }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('profitDistribution.edit', $profitDistribution->id) }}"
                                                                        class="text-white"><i class="far fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('profitDistribution.destroy', $profitDistribution->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-danger"><i
                                                                            class="fas fa-trash-alt"></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{-- end table --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div> <!-- /.content-header -->

    </div>{{-- content-wrapper --}}
@endsection
