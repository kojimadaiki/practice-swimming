<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Practice;

use App\Http\Requests\PracticeRequest;

class PracticeController extends Controller
{
  public function top() {

    $practices = Practice::all();

    return view('practice.top', ['practices' => $practices]);
  }

  public function show($id) {

    $practice = Practice::find($id);

    if (is_null($practice)) {
      \Session::flash('err_msg', 'データがありません');
      return redirect(route('practice'));
    }

    return view('practice.show', ['practice' => $practice]);
  }

  public function create() {
    return view('practice.form');
  }

  public function store(PracticeRequest $request) {
    $inputs = $request->all();

    \DB::beginTransaction();
    try {
      Practice::create($inputs);
      \DB::commit();
    } catch(\Throwable $e) {
      \DB::rollback();
      abort(500);
    }
    \Session::flash('err_msg', 'ブログを登録しました');
      return redirect(route('practice'));
  }

  public function edit($id) {
    $practice = Practice::find($id);

    if (is_null($practice)) {
      \Session::flash('err_msg', 'データがありません');
      return redirect(route('practice'));
    }

    return view('practice.edit', ['practice' => $practice]);
  }

  public function update(PracticeRequest $request) {
    $inputs = $request->all();

    \DB::beginTransaction();
    try {
      $practice = Practice::find($inputs['id']);
      $practice->fill([
        'title' => $inputs['title'],
        'style' => $inputs['style'],
        'times' => $inputs['times'],
        'content' => $inputs['content']
      ]);
      $practice->save();
      \DB::commit();
    } catch(\Throwable $e) {
      \DB::rollback();
      abort(500);
    }
    \Session::flash('err_msg', 'ブログを更新しました');
      return redirect(route('practice'));
  }

  public function delete($id) {

    if (empty($id)) {
      \Session::flash('err_msg', 'データがありません');
      return redirect(route('practice'));
    }

    try {
      Practice::destroy($id);
    } catch(\Throwable $e) {
      abort(500);
    }

    \Session::flash('err_msg', '削除しました');
    return redirect(route('practice'));
  }
}
