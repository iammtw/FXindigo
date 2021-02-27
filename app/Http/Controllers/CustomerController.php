<?php

namespace App\Http\Controllers;

use App\Account;
use App\Account_deposit;
use App\Account_withdraw;
use App\balance;
use App\Bonus_history;
use App\Bonus_withdraw;
use App\Demo_account;
use App\Deposit;
use App\Document;
use App\Form;
use App\History;
use App\Partner;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

    public function deposit()
    {
        $deposits = Deposit::where('user_id', Auth::id())->get();
        return view('customer.all-deposits', compact('deposits'));
    }

    public function addDeposit()
    {
        return view('customer.deposit');
    }

    public function addDepositdb(Request $req)
    {

        $amount = $req->amount;
        if ($amount < 10) {
            return redirect()->back()->with('msg', 'The Minimum amount for Deposit is $10');
        }

        // check
        $username = User::find(Auth::id())->username;

        $deposit = new Deposit;
        $deposit->amount = $req->amount;
        $deposit->payment_method = $req->payment_method;
        $deposit->user_id = Auth::id();

        $history = new History;
        $history->method = "deposit";
        $history->amount = $req->amount;
        $history->username = $username;
        $history->transaction_id = substr(sha1(time()), 0, 6);

        $deposit->save();
        $history->save();
        return redirect('customer/deposit')->with('msg', 'Deposit Request is generated, Once its approved by admin, The Amount will be deposited.');

    }

    public function deleteDeposit($id)
    {
        $deposit = Deposit::find($id);
        if ($deposit) {
            $deposit->delete();
            return redirect()->back()->with('msg', 'Successfully Deleted!');
        } else {
            return redirect()->back()->with('msg', "Deposit not found!!!..");
        }
    }

    public function withdraw()
    {
        $withdraws = Withdraw::where('user_id', Auth::id())->get();
        return view('customer.all-withdraws', compact('withdraws'));
    }

    public function addWithdraw()
    {
        return view('customer.withdraw');
    }

    public function addWithdrawdb(Request $req)
    {

        $amount = $req->amount;
        if ($amount < 10) {
            return redirect()->back()->with('msg', 'The Minimum amount for Withdraw is 10');
        }

        // check
        $username = User::find(Auth::id())->username;

        $balance = balance::where('user_id', Auth::id())->first();
        if ($balance->amount >= $req->amount) {
            $withdraw = new Withdraw;
            $withdraw->amount = $req->amount;
            $withdraw->payment_method = $req->payment_method;
            $withdraw->user_id = Auth::id();

            $history = new History;
            $history->method = "withdraw";
            $history->amount = $req->amount;
            $history->username = $username;
            $history->transaction_id = substr(sha1(time()), 0, 6);

            $balance->amount = $balance->amount - $req->amount;

            $balance->save();
            $withdraw->save();
            $history->save();
            return redirect('customer/withdraw')->with('msg', 'Withdrawal request genrated it will take max 24 hours.');
        } else {
            return redirect('customer/withdraw')->with('msg', 'The balance is insufficent to withdraw!');
        }

    }

    public function deleteWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        if ($withdraw) {
            $balance = balance::where('user_id', Auth::id())->first();
            if($withdraw->status != "Declined"){
                 $balance->amount = $balance->amount + $withdraw->amount;
            }
            $balance->save();
            $withdraw->delete();
            return redirect()->back()->with('msg', 'Successfully Deleted!');
        } else {
            return redirect()->back()->with('msg', "Withdraw not found!!!..");
        }
    }

    public function history()
    {
        $username = User::find(Auth::id())->username;
        $history = History::where("username", $username)->get();
        return view("customer.history", compact('history'));
    }

    // Don't change

    public function profile()
    {
        $user = User::find(Auth::id());
        return view('customer.profile', compact('user'));
    }
    public function profileUpdate(Request $req)
    {

        $user = User::find(Auth::id());
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->phonenumber = $req->phonenumber;
        $user->save();
        return redirect('customer/profile')->with('msg', 'Profile Changed Successfully.');
    }
    public function changePassword()
    {
        $user = User::find(Auth::id());
        return view('customer.change-password', compact('user'));
    }
    public function changePasswordUpdate(Request $req)
    {
        $user = User::find(Auth::id());

        if (Hash::check($req->currentPassword, $user->password)) {
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect('customer/profile')->with('msg', 'Password Changed Successfully.');
        } else {
            return redirect('customer/profile')->with('msg', 'Your Current Password didnt Match.');
        }
    }

    public function transfer()
    {
        $accounts = Account::where('user_id', Auth::id())->where('status', null)->get();
        return view('customer.accounts.transfer', compact('accounts'));
    }

    public function account()
    {
        return view('customer.accounts.account');

    }

    public function createAccount(Request $req)
    {
        $name = $req->name;
        $type = $req->type;
        $currency = $req->currency;
        $leverage = (int) $req->leverage;
        $balance = "0";

        // if ($type == "standard") {
        //     if ($leverage > 700) {
        //         return redirect('customer/account')->with('msg', 'The Maximum leverage for Standard is 700');
        //     }
        // } else if ($type == "lowspread") {
        //     if ($leverage > 500) {
        //         return redirect('customer/account')->with('msg', 'The Maximum leverage for Low spread is 500');
        //     }
        // } else if ($type == "ecnpro") {
        //     if ($leverage > 70) {
        //         return redirect('customer/account')->with('msg', 'The Maximum leverage for ECN Pro is 70');
        //     }
        // }

        $new = new Account;
        $new->name = $name;
        $new->type = $type;
        $new->currency = $currency;
        $new->leverage = $leverage;
        $new->balance = $balance;
        $new->user_id = Auth::id();

        $new->save();
        $accountId = $new->id;
        return redirect('customer/account/' . $accountId . '/options');
    }

    public function selectAcount()
    {
        $accounts = Account::where('user_id', Auth::id())->where('status', null)->get();
        $demos = Demo_account::where('user_id', Auth::id())->get();
        return view('customer.accounts.select', compact('accounts', 'demos'));
    }

    public function selection($accountId)
    {
        if(isset($_GET['p'])){
             return redirect('customer/account/' . $accountId . '/options?p=d3d9446802a44259755d38e6d163e820');
        }
        return redirect('customer/account/' . $accountId . '/options');
    }

    public function options($id)
    {
        $deposits = Account_deposit::where('account_id', $id)->get();
        $withdraws = Account_withdraw::where('account_id', $id)->get();
        return view('customer.accounts.options', compact('id', 'deposits', 'withdraws'));
    }

    public function actionAccount(Request $req, $id, $options)
    {

        $account = Account::find($id);
        $type = $account->type;
        $amount = $req->amount;

        if ($options == "deposit") {
            // if ($type == "standard") {
            //     if ($amount < 10) {
            //         return redirect('customer/account/' . $id . '/options')->with('msg', 'The Minimum amount for Standard is 10');
            //     }
            // } else if ($type == "lowspread") {
            //     if ($amount < 300) {
            //         return redirect('customer/account/' . $id . '/options')->with('msg', 'The Minimum amount for Low spread is 300');
            //     }
            // } else if ($type == "ecnpro") {
            //     if ($amount < 2000) {
            //         return redirect('customer/account/' . $id . '/options')->with('msg', 'The Minimum amount for ECN Pro is 2000');
            //     }
            // }

            // check in wallet
            $balance = balance::where('user_id', Auth::id())->first();
            if ($balance->amount < $amount) {
                return redirect('customer/account/' . $id . '/options')->with('msg', 'Sorry, You have not insufficent balance in your Wallet!');
            }

            $account->balance = $account->balance + $amount;

           
            $balance->amount = $balance->amount - $amount;
            $balance->save();

            $account->save();

            $newDeposit = new Account_deposit;
            $newDeposit->account_id = $id;
            $newDeposit->amount = $amount;
            $newDeposit->status = "Pending";
            $newDeposit->user_id = Auth::id();
            $newDeposit->save();
            return redirect('customer/account/' . $id . '/options')->with('success', 'Successfully Deposit request Generated!');
        } else {

            if ($amount < 10) {
                return redirect('customer/account/' . $id . '/options')->with('msg', 'The Minimum amount for withdraw is 10');
            } else {
                $account->balance = $account->balance - $amount;
                $account->save();

                $newWithdraw = new Account_withdraw;
                $newWithdraw->account_id = $id;
                $newWithdraw->amount = $amount;
                $newWithdraw->status = "Pending";
                $newWithdraw->user_id = Auth::id();
                $newWithdraw->save();
                return redirect()->back()->with('success', 'Successfully Withdraw request Generated!');
            }

            return view('customer.accounts.options', compact('id'));
        }
    }

    public function deleteAccountDeposit($id)
    {
        $deposit = Account_deposit::find($id);
        if ($deposit) {
            $balance = balance::where('user_id', Auth::id())->first();
            if($deposit->status != "Declined"){
                 $balance->amount = $balance->amount + $deposit->amount;
            }
            $balance->save();
            $deposit->delete();
            return redirect()->back()->with('msg', 'Successfully Deleted!');
        } else {
            return redirect()->back()->with('msg', "Withdraw not found!!!..");
        }
    }

    public function deleteAccountWithdraw($id)
    {
        $withdraw = Account_withdraw::find($id);
        if ($withdraw) {
            $withdraw->delete();
            return redirect()->back()->with('msg', 'Successfully Deleted!');
        } else {
            return redirect()->back()->with('msg', "Withdraw not found!!!..");
        }
    }

    public function platforms()
    {
        return view('customer.platforms');
    }

    public function verification()
    {
        $documents = Document::where('user_id', Auth::id())->get();
        return view('customer.verification', compact('documents'));
    }

    public function uploadDoc(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',

            'file' => 'required|max:4096',
            'file.*' => 'image|mimes:png,jpeg,jpg',

            'file' => 'max:4096',
            'file.*' => 'image|mimes:png,jpeg,jpg',

        ]);

        $checkbox = $req->check;
        $type = $req->type;

        if ($type == "Identity card" || $type == "Driver's license") {
            if ($req->file('file') == null || $req->file('file2') == null) {
                return redirect("customer/verification")->with('error', 'Please upload both front and back!');
            }
        }

        $filename = $req->file('file')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $finalName = $genID . "_" . $filename;
        $req->file('file')->storeAs('public', $finalName);

        $document = new Document();
        $document->file = $finalName;

        $document->type = $type;
        $document->user_id = Auth::id();
        $document->status = "Pending";
        $document->save();

        if ($type == "Identity card" || $type == "Driver's license") {
            $filename2 = $req->file('file2')->getClientOriginalName();
            $genID2 = substr(sha1(time()), 0, 11);
            $finalName2 = $genID2 . "_" . $filename2;
            $req->file('file2')->storeAs('public', $finalName2);
            $document = new Document();
            $document->file = $finalName2;
            $document->type = $type . " Back";
            $document->user_id = Auth::id();
            $document->status = "Pending";
            $document->save();
        }

        $user = User::find(Auth::id());
        $user->doc_status = "Pending";
        $user->save();
        return redirect("customer/verification")->with('msg', 'Successfully Uploaded');

    }

    public function deleteDoc($id)
    {
        $doc = Document::find($id);
        if ($doc != null) {
            $doc->delete();
        } else {
            return redirect('customer/verification')->with('msg', 'File not found, May be Already deleted!');
        }

        return redirect('customer/verification')->with('msg', 'Successfully Deleted!');
    }

    public function kyc()
    {
        $form = Form::where('user_id', '2')->first();
        $name = $form->file;
        return view('customer.kyc', compact('name'));
    }

    public function uploadkyc(Request $req)
    {
        $filename = $req->file('file')->getClientOriginalName();
        $filename = Auth::id() . $filename;
        $req->file('file')->storeAs('public', $filename);

        $form = new Form;
        $form->user_id = Auth::id();
        $form->file = $filename;
        $form->save();
        return redirect('customer/kyc')->with('msg', 'Successfully Uploaded');

    }

    public function partner()
    {
        $code = Partner::where('user_id', Auth::id())->first();
        if ($code) {
            $partners = User::where('referred', $code->code)->get();
            $id = $code->id;
            $withdraws = Bonus_withdraw::where('partner_id', $id)->get();
        } else {
            $partners = [];
            $withdraws = [];
        }
        return view('customer.partner', compact('code', 'partners', 'withdraws'));
    }

    public function becomeourpartner()
    {
        // User detect
        $user = User::find(Auth::id());
        $username = $user->username;
        $code = Str::upper(Auth::id() . $username . Auth::id());

        // Check already exists
        $checkPartner = Partner::where('user_id', Auth::id())->first();
        if ($checkPartner) {
            if ($checkPartner->status == "Approved") {
                return redirect('customer/partner')->with('msg', 'Your are already a partner!');

            } else {
                return redirect('customer/partner')->with('msg', 'Your request is in Pending State!');

            }
        }

        // Making partner
        $partner = new Partner;
        $partner->user_id = Auth::id();
        $partner->code = $code;
        $partner->status = "Pending";
        $partner->save();
        return redirect('customer/partner')->with('msg', 'Your request for becoming our partner is generated, Once approved, The referral code and link will generated, Thanks!');
    }

    public function bonusHistory($id)
    {
        $history = Bonus_history::where('partner_id', $id)->get();
        return view('customer.bonus-history', compact('history'));
    }

    public function addBonusWithdraw(Request $req, $id)
    {
        $bonus = Partner::find($id)->bonus;
        if ($req->amount > $bonus) {
            return redirect()->back()->with('msg', 'Sorry, You have insufficent bonus to withdraw!');
        }

        $withdraw = new Bonus_withdraw;
        $withdraw->user_id = Auth::id();
        $withdraw->partner_id = $id;
        $withdraw->amount = $req->amount;
        $withdraw->status = "Pending";

        $withdraw->save();
        return redirect()->back()->with('msg', 'Successfully Request Generated!');
    }

    public function demoAccount()
    {
        return view('customer.accounts.demo-account');
    }

    public function demoAccountDb(Request $req)
    {
        $demo = new Demo_account;
        $demo->name = $req->name;
        $demo->type = "demo";
        $demo->currency = $req->currency;
        $demo->leverage = $req->leverage;
        $demo->balance = $req->balance;
        $demo->status = "Pending";
        $demo->user_id = Auth::id();
        $demo->save();
        return redirect()->back()->with('msg', 'Successfully Requested!!!');
    }

    public function partnerAccounts()
    {
        $code = Partner::where('user_id', Auth::id())->first()->code;
        $partners = [];
        if ($code) {
            $partners = User::where('referred', $code)->get();
        }
        return view('customer.accounts.partners', compact('partners'));
    }

    public function partnerAccountsDb($id)
    {
        $accounts = Account::where('user_id', $id)->where('status', null)->get();
        return view('customer.accounts.partner-accounts', compact('accounts'));
    }

}
