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
use App\Exports\UserDataExport;
use App\Form;
use App\History;
use App\Mail\GeneralMail;
use App\Partner;
use App\Payment;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $user = User::find(Auth::id());
        return view('admin.profile', compact('user'));
    }
    public function profileUpdate(Request $req)
    {
        $user = User::find(Auth::id());
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->save();
        return redirect('admin/profile')->with('msg', 'Profile Changed Successfully.');
    }
    public function changePassword()
    {
        $user = User::find(Auth::id());
        return view('admin.change-password', compact('user'));
    }
    public function changePasswordUpdate(Request $req)
    {
        $user = User::find(Auth::id());

        if (Hash::check($req->currentPassword, $user->password)) {
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect('admin/profile')->with('msg', 'Password Changed Successfully.');
        } else {
            return redirect('admin/profile')->with('msg', 'Your Current Password didnt Match.');
        }
    }

    // work

    public function winthdrawalrequests()
    {
        $requests = Withdraw::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.withdraw', compact('requests'));
    }

    public function withdrawApprove($id)
    {

        $withdraw = Withdraw::find($id);
        if ($withdraw == null) {
            return redirect()->back()->with('msg', 'Already Deleted by Client!');
        }
        if ($withdraw->status == "Approved") {
            return redirect()->back();
        }

        $withdraw->status = "Approved";

        $user = User::find($withdraw->user_id);
        $email = $user->email;
        $username = $user->username;

        $content = "We're glad to inform you that your withdraw request for the amount of " . $withdraw->amount . " USD has been successfully processed.";

        $action = "Withdrawal Success!";
        $subject = "Withdrawal Success - FXIndigo";
        Mail::to($email)->send(new GeneralMail($content, $username, $action, $subject));

        $withdraw->save();
        return redirect()->back();

    }

    public function withdrawDecline($id)
    {
        $withdraw = Withdraw::find($id);
        if ($withdraw == null) {
            return redirect()->back()->with('msg', 'Already Deleted by Client!');
        }
        if ($withdraw->status == "Declined") {
            return redirect()->back();
        }

        $withdraw->status = "Declined";
        $withdraw->save();

        $balance = balance::where('user_id', $withdraw->user_id)->first();
        $balance->amount = $balance->amount + $withdraw->amount;
        $balance->save();

        $user = User::find($withdraw->user_id);
        $email = $user->email;
        $username = $user->username;
        $content = "Sorry, Your request for withdraw of " . $withdraw->amount . " USD only is Declined!";

        $content = "We're Sorry to inform you that your withdraw has been declined. Contact support@fxindigo.com for further details";

        $action = "Withdrawal Declined!";
        $subject = "Withdrawal Declined - FXIndigo";
        Mail::to($email)->send(new GeneralMail($content, $username, $action, $subject));

        return redirect()->back();
    }

    public function depositsRequests()
    {
        $requests = Deposit::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.deposit', compact('requests'));
    }

    public function depositApprove($id)
    {

        $deposit = Deposit::find($id);
        if ($deposit == null) {
            return redirect()->back()->with('msg', 'Already Deleted by Client!');
        }

        if ($deposit->status == "Approved") {
            return redirect()->back();
        }

        $deposit->status = "Approved";

        $balance = balance::where('user_id', $deposit->user_id)->first();
        $balance->amount = $balance->amount + $deposit->amount;
        $balance->save();

        $user = User::find($deposit->user_id);
        $email = $user->email;
        $username = $user->username;

        $content = "We're glad to inform you that your deposit has been successfully processed.
        The amount of " . $deposit->amount . " USD has been credited  into your account. Thanks!";

        $action = "Deposit Successfull!";
        $subject = "Deposit Successfull - FXIndigo";
        Mail::to($email)->send(new GeneralMail($content, $username, $action, $subject));

        $deposit->save();
        return redirect()->back();
    }

    public function depositDecline($id)
    {
        $deposit = Deposit::find($id);
        if ($deposit == null) {
            return redirect()->back()->with('msg', 'Already Deleted by Client!');
        }

        if ($deposit->status == "Declined") {
            return redirect()->back();
        }
        $deposit->status = "Declined";

        $user = User::find($deposit->user_id);
        $email = $user->email;
        $username = $user->username;

        $content = "We're sorry to inform you that your deposit has been declined.";
        $action = "Deposit Declined!";
        $subject = "Deposit Decline - FXIndigo";
        Mail::to($email)->send(new GeneralMail($content, $username, $action, $subject));

        $deposit->save();
        return redirect()->back();
    }

    public function history()
    {
        $history = History::all();
        return view('admin.history', compact('history'));
    }

    public function kyc()
    {
        return view('admin.kyc');
    }

    public function uploadkyc(Request $req)
    {
        $form = Form::where('user_id', Auth::id())->first();
        $form->user_id = Auth::id();
        $filename = "KYC form.pdf";
        $req->file('file')->storeAs('public', $filename);
        $form->file = $filename;
        $form->save();
        return redirect('admin/kyc')->with('msg', 'Successfully updated!');
    }

    public function addBalancedb(Request $req, $id)
    {
        $user_id = $id;
        $amount = $req->amount;
        $userBalance = balance::where('user_id', $user_id)->first();

        if ($userBalance) {
            $userBalance->amount = $userBalance->amount + $amount;
            $userBalance->save();
        } else {
            $balance = new balance;
            $balance->user_id = $user_id;
            $balance->amount = $amount;
            $balance->save();
        }

        return redirect()->back()->with('msg', 'Successfully Added!!');
    }

    public function users()
    {
        $users = User::where('status', null)->get();
        return view('admin.users', compact('users'));
    }

    public function userDetails($id)
    {
        $user = User::find($id);
        return view('admin.user', compact('user'));
    }

    public function userDocuments($id)
    {
        $documents = Document::where('user_id', $id)->get();
        return view('admin.user-documents', compact('documents', 'id'));
    }

    public function userDocumentOption($id, $docid, $option)
    {
        $document = Document::find($docid);
        if ($option == "approve") {
            $document->status = "Approved";
        } else {
            $document->status = "Declined";
        }
        $document->save();
        return redirect('admin/user/' . $id . '/documents');
    }

    public function partners()
    {
        $partners = Partner::all();
        return view('admin.partners', compact('partners'));
    }

    public function partnerStatus($id, $option)
    {
        $partner = Partner::find($id);
        if ($option == "approve") {
            $partner->status = "Approved";
        } else {
            $partner->status = "Declined";
        }
        $partner->save();
        return redirect()->back();
    }

    public function checkJoinedUsers($code)
    {
        $users = User::where('referred', $code)->get();
        return view('admin.joined-users', compact('users'));
    }

    public function userAccounts($id)
    {
        $accounts = Account::where('user_id', $id)->where('status', null)->get();
        return view('admin.user-accounts', compact('accounts'));
    }

    public function accountDeposit($id)
    {
        $deposits = Account_deposit::where('account_id', $id)->get();
        $withdraws = Account_withdraw::where('account_id', $id)->get();
        return view('admin.account-deposit', compact('deposits', 'withdraws'));
    }

    public function accountDepositOption($depositId, $id, $option, $amount)
    {
        $account = Account::find($id);
        $user_id = $account->user_id;
        $balance = balance::where('user_id', $user_id)->first();

        $deposit = Account_deposit::find($depositId);

        if ($option == "approve") {
            $deposit->status = "Approved";
        } else {
            if ($deposit->status == "Declined") {
                return redirect()->back();
            }

            $balance->amount = $balance->amount + $amount;
            $deposit->status = "Declined";
        }

        $deposit->save();
        $balance->save();
        return redirect()->back();
    }

    public function accountwithdrawOption($depositId, $id, $option, $amount)
    {
        $account = Account::find($id);
        $user_id = $account->user_id;
        $balance = balance::where('user_id', $user_id)->first();

        $deposit = Account_withdraw::find($depositId);

        if ($option == "approve") {
            if ($deposit->status == "Approved") {
                return redirect()->back();
            }

            $deposit->status = "Approved";
            $balance->amount = $balance->amount + $amount;
        } else {
            $deposit->status = "Declined";
        }

        $deposit->save();
        $balance->save();
        return redirect()->back();
    }

    public function emailSend(Request $req, $email, $username)
    {
        $action = "Regular Mail";
        $subject = "Regular Mail - FXIndigo";
        Mail::to($email)->send(new GeneralMail($req->content, $username, $action, $subject));
        return redirect()->back()->with('msg', 'Successfully send!!');
    }

    public function accountRequests()
    {
        return view("admin.account-deposits");
    }

    public function depositRequests()
    {
        $deposits = Account_deposit::all();
        return view("admin.deposit-requests", compact('deposits'));
    }

    public function withdrawRequests()
    {
        $withdraws = Account_withdraw::all();
        return view("admin.withdraw-requests", compact('withdraws'));
    }

    public function accountID(Request $req, $id)
    {
        $account = Account::find($id);
        $account->account_id = $req->accountID;
        $account->save();
        return redirect()->back();
    }

    public function markasadmin($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->role = "admin";
            $user->save();
            return redirect('admin/users')->with('msg', "Successfull marked!");
        } else {
            return redirect()->back();
        }
    }

    public function markasemployee($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->role = "employee";
            $user->save();
            return redirect('admin/users')->with('msg', "Successfull marked!");
        } else {
            return redirect()->back();
        }
    }

    public function markasuser($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->role = "customer";
            $user->save();
            return redirect('admin/users')->with('msg', "Successfull marked!");
        } else {
            return redirect()->back();
        }
    }

    public function tradingAccounts()
    {
        $accounts = Account::where('status', null)->get();
        return view('admin.trading-accounts', compact('accounts'));
    }

    public function addBonus(Request $req, $id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            $partner->bonus = $partner->bonus + $req->amount;
            $partner->save();

            $history = new Bonus_history;
            $history->partner_id = $id;
            $history->bonus = $req->amount;
            $history->save();

            return redirect()->back()->with('msg', 'Successfully Added!!');
        }
    }

    public function viewBonusHistory($id)
    {
        $history = Bonus_history::where('partner_id', $id)->get();
        return view('admin.bonus-history', compact('history'));
    }

    public function bonusWithdraw($id)
    {
        $withdraws = Bonus_withdraw::where('partner_id', $id)->get();
        return view('admin.bonus-withdraw', compact('withdraws'));
    }

    public function bonusWithdrawOption($id, $option)
    {
        $withdraw = Bonus_withdraw::find($id);
        $amount = $withdraw->amount;
        $user = balance::where('user_id', $withdraw->user_id)->first();
        $partner = Partner::find($withdraw->partner_id);

        if ($option == "approve") {
            $withdraw->status = "Approved";
            $partner->bonus = $partner->bonus - $amount;
            $user->amount = $user->amount + $amount;
        } else {
            $withdraw->status = "Declined";
        }
        $withdraw->save();
        $user->save();
        $partner->save();

        return redirect()->back();
    }

    public function wantToUploadDocuments($id)
    {
        return view('admin.upload-documents', compact('id'));
    }

    public function uploadDocuments(Request $req, $id)
    {
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',

            'file' => 'required|max:4096',
            'file.*' => 'image|mimes:png,jpeg,jpg',

            'file' => 'max:4096',
            'file.*' => 'image|mimes:png,jpeg,jpg',

        ]);

        $type = $req->type;

        $filename = $req->file('file')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $finalName = $genID . "_" . $filename;
        $req->file('file')->storeAs('public', $finalName);

        $document = new Document();
        $document->file = $finalName;

        $document->type = $type;
        $document->user_id = $id;
        $document->status = "Approved";
        $document->save();
        return redirect()->back()->with('msg', 'Successfully Uploaded & Approved!');
    }

    public function pendingUser()
    {
        $users = User::where('email_verified_at', null)->where('role', 'customer')->get();
        return view('admin.pending-users', compact('users'));
    }
    public function pendingUserActive($id)
    {
        $user = User::find($id);
        $user->email_verified_at = new \DateTime();
        $user->save();
        return redirect()->back()->with('msg', 'Successfully Verifed!!!');
    }

    public function editTradingAccount($id)
    {
        $account = Account::find($id);
        return view('admin.edit-account', compact('account'));
    }

    public function updateTradingAccount(Request $req, $id)
    {
        $account = Account::find($id);
        $account->type = $req->type;
        $account->leverage = $req->leverage;
        $account->account_id = $req->account_id;
        $account->save();
        return redirect()->back()->with('msg', 'Successfully Updated!!');
    }

    public function deleteTradingAccount($id)
    {
        $account = Account::find($id);
        $account->status = "Deleted";
        $account->save();
        return redirect()->back()->with('msg', 'Successfully Deleted!!!');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->email = $user->email . $user->id;
        $user->status = "Deleted";
        $user->save();
        return redirect()->back()->with('msg', 'Successfully Deleted!!!');
    }
    public function reActivate($id)
    {
        $user = User::find($id);
        $user->email = chop($user->email, $user->id);
        $user->status = null;
        $user->save();
        return redirect()->back()->with('msg', 'Successfully Reactivated!!!');
    }

    public function approvedPartners()
    {
        $partners = Partner::where("status", 'Approved')->get();
        return view("admin.partners", compact('partners'));
    }

    public function nonApprovedPartners()
    {
        $partners = Partner::where("status", '!=', 'Approved')->get();
        return view("admin.partners", compact('partners'));
    }

    public function viewAccountCategorically($option)
    {
        if ($option == "not-assign") {
            $accounts = Account::where('account_id', null)->where('status', null)->get();
        } else {
            $accounts = Account::where('type', $option)->where('status', null)->get();
        }

        return view('admin.trading-accounts', compact('accounts'));

    }

    public function demoAccounts()
    {
        $demos = Demo_account::all();
        return view('admin.demo-accounts', compact('demos'));
    }

    public function demoAccountDb($id, $option)
    {
        $demo = Demo_account::find($id);
        if ($option == "approve") {
            $demo->status = "Approved";
        } else {
            $demo->status = "Declined";
        }
        $demo->save();
        return redirect()->back();
    }
    public function approvedDocUsers()
    {
        $users = User::where('doc_status', 'Verified')->where('email_verified_at', '!=', null)->where('role', 'customer')->get();
        return view('admin.users', compact('users'));
    }
    public function nonApprovedDocUsers()
    {
        $users = User::where('doc_status', null)->where('email_verified_at', '!=', null)->where('role', 'customer')->get();
        return view('admin.users', compact('users'));
    }
    public function pendingDocUser()
    {
        $users = User::where('doc_status', 'Pending')->where('email_verified_at', '!=', null)->where('role', 'customer')->get();
        return view('admin.users', compact('users'));
    }

    public function adminUsers()
    {
        $users = User::where('role', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function docStatus($id, $option)
    {
        $user = User::find($id);
        if ($option == "approve") {
            $user->doc_status = "Verified";
        } else {
            $user->doc_status = "unverified";
        }
        $user->save();
        return redirect()->back();
    }

    public function exportUsers()
    {
        return Excel::download(new UserDataExport(), 'userdata.xlsx');
    }

    public function paymentOptions($id)
    {
        $payments = Payment::where('user_id', $id)->get();
        return view('admin.payments', compact('payments'));
    }

}
