<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function indexAction(Request $request) {
        //echo 'Chiki Briki';

        $params = $request->all();
        $statusCode = 200;

        if ($params['name'] !== 'igor') {
            $statusCode = 403;
        }

        return response('', $statusCode);
        //var_export($value); die;
    }

//    function pageAction(Request $request, $cat, $id) {
//        return redirect()->route('page', ['cat'=>$cat, 'id'=>$id]);
//    }
}
