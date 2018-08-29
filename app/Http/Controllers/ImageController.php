<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    const ERROR_UPLOAD_FILE = "Файл не загружен";

    /**
     * Галерея
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $files = \Storage::files('images');
//        dd($files);

        return view('image.index', compact('files'));
    }

    /**
     * Страница загрузки изображения
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('image.create');
    }


    /**
     * Загрузить изображение
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs(
                    'images', $fileName
                );

                flash("Файл загружен")->success();
                return redirect()->back();
            } catch (\Exception $e) {
                flash(self::ERROR_UPLOAD_FILE)->error();
                return redirect()->back();
            }
        }
        flash(self::ERROR_UPLOAD_FILE)->error();
        return redirect()->back();
    }
}
