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
                            <h3 class="card-title header-title"> حسابات الموردين </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('accountSuppliers.update' , $accounts->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$accounts->date}}" id="date"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 row m-0 p-0">
                                        <div class="col-md-9 form-floating ">
                                            <select required class="form-control" name="supplier_id" id="name">
                                                <option value="">اختر المورد</option>
                                                @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @if ($accounts->supplier_id ==
                                                    $supplier->id) selected @endif>{{ $supplier->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="col-form-label">اسم المورد</label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <input type="number" class="form-control" id="safe" placeholder="" name="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$accounts->receipt_num}}"
                                            id="num" placeholder="رقم الايصال" name="receipt_num">
                                        <label for="num" class="col-form-label">رقم الايصال </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 form-floating">
                                        <select required class="form-control" name="payment_getway"
                                            onchange="consloSel(this)" id="unitname">
                                            <option value="" data-value='22'>نوع الدفع</option>
                                            <option value="1" data-value='0' @if ($accounts->payment_getway == 1)
                                                selected @endif>البنك</option>
                                            <option value="2" data-value='1' @if ($accounts->payment_getway == 2)
                                                selected @endif>نقدى</option>
                                        </select>
                                        <label for="unitname" class=" col-form-label"> نوع الدفع
                                        </label>
                                    </div>
                                    <div class="row col-md-4 m-0 p-0 selectDefault">
                                    </div>
                                    <div class="col-sm-4 row m-0 p-0 selectValShow">
                                        <div class="col-9 form-floating">
                                            <select class="form-control" name="bank_id" id="name">
                                                <option value="">اختر البنك</option>
                                                @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}" @if ($accounts->bank_id == $bank->id)
                                                    selected @endif>{{ $bank->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="bank" class="col-form-label"> البنك </label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <input type="number" class="form-control" id="bank" placeholder="" name="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 row m-0 p-0 selectValShow">
                                        <div class="col-9 form-floating">
                                            <select class="form-control" name="treasury_id" id="name">
                                                <option value="">اختر الخزينة</option>
                                                @foreach ($treasuries as $treasury)
                                                <option value="{{ $treasury->id }}" @if ($accounts->treasury_id ==
                                                    $treasury->id) selected @endif>{{ $treasury->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <input type="number" class="form-control" id="safe" placeholder="" name="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$accounts->amount}}"
                                            id="payee" placeholder="المبلغ" name="amount">
                                        <label for="payee" class="col-form-label">المبلغ</label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    {{-- <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="account"
                                            placeholder=" باقى لحسابة(لة)" name="rest">
                                        <label for="account" class="col-form-label"> باقى لحسابة(لة)</label>
                                    </div> --}}
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="note">{{$accounts->note}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button type="submit" onclick="history.back()" class="btn bg-secondary">
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
</div>
{{-- content-wrapper --}}
<script>
    let selectValShow = document.querySelectorAll('.selectValShow');
    let selectDefault = document.querySelector('.selectDefault');
    selectValShow.forEach(el => {
        el.style.display = 'none';
    })

    function consloSel(e) {
        let val = e.options[e.selectedIndex].getAttribute('data-value');
        console.log(val);
        selectValShow.forEach(el => {
            el.style.display = 'none';
            selectDefault.style.display = 'block'
        })
        if (val == 0 || val == 1) {
            selectValShow[val].style.display = 'flex';
            selectDefault.style.display = 'none'
        }
    }
</script>
@endsection
