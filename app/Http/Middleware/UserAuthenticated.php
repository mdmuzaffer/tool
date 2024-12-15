<?php

namespace App\Http\Middleware;

use App\state;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class UserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(Auth::guard('user')->user());
        if(Auth::guard('user')->check()){
            $stateId = Session::get('state_id');
            if($stateId){
                $user = Auth::guard('user')->user();

                $curentUrl = str_replace('/','',$request->route()->getPrefix());
                if(intval($user->state)){
                    $stateArray = state::where('id',$user->state)->where('subdomain_prefix',$curentUrl)->first();
                }else{
                    $stateArray = state::whereIn('id',@json_decode($user->state))->where('subdomain_prefix',$curentUrl)->first();
                }

                if($stateArray){
                    return $next($request);
                }else{
                    return redirect()->route('select-state');
                }

            }else{
                return redirect()->route('select-state');
            }
        }else{

            return redirect()->route('home');
        }
        return $next($request);
    }
}
