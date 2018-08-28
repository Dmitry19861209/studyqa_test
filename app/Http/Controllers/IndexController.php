<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    const TITLE = "Главная страница";

    public function dashboard()
    {
        $model = HomePage::first();
        $title = isset($model->title) ? $model->title : self::TITLE;

        return view('main.dashboard', compact('title'));
    }

    /* Изменить title */
    public function setTitle(Request $request)
    {
        if ($request->has('title') && ($title = $request->input('title')) !== "") {
            $model = HomePage::first();
            $model->title = $title;
            $model->save();

            return ['status' => 'ok'];
        }

        return ['status' => 'error'];
    }
}
