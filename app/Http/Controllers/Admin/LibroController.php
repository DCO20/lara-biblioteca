<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{

    public function __construct(Libro $libro)
    {
        $this->repository = $libro;

        //$this->middleware(['can:libros']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = $this->repository->latest()->paginate();

        return view('admin.pages.libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        $cats = Category::where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats];
        return view('admin.pages.libros.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {
            $data['image'] = $request->image->store("libros");
        }

        $this->repository->create($data);

        return back()->with('message', 'Livro adicionado com sucesso.')->with('typealert', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $l = Libro::findOrFail($id);
        $cats = Category::where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats, 'l' => $l ];
        return view('admin.pages.libros.edit', $data);
    }

    public function postUpdate(Request $request, $id)
    {
        if (!$libro = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();


        if ($request->hasFile('image') && $request->image->isValid()) {

            if (Storage::exists($libro->image)) {
                Storage::delete($libro->image);
            }

            $data['image'] = $request->image->store("libros");
        }

        $libro->update($data);

        return redirect()->route('libros.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
        if (!$libro = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($libro->image)) {
            Storage::delete($libro->image);
        }

        if($libro->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $libros = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('code', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.libros.index', compact('libros', 'filters'));
    }
}
