@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title"> العملاء </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('client.update' , $clients->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input required type="text" class="form-control" value="{{$clients->name}}"
                                            id="name" placeholder="اسم العميل" name="name">
                                        <label for="name" class="col-form-label"> اسم العميل </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="tel" class="form-control" value="{{$clients->tel}}" id="tel"
                                            placeholder="تليفون العميل" name="tel">
                                        <label for="tel" class="col-form-label">
                                            تليفون العميل </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->company_name}}"
                                            id="company" placeholder="اسم الشركة" name="company_name">
                                        <label for="company" class="col-form-label">
                                            اسم الشركة </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->phone}}" id="mob"
                                            placeholder="رقم الموبايل" name="phone">
                                        <label for="mob" class="col-form-label"> رقم الموبايل </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->fax}}" id="fax"
                                            placeholder="الفاكس" name="fax">
                                        <label for="fax" class="col-form-label">الفاكس </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="email" class="form-control" value="{{$clients->email}}" id="email"
                                            placeholder="بريد الكترونى" name="email">
                                        <label for="email" class="col-form-label">بريد الكترونى
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->id_num}}" id="card"
                                            placeholder="رقم البطاقة" name="id_num">
                                        <label for="card" class="col-form-label">رقم البطاقة </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->governorate}}" id="m"
                                            placeholder="المحافظة" name="governorate">
                                        <label for="m" class="col-form-label">
                                            المحافظة </label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->city}}" id="z"
                                            placeholder="المركز" name="city">
                                        <label for="z" class="col-form-label"> المركز </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->town}}" id="b"
                                            placeholder="البلد" name="town">
                                        <label for="b" class="col-form-label"> البلد </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="note">{{$clients->note}}</textarea>
                                        <label for="note" class="col-form-label"> ملاحظات </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->address}}"
                                            id="address" placeholder="عنوان العميل" name="address">
                                        <label for="address" class="col-form-label">عنوان العميل </label>
                                    </div>
                                </div>
                                {{-- row 4 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="representative_id" id="represent">
                                            <option value="">اختر اسم المندوب</option>
                                            @foreach ($representatives as $representative)
                                            <option value="{{ $representative->id }}" @if ($clients->representative_id
                                                == $representative->id) selected @endif>
                                                {{ $representative->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="represent" class="col-form-label"> اسم المندوب </label>
                                    </div>
                                </div>
                                {{-- row 5 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->credit}}" id="h"
                                            placeholder=" حد الائتمان" name="credit">
                                        <label for="h" class=" col-form-label"> حد الائتمان </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->day}}" id="day"
                                            placeholder="عدد الايام" name="day">
                                        <label for="day" class=" col-form-label"> عدد الايام </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" value="{{$clients->tax_file}}" id="file"
                                            placeholder="الملف الضريبى" name="tax_file">
                                        <label for="file" class="col-form-label"> الملف الضريبى </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->tax_num}}"
                                            id="taxnum" placeholder=" الرقم الضريبى " name="tax_num">
                                        <label for="taxnum" class=" col-form-label"> الرقم الضريبى </label>
                                    </div>
                                </div>
                                {{-- row 6 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->commerc_num}}"
                                            id="Commerc" placeholder="" name="commerc_num">
                                        <label for="Commerc" class=" col-form-label"> رقم
                                            السجل التجارى </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$clients->dept}}" id="dept"
                                            placeholder="" name="dept">
                                        <label for="dept" class=" col-form-label"> عمر الدين
                                            بالأيام </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="file" class="form-control" id="imgload" name="logo">
                                        <label for="logo" class=" col-form-label">شعار</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <img src="{{asset('public/img/client/')}}/{{$clients->logo}}" id="imgshow"
                                            style="width: 80px; height:80px;">
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
            {{-- photo show --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $('document').ready(function() {
                        $("#imgload").change(function() {
                            if (this.files && this.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#imgshow').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(this.files[0]);
                            }
                        });
                    });
            </script>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
