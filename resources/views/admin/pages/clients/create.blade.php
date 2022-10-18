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
                        <form class="form-horizontal" action="{{ route('client.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input required type="text" class="form-control" id="name"
                                            placeholder="اسم العميل" name="name">
                                        <label for="name" class="col-form-label"> اسم العميل </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="tel" class="form-control" id="tel" placeholder="تليفون العميل"
                                            name="tel">
                                        <label for="tel" class="col-form-label">
                                            تليفون العميل </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="company" placeholder="اسم الشركة"
                                            name="company_name">
                                        <label for="company" class="col-form-label">
                                            اسم الشركة </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="mob" placeholder="رقم الموبايل"
                                            name="phone">
                                        <label for="mob" class="col-form-label"> رقم الموبايل </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="fax" placeholder="الفاكس"
                                            name="fax">
                                        <label for="fax" class="col-form-label">الفاكس </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="بريد الكترونى"
                                            name="email">
                                        <label for="email" class="col-form-label">بريد الكترونى
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="card" placeholder="رقم البطاقة"
                                            name="id_num">
                                        <label for="card" class="col-form-label">رقم البطاقة </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="m" placeholder="المحافظة"
                                            name="governorate">
                                        <label for="m" class="col-form-label">
                                            المحافظة </label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="z" placeholder="المركز" name="city">
                                        <label for="z" class="col-form-label"> المركز </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="b" placeholder="البلد" name="town">
                                        <label for="b" class="col-form-label"> البلد </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="note"></textarea>
                                        <label for="note" class="col-form-label"> ملاحظات </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="address" placeholder="عنوان العميل"
                                            name="address">
                                        <label for="address" class="col-form-label">عنوان العميل </label>
                                    </div>
                                </div>
                                {{-- row 4 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="representative_id" id="represent">
                                            <option value="">اختر اسم المندوب</option>
                                            @foreach ($representatives as $representative)
                                            <option value="{{ $representative->id }}">
                                                {{ $representative->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="represent" class="col-form-label"> اسم المندوب </label>
                                    </div>
                                </div>
                                {{-- row 5 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="h" placeholder=" حد الائتمان"
                                            name="credit">
                                        <label for="h" class=" col-form-label"> حد الائتمان </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="day" placeholder="عدد الايام"
                                            name="day">
                                        <label for="day" class=" col-form-label"> عدد الايام </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="file" placeholder="الملف الضريبى"
                                            name="tax_file">
                                        <label for="file" class="col-form-label"> الملف الضريبى </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="taxnum"
                                            placeholder=" الرقم الضريبى " name="tax_num">
                                        <label for="taxnum" class=" col-form-label"> الرقم الضريبى </label>
                                    </div>
                                </div>
                                {{-- row 6 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="Commerc" placeholder=""
                                            name="commerc_num">
                                        <label for="Commerc" class=" col-form-label"> رقم
                                            السجل التجارى </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="dept" placeholder="" name="dept">
                                        <label for="dept" class=" col-form-label"> عمر الدين
                                            بالأيام </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="file" class="form-control" id="imgload" name="logo">
                                        <label for="logo" class=" col-form-label">شعار</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <img src="{{ asset('public/img/client/default.png') }}" id="imgshow"
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
            <div class="row mt-4">
                <div class="col-sm-12 col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">العملاء </h3>
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
                                                        اسم العميل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        العنوان </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        التليفون</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        رقم الموبايل</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الفاكس </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        البلد</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        ملاحظات</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $key => $client)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $client->name }}</td>
                                                    <td>{{ $client->address }}</td>
                                                    <td>{{ $client->tel }}</td>
                                                    <td>{{ $client->phone }}</td>
                                                    <td>{{ $client->fax }}</td>
                                                    <td>{{ $client->town }}</td>
                                                    <td>{{ $client->note }}</td>
                                                    <td class="d-flex">
                                                        <button type="submit" class="btn bg-secondary ">
                                                            <a href="{{ route('client.edit', $client->id) }}"
                                                                class="text-white"><i class="far fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('client.destroy', $client->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger "><i class="fas fa-trash-alt"></i>
                                                            </button>
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
                        </div>
                    </div>
                </div>
            </div>
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
