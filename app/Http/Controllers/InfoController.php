<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.faq.index', [
            'faq' => Info::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Info();
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();

        return redirect('/dashboard/faq')->with('success', 'New FAQ has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $faq)
    {
        return view('dashboard.faq.edit', [
            'faq' => $faq
            // 'faqs' => DB::select('select * from infos')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInfoRequest  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $faq)
    {
        $rules = [
            'question' => 'required',
            'answer' => 'required',
        ];
        $validatedData = $request->validate($rules);

        Info::where('id', $faq->id)
            ->update($validatedData);

        return redirect('/dashboard/faq')->with('success', 'FAQ has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $faq)
    {
        Info::destroy($faq->id);

        return redirect('/dashboard/faq')->with('success', 'FAQ has been deleted!');
    }
}
