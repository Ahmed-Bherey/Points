@extends('admin.layouts.includes.master')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header header-bg">
                            <h3 class="card-title" style="float: right"> سحب وايداع البنك </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('withdrawDeposite.update' , $withdrawDeposites->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="date" class="form-control" value="{{$withdrawDeposites->date}}"
                                            id="date" placeholder="" name="date">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <select required class="form-control" name="process" id="process">
                                            <option value="">اختر نوع المعاملة</option>
                                            <option value="1" @if ($withdrawDeposites->process == 1) selected @endif>
                                                سحب</option>
                                            <option value="2" @if ($withdrawDeposites->process == 2) selected @endif>
                                                ايداع</option>
                                        </select>
                                        <label for="process" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">المعاملة
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" value="{{$withdrawDeposites->amount}}"
                                            id="mon" placeholder="" name="amount">
                                        <label for="mon"
                                            class="col-sm-3 col-lg-4 col-xl-3 col-form-label">المبلغ</label>
                                    </div>
                                    <div class="col-sm-4 row p-0 m-0">
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" name="bank_id" id="bank">
                                                <option value="">اختر البنك</option>
                                                @foreach ($banks as $key => $bank)
                                                <option value="{{ $bank->id }}" @if ($withdrawDeposites->bank_id ==
                                                    $bank->id) selected @endif>{{ $bank->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="bank" class="col-sm-3 col-lg-4 col-xl-3 col-form-label"> البنك
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="bank_balance" placeholder=""
                                                name="bank_balance">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 row p-0 m-0">
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" name="treasury_id" id="bank">
                                                <option value="">اختر الخزينة</option>
                                                @foreach ($treasuries as $key => $treasury)
                                                <option value="{{ $treasury->id }}" @if ($withdrawDeposites->treasury_id
                                                    == $treasury->id) selected @endif>{{ $treasury->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-sm-3 col-lg-4 col-xl-3 col-form-label"> الخزينة
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="treasury_balance"
                                                placeholder="" name="treasury_balance">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes"
                                            id="note">{{$withdrawDeposites->notes}}</textarea>
                                        <label for="note" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">ملاحظات
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
            {{-- end card --}}
            {{-- start card table --}}
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="bank_id"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('withdrawDeposite.bank.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#bank_balance').empty();
                        $('#bank_balance').val(data);
                        $('#bank_balance').trigger('change');
                    }
                });
            } else {
                $('select[name="bank_balance"]').empty();
            }
        });


        $('select[name="treasury_id"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('withdrawDeposite.treasury.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#treasury_balance').empty();
                        $('#treasury_balance').val(data);
                        $('#treasury_balance').trigger('change');
                    }
                });
            } else {
                $('select[name="bank_balance"]').empty();
            }
        });
    });
</script>
<script>
    let selectValShow= document.querySelectorAll('.selectValShow');
    let selectDefault= document.querySelector('.selectDefault');
    selectValShow.forEach(el=>{
        el.style.display='none';
    })
    function consloSel(e){
        let val=e.options[e.selectedIndex].getAttribute('data-value');
        console.log(val);
        selectValShow.forEach(el=>{
        el.style.display='none';
        selectDefault.style.display='block'
    })
        if(val==0 || val==1){
            selectValShow[val].style.display='flex';
            selectDefault.style.display='none'
        }
    }
</script>
@endsection
