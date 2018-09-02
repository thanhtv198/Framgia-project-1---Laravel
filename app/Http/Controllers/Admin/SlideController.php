<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SlideRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Slide;
use App\Http\Requests\UpdateSlideRequest;

class SlideController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $slides = Slide::getSlide();

        return view('admin.content.slide.index', compact('slides'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.content.slide.add');
    }

    /**
     * @param SlideRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SlideRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();

            $file->move(config('app.slideUrl'), $name);

            $request->merge([
                'avatar' => $name,
            ]);
        }

        Slide::create($request->all());

        return redirect()->route('slide.index')->with('success', trans('common.with.add_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $slide = Slide::findOrFail($id);

        return view('admin/content/slide/edit', compact('slide'));
    }

    /**
     * @param $id
     * @param UpdateSlideRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(UpdateSlideRequest $request, $id)
    {
        try {
            $slide = Slide::findOrFail($id);

            $imgOld = $slide->avatar;

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $name = $file->getClientOriginalName();

                if (file_exists(config('app.slideUrl') . '/' . $imgOld)) {
                    unlink(config('app.slideUrl') . '/' . $imgOld);
                }

                $file->move(config('app.slideUrl'), $name);

                $request->merge([
                    'avatar' => $name,
                ]);

            } else {
                $request->merge([
                    'avatar' => $imgOld,
                ]);
            }

            $slide->update($request->all());

            return redirect()->route('slide.index')->with('success', trans('common.with.edit_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteSlide($id)
    {
        $slide = Slide::findOrFail($id);

        $slide->delete();

        return redirect()->route('slide.index')->with('success', trans('common.with.delete_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteManySlide(Request $request)
    {
        if ($request->check == null) {
            return redirect()->back()->with('success', trans('common.with.delete_success'));
        }
        for ($i = 0; $i < count($request->check); $i++) {
            $slide = Slide::findOrFail($request->check[$i]);

            $slide->delete();
        }

        return redirect()->route('slide.index')->with('success', trans('common.with.delete_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchslide(Request $request)
    {
        $slides = Slide::search($request->key);

        return view('admin.content.slide.index', compact('slides'));
    }
}

