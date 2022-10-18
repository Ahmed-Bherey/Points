<?php

use Illuminate\Support\Facades\Route;
// Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
Route::get('/example', [\App\Http\Controllers\Admin\ManarController::class, 'index'])->name('index');
Route::get('/detail', [\App\Http\Controllers\Admin\ManarController::class, 'detail'])->name('detail');
//المخازن
Route::get('/store', [\App\Http\Controllers\Admin\ManarController::class, 'store'])->name('store');
//اضافة مخزن لمستخدم
 Route::get('/addstore', [\App\Http\Controllers\Admin\ManarController::class, 'addstore'])->name('addstore');
// الشركات
Route::get('/companies', [\App\Http\Controllers\Admin\ManarController::class, 'addcompany'])->name('companies');
// الانواع
Route::get('/types', [\App\Http\Controllers\Admin\ManarController::class, 'addtype'])->name('types');
//الوحدات
Route::get('/units', [\App\Http\Controllers\Admin\ManarController::class, 'addunit'])->name('units');
// المقاسات
Route::get('/sizes', [\App\Http\Controllers\Admin\ManarController::class, 'addsize'])->name('sizes');
// الألوان
Route::get('/colors', [\App\Http\Controllers\Admin\ManarController::class, 'addcolor'])->name('colors');
// الاصناف
Route::get('/categories', [\App\Http\Controllers\Admin\ManarController::class, 'addcategory'])->name('categories');
// اضافةاصناف بمقاس واحد والوان مختلفة
Route::get('/addsizedcateg', [\App\Http\Controllers\Admin\ManarController::class, 'addsizecateg'])->name('addsizedcateg');
// اضافةاصناف بلون واحد ومقاسات مختلفة
Route::get('/addcoloredcateg', [\App\Http\Controllers\Admin\ManarController::class, 'addcolorcateg'])->name('addcoloredcateg');
// الوحدات الفرعية للصنف
Route::get('/categorySubunits', [\App\Http\Controllers\Admin\ManarController::class, 'addSubunits'])->name('categorySubunits');
// تصدير الاصناف الى اكسل
Route::get('/exportcategories', [\App\Http\Controllers\Admin\ManarController::class, 'export'])->name('exportcategories');
// استيراد الاصناف من اكسل
Route::get('/importcategories', [\App\Http\Controllers\Admin\ManarController::class, 'import'])->name('importcategories');
// طباعة باركود
Route::get('/printcode', [\App\Http\Controllers\Admin\ManarController::class, 'print'])->name('printcode');
// طباعة باركود 2
Route::get('/printparcode', [\App\Http\Controllers\Admin\ManarController::class, 'printcode'])->name('printparcode');
// تعديل أسعار الشركة
Route::get('/pricescompany', [\App\Http\Controllers\Admin\ManarController::class, 'editprices'])->name('pricescompany');
// تعديل الاصناف
Route::get('/modifycategories', [\App\Http\Controllers\Admin\ManarController::class, 'modifycateg'])->name('modifycategories');
// اضافة باركود لصنف
Route::get('/categoryparcode', [\App\Http\Controllers\Admin\ManarController::class, 'addcode'])->name('categoryparcode');
// تسوية كميات المخزن
Route::get('/EqualizQuantities', [\App\Http\Controllers\Admin\ManarController::class, 'EqualizQuantities'])->name('EqualizQuantities');
// إذن صرف أصناف
Route::get('/cashpermission', [\App\Http\Controllers\Admin\ManarController::class, 'showcash'])->name('cashpermission');
// إذن اضافة أصناف
Route::get('/addPermission', [\App\Http\Controllers\Admin\ManarController::class, 'showadd'])->name('addPermission');
// الهالك
Route::get('/damge', [\App\Http\Controllers\Admin\ManarController::class, 'damge'])->name('damge');
// المواد الخام
Route::get('/material', [\App\Http\Controllers\Admin\ManarController::class, 'material'])->name('material');
//  التحويل من مخزن لاخر
Route::get('/transferstore', [\App\Http\Controllers\Admin\ManarController::class, 'transfer'])->name('transferstore');
//   جرد مخزن بالباركود
Route::get('/storeInventory', [\App\Http\Controllers\Admin\ManarController::class, 'storeInventory'])->name('storeInventory');
//     سيريالات الاصناف
Route::get('/Serial', [\App\Http\Controllers\Admin\ManarController::class, 'Serialsitems'])->name('Serial');
//      تقرير سيريالات الاصناف
Route::get('/report', [\App\Http\Controllers\Admin\ManarController::class, 'reportserials'])->name('report');
//        مكونات الاصناف التى يتم تجمعها
Route::get('/caregcomponents', [\App\Http\Controllers\Admin\ManarController::class, 'caregcomponents'])->name('caregcomponents');
//          تجميع كمية من صنف
Route::get('/collectquantity', [\App\Http\Controllers\Admin\ManarController::class, 'collectquantity'])->name('collectquantity');
//             تفكيك صنف مجمع
Route::get('/disconnectCateg', [\App\Http\Controllers\Admin\ManarController::class, 'disconnectCateg'])->name('disconnectCateg');
//               الموردين
Route::get('/suppliers', [\App\Http\Controllers\Admin\ManarController::class, 'suppliers'])->name('suppliers');
//            فاتورة مشتريات
Route::get('/buybill', [\App\Http\Controllers\Admin\ManarController::class, 'buybill'])->name('buybill');
//           تعديل فاتورة مشتريات
Route::get('/modifiybill', [\App\Http\Controllers\Admin\ManarController::class, 'modifiybill'])->name('modifiybill');
//             مرتجع مشتريات
Route::get('/bounce', [\App\Http\Controllers\Admin\ManarController::class, 'bounce'])->name('bounce');
//             مرتجع مشتريات بدون فاتورة
Route::get('/bounceNoBill', [\App\Http\Controllers\Admin\ManarController::class, 'bounceNoBill'])->name('bounceNoBill');
//                تعديل مرتجع مشتريات
Route::get('/bounceModifiy', [\App\Http\Controllers\Admin\ManarController::class, 'bounceModifiy'])->name('bounceModifiy');
//                  حسابات الموردين
Route::get('/accountSuppliers', [\App\Http\Controllers\Admin\ManarController::class, 'accountSuppliers'])->name('accountSuppliers');
//     اشعار خصم او اضافة مورد
Route::get('/addSupplier', [\App\Http\Controllers\Admin\ManarController::class, 'addSupplier'])->name('addSupplier');
//استيراد بالدولار
Route::get('/dollarImport', [\App\Http\Controllers\Admin\ManarController::class, 'dollarImport'])->name('dollarImport');
// تصدير ديون الموردين
Route::get('/exportDebt', [\App\Http\Controllers\Admin\ManarController::class, 'exportDebt'])->name('exportDebt');
//   امر توريد يمكن تحويلة لفاتورة
Route::get('/orderedSuppConvert', [\App\Http\Controllers\Admin\ManarController::class, 'orderedSuppConvert'])->name('orderedSuppConvert');
//      طلبات مورد
Route::get('/SupplierOrders', [\App\Http\Controllers\Admin\ManarController::class, 'SupplierOrders'])->name('SupplierOrders');
//       العملاء
Route::get('/customers', [\App\Http\Controllers\Admin\ManarController::class, 'customers'])->name('customers');
//       تصدير العملاء الى الاكسيل
Route::get('/exportCustomer', [\App\Http\Controllers\Admin\ManarController::class, 'exportCustomer'])->name('exportCustomer');
//       استيراد العملاء من الاكسيل
Route::get('/importcustomer', [\App\Http\Controllers\Admin\ManarController::class, 'importcustomer'])->name('importcustomer');
//تصدير ديون العملاء الى الاكسيل
 Route::get('/customerDept', [\App\Http\Controllers\Admin\ManarController::class, 'customerDept'])->name('customerDept');
//    المندوبون
Route::get('/representative', [\App\Http\Controllers\Admin\ManarController::class, 'representative'])->name('representative');
//    اضافة مندوب لمستخدم
Route::get('/AddRepresent', [\App\Http\Controllers\Admin\ManarController::class, 'AddRepresent'])->name('AddRepresent');
//      فاتورة مبيعات
Route::get('/salesBill', [\App\Http\Controllers\Admin\ManarController::class, 'salesBill'])->name('salesBill');
//     تعديل فاتورة مبيعات
Route::get('/salesBillMod', [\App\Http\Controllers\Admin\ManarController::class, 'salesBillMod'])->name('salesBillMod');
//      مرتجع مبيعات
Route::get('/salesReturns', [\App\Http\Controllers\Admin\ManarController::class, 'salesReturns'])->name('salesReturns');
//      مرتجع مبيعات بدون فاتورة
Route::get('/salesNoBill', [\App\Http\Controllers\Admin\ManarController::class, 'salesNoBill'])->name('salesNoBill');
//     تعديل مرتجع مبيعات
Route::get('/salesReturnMod', [\App\Http\Controllers\Admin\ManarController::class, 'salesReturnMod'])->name('salesReturnMod');
//       إضافة أصناف للنواقص
Route::get('/addCateqIncomplete', [\App\Http\Controllers\Admin\ManarController::class, 'addCateqIncomplete'])->name('addCateqIncomplete');
//         عرض أسعار
Route::get('/showPrices', [\App\Http\Controllers\Admin\ManarController::class, 'showPrices'])->name('showPrices');
//         إذن تحميل سيارة /حجز
Route::get('/ReserveCar', [\App\Http\Controllers\Admin\ManarController::class, 'ReserveCar'])->name('ReserveCar');
//            اصناف تحت التسليم
Route::get('/categUnderDelivery', [\App\Http\Controllers\Admin\ManarController::class, 'categUnderDelivery'])->name('categUnderDelivery');
//فواتير تحت التسليم
Route::get('/BillUnderDelivery', [\App\Http\Controllers\Admin\ManarController::class, 'BillUnderDelivery'])->name('BillUnderDelivery');
//حسابات العملاء
Route::get('/CustomerAccounts', [\App\Http\Controllers\Admin\ManarController::class, 'CustomerAccounts'])->name('CustomerAccounts');
// استحقاقات على العملاء
Route::get('/DuesToClients', [\App\Http\Controllers\Admin\ManarController::class, 'DuesToClients'])->name('DuesToClients');
//   دفع اقساط العملاء
Route::get('/payInstallment', [\App\Http\Controllers\Admin\ManarController::class, 'payInstallment'])->name('payInstallment');
//   بيانات الضامنين
Route::get('/guarantors', [\App\Http\Controllers\Admin\ManarController::class, 'guarantors'])->name('guarantors');
//   تقرير حركة الضامنين
Route::get('/guarantorsMove', [\App\Http\Controllers\Admin\ManarController::class, 'guarantorsMove'])->name('guarantorsMove');
//   تقرير الضامنين
Route::get('/guarantorsreport', [\App\Http\Controllers\Admin\ManarController::class, 'guarantorsreport'])->name('guarantorsreport');
//   إعادة هيكلة ااقساط
Route::get('/installmentStructure', [\App\Http\Controllers\Admin\ManarController::class, 'installmentStructure'])->name('installmentStructure');
//  إشعار خصم أو إضافة لعميل
Route::get('/notice', [\App\Http\Controllers\Admin\ManarController::class, 'notice'])->name('notice');
//  إشعار خصم أو إضافة نقاط لعميل
Route::get('/customerPoints', [\App\Http\Controllers\Admin\ManarController::class, 'customerPoints'])->name('customerPoints');
//  إشعار خصم أو إضافة نقاط لمندوب
Route::get('/representPoint', [\App\Http\Controllers\Admin\ManarController::class, 'representPoints'])->name('representPoints');
//زيارة عميل
Route::get('/Visit', [\App\Http\Controllers\Admin\ManarController::class, 'Visit'])->name('Visit');
//الصنايعية
Route::get('/industrial', [\App\Http\Controllers\Admin\ManarController::class, 'industrial'])->name('industrial');
//مسحوبات الصنايعية
Route::get('/drawals', [\App\Http\Controllers\Admin\ManarController::class, 'drawals'])->name('drawals');
//تقرير الصنايعية
Route::get('/industrialReport', [\App\Http\Controllers\Admin\ManarController::class, 'industrialReport'])->name('industrialReport');
//بيان أسعار يمكن تحويلة لفاتورة
Route::get('/pricelist', [\App\Http\Controllers\Admin\ManarController::class, 'pricelist'])->name('pricelist');
//    تسجيل خطوط السير
Route::get('/registration', [\App\Http\Controllers\Admin\ManarController::class, 'registration'])->name('registration');
//   الخزائن
Route::get('/allStore', [\App\Http\Controllers\Admin\ManarController::class, 'allStore'])->name('allStore');
//   إضافة خزينة لمستخدم
Route::get('/userStore', [\App\Http\Controllers\Admin\ManarController::class, 'userStore'])->name('userStore');
//     التحويل من خزينة إلى اخرى
Route::get('/treasuryTransfer', [\App\Http\Controllers\Admin\ManarController::class, 'treasuryTransfer'])->name('treasuryTransfer');
//     المخزن والخزينة وراس المال
Route::get('/capital', [\App\Http\Controllers\Admin\ManarController::class, 'capital'])->name('capital');
//      ارصدة اول المدة
Route::get('/account', [\App\Http\Controllers\Admin\ManarController::class, 'account'])->name('account');
//        ديون العملاء
Route::get('/customerDebts', [\App\Http\Controllers\Admin\ManarController::class, 'customerDebts'])->name('customerDebts');
//         أقساط قديمة للعملاء
Route::get('/oldInstallments', [\App\Http\Controllers\Admin\ManarController::class, 'oldInstallments'])->name('oldInstallments');
//      ديون الموردين
Route::get('/SupplierDebt', [\App\Http\Controllers\Admin\ManarController::class, 'SupplierDebt'])->name('SupplierDebt');
//      البنوك
Route::get('/banks', [\App\Http\Controllers\Admin\ManarController::class, 'banks'])->name('banks');
//      اضافة بنك لمستخدم
Route::get('/userBank', [\App\Http\Controllers\Admin\ManarController::class, 'userBank'])->name('userBank');
//      السلف
Route::get('/borrowMoney', [\App\Http\Controllers\Admin\ManarController::class, 'borrowMoney'])->name('borrowMoney');
//      القروض
Route::get('/Loan', [\App\Http\Controllers\Admin\ManarController::class, 'Loan'])->name('Loan');
//      العهد
Route::get('/Covenant', [\App\Http\Controllers\Admin\ManarController::class, 'Covenant'])->name('Covenant');
//      الاصول الثابتة
Route::get('/assets', [\App\Http\Controllers\Admin\ManarController::class, 'assets'])->name('assets');
//       إهلاكات الاصول
Route::get('/Destruction', [\App\Http\Controllers\Admin\ManarController::class, 'Destruction'])->name('Destruction');
//        سحب وايداع البنوك
Route::get('/depositMoney', [\App\Http\Controllers\Admin\ManarController::class, 'depositMoney'])->name('depositMoney');
//    الشيكات
Route::get('/Check', [\App\Http\Controllers\Admin\ManarController::class, 'Check'])->name('Check');
//    المسحوبات الشخصية
Route::get('/withdrawals', [\App\Http\Controllers\Admin\ManarController::class, 'withdrawals'])->name('withdrawals');
//     المصروفات التأسيسية
Route::get('/startExpenses', [\App\Http\Controllers\Admin\ManarController::class, 'startExpenses'])->name('startExpenses');
//     المصروفات العامة
Route::get('/generalExpenses', [\App\Http\Controllers\Admin\ManarController::class, 'generalExpenses'])->name('generalExpenses');
//      تذكير بموعد استحقاق مصروف
Route::get('/dateExpense', [\App\Http\Controllers\Admin\ManarController::class, 'dateExpense'])->name('dateExpense');
//      إيرادات أخرى
Route::get('/otherIncome', [\App\Http\Controllers\Admin\ManarController::class, 'otherIncome'])->name('otherIncome');
//       بيانات أصحاب القروض
Route::get('/BorrowerData', [\App\Http\Controllers\Admin\ManarController::class, 'BorrowerData'])->name('BorrowerData');
//       سحب وإيداع القروض
Route::get('/WithdrawPayLoans', [\App\Http\Controllers\Admin\ManarController::class, 'WithdrawPayLoans'])->name('WithdrawPayLoans');
//        تقرير القروض
Route::get('/loanReport', [\App\Http\Controllers\Admin\ManarController::class, 'loanReport'])->name('loanReport');
//       بيانات أصحاب السلف
Route::get('/Borrower', [\App\Http\Controllers\Admin\ManarController::class, 'Borrower'])->name('Borrower');
//       سحب وإيداع السلف
Route::get('/WithdrawDeposit', [\App\Http\Controllers\Admin\ManarController::class, 'WithdrawDeposit'])->name('WithdrawDeposit');
//        تقرير السلف
Route::get('/salafReport', [\App\Http\Controllers\Admin\ManarController::class, 'salafReport'])->name('salafReport');
//        تقرير إجمالى السلف
Route::get('/salafTotal', [\App\Http\Controllers\Admin\ManarController::class, 'salafTotal'])->name('salafTotal');
//          الايصال
Route::get('/receipt', [\App\Http\Controllers\Admin\ManarController::class, 'receipt'])->name('receipt');
//          بيانات أصحاب الذمم المختلفة
Route::get('/receivables', [\App\Http\Controllers\Admin\ManarController::class, 'receivables'])->name('receivables');
//           جارى حسابات الذمم المختلفة
Route::get('/checkingAccounts', [\App\Http\Controllers\Admin\ManarController::class, 'checkingAccounts'])->name('checkingAccounts');
//           تقرير حسابات الذمم المختلفة
Route::get('/accountsReport', [\App\Http\Controllers\Admin\ManarController::class, 'accountsReport'])->name('accountsReport');
//           بيانات اصحاب العهد
Route::get('/covenantData', [\App\Http\Controllers\Admin\ManarController::class, 'covenantData'])->name('covenantData');
//           جارى حسابات العهد
Route::get('/continuousCovenant', [\App\Http\Controllers\Admin\ManarController::class, 'continuousCovenant'])->name('continuousCovenant');
//           تقرير حسابات العهد
Route::get('/CovenantReport', [\App\Http\Controllers\Admin\ManarController::class, 'CovenantReport'])->name('CovenantReport');
//             بيانات الشركاء
Route::get('/PartnersData', [\App\Http\Controllers\Admin\ManarController::class, 'PartnersData'])->name('PartnersData');
//             مسحوبات وايدعات الشركاء
Route::get('/Partnersprocess', [\App\Http\Controllers\Admin\ManarController::class, 'Partnersprocess'])->name('Partnersprocess');
//             حسابات الشركاء
Route::get('/PartnerAccounts', [\App\Http\Controllers\Admin\ManarController::class, 'PartnerAccounts'])->name('PartnerAccounts');
//             توزيع ارباح الشركاء
Route::get('/profitDistribution', [\App\Http\Controllers\Admin\ManarController::class, 'profitDistribution'])->name('profitDistribution');
//              تقرير مسحوبات وإيداعات الشركاء
Route::get('/ProcessReport', [\App\Http\Controllers\Admin\ManarController::class, 'ProcessReport'])->name('ProcessReport');
//              تقرير توزيع ارباح الشركات
Route::get('/profitReport', [\App\Http\Controllers\Admin\ManarController::class, 'profitReport'])->name('profitReport');
//            المهندسين
Route::get('/engineers', [\App\Http\Controllers\Admin\ManarController::class, 'engineers'])->name('engineers');
//            استلام الصيانة من العميل
Route::get('/MaintenanceReceipt', [\App\Http\Controllers\Admin\ManarController::class, 'MaintenanceReceipt'])->name('MaintenanceReceipt');
//            تسليم الصيانة للمهندس
Route::get('/deliveryTo', [\App\Http\Controllers\Admin\ManarController::class, 'deliveryTo'])->name('deliveryTo');
//              استلام الصيانة من المهندس
Route::get('/receiptFrom', [\App\Http\Controllers\Admin\ManarController::class, 'receiptFrom'])->name('receiptFrom');
//                 التسليم الي العميل
Route::get('/DeliveryCustomer', [\App\Http\Controllers\Admin\ManarController::class, 'DeliveryCustomer'])->name('DeliveryCustomer');
//                 استعلام عن حالةالصيانة
Route::get('/maintenanceStatus', [\App\Http\Controllers\Admin\ManarController::class, 'maintenanceStatus'])->name('maintenanceStatus');
//                 اضافة مرتجع
Route::get('/feedback', [\App\Http\Controllers\Admin\ManarController::class, 'feedback'])->name('feedback');
//                  التحويل من مهندس لاخر
Route::get('/engineerChange', [\App\Http\Controllers\Admin\ManarController::class, 'engineerChange'])->name('engineerChange');
//                  الفنيون
Route::get('/technicians', [\App\Http\Controllers\Admin\ManarController::class, 'technicians'])->name('technicians');
//                  تسجيل بيانات صيانة لعميل
Route::get('/customerMaintenance', [\App\Http\Controllers\Admin\ManarController::class, 'customerMaintenance'])->name('customerMaintenance');
//                   بيانات فلتر لعميل
Route::get('/FilterData', [\App\Http\Controllers\Admin\ManarController::class, 'FilterData'])->name('FilterData');
//                   العملاء مستحقى الصيانة
Route::get('/maintenanceWorthy', [\App\Http\Controllers\Admin\ManarController::class, 'maintenanceWorthy'])->name('maintenanceWorthy');
//                   العملاءالمحولين للصيانة
Route::get('/converterMaintenance', [\App\Http\Controllers\Admin\ManarController::class, 'converterMaintenance'])->name('converterMaintenance');
//                  تحويل العملاء من فنى لاخر
Route::get('/changeTechnician', [\App\Http\Controllers\Admin\ManarController::class, 'changeTechnician'])->name('changeTechnician');
//                  حسابات الموظفين
Route::get('/staffAccounts', [\App\Http\Controllers\Admin\ManarController::class, 'staffAccounts'])->name('staffAccounts');
//                  بيانات  الموظفين
Route::get('/staffData', [\App\Http\Controllers\Admin\ManarController::class, 'staffData'])->name('staffData');
//                  اعدادات  الموظفين
Route::get('/StaffSettings', [\App\Http\Controllers\Admin\ManarController::class, 'StaffSettings'])->name('StaffSettings');
//حضور وانصراف الموظفين
Route::get('/AttendingLeaving', [\App\Http\Controllers\Admin\ManarController::class, 'AttendingLeaving'])->name('AttendingLeaving');
//الغياب
Route::get('/absence', [\App\Http\Controllers\Admin\ManarController::class, 'absence'])->name('absence');
//التاخير
Route::get('/Delay', [\App\Http\Controllers\Admin\ManarController::class, 'Delay'])->name('Delay');
//الاضافى
Route::get('/extra', [\App\Http\Controllers\Admin\ManarController::class, 'extra'])->name('extra');
//خصومات الموظفين
Route::get('/EmployeeDiscounts', [\App\Http\Controllers\Admin\ManarController::class, 'EmployeeDiscounts'])->name('EmployeeDiscounts');
// المكافئات
Route::get('/Rewards', [\App\Http\Controllers\Admin\ManarController::class, 'Rewards'])->name('Rewards');
// مرتبات الموظفين
Route::get('/salaries', [\App\Http\Controllers\Admin\ManarController::class, 'salaries'])->name('salaries');
//  الموظفين
Route::get('/salaries', [\App\Http\Controllers\Admin\ManarController::class, 'salaries'])->name('salaries');
//  الاصناف
Route::get('/classCommission', [\App\Http\Controllers\Admin\ManarController::class, 'classCommission'])->name('classCommission');
//  عمولات الموظفين للاصناف
Route::get('/employeeCommission', [\App\Http\Controllers\Admin\ManarController::class, 'employeeCommission'])->name('employeeCommission');
// حساب عمولة موظف
Route::get('/commissionAccount', [\App\Http\Controllers\Admin\ManarController::class, 'commissionAccount'])->name('commissionAccount');
