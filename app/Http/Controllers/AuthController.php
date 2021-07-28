<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company)
    {
        $check_company = Company::where('website', $company);
        if (!$check_company) {
            return abort(404);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, $subdomain)
    {
        $req = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $employee = Employee::where('email', $req['email'])->first();
        $company = Company::where('website', $subdomain)->first();
        // dd($company->id);
        if (!$employee) {
            return redirect()->back()->with('message', 'User not exist');
        } else {

            if ($employee->company !== $company->id) {
                return redirect()->back()->with('message', 'You are not employee of this company');
            } else {
                if (!Hash::check($req['password'], $employee->password)) {
                    return redirect()->back()->with('message', 'Wrong password');
                } else {
                    Session::put('user', $employee);
                    return redirect('dashboard');
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
