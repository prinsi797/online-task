<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    private AdminRepository $_adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->_adminRepository = $adminRepository;
    }


    public function login(Request $request)
    {
        return view('login.index');
    }

    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('login.dashboard');
        } else {
            return view('login.index');
        }
    }

    public function auth(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $admin = Admin::where('email', $credentials['email'])->first();
    
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                ->withSuccess('You have successfully logged in!');
        }
    
        return redirect()->route('admin')->withSuccess('Not Login');
    }

    public function dashboard(Request $request)
    {
        if(Auth::guard('admin')->check())
    {
        // Use compact() function with variable name as a string
        $data = []; // Replace with your data
        return view('login.dashboard', compact('data'));
    }
        
        return redirect()->route('login');
    }

}