<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateStudant;
use App\Models\Studant;
use Illuminate\Http\Request;

class StudantController extends Controller
{
    private $repository;

    public function __construct(Studant $studant)
    {
        $this->repository = $studant;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studants = $this->repository->latest()->paginate();

        return view('admin.pages.studants.index', compact('studants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.studants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return back()->with('message', 'Estudante criado com sucesso.')->with('typealert', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$studant = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.studants.show', compact('studant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$studant = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.studants.edit', compact('studant'));
    }
    public function postUpdate(Request $request, $id)
    {
        if (!$studant = $this->repository->find($id)) {
            return redirect()->back();
        }

        $studant->update($request->all());

        return back()->with('message', 'Atualizado com sucesso.')->with('typealert', 'success');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Studant::find($id);
        if($s->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $studants = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('document', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.studants.index', compact('studants', 'filters'));
    }
}
