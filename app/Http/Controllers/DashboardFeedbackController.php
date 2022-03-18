<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.feedback.index', [
            'feedback' => Feedback::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|file|max:5000',
            'desc' => 'required'
        ]);

        $date = __(date('H-i-s'));
        $random = Str::random(mt_rand(5,20));
        $feedback = new Feedback();
        
        
        // methode mas haidar
        // if($request->file('image')) {
        //     $request->file('image')->move('storage/post-images', $date.$random.$request->file('image')->getClientOriginalName());
        //     $feedback->image = $date.$random.$request->file('image')->getClientOriginalName();
        // }

        // metode pak dika
        if($request->file('image')) {
            $feedback->image = $request->file('image')->storeAs('post-images', $random . $date . '.jpg');
        }

        $feedback->name = $request->name;
        $feedback->slug = Str::slug($request->name);
        $feedback->desc = $request->desc;

        $feedback->save();

        return redirect('/dashboard/feedback')->with('success', 'New feedback has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return view('dashboard.feedback.show', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('dashboard.feedback.edit', [
            'feedback' => $feedback,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $date = date('H-i-s');
        $random = Str::random(5);

        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:5000',
            'desc' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $request->file('image')->move('storage/post-images', $date.$random.$request->file('image')->getClientOriginalName());
            $validatedData['image'] = $date.$random.$request->file('image')->getClientOriginalName();
        }


        Feedback::where('id', $feedback->id)
            ->update($validatedData);

        return redirect('/dashboard/feedback')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        if ($feedback->image) {
            Storage::delete($feedback->image);
        }

        Feedback::destroy($feedback->id);

        return redirect('/dashboard/feedback')->with('success', 'Feedback has been deleted!');
    }
}
