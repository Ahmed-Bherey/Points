<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManarController extends Controller
{
    public function detail()
    {

        return view('admin.pages.detail.create');
    }
    public function store()
    {

        return view('admin.pages.store.create');
    }
    public function addstore()
    {

        return view('admin.pages.addstore.create');
    }
    public function addcompany()
    {

        return view('admin.pages.addcompany.create');
    }
    public function addtype()
    {

        return view('admin.pages.addtypes.create');
    }
    public function addunit()
    {

        return view('admin.pages.addunits.create');
    }
    public function addsize()
    {

        return view('admin.pages.addsizes.create');
    }
    public function addcolor()
    {

        return view('admin.pages.addcolors.create');
    }
    public function addcategory()
    {

        return view('admin.pages.addcategories.create');
    }
    public function addSubunits()
    {

        return view('admin.pages.addsubunits.create');
    }
    public function addsizecateg()
    {

        return view('admin.pages.addsizecateg.create');
    }
    public function addcolorcateg()
    {

        return view('admin.pages.itemsColor.create');
    }
    public function export()
    {

        return view('admin.pages.exportcategories.create');
    }
    public function import()
    {

        return view('admin.pages.importcategories.create');
    }
    public function print()
    {

        return view('admin.pages.printparcode.create');
    }
    public function printcode()
    {

        return view('admin.pages.Printsecondcode.create');
    }
    public function editprices()
    {

        return view('admin.pages.Pricescompany.create');
    }
    public function modifycateg()
    {

        return view('admin.pages.ModifiedCategories.create');
    }
    public function addcode()
    {

        return view('admin.pages.CategoryParcode.create');
    }
    public function modifyquant()
    {

        return view('admin.pages.CategoriesQuantities.create');
    }
    public function EqualizQuantities()
    {

        return view('admin.pages.EqualizQuantities.create');
    }
    public function showcash()
    {

        return view('admin.pages.CashPermission.create');
    }
    public function showadd()
    {

        return view('admin.pages.addPermission.create');
    }
    public function transfer()
    {

        return view('admin.pages.transfer.create');
    }
    public function storeInventory()
    {

        return view('admin.pages.storeInventory.create');
    }
    public function inventory()
    {

        return view('admin.pages.inventory.create');
    }
    public function Serialsitems()
    {

        return view('admin.pages.Serialsitems.create');
    }
    public function reportserials()
    {

        return view('admin.pages.reportserials.create');
    }
    public function caregcomponents()
    {

        return view('admin.pages.caregcomponents.create');
    }
    public function collectquantity()
    {

        return view('admin.pages.collectquantity.create');
    }
    public function disconnectcateg()
    {

        return view('admin.pages.disconnectcateg.create');
    }
    public function suppliers()
    {

        return view('admin.pages.suppliers.create');
    }
    public function buybill()
    {

        return view('admin.pages.buybill.create');
    }
    public function modifiybill()
    {

        return view('admin.pages.modifiybill.create');
    }
    public function bounce()
    {

        return view('admin.pages.bounce.create');
    }
    public function damge()
    {

        return view('admin.pages.damge.create');
    }
    public function material()
    {

        return view('admin.pages.material.create');
    }
    public function bounceNoBill()
    {

        return view('admin.pages.bounceNoBill.create');
    }
    public function bounceModifiy()
    {

        return view('admin.pages.bounceModifiy.create');
    }
    public function accountSuppliers()
    {

        return view('admin.pages.accountSuppliers.create');
    }
    public function addSupplier()
    {

        return view('admin.pages.addSupplier.create');
    }
    public function dollarImport()
    {

        return view('admin.pages.dollarImport.create');
    }
    public function exportDebt()
    {

        return view('admin.pages.exportDebt.create');
    }
    public function orderedSuppConvert()
    {

        return view('admin.pages.orderedSuppConvert.create');
    }
    public function SupplierOrders()
    {

        return view('admin.pages.SupplierOrders.create');
    }
    public function customers()
    {

        return view('admin.pages.customers.create');
    }
    public function exportCustomer()
    {

        return view('admin.pages.exportCustomer.create');
    }
    public function importcustomer()
    {

        return view('admin.pages.importcustomer.create');
    }
    public function customerDept()
    {

        return view('admin.pages.customerDept.create');
    }
    public function representative()
    {

        return view('admin.pages.representative.create');
    }
    public function AddRepresent()
    {

        return view('admin.pages.AddRepresent.create');
    }
    public function salesBill()
    {

        return view('admin.pages.salesBill.create');
    }

    public function salesBillMod()
    {

        return view('admin.pages.salesBillMod.create');
    }
    public function salesReturns()
    {

        return view('admin.pages.salesReturns.create');
    }
    public function salesNoBill()
    {

        return view('admin.pages.salesNoBill.create');
    }
    public function salesReturnMod()
    {

        return view('admin.pages.salesReturnMod.create');
    }
    public function addCateqIncomplete()
    {

        return view('admin.pages.addCateqIncomplete.create');
    }
    public function showPrices()
    {

        return view('admin.pages.showPrices.create');
    }
    public function ReserveCar()
    {

        return view('admin.pages.ReserveCar.create');
    }
    public function categUnderDelivery()
    {

        return view('admin.pages.categUnderDelivery.create');
    }
    public function BillUnderDelivery()
    {

        return view('admin.pages.BillUnderDelivery.create');
    }
    public function CustomerAccounts()
    {

        return view('admin.pages.CustomerAccounts.create');
    }
    public function DuesToClients()
    {

        return view('admin.pages.DuesToClients.create');
    }
    public function payInstallment()
    {

        return view('admin.pages.payInstallment.create');
    }
    public function guarantors()
    {

        return view('admin.pages.guarantors.create');
    }
    public function guarantorsMove()
    {

        return view('admin.pages.guarantorsMove.create');
    }
    public function guarantorsreport()
    {

        return view('admin.pages.guarantorsreport.create');
    }
    public function installmentStructure()
    {

        return view('admin.pages.installmentStructure.create');
    }
    public function notice()
    {

        return view('admin.pages.notice.create');
    }
    public function customerPoints()
    {

        return view('admin.pages.customerPoints.create');
    }
    public function representPoints()
    {

        return view('admin.pages.representPoints.create');
    }
    public function Visit()
    {

        return view('admin.pages.Visit.create');
    }
    public function industrial()
    {

        return view('admin.pages.industrial.create');
    }
    public function drawals()
    {

        return view('admin.pages.drawals.create');
    }
    public function industrialReport()
    {

        return view('admin.pages.industrialReport.create');
    }
    public function pricelist()
    {

        return view('admin.pages.pricelist.create');
    }
    public function registration()
    {

        return view('admin.pages.registration.create');
    }
    public function allStore()
    {

        return view('admin.pages.allStore.create');
    }
    public function userStore()
    {

        return view('admin.pages.userStore.create');
    }
    public function treasuryTransfer()
    {

        return view('admin.pages.treasuryTransfer.create');
    }
    public function capital()
    {

        return view('admin.pages.capital.create');
    }
    public function banks()
    {

        return view('admin.pages.banks.create');
    }
    public function userBank()
    {

        return view('admin.pages.userBank.create');
    }
    public function account()
    {

        return view('admin.pages.account.create');
    }
    public function customerDebts()
    {

        return view('admin.pages.customerDebts.create');
    }
    public function oldInstallments()
    {

        return view('admin.pages.oldInstallments.create');
    }
    public function SupplierDebt()
    {

        return view('admin.pages.SupplierDebt.create');
    }
    public function borrowMoney()
    {

        return view('admin.pages.borrowMoney.create');
    }
    public function Loan()
    {

        return view('admin.pages.Loan.create');
    }
    public function Covenant()
    {

        return view('admin.pages.Covenant.create');
    }
    public function assets()
    {

        return view('admin.pages.assets.create');
    }
    public function Destruction()
    {

        return view('admin.pages.Destruction.create');
    }
    public function depositMoney()
    {

        return view('admin.pages.depositMoney.create');
    }
    public function Check()
    {

        return view('admin.pages.Check.create');
    }
    public function withdrawals()
    {

        return view('admin.pages.withdrawals.create');
    }
    public function startExpenses()
    {

        return view('admin.pages.startExpenses.create');
    }
    public function generalExpenses()
    {

        return view('admin.pages.generalExpenses.create');
    }
    public function dateExpense()
    {

        return view('admin.pages.dateExpense.create');
    }
    public function otherIncome()
    {

        return view('admin.pages.otherIncome.create');
    }
    public function BorrowerData()
    {

        return view('admin.pages.BorrowerData.create');
    }
    public function WithdrawPayLoans()
    {

        return view('admin.pages.WithdrawPayLoans.create');
    }
    public function loanReport()
    {

        return view('admin.pages.loanReport.create');
    }
    public function Borrower()
    {

        return view('admin.pages.Borrower.create');
    }
    public function WithdrawDeposit()
    {

        return view('admin.pages.WithdrawDeposit.create');
    }
    public function salafReport()
    {

        return view('admin.pages.salafReport.create');
    }
    public function salafTotal()
    {

        return view('admin.pages.salafTotal.create');
    }
    public function receipt()
    {

        return view('admin.pages.receipt.create');
    }
    public function receivables()
    {

        return view('admin.pages.receivables.create');
    }
    public function checkingAccounts()
    {

        return view('admin.pages.checkingAccounts.create');
    }
    public function accountsReport()
    {

        return view('admin.pages.accountsReport.create');
    }
    public function covenantData()
    {

        return view('admin.pages.covenantData.create');
    }
    public function continuousCovenant()
    {

        return view('admin.pages.continuousCovenant.create');
    }
    public function CovenantReport()
    {

        return view('admin.pages.CovenantReport.create');
    }
    public function PartnersData()
    {

        return view('admin.pages.PartnersData.create');
    }
    public function Partnersprocess()
    {

        return view('admin.pages.Partnersprocess.create');
    }
    public function PartnerAccounts()
    {

        return view('admin.pages.PartnerAccounts.create');
    }
    public function profitDistribution()
    {

        return view('admin.pages.profitDistribution.create');
    }
    public function ProcessReport()
    {

        return view('admin.pages.ProcessReport.create');
    }
    public function profitReport()
    {

        return view('admin.pages.profitReport.create');
    }
    public function engineers()
    {

        return view('admin.pages.engineers.create');
    }
    public function MaintenanceReceipt()
    {

        return view('admin.pages.MaintenanceReceipt.create');
    }
    public function deliveryTo()
    {

        return view('admin.pages.deliveryTo.create');
    }
    public function receiptFrom()
    {

        return view('admin.pages.receiptFrom.create');
    }
    public function DeliveryCustomer()
    {

        return view('admin.pages.DeliveryCustomer.create');
    }
    public function maintenanceStatus()
    {

        return view('admin.pages.maintenanceStatus.create');
    }
    public function feedback()
    {

        return view('admin.pages.feedback.create');
    }
    public function engineerChange()
    {

        return view('admin.pages.engineerChange.create');
    }
    public function technicians()
    {

        return view('admin.pages.technicians.create');
    }
    public function customerMaintenance()
    {

        return view('admin.pages.customerMaintenance.create');
    }
    public function FilterData()
    {

        return view('admin.pages.FilterData.create');
    }
    public function maintenanceWorthy()
    {

        return view('admin.pages.maintenanceWorthy.create');
    }
    public function converterMaintenance()
    {

        return view('admin.pages.converterMaintenance.create');
    }
    public function changeTechnician()
    {

        return view('admin.pages.changeTechnician.create');
    }
    public function staffAccounts()
    {

        return view('admin.pages.generalSetting.create');
    }
    public function staffData()
    {

        return view('admin.pages.staffData.create');
    }
    public function StaffSettings()
    {

        return view('admin.pages.StaffSettings.create');
    }
    public function AttendingLeaving()
    {

        return view('admin.pages.AttendingLeaving.create');
    }
    public function absence()
    {

        return view('admin.pages.absence.create');
    }
    public function Delay()
    {

        return view('admin.pages.Delay.create');
    }
    public function extra()
    {

        return view('admin.pages.extra.create');
    }
    public function EmployeeDiscounts()
    {

        return view('admin.pages.EmployeeDiscounts.create');
    }
    public function Rewards()
    {

        return view('admin.pages.Rewards.create');
    }
    public function salaries()
    {

        return view('admin.pages.salaries.create');
    }
    public function classCommission()
    {

        return view('admin.pages.classCommission.create');
    }
    public function employeeCommission()
    {

        return view('admin.pages.employeeCommission.create');
    }
    public function commissionAccount()
    {

        return view('admin.pages.commissionAccount.create');
    }
}
