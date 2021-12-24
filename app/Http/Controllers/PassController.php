<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Pass;
use App\Models\Temporarypass;
use App\Models\Passtype;
use App\Models\Status;
use Carbon\Carbon;

class PassController extends Controller
{
    public function addPassView()
    {
        return view('passes.addPass');
    }

    public function constantPassView()
    {
        return view('passes.constantPass');
    }

    public function constantPassPost(Request $request)
    {
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'photo' => 'required|mimes:jpg,png,gif,jpeg|max:10240',
        ]);
        $name_photo = explode('/', $request->file('photo')->store('public'))[1];
        $charstring = 'qwertyuiopasdfghjklzxcvbnm';
        $charLength = strlen($charstring);
        $randstring = '';
        for ($i = 0; $i < 5; $i++) {
            $randstring .= $charstring[rand(0, $charLength - 1)];
        }
        $random_id = '';
        $random_id .= $randstring;
        $random_id .= rand(10, 99);
        $data = [];
        $data += $request->only('surname', 'name', 'second_name', 'email');
        $data += [
            'photo' => $name_photo,
            'random_id' => $random_id,
            'type_id' => 2,
            'status_id' => 1,
        ];
        Pass::create($data);
        return redirect('/' . $random_id);
    }

    public function temporaryPassView()
    {
        return view('passes.temporaryPass');
    }

    public function temporaryPassPost(Request $request)
    {
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'purpose' => 'required',
            'date' => 'required|date|after:yesterday',
            'photo' => 'required|mimes:jpg,png,gif,jpeg|max:10240',
        ]);
        $name_photo = '';
        $name_photo = explode('/', $request->file('photo')->store('public'))[1];
        $charstring = 'qwertyuiopasdfghjklzxcvbnm';
        $charLength = strlen($charstring);
        $randstring = '';
        for ($i = 0; $i < 5; $i++) {
            $randstring .= $charstring[rand(0, $charLength - 1)];
        }
        $random_id = '';
        $random_id .= $randstring;
        $random_id .= rand(10, 99);
        $date = '';
        foreach ($request->only('date') as $k => $v)
        {
            $dateend = $v;
            $datestart = $v;
        }
        $datestart = Carbon::createFromFormat('Y-m-d', $datestart);
        $dateend = Carbon::createFromFormat('Y-m-d', $dateend);
        $dateend = $dateend->addWeeks(2);
        $data = [];
        $data += $request->only('surname', 'name', 'second_name', 'email','purpose');
        $data += [
            'photo' => $name_photo,
            'random_id' => $random_id,
            'type_id' => 1,
            'status_id' => 1,
            'start_action' => $datestart,
            'end_action' => $dateend

        ];
        Temporarypass::create($data);
        return redirect('/' . $random_id);
    }

    public function showAllPass($id){
        $pass = Pass::where('random_id', $id)->first();
        $temporarypass = Temporarypass::where('random_id', $id)->first();
        $types = Passtype::all();
        $statuses = Status::all();
        return view('passes.showPass', compact('pass', 'types','temporarypass','statuses'));
    }
}

