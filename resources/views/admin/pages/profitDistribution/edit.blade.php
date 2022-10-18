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
                            <div class="card-header">
                                <h3 class="card-title" style="float: right"> توزيع ارباح الشركاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('profitDistribution.update', $profitDistributions->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control"
                                                value="{{ $profitDistributions->date }}" id="datestart"
                                                placeholder="تاريخ بداية الفترة" name="date">
                                            <label for="datestart" class="col-form-label"> تاريخ بداية الفترة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $profitDistributions->net_profit }}" id="profit"
                                                placeholder="صافى الربح خلال الفترة" name="net_profit">
                                            <label for="profit" class="col-form-label"> صافى الربح خلال الفترة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control"
                                                value="{{ $profitDistributions->draw_date }}" id="Drawdate"
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
                                                    <option value="{{ $treasury->id }}"
                                                        @if ($profitDistributions->treasury_id == $treasury->id) selected @endif>
                                                        {{ $treasury->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" id="safe" name="bank_id">
                                                <option value="">Select Bank</option>
                                                @foreach ($banks as $key => $bank)
                                                    <option value="{{ $bank->id }}"
                                                        @if ($profitDistributions->bank_id == $bank->id) selected @endif>
                                                        {{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="bank" class="col-form-label"> البنك </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control"
                                                value="{{ $profitDistributions->dateTo }}" id="dateto" placeholder="حتى"
                                                name="dateTo">
                                            <label for="dateto" class="col-form-label"> حتى </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $profitDistributions->distributed_profit }}" id="profitDis"
                                                placeholder="الربح الذى سيتم توزيعة" name="distributed_profit">
                                            <label for="profitDis" class="col-form-label"> الربح الذى سيتم
                                                توزيعة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $profitDistributions->amount }}" id="mon"
                                                placeholder="المبلغ المراد سحبة" name="amount">
                                            <label for="mon" class="col-form-label"> المبلغ المراد سحبة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                                id="note">{{ $profitDistributions->notes }}</textarea>
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
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div> <!-- /.content-header -->

    </div>{{-- content-wrapper --}}
@endsection
