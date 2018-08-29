<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    const ERROR_UPLOAD_FILE = "Файл не загружен";
    const IMAGES_PATH = 'public/images';

    /**
     * Галерея
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $files = \Storage::files(self::IMAGES_PATH);
        $files = $this->changeFilePath($files);
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
                    self::IMAGES_PATH, $fileName
                );

                flash("Файл загружен")->success();
                return redirect()->route('images.index');
            } catch (\Exception $e) {
                flash(self::ERROR_UPLOAD_FILE)->error();
                return redirect()->back();
            }
        }
        flash(self::ERROR_UPLOAD_FILE)->error();
        return redirect()->back();
    }

    public function changeFilePath($files)
    {
        $result = [];
        foreach ($files as $file) {
            $result[] = str_replace("public", "", $file);
        }
        return $result;
    }

}
