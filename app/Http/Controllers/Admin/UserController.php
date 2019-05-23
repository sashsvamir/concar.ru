<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->responseFactory->view('admin.user.index', [
            'users' => User::all()->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        return $this->responseFactory->view('admin.user.create');
    }

    /**
     * Show the form for updating a existing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm()
    {
        // return view('admin.user.update');
        return $this->responseFactory->view('admin.user.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUser  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(StoreUser $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();
            $model = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            DB::commit();
        } catch (\Throwable $e) {

            DB::rollBack();
            throw $e;
        }

        $request->session()->flash('status', "User with {$model->id} was created successful");

        return $this->responseFactory->redirectToRoute('admin-user-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, int $id)
    {
        $model = User::findOrFail($id);

        $model->delete();

        $request->session()->flash('status', "User with {$model->id} was removed successful");

        return $this->responseFactory->redirectToRoute('admin-user-index');
    }
}
