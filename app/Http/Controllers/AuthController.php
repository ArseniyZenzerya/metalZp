<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use App\Http\Requests\RegisterRequest;
    use App\Http\Requests\LoginRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

    class AuthController extends Controller
    {
        public function showRegistrationForm()
        {
            return view('admin.auth.register');
        }

        public function register(RegisterRequest $request)
        {
            $userModel = new User();
            $userModel->createNewUser($request->name, $request->email, $request->password);

            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        }

        public function showLoginForm()
        {
            return view('admin.auth.login');
        }

        public function login(LoginRequest $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended(route('admin.products.list'));
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
