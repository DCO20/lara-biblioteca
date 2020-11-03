<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->repository = $user;

        //$this->middleware(['can:users']);
    }
    
    public function index()
    {
        $users = $this->repository->latest()->paginate();

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('avatar') && $request->avatar->isValid()) {
            $data['avatar'] = $request->avatar->store("users");
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $this->repository->create($data);

        return back()->with('message', 'Usuário adicionado com sucesso.')->with('typealert', 'success');
    }

    public function show($id)
    {
        
        if (!$user = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.show', compact('user'));
    }

    public function edit($id)
    {
        if (!$user = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.edit', compact('user'));
    }

    public function postUpdate(Request $request, $id)
    {
        if (!$user = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();


        if ($request->hasFile('avatar') && $request->avatar->isValid()) {

            if (Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            $data['avatar'] = $request->avatar->store("users");
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return back()->with('message', 'Atualizado com sucesso.')->with('typealert', 'success');
    }


    public function destroy($id)
    {
        $u = User::find($id);
        if($u->delete()):
            return back()->with('message', 'Excluído com sucesso.')->with('typealert', 'danger');
        endif;
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.users.index', compact('users', 'filters'));
    }
   
}
