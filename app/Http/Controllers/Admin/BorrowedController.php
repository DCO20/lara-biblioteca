<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowed;
use App\Models\Category;
use App\Models\Libro;
use App\Models\Studant;
use App\User;

class BorrowedController extends Controller
{
    private $repository;

    public function __construct(Borrowed $borrowed)
    {
        $this->repository = $borrowed;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borroweds = Borrowed::orderBy('token_borrowed')->get();

        return view('admin.pages.borroweds.index', compact('borroweds'));
    }

    public function create()
    {
        $libros = Libro::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $studants = Studant::pluck('name', 'id');
        $data = [ 'libros' => $libros,
                'users' => $users,
                'studants' => $studants,
    ];
        return view('admin.pages.borroweds.create', $data);
    }

    
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return back()->with('message', 'Livro emprestado com sucesso.')->with('typealert', 'success');
    }

    public function destroy($id)
    {
        if (!$borrowed = $this->repository->find($id)) {
            return redirect()->back();
        }

        if($borrowed->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $borroweds = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name_std', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.borroweds.index', compact('borroweds', 'filters'));
    }

    public function searchLibros(Request $request)
    {

    }
}
