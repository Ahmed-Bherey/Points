<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\CheckController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DamgeController;
use App\Http\Controllers\Admin\DelayController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AssetsController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\SerialController;
use App\Http\Controllers\Admin\AbsenceController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BuyBillController;
use App\Http\Controllers\Admin\CapitalController;
use App\Http\Controllers\Admin\IteItemController;
use App\Http\Controllers\Admin\IteTypeController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SubUnitController;
use App\Http\Controllers\Admin\AddStoreController;
use App\Http\Controllers\Admin\CovenantController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\EngineerController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TransferController;
use App\Http\Controllers\Admin\TreasuryController;
use App\Http\Controllers\Admin\UserBankController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExtraHourController;
use App\Http\Controllers\Admin\ItemColorController;
use App\Http\Controllers\Admin\SalesBillController;
use App\Http\Controllers\Admin\ShowPriceController;
use App\Http\Controllers\Admin\StaffDataController;
use App\Http\Controllers\Admin\AddCompanyController;
use App\Http\Controllers\Admin\ClientDebtController;
use App\Http\Controllers\Admin\DeliveryToController;
use App\Http\Controllers\Admin\FilterDataController;
use App\Http\Controllers\Admin\IndustrialController;
use App\Http\Controllers\Admin\ReserveCarController;
use App\Http\Controllers\Admin\TechnicianController;
use App\Http\Controllers\Admin\AddTreasuryController;
use App\Http\Controllers\Admin\BorrowMoneyController;
use App\Http\Controllers\Admin\DestructionController;
use App\Http\Controllers\Admin\ReceiptFromController;
use App\Http\Controllers\Admin\ReminderDueController;
use App\Http\Controllers\Admin\SalesNoBillController;
use App\Http\Controllers\Admin\SalesReturnController;
use App\Http\Controllers\Admin\AddRepresentController;
use App\Http\Controllers\Admin\BankTransferController;
use App\Http\Controllers\Admin\BorrowerDataController;
use App\Http\Controllers\Admin\BounceNoBillController;
use App\Http\Controllers\Admin\CovenantDataController;
use App\Http\Controllers\Admin\DuesToClientController;
use App\Http\Controllers\Admin\StaffSettingController;
use App\Http\Controllers\Admin\AddPermissionController;
use App\Http\Controllers\Admin\ClientAccountController;
use App\Http\Controllers\Admin\CashPermissionController;
use App\Http\Controllers\Admin\CategComponentController;
use App\Http\Controllers\Admin\CovenantReportController;
use App\Http\Controllers\Admin\GeneralAccountController;
use App\Http\Controllers\Admin\GeneralExpenseController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PartnerProcessController;
use App\Http\Controllers\Admin\PayInstallmentController;
use App\Http\Controllers\Admin\RepresentativeController;
use App\Http\Controllers\Admin\StartUpExpenseController;
use App\Http\Controllers\Admin\SupplierOrdersController;
use App\Http\Controllers\Admin\ClassCommissionController;
use App\Http\Controllers\Admin\CollectQuantityController;
use App\Http\Controllers\Admin\CovenantAccountController;
use App\Http\Controllers\Admin\EqualizQuantiteController;
use App\Http\Controllers\Admin\ReceivablesDataController;
use App\Http\Controllers\Admin\withdrawPayLoanController;
use App\Http\Controllers\Admin\AccountSuppliersController;
use App\Http\Controllers\Admin\AttendingLeavingController;
use App\Http\Controllers\Admin\ChangeTechnicianController;
use App\Http\Controllers\Admin\ReturnedPurchaseController;
use App\Http\Controllers\Admin\TreasuryTransferController;
use App\Http\Controllers\Admin\WithdrawDepositeController;
use App\Http\Controllers\Admin\MaintenanceWorthyController;
use App\Http\Controllers\Admin\ReceivableAccountController;
use App\Http\Controllers\Admin\AddCateqIncompleteController;
use App\Http\Controllers\Admin\EmployeeCommissionController;
use App\Http\Controllers\Admin\MaintenanceRequestController;
use App\Http\Controllers\Admin\PersonalWithdrawalController;
use App\Http\Controllers\Admin\ProfitDistributionController;
use App\Http\Controllers\Admin\CommissionCalculateController;
use App\Http\Controllers\Admin\CustomerMaintenanceController;
use App\Http\Controllers\Admin\MaintenanceDeliveryController;
use App\Http\Controllers\Admin\ConverterMaintenanceController;
use App\Http\Controllers\Admin\DiscountAddNotificationController;
use App\Http\Controllers\Admin\ReceivableRccountsReportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\WithdrawalDepositAdvanceController;

// login & logout
Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'loginForm'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->prefix('/')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // Users
    Route::get('users' , [UsersController::class , 'create'])->name('users.create');
    Route::post('users' , [UsersController::class , 'store'])->name('users.store');
    Route::get('users/{id}' , [UsersController::class , 'edit'])->name('users.edit');
    Route::post('users/{id}' , [UsersController::class , 'update'])->name('users.update');
    Route::get('deleteusers/{id}' , [UsersController::class , 'destroy'])->name('users.destroy');
    //
    Route::resource('addStore' , AddStoreController::class);
    Route::resource('companies' , AddCompanyController::class);
    Route::resource('types' , IteTypeController::class);
    Route::resource('sizes' , SizeController::class);
    Route::resource('colors' , ColorController::class);
    Route::resource('items' , IteItemController::class);
    Route::resource('itemsColor' , ItemColorController::class);
    Route::resource('supplier' , SupplierController::class);
    // EqualizQuantite
    Route::resource('EqualizQuantite' , EqualizQuantiteController::class);
    Route::get('equaliz/item/ajax/{id}', [EqualizQuantiteController::class, 'equalizAjax'])->name('equaliz.item.ajax');
    // Route::get('equaliz/quantity/ajax/{id}/{store_id}', [EqualizQuantiteController::class, 'quantityAjax'])->name('equaliz.quantity.ajax');
    // Route::get('equaliz/quantity/ajax', [EqualizQuantiteController::class, 'test'])->name('equaliz.test');
    //
    Route::resource('cashPermission' , CashPermissionController::class);
    Route::resource('addPermission' , AddPermissionController::class);
    Route::resource('unites' , UnitController::class);
    // damge
    Route::resource('damge' , DamgeController::class);
    Route::get('damge/item/ajax/{id}', [DamgeController::class, 'damgeAjax'])->name('damge.item.ajax');
    Route::get('damge/units/ajax/{store_id}/{id}', [DamgeController::class, 'unitsAjax'])->name('damge.units.ajax');
    // transfer
    Route::resource('transfer' , TransferController::class);
    Route::get('store/items/ajax/{id}', [TransferController::class, 'storeAjax'])->name('store.items.ajax');
    Route::get('transfer/units/{store_id}/{id}', [TransferController::class, 'itemAjax'])->name('transfer.units.ajax');
    //
    Route::resource('serial' , SerialController::class);
    Route::resource('categcomponent' , CategComponentController::class);
    Route::resource('collectquantity' , CollectQuantityController::class);
    Route::resource('subunit' , SubUnitController::class);
    Route::resource('representative' , RepresentativeController::class);
    Route::resource('addRepresent' , AddRepresentController::class);
    Route::resource('supplierOrders' , SupplierOrdersController::class);
    // buybill
    Route::resource('buybill' , BuyBillController::class);
    Route::get('buybill/ReturnedPurchaseEdit/{id}', [BuyBillController::class, 'ReturnedPurchaseEdit'])->name('ReturnedPurchaseEdit.all');
    Route::post('buybill/ReturnedPurchaseUpdate/{id}', [BuyBillController::class, 'ReturnedPurchaseUpdate'])->name('ReturnedPurchaseUpdate.all');
    Route::get('buybill/balance/ajax/{id}', [BuyBillController::class, 'buybillAjax'])->name('buybill.balance.ajax');
    Route::get('buybill/bank/ajax/{id}', [BuyBillController::class, 'bankAjax'])->name('buybill.bank.ajax');
    Route::get('buybill/item/ajax/{id}', [BuyBillController::class, 'itemAjax'])->name('buybill.item.ajax');
    Route::get('buybill/unit/ajax/{id}', [BuyBillController::class, 'unitAjax'])->name('buybill.unit.ajax');
    Route::get('buybill/price/ajax/{id}', [BuyBillController::class, 'priceAjax'])->name('buybill.price.ajax');
    Route::get('buybill/supplier/ajax/{id}', [BuyBillController::class, 'supplierAjax'])->name('buybill.supplier.ajax');
    Route::get('buybill/salePrice/ajax/{id}', [BuyBillController::class, 'salePriceAjax'])->name('buybill.salePrice.ajax');
    Route::get('buybill/unitPrice/ajax/{id}', [BuyBillController::class, 'unitPriceAjax'])->name('buybill.unitPrice.ajax');
    Route::get('buybill/search/all/Reports' , [BuyBillController::class , 'search'])->name('buybill.search.all.Reports');
    //
    Route::resource('treasuries' , TreasuryController::class);
    Route::resource('addTreasury' , AddTreasuryController::class);
    Route::resource('accountSuppliers' , AccountSuppliersController::class);
    Route::resource('bank' , BankController::class);
    Route::get('/getResult' , [EqualizQuantiteController::class , 'getResult']);
    Route::resource('client' , ClientController::class);
    Route::resource('capital' , CapitalController::class);
    Route::resource('account' , AccountController::class);
    Route::resource('clientDebts' , ClientDebtController::class);
    Route::resource('assets' , AssetsController::class);
    Route::resource('destruction' , DestructionController::class);
    Route::resource('userBank' , UserBankController::class);
    // check
    Route::resource('check' , CheckController::class);
    Route::get('check/checkName/show/ajax/{id}', [CheckController::class, 'checkName'])->name('check.checkName.ajax');
    //
    Route::resource('partner' , PartnerController::class);
    Route::resource('partner-process' , PartnerProcessController::class);
    Route::resource('borrowMoney' , BorrowMoneyController::class);
    Route::resource('loan' , LoanController::class);
    Route::resource('covenant' , CovenantController::class);
    Route::resource('engineer' , EngineerController::class);
    Route::resource('maintenanceRequest' , MaintenanceRequestController::class);
    Route::resource('deliveryTo' , DeliveryToController::class);
    Route::resource('receiptFrom' , ReceiptFromController::class);
    Route::resource('maintenanceDelivery' , MaintenanceDeliveryController::class);
    Route::resource('staffData' , StaffDataController::class);
    Route::resource('attendingLeaving' , AttendingLeavingController::class);
    Route::resource('technicians' , TechnicianController::class);
    Route::resource('customerMaintenance' , CustomerMaintenanceController::class);
    Route::resource('filterData' , FilterDataController::class);
    Route::resource('maintenanceWorthy' , MaintenanceWorthyController::class);
    Route::resource('converterMaintenance' , ConverterMaintenanceController::class);
    Route::resource('changeTechnician' , ChangeTechnicianController::class);
    Route::resource('absence' , AbsenceController::class);
    Route::resource('delay' , DelayController::class);
    Route::resource('extraHours' , ExtraHourController::class);
    Route::resource('discounts' , DiscountController::class);
    Route::resource('rewards' , RewardController::class);
    Route::resource('salary' , SalaryController::class);
    Route::resource('classCommission' , ClassCommissionController::class);
    Route::resource('commissionCalculate' , CommissionCalculateController::class);
    Route::resource('staffSetting' , StaffSettingController::class);
    Route::resource('treasuryTransfer' , TreasuryTransferController::class);
    // withdrawDeposite
    Route::resource('withdrawDeposite' , WithdrawDepositeController::class);
    Route::get('withdrawDeposite/bank/ajax/{id}', [WithdrawDepositeController::class, 'bankAjax'])->name('withdrawDeposite.bank.ajax');
    Route::get('withdrawDeposite/treasury/ajax/{id}', [WithdrawDepositeController::class, 'treasuryAjax'])->name('withdrawDeposite.treasury.ajax');
    //Route To Delete All Records
    // Route::get('/deleteAll' , [WithdrawDepositeController::class , 'deleteAllRecord'])->name('withdrawDeposite.deleteAll');
    //
    Route::resource('profitDistribution' , ProfitDistributionController::class);
    // receivables
    Route::resource('receivablesData' , ReceivablesDataController::class);
    Route::resource('receivableAccount' , ReceivableAccountController::class);
    Route::get('receivable/balance/ajax/{id}', [ReceivableAccountController::class, 'receivableAjax'])->name('receivable.balance.ajax');
    Route::resource('receivableRccountsReport' , ReceivableRccountsReportController::class);
    //
    Route::resource('covenantData' , CovenantDataController::class);
    Route::resource('covenantAccount' , CovenantAccountController::class);
    Route::resource('covenantReport' , CovenantReportController::class);
    Route::resource('borrowerData' , BorrowerDataController::class);
    Route::resource('material' , MaterialController::class);
    Route::resource('salesReturn' , SalesReturnController::class);
    Route::resource('salesNoBill' , SalesNoBillController::class);
    Route::resource('cateqIncomplete' , AddCateqIncompleteController::class);
    Route::resource('showPrice' , ShowPriceController::class);
    Route::resource('reserveCar' , ReserveCarController::class);
    // salesBill
    Route::resource('salesBill' , SalesBillController::class);
    Route::get('salesBill/returnedSalesEdit/{id}', [SalesBillController::class, 'ReturnedSalesEdit'])->name('returnedSalesEdit.all');
    Route::post('salesBill/returnedSalesUpdate/{id}', [SalesBillController::class, 'ReturnedSalesUpdate'])->name('returnedSalesUpdate.all');
    Route::get('salesBill/treasury/ajax/{id}', [SalesBillController::class, 'treasuryAjax'])->name('salesBill.treasury.ajax');
    Route::get('salesBill/bank/ajax/{id}', [SalesBillController::class, 'bankAjax'])->name('salesBill.bank.ajax');
    Route::get('salesBill/item/ajax/{id}', [SalesBillController::class, 'itemAjax'])->name('salesBill.item.ajax');
    Route::get('salesBill/unit/ajax/{id}', [SalesBillController::class, 'unitAjax'])->name('salesBill.unit.ajax');
    // returnedPurchase
    // Route::resource('returnedPurchase' , ReturnedPurchaseController::class);
    // Route::get('returnedPurchase/bank/ajax/{id}', [ReturnedPurchaseController::class, 'returnedPurchaseAjax'])->name('returnedPurchase.bank.ajax');
    // Route::get('returnedPurchase/treasury/ajax/{id}', [ReturnedPurchaseController::class, 'treasuryAjax'])->name('returnedPurchase.treasury.ajax');
    // Client Account
    Route::get('ClientAccount' , [ClientAccountController::class , 'create'])->name('clientAccount.create');
    Route::post('AddClientAccount' , [ClientAccountController::class , 'store'])->name('clientAccount.store');
    Route::get('EditClientAccount/{id}' , [ClientAccountController::class , 'edit'])->name('clientAccount.edit');
    Route::post('UpdateClientAccount/{id}' , [ClientAccountController::class , 'update'])->name('clientAccount.update');
    Route::get('DestroyClientAccount/{id}' , [ClientAccountController::class , 'destroy'])->name('clientAccount.destroy');
    Route::get('clientAccount/treasury/ajax/{id}', [ClientAccountController::class, 'treasuryAjax'])->name('treasury.balance.ajax');
    Route::get('clientAccount/bank/ajax/{id}', [ClientAccountController::class, 'bankAjax'])->name('clientAccount.bank.ajax');
    // Dues To Client
    Route::get('duesToClient' , [DuesToClientController::class , 'create'])->name('duesToClient.create');
    Route::post('AddDuesToClient' , [DuesToClientController::class , 'store'])->name('duesToClient.store');
    Route::get('EditDuesToClient/{id}' , [DuesToClientController::class , 'edit'])->name('duesToClient.edit');
    Route::post('UpdateDuesToClient/{id}' , [DuesToClientController::class , 'update'])->name('duesToClient.update');
    Route::get('DestroyDuesToClient/{id}' , [DuesToClientController::class , 'destroy'])->name('duesToClient.destroy');
    // Pay Installment
    Route::get('payInstallment' , [PayInstallmentController::class , 'create'])->name('payInstallment.create');
    Route::post('PayInstallment' , [PayInstallmentController::class , 'store'])->name('payInstallment.store');
    Route::get('EditPayInstallment/{id}' , [PayInstallmentController::class , 'edit'])->name('payInstallment.edit');
    Route::post('UpdatePayInstallment/{id}' , [PayInstallmentController::class , 'update'])->name('payInstallment.update');
    Route::get('DestroyPayInstallment/{id}' , [PayInstallmentController::class , 'destroy'])->name('payInstallment.destroy');
    // GeneralSetting
    Route::get('generalSetting' , [GeneralSettingController::class , 'create'])->name('generalSetting.create');
    Route::post('generalSetting' , [GeneralSettingController::class , 'store'])->name('generalSetting.store');
    Route::get('editGeneralSetting/{id}' , [GeneralSettingController::class , 'edit'])->name('generalSetting.edit');
    Route::post('updateGeneralSetting/{id}' , [GeneralSettingController::class , 'update'])->name('generalSetting.update');
    Route::get('destroyGeneralSetting/{id}' , [GeneralSettingController::class , 'destroy'])->name('generalSetting.destroy');
    // EmployeeCommission
    Route::get('EmployeeCommission' , [EmployeeCommissionController::class , 'create'])->name('employeeCommission.create');
    Route::post('employeeCommission' , [EmployeeCommissionController::class , 'store'])->name('employeeCommission.store');
    Route::get('editEmployeeCommission/{id}' , [EmployeeCommissionController::class , 'edit'])->name('employeeCommission.edit');
    Route::post('updateEmployeeCommission/{id}' , [EmployeeCommissionController::class , 'update'])->name('employeeCommission.update');
    Route::get('destroyEmployeeCommission/{id}' , [EmployeeCommissionController::class , 'destroy'])->name('employeeCommission.destroy');
    //
    Route::get('cashPermission/item/ajax/{id}', [CashPermissionController::class, 'cashPermissionAjax'])->name('cashPermission.item.ajax');
    // Industrial
    Route::get('industrial' , [IndustrialController::class , 'create'])->name('industrial.create');
    Route::post('industrial' , [IndustrialController::class , 'store'])->name('industrial.store');
    Route::get('editindustrial/{id}' , [IndustrialController::class , 'edit'])->name('industrial.edit');
    Route::post('updateindustrial/{id}' , [IndustrialController::class , 'update'])->name('industrial.update');
    Route::get('destroyindustrial/{id}' , [IndustrialController::class , 'destroy'])->name('industrial.destroy');
    // Drawal
    Route::get('drawal' , [DrawalController::class , 'create'])->name('drawal.create');
    Route::post('drawal' , [DrawalController::class , 'store'])->name('drawal.store');
    Route::get('editdrawal/{id}' , [DrawalController::class , 'edit'])->name('drawal.edit');
    Route::post('updatedrawal/{id}' , [DrawalController::class , 'update'])->name('drawal.update');
    Route::get('destroydrawal/{id}' , [DrawalController::class , 'destroy'])->name('drawal.destroy');
    // bounceNoBill
    Route::get('bounceNoBill' , [BounceNoBillController::class , 'create'])->name('bounceNoBill.create');
    Route::post('BounceNoBill' , [BounceNoBillController::class , 'store'])->name('bounceNoBill.store');
    Route::get('editBounceNoBill/{id}' , [BounceNoBillController::class , 'edit'])->name('bounceNoBill.edit');
    Route::post('updateBounceNoBill/{id}' , [BounceNoBillController::class , 'update'])->name('bounceNoBill.update');
    Route::get('destroyBounceNoBill/{id}' , [BounceNoBillController::class , 'destroy'])->name('bounceNoBill.destroy');
    Route::get('bounceNoBill/treasury/ajax/{id}', [BounceNoBillController::class, 'treasuryAjax'])->name('bounceNoBill.treasury.ajax');
    // WithdrawPayLoan
    Route::get('withdrawPayLoan' , [withdrawPayLoanController::class , 'create'])->name('withdrawPayLoan.create');
    Route::post('withdrawPayLoan' , [withdrawPayLoanController::class , 'store'])->name('withdrawPayLoan.store');
    Route::get('withdrawPayLoan/{id}' , [withdrawPayLoanController::class , 'edit'])->name('withdrawPayLoan.edit');
    Route::post('withdrawPayLoan/{id}' , [withdrawPayLoanController::class , 'update'])->name('withdrawPayLoan.update');
    Route::get('deleteWithdrawPayLoan/{id}' , [withdrawPayLoanController::class , 'destroy'])->name('withdrawPayLoan.destroy');
    // discountAddNotification
    Route::get('discountAddNotification' , [DiscountAddNotificationController::class , 'create'])->name('discountAddNotification.create');
    Route::post('discountAddNotification' , [DiscountAddNotificationController::class , 'store'])->name('discountAddNotification.store');
    Route::get('discountAddNotification/{id}' , [DiscountAddNotificationController::class , 'edit'])->name('discountAddNotification.edit');
    Route::post('discountAddNotification/{id}' , [DiscountAddNotificationController::class , 'update'])->name('discountAddNotification.update');
    Route::get('deleteDiscountAddNotification/{id}' , [DiscountAddNotificationController::class , 'destroy'])->name('discountAddNotification.destroy');
    // bankTransfer
    Route::get('bankTransfer' , [BankTransferController::class , 'create'])->name('bankTransfer.create');
    Route::post('bankTransfer' , [BankTransferController::class , 'store'])->name('bankTransfer.store');
    Route::get('bankTransfer/{id}' , [BankTransferController::class , 'edit'])->name('bankTransfer.edit');
    Route::post('bankTransfer/{id}' , [BankTransferController::class , 'update'])->name('bankTransfer.update');
    Route::get('deleteBankTransfer/{id}' , [BankTransferController::class , 'destroy'])->name('bankTransfer.destroy');
    // PersonalWithdrawal
    Route::get('personalWithdrawal' , [PersonalWithdrawalController::class , 'create'])->name('personalWithdrawal.create');
    Route::post('personalWithdrawal' , [PersonalWithdrawalController::class , 'store'])->name('personalWithdrawal.store');
    Route::get('personalWithdrawal/{id}' , [PersonalWithdrawalController::class , 'edit'])->name('personalWithdrawal.edit');
    Route::post('personalWithdrawal/{id}' , [PersonalWithdrawalController::class , 'update'])->name('personalWithdrawal.update');
    Route::get('deletePersonalWithdrawal/{id}' , [PersonalWithdrawalController::class , 'destroy'])->name('personalWithdrawal.destroy');
    // generalExpense
    Route::get('generalExpense' , [GeneralExpenseController::class , 'create'])->name('generalExpense.create');
    Route::post('generalExpense' , [GeneralExpenseController::class , 'store'])->name('generalExpense.store');
    Route::get('generalExpense/{id}' , [GeneralExpenseController::class , 'edit'])->name('generalExpense.edit');
    Route::post('generalExpense/{id}' , [GeneralExpenseController::class , 'update'])->name('generalExpense.update');
    Route::get('deleteGeneralExpense/{id}' , [GeneralExpenseController::class , 'destroy'])->name('generalExpense.destroy');
    // generalAccounts
    Route::get('generalAccount' , [GeneralAccountController::class , 'create'])->name('generalAccount.create');
    Route::post('generalAccount' , [GeneralAccountController::class , 'store'])->name('generalAccount.store');
    Route::get('generalAccount/{id}' , [GeneralAccountController::class , 'edit'])->name('generalAccount.edit');
    Route::post('generalAccount/{id}' , [GeneralAccountController::class , 'update'])->name('generalAccount.update');
    Route::get('deleteGeneralAccount/{id}' , [GeneralAccountController::class , 'destroy'])->name('generalAccount.destroy');
    // StartUpExpense
    Route::get('startUpExpense' , [StartUpExpenseController::class , 'create'])->name('startUpExpense.create');
    Route::post('startUpExpense' , [StartUpExpenseController::class , 'store'])->name('startUpExpense.store');
    Route::get('startUpExpense/{id}' , [StartUpExpenseController::class , 'edit'])->name('startUpExpense.edit');
    Route::post('startUpExpense/{id}' , [StartUpExpenseController::class , 'update'])->name('startUpExpense.update');
    Route::get('deleteStartUpExpense/{id}' , [StartUpExpenseController::class , 'destroy'])->name('startUpExpense.destroy');
    // ReminderDue
    Route::get('reminderDue' , [ReminderDueController::class , 'create'])->name('reminderDue.create');
    Route::post('reminderDue' , [ReminderDueController::class , 'store'])->name('reminderDue.store');
    Route::get('reminderDue/{id}' , [ReminderDueController::class , 'edit'])->name('reminderDue.edit');
    Route::post('reminderDue/{id}' , [ReminderDueController::class , 'update'])->name('reminderDue.update');
    Route::get('deleteReminderDue/{id}' , [ReminderDueController::class , 'destroy'])->name('reminderDue.destroy');
    // WithdrawalDepositAdvance
    Route::get('withdrawalDepositAdvance' , [WithdrawalDepositAdvanceController::class , 'create'])->name('withdrawalDepositAdvance.create');
    Route::post('withdrawalDepositAdvance' , [WithdrawalDepositAdvanceController::class , 'store'])->name('withdrawalDepositAdvance.store');
    Route::get('withdrawalDepositAdvance/{id}' , [WithdrawalDepositAdvanceController::class , 'edit'])->name('withdrawalDepositAdvance.edit');
    Route::post('withdrawalDepositAdvance/{id}' , [WithdrawalDepositAdvanceController::class , 'update'])->name('withdrawalDepositAdvance.update');
    Route::get('deleteWithdrawalDepositAdvance/{id}' , [WithdrawalDepositAdvanceController::class , 'destroy'])->name('withdrawalDepositAdvance.destroy');

    // Reports
    // equalizQuantite
    Route::get('equalizQuantite/select' , [ReportController::class , 'equalizQuantiteSelect'])->name('equalizQuantite.select');
    Route::get('equalizQuantite/report' , [ReportController::class , 'equalizQuantiteReport'])->name('equalizQuantite.report');
    // cashpremission
    Route::get('cashpremission/report' , [ReportController::class , 'cashpremissionReport'])->name('cashpremission.report');
    Route::get('cashpremission/show' , [ReportController::class , 'cashpremissionShow'])->name('cashpremission.show');
    // clients
    Route::get('clients/report' , [ReportController::class , 'clientSelect'])->name('client.report');
    Route::get('clients/show' , [ReportController::class , 'clientShow'])->name('client.show');
});











