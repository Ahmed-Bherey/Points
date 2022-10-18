<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(68,67,69)">
    <!-- Brand Logo -->
    {{-- <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('public/assets/dist/img/logo1.png') }}" alt="najezedu"
            class=" brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">ناجز نقاط البيع</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">
                    {{ auth('web')->user()->name }}
                </a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column p-0" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link bg-origin">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            الرئيسيه
                        </p>
                    </a>

                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الاعدادت العامة

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tools text-info"></i>
                                <p>
                                    اعدادات النظام
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-graduation-cap text-primary"></i>
                                        <p>السنه </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users-cog text-info"></i>
                                <p>
                                    اعدادات المستخدمين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link">
                                        <i class="fas fa-user-plus text-primary"></i>
                                        <p>اضافه مستخدم</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="fas fa-user-tag text-primary"></i>
                                        <p>صلاحيات المستخدمين</p>
                                    </a>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog text-info"></i>
                                <p>
                                    اعدادات المؤسسه
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('companySittings.all.index') }}" class="nav-link">
                                        <i class="fas fa-server text-primary"></i>
                                        <p>بيانات المؤسسه</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    </ul>


                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الأصناف

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('stores.all.index') }}" class="nav-link origin-1">
                                <i class="fas fa-store green-1"></i>
                                <p>المخازن</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addStore.create') }}" class="nav-link origin-1">
                                <i class="fas fa-user-plus green-1"></i>
                                <p>اضافة مخزن لمستخدم</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('companies.create') }}" class="nav-link origin-1">
                                <i class="fas fa-building green-1"></i>
                                <p>الشركات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('types.create') }}" class="nav-link origin-1">
                                <i class="fas fa-plus-circle green-1"></i>
                                <p>الأنواع </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('unites.create') }}" class="nav-link origin-1">
                                <i class="fab fa-buromobelexperte green-1"></i>
                                <p>الوحدات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sizes.create') }}" class="nav-link origin-1">
                                <i class="fas fa-ruler green-1"></i>
                                <p>المقاسات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('colors.create') }}" class="nav-link origin-1">
                                <i class="fas fa-palette green-1"></i>
                                <p>الألوان </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('items.create') }}" class="nav-link origin-1">
                                <i class="fas fa-plus-circle green-1"></i>
                                <p>الأصناف </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('addcoloredcateg') }}" class="nav-link origin-1">
                                <i class="fas fa-plus-circle green-1"></i>
                                <p>إضافة أصناف بلون واحد ومقاسات مختلفة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addsizedcateg') }}" class="nav-link origin-1">
                                <i class="fas fa-plus-circle green-1"></i>
                                <p>إضافة أصناف بمقاس واحد وألوان مختلفة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subunit.create') }}" class="nav-link origin-1">
                                <i class="fas fa-plus-circle green-1"></i>
                                <p>الوحدات الفرعية </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                <a href="{{ route('exportcategories') }}" class="nav-link origin-1">
                    <i class="fas fa-file-export green-1"></i>
                    <p>تصدير الأصناف إلى Excel </p>
                </a>
            </li> -->
                        <li class="nav-item">
                            <a href="{{ route('importcategories') }}" class="nav-link origin-1">
                                <i class="fas fa-file-import green-1"></i>
                                <p>استيراد الأصناف من Excel </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('printcode') }}" class="nav-link origin-1">
                                <i class="fas fa-print green-1"></i>
                                <p>طباعة باركود </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('printparcode') }}" class="nav-link origin-1">
                                <i class="fas fa-print green-1"></i>
                                <p>طباعة باركود 2 </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('pricescompany') }}" class="nav-link origin-1">
                                <i class="fas fa-edit green-1"></i>
                                <p>تعديل أسعار شركة </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('categoryparcode') }}" class="nav-link origin-1">
                                <i class="fas fa-plus-circle green-1"></i>
                                <p>إضافة باركود لصنف </p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users-cog text-info"></i>
                                <p>
                                    اعدادات المستخدمين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-plus text-primary"></i>
                                        <p>اضافه مستخدم</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-tag text-primary"></i>
                                        <p>صلاحيات المستخدمين</p>
                                    </a>

                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item has-treeview">

                        </li> --}}

                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog text-info"></i>
                                <p>
                                    اعدادات المؤسسه
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('detail')}}" class="nav-link">
                                        <i class="fas fa-server text-primary"></i>
                                        <p>بيانات المؤسسه</p>
                                    </a>
                                </li>


                            </ul>
                        </li> --}}
                    </ul>


                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            المخزن
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('EqualizQuantite.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>تسوية كميات الأصناف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cashPermission.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>إذن صرف أصناف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addPermission.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>إذن إضافة أصناف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('damge.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>الهالك </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('material.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>المواد الخام </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('transfer.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>التحويل من مخزن لاخر </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('storeInventory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>جرد المخزن </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('serial.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>سيريالات الأصناف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon origin-1"></i>
                                <p>
                                    تجميع الأصناف
                                    <i class="right fas fa-angle-left origin-1"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('categcomponent.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon green-1 "></i>
                                        <p> مكونات الأصناف التى يتم تجميعها</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('collectquantity.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon green-1 "></i>
                                        <p> تجميع كمية من صنف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('disconnectCateg') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon green-1"></i>
                                        <p>تفكيك صنف مجمع </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report') }}" class="nav-link">
                                <i class="far fa-circle nav-icon green-1"></i>
                                <p>تقرير سيريالات الأصناف </p>
                            </a>
                        </li> --}}

                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            المشتريات

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('supplier.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الموردين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('buybill.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>فاتورة مشتريات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modifiybill') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>البحث عن فاتورة مشتريات </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('returnedPurchase.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>مرتجع مشتريات </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('bounceNoBill.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>مرتجع مشتريات بدون فاتورة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bounceModifiy') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تعديل مرتجع مشتريات </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('accountSuppliers.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>حسابات الموردين </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('discountAddNotification.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إشعار خصم أو إضافة لمورد </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('dollarImport') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>استيراد بالدولار </p>
                            </a>
                        </li> --}}
                        <!-- <li class="nav-item">
                    {{-- <a href="{{ route('exportDebt') }}" class="nav-link"> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>تصدير ديون الموردين إلى Excel </p>
                    </a>
                </li> -->
                        {{-- <li class="nav-item">
                            <a href="{{ route('orderedSuppConvert') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>أمر توريد يمكن تحويله لفاتورة مشتريات </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('supplierOrders.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> طلبيات مورد </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users-cog text-info"></i>
                                <p>
                                    اعدادات المستخدمين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-plus text-primary"></i>
                                        <p>اضافه مستخدم</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-tag text-primary"></i>
                                        <p>صلاحيات المستخدمين</p>
                                    </a>

                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item has-treeview">

                        </li> --}}

                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog text-info"></i>
                                <p>
                                    اعدادات المؤسسه
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('detail')}}" class="nav-link">
                                        <i class="fas fa-server text-primary"></i>
                                        <p>بيانات المؤسسه</p>
                                    </a>
                                </li>


                            </ul>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            المبيعات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('client.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>العملاء </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                    {{-- <a href="{{ route('exportCustomer') }}" class="nav-link"> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>تصدير العملاء إلى Excel </p>
                    </a>
                </li> -->
                        {{-- <li class="nav-item">
                            <a href="{{ route('importcustomer') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إستيراد العملاء من Excel </p>
                            </a>
                        </li> --}}
                        <!-- <li class="nav-item">
                    {{-- <a href="{{ route('customerDept') }}" class="nav-link"> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>تصدير ديون العملاء إلى Excel </p>
                    </a>
                </li> -->
                        <li class="nav-item">
                            <a href="{{ route('representative.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المندوبون </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addRepresent.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إضافة مندوب لمستخدم </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('salesBill.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>فاتورة مبيعات </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('salesBillMod') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تعديل فاتورة مبيعات </p>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('salesReturn.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>مرتجع مبيعات </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('salesNoBill.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> مرتجع مبيعات بدون فاتورة </p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('salesReturnMod') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تعديل مرتجع مبيعات </p>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('cateqIncomplete.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إضافة أصناف للنواقص </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('showPrice.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>عرض أسعار </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('reserveCar.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إذن تحميل سيارة / حجز </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('categUnderDelivery') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الأصناف تحت التسليم </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('BillUnderDelivery') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>فواتير تحت التسليم </p>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('clientAccount.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>حسابات العملاء </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('duesToClient.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> استحقاقات على العملاء </p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('payInstallment.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> دفع أقساط العملاء </p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    الضامنين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('guarantors') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات الضامنين </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guarantorsMove') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير حركة الضامنين </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guarantorsreport') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير الضامنين </p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('installmentStructure') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إعادة هيكلة الأقساط </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('discountAddNotification.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إشعار خصم أو إضافة لعميل </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('customerPoints') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إشعار خصم أو إضافة نقاط لعميل </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('representPoints') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إشعار خصم أو إضافة نقاط لمندوب </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('visits.create.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>زيارة عميل </p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    الصنايعية
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('industrial.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات الصنايعية </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('drawal.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مسحوبات الصنايعية </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('industrialReport') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير الصنايعية </p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('pricelist') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>بيان أسعار يمكن تحويله لفاتورة </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('registration') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تسجيل خطوط السير </p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الحسابات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('treasuries.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الخزائن </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addTreasury.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> إضافة خزينة لمستخدم </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('treasuryTransfer.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> التحويل من خزينة لأخرى </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    أرصدة أول المدة
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('capital.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> المخزن والخزينة ورأس المال </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('account.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> البنوك </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('clientDebts.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ديون العملاء </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('oldInstallments') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>أقساط قديمة للعملاء </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('SupplierDebt') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ديون الموردين </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>استيراد ديون العملاء من Excel </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>استيراد ديون الموردين من Excel </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('borrowMoney.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>السلف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('loan.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> القروض </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('covenant.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> العهد </p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('assets.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الأصول الثابتة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('destruction.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إهلاكات الأصول </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('account.create') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p> البنوك </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('bank.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>البنوك </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('userBank.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إضافة بنك لمستخدم </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('withdrawDeposite.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>سحب وإيداع البنوك </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bankTransfer.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> التحويل من بنك لاخر </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('check.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الشيكات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    جاري الشركاء
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('partner.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات الشركاء </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('partner-process.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> سحب وإيداع الشركاء </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('PartnerAccounts') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حسابات الشركاء</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profitDistribution.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> توزيع أرباح الشركاء</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ProcessReport') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير مسحوبات وإيدعات الشركاء</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profitReport') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير توزيع أرباح الشركاء</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('personalWithdrawal.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>مسحوبات شخصية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('generalAccount.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>حسابات العامة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('generalExpense.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المصروفات العامة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('startUpExpense.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المصروفات التأسيسية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reminderDue.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تذكير بموعد استحقاق مصروف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('otherIncome') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إيرادات أخرى </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    القروض
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('borrowerData.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات أصحاب القروض </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('withdrawPayLoan.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> سحب وسداد القروض </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('loanReport') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير القروض </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    السلف
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('borrowerData.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات أصحاب السلف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('withdrawalDepositAdvance.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> سحب وسداد السلف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('salafReport') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير السلف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('salafTotal') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير إجمالى السلف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('receipt') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>إيصالات سحب وسداد السلف </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    الذمم المختلفة
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('receivablesData.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات أصحاب الذمم المختلفة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('receivableAccount.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> جارى حسابات الذمم المختلفة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('receivableRccountsReport.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير حسابات الذمم المختلفة </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    العهد
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('covenantData.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيانات أصحاب العهد </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('covenantAccount.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> جارى حسابات العهد </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('covenantReport.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تقرير حسابات العهد </p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الصيانة
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('engineer.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المهندسين </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('maintenanceRequest.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> استلام الصيانة من العميل </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('deliveryTo.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تسليم الصيانة للمهندس </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('receiptFrom.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> استلام الصيانة من المهندس </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('maintenanceDelivery.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> التسليم إلى العميل </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('maintenanceStatus') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> استعلام عن حالة الصيانة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('feedback') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> إضافة مرتجع </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('engineerChange') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> التحويل من مهندس لاخر </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    تقارير الصيانة
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> استلام الصيانة من العميل </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تسليم الصيانة للمهندس </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>استلام الصيانة من المهندس </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>التسليم إلى العميل </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة الصيانة لعميل </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مرتجع الصيانة خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بونص المهندس </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}



                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الفلاتر
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('technicians.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الفنيون </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customerMaintenance.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تسجيل بيانات فلتر لعميل </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('filterData.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> بيانات فلتر لعميل </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('maintenanceWorthy.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> العملاء مستحقى الصيانة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('converterMaintenance.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> العملاء المحولين للصيانة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('changeTechnician.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تحويل العملاء من فنى لاخر </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    تقارير الفلاتر
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> العملاء المحولين للصيانة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة الصيانة لعميل </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>مستحقى الصيانة خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تاريخ انتهاء التعاقد للعملاء </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> عدد مستحقى الصيانة بالمركز </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الكشوفات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تسجيل الكشوفات </p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            الموظفين
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('staffAccounts') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الاعدادات العامة </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staffData.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الموظفين </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staffSetting.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> إعدادات موظف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('attendingLeaving.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> حضور وانصراف الموظفين </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> استيراد ملف الحضور والانصراف </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absence.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الغياب </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('delay.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> التأخير </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('extraHours.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الاضافى </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('discounts.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الخصومات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rewards.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> المكافئات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('salary.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> المرتبات </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    عمولات الموظفين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('classCommission.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الأصناف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('employeeCommission.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> عمولات الموظفين للأصناف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('commissionCalculate.create') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>حساب عمولة موظف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير العمولات خلال فترة </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    تقارير الموظفين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الحضور والإنصراف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الغياب </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>التأخير </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الساعات الإضافية </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> المرتبات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> كشف مرتبات مبدئى </p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs text-green"></i>
                        <p>
                            التقارير
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    تقارير المبيعات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('equalizQuantite.select')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>تسوية كميات الاصناف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cashpremission.report')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>اذن صرف اصناف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('client.report')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>العملاء</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مبيعات نوع لشركة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مبيعات صنف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير مبيعات شامل </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة كاشير </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> إحصاء المبيعات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الأكثر مبيعا </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الأقل مبيعا </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> فواتير المبيعات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات جملة وقطاعى </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> فواتير مرتجع المبيعات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات صنف جملة وقطاعى </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير فواتير مجمع </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير فواتير مجمع خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> أذون تحميل سيارة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات بالمخزن إجمالية يومية </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> ضرائب فواتير المبيعات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> فواتير المبيعات خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> الهدايا والبونص خلال فترة </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة بيع بالمقاس خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تكلفة النقل لفواتير المبيعات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات محافظة خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مبيعات ومشتريات خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير الأصناف الملونة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> متغيرات أسعار الأصناف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> إجمالى كميات خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مبيعات نوع فى أكثر من شركة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مبيعات صنف بالرسم بيانى </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير بيان أسعار يمكن تحويله لفاتورة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير الاصناف المحصلة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير الخصومات على الاصناف المباعة </p>
                                    </a>
                                </li>




                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    تقارير المناديب
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مبيعات مندوب </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات مندوب أصناف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> حركة مندوب لصنف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات مندوب لشركة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مرتجع مبيعات بدون فاتورة بالمندوب </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات صنف بالمندوب إجماليات فقط </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مبيعات مندوب خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> أعلى مندوب مسحوبات </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> ربحية مندوب </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> بيان أسعار المندوبين </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> احصاء مبيعات مندوب للأصناف </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> مرتجع مبيعات مندوب خلال فترة </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> أرقام تليفون المناديب </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> تقرير نقاط مندوب </p>
                                    </a>
                                </li>




                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
