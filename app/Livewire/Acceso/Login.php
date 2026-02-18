<?php

namespace App\Livewire\Acceso;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class Login extends Component
{
    public function render()
    {
        return view('livewire.acceso.login');
    }

    public function acceso(Request $request)
    {
        $credentials =  request()->only('username', 'password');

        if(Auth::attempt($credentials))
        {
            $lang = auth()->user()->idioma;
            App::setLocale($lang);
            Session::put('locale', $lang);

            request()->session()->regenerate(); 

            session(['estatus' => auth()->user()->estatus_id]);
            session(['nivel' => auth()->user()->nivel_id]);
            session(['propietario' => auth()->user()->propietario_id]);

            if(session('estatus') == 2)
            {
                return back()->withErrors([
                    'message'=>'Suspended User'
                ]);    
            }
            else
            {
                if(session('nivel') == 1)
                {
                    return redirect()->route('dashboard-admin');
                }
                else
                {
                    if(session('nivel') == 2)
                    {
                        return redirect()->route('dashboard-franchisee');
                    }
                    else
                    {
                        if(session('nivel') == 4)
                        {
                            return redirect()->route('dashboard-read');
                        }
                        else
                        {
                            if(session('nivel') == 3)
                            {
                                if(session('propietario') == 4)
                                {
                                    return redirect()->route('dashboard-franchisee');
                                }
                                else
                                {
                                    return redirect()->route('dashboard');
                                }
                            }
                            else
                            {
                                return back()->withErrors([
                                    'message'=>'Unauthorized level'
                                ]);                                            
                            }
                        }
                    }
                }
            }
        }
        else
        {
            return back()->withErrors([
                'message'=>'Incorrect username or password'
            ]);
        }
    }
}
