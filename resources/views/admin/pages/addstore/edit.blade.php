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
                            <h3 class="card-title header-title">إضافة مخزن لمستخدم </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('addStore.update', $addStores->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required id="s" class="form-control" name="user_id">
                                            <option value="">اختر مستخدم</option>
                                            @foreach ($users as $key => $user)
                                            <option value="{{ $user->id }}" @if ($addStores->user_id == $user->id)
                                                selected @endif>{{ $user->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="name" class="col-form-label">اسم المستخدم</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select id="s" class="form-control" name="st_store_id">
                                            @foreach ($stStores as $key => $stStore)
                                            <option value="{{ $stStore->id }}" @if ($addStores->st_store_id ==
                                                $stStore->id) selected @endif>{{ $stStore->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="s" class="col-form-label">اسم المخزن</label>
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
            {{-- start table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
