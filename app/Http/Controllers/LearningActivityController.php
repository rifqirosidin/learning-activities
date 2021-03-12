<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningActivityRequest;
use App\Models\LearningActivity;

use App\Models\Method;
use App\Repositories\LearningActivityRepository;
use App\Repositories\MethodRepository;
use Illuminate\Support\Facades\Session;

class LearningActivityController extends Controller
{
    public $learningActivity;
    public $methodRepository;

    public function __construct(LearningActivityRepository $learningActivity, MethodRepository $methodRepository)
    {
        $this->learningActivity = $learningActivity;
        $this->methodRepository = $methodRepository;
    }

    public function index()
    {

        $data = Method::with('learningActivities')
            ->latest()
            ->get();
        $methods = $this->methodRepository->getAll();

        return view('learning_activity.index', compact('data', 'methods'));
    }

    public function create()
    {
        //
    }

    public function store(LearningActivityRequest $request)
    {
        $validated = $request->validated();
        try{
            $this->learningActivity->save($validated);
            Session::flash('success', 'Create Learning Activity Success');
        }catch (\Exception $exception){
            dd($exception);
            Session::flash('error', 'Create Learning Activity Failed');
        }

        return redirect()->route('learning-activities.index');
    }

    public function show(LearningActivity $learningActivity)
    {
        //
    }

    public function edit(LearningActivity $learningActivity)
    {
        //
    }

    public function update(LearningActivityRequest $request,$id)
    {
        $validated = $request->validated();
        try{
            $this->learningActivity->updateById($validated, $id);
            Session::flash('success', 'Update Learning Activity Success');
        }catch (\Exception $exception){
            dd($exception);
            Session::flash('error', 'Update Learning Activity Failed');
        }

        return redirect()->route('learning-activities.index');
    }

    public function destroy(LearningActivity $learningActivity)
    {
        $learningActivity->delete();
        Session::flash('success', 'Move to trash Success');
        return route('learning-activities.index');
    }

    public function permanentDelete(LearningActivity $learningActivity){
        $learningActivity->forceDelete();
        Session::flash('success', 'Delete Learning Activity Success');
        return route('learning-activities.index');
    }

    public function trashed()
    {
        $learnings = $this->learningActivity->getTrashed();
        $methods = $this->methodRepository->getAll();


        return view('learning_activity.trashed', compact('learnings', 'methods'));
    }

    public function restore($id)
    {
        $this->learningActivity->restore($id);
        Session::flash('success', 'Restore Learning Activity Success');
        return route('trashed.index');
    }
}
