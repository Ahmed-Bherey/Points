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
                            <h3 class="card-title" style="float: right"> الشيكات </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('check.update', $checks->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 row m-0 p-0 ">
                                        <div class="col-9 form-floating">
                                            <select required class="form-control" name="name" id="bank">
                                                <option value="">اختر صاحب الشيك</option>
                                                <option value="1" @if ($checks->name == 1) selected @endif>عميل</option>
                                                <option value="2" @if ($checks->name == 2) selected @endif>مورد</option>
                                            </select>
                                            <label for="bank" class="col-form-label">صاحب الشيك </label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <select class="form-control" name="data" id="data">
                                                @if ($checks->name == 1)
                                                <option value="{{$checks->client_id}}">{{$checks->clients->name}}
                                                </option>
                                                @else
                                                <option value="{{$checks->supplier_id}}">{{$checks->suppliers->name}}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="bank_id" id="safe">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" @if ($checks->bank_id == $bank->id) selected
                                                @endif>{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label">اسم البنك
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$checks->amount}}"
                                            id="account" placeholder="قيمة الشيك" name="amount">
                                        <label for="process" class="col-form-label">قيمة
                                            الشيك </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$checks->date}}" id="date"
                                            placeholder="تاريخ الاستحقاق" name="date">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">تاريخ
                                            الاستحقاق
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$checks->check_num}}"
                                            id="mon" placeholder="رقم الشيك" name="check_num">
                                        <label for="mon" class="col-form-label">رقم
                                            الشيك</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" value="{{$checks->to}}" id="mon"
                                            placeholder="لمن يستحق" name="to">
                                        <label for="mon" class="col-form-label">لمن
                                            يستحق</label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note">{{$checks->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">تم السداد </label>
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
            $('select[name="name"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('check.checkName.ajax',['id'=>':id'])}}';
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
                            $('#data').empty();
                            $.each(data, function(key, value) {
                                $('#data').append($(`<option>`, {
                                    value: value.id,
                                    text: value.name,
                                }));
                            });
                            $('#data').trigger('change');
                        }
                    });
                } else {
                    $('select[name="data"]').empty();
                }
            });
        });
</script>
@endsection
