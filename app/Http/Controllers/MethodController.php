<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Repositories\MethodRepository;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public $methodRepository;

    public function __construct(MethodRepository $methodRepository)
    {
        $this->methodRepository = $methodRepository;
    }

    public function index()
    {
       $methods = $this->methodRepository->getAll();
       return view('method.index', compact('methods'));
    }

    public function create()
    {
        return view('method.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        if ($request->ajax()){
           $res = $this->methodRepository->save([
               'name' => \request('name')
            ]);
           return $res;
        }
    }

    public function show(Method $method)
    {

    }

    public function edit(Method $method)
    {

    }

    public function update(Request $request)
    {
        if ($request->ajax()){
            $id = \request('id');
            $data = [
                'name' => \request('name')
            ];
            $this->methodRepository->updateById($data, $id);
        }

    }

    public function destroy($id)
    {
        if (\request()->ajax()){
            $this->methodRepository->deleteById($id);
        }
    }
}
