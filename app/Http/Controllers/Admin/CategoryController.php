<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;
    }

    public function getHome($module)
    {
        $cats = Category::where('module', $module)->orderBy('name', 'Asc')->get();
        $data = ['cats' => $cats];
        return view('admin.pages.categories.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        $this->repository->create($request->all());

        return back()->with('message', 'Categoria criada com sucesso.')->with('typealert', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        $data = ['cat' => $cat];
        return view('admin.pages.categories.edit', $data);
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdateCategory  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        $category->update($request->all());

        return back()->with('message', 'Atualizado com sucesso.')->with('typealert', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function getDelete($id)
    {
        $c = Category::find($id);
        if($c->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }


    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $cats = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('name', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.categories.index', compact('cats', 'filters'));
    }
}
