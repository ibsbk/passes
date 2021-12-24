<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pass;
use App\Models\Comment;
use App\Models\Temporarypass;
use App\Models\Passtype;
use App\Models\Status;

class StaffController extends Controller
{
    public function adminLkView()
    {
        if (Auth::user()->role_id == 1) {
            $passes = Pass::all()->sortBy('status_id');
            $temporarypasses = Temporarypass::all()->sortBy('status_id');
            $types = Passtype::all();
            $statuses = Status::all();
            return view('staff.admin.adminLk', compact('passes', 'temporarypasses', 'types', 'statuses'));
        } else {
            return redirect()->route('/');
        }

    }

    public function operatorLkView()
    {
        if (Auth::user()->role_id == 2) {
            $passes = Pass::all()->sortBy('status_id');
            $temporarypasses = Temporarypass::all()->sortBy('status_id');
            $types = Passtype::all();
            $statuses = Status::all();
            return view('staff.operator.operatorLk', compact('passes', 'temporarypasses', 'types', 'statuses'));
        } else {
            return redirect()->route('/');
        }
    }

    public function authStaffView()
    {
        if (!Auth::user()) {
            return view('staff.authStaff');
        } else {
            return redirect()->route('/');
        }
    }


    public function authStaffPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('login', 'password'))) {
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1)
                return redirect()->route('adminLk');
            if (Auth::user()->role_id == 2)
                return redirect()->route('operatorLk');
        } else {
            return back()->withErrors(['authError' => 'неверный логин и пароль']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function editPassView($id)
    {
        if (Auth::user()->role_id == 1) {
            $pass = Pass::where('random_id', $id)->first();
            $temporarypass = Temporarypass::where('random_id', $id)->first();
            $types = Passtype::all();
            $statuses = Status::all();
            return view('staff.admin.editPass', compact('pass', 'temporarypass', 'types', 'statuses'));
        } else {
            return redirect()->route('/');
        }
    }

    public function editPassPost(Request $request, $id)
    {
        $pass = Pass::where('random_id', $id)->first();
        if (!$pass) {
            $pass = Temporarypass::where('random_id', $id)->first();
        }
        if ($request->status == 3) {

            $request->validate([
                'status' => 'required',
                'comment' => 'required'
            ]);
            $comment_data = [];
            $pass->update(['status_id' => $request->status]);
            $comment_data += [
                'comment' => $request->comment,
                'pass_id' => $pass->id,
            ];
            $comm = Comment::where('pass_id', $pass->id)->first();
            if ($comm) {
                $comm = Comment::where('pass_id', $pass->id);
                $comm->update(['comment' => $request->comment]);
                return redirect()->route('adminLk');
            } else {
                Comment::create($comment_data);
                return redirect()->route('adminLk');
            }
        } else {
            $request->validate([
                'status' => 'required',
            ]);
            $pass->update(['status_id' => $request->status]);
            return redirect()->route('adminLk');
        }
    }

    public function changeStatusView($id)
    {
        $pass = Pass::where('random_id', $id)->first();
        if (empty($pass)) {
            $pass = Temporarypass::where('random_id', $id)->first();
            return view('staff.operator.operatorChangeStatus');
        }
        return view('staff.operator.operatorChangeStatus');
    }

    public function changeStatusPost(Request $request, $id)
    {
        $pass = Pass::where('random_id', $id)->first();
        $temppass = Temporarypass::where('random_id', $id)->first();
        if ($pass && $request->answer == 'yes') {
            $pass->update(['status_id' => 4]);
            return redirect()->route('operatorLk');
        } elseif ($temppass && $request->answer == 'yes') {
            $temppass->update(['status_id' => 4]);
            return redirect()->route('operatorLk');
        } else {
            return redirect()->route('/');
        }
    }

}
