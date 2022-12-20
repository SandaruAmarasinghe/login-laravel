<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function viewRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->save();

        return redirect()->back();
    }

    public function viewLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // $user = User::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->where('password', $request->password)->first();

        if ($user) {
            return redirect('/home');
            return 'login success';
        }

        return 'failed to login';
    }

    public function viewHome()
    {
        $datas = Data::all();
        return view('home', compact('datas'));
    }

    public function fetchData(Request $request)
    {
        $output = "";
        $datas = Data::where('email', 'LIKE', '%' . $request->query . "%")->get();
        if ($datas) {
            foreach ($datas as $data) {
                $output .= '<tr>' .
                    '<td>' . $data->name . '</td>' .
                    '<td>' . $data->email . '</td>' .
                    '<td>' . $data->address . '</td>' .
                    '</tr>';
            }
        }
        return Response($output);
    }

    public function viewInsertForm()
    {
        return view('insert-form');
    }
    public function insertData(Request $request)
    {
        $data = new Data();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();

        return redirect('/home');
    }

    public function viewEditForm(Data $data)
    {
        return view('edit-data', compact('data'));
    }

    public function edit(Request $request)
    {
        $data = Data::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->update();

        return redirect('/home');
    }

    public function delete($id)
    {
        $data = Data::find($id);
        $data->delete();

        return response()->json('Deleted');
    }
}
