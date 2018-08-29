<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    const ERROR_SAVE_ENTRY = 'Ошибка сохранения записи!';
    const SUCCESS_SAVE_ENTRY = 'Запись сохранена!';
    const SUCCESS_REMOVE_ENTRY = 'Запись удалена!';
    /**
     * Список новостей.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Страница добавления новости.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('news.news-cru', [
            'type' => 'create',
            'title' => 'Добавить новость',
            'button' => 'Создать новость',
            'route' => 'news.store'
        ]);
    }

    /**
     * Добавить новость.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            News::create($request->all());
            flash('Новость создана!')->success();
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            flash('Новость не создана!')->error();
            return redirect()->back();
        }
    }

    /**
     * Просмотр новости.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('news.show', [
            'news' => $news
        ]);
    }

    /**
     * Страница редактирования новости.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('news.news-cru', [
            'type' => 'edit',
            'title' => 'Реактировать новость',
            'button' => 'Сохранить',
            'news' => $news,
            'route' => ['news.update', $id],
        ]);
    }

    /**
     * Редактировать новость.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $news = News::find($id);
            $result = $news->update($request->all());

            if ($result) {
                flash(self::SUCCESS_SAVE_ENTRY)->success();
                return redirect()->back();
            } else {
                flash(self::ERROR_SAVE_ENTRY)->error();
                return redirect()->back();
            }
        } catch (\Exception $e) {
            flash(self::ERROR_SAVE_ENTRY)->error();
            return redirect()->back();
        }
    }

    /**
     * Удалить новость.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $news = News::find($id);
            $news->delete();

            flash(self::SUCCESS_REMOVE_ENTRY)->success();
            return redirect()->back();
        } catch (\Exception $e) {
            flash(self::ERROR_SAVE_ENTRY)->error();
            return redirect()->back();
        }
    }
}
