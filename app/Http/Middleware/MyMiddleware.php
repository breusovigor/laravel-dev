<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) //$next вызывает следующий middleware
    {
        $value = $request->get('value');
        if ($value == 0) {
        return redirect()->route('home');
    }
        echo 'Обработка до перехода в контроллер';
        //До перехода в контроллер
        $response = $next($request); //Здесь переходим в контроллер
        var_dump($response->status());
        //echo '<pre>';
        //var_dump($response);
        //var_export($response->content());
        echo 'Обработка после перехода в контроллер';
        //После перехода в контроллер

        return $response;
    }
}
