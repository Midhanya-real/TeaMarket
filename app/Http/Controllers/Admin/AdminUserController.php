<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repository\UserRepository;
use App\Services\UpdateModelServices\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserService    $service,
    )
    {
    }

    public function index(Request $request): View|Factory|Application
    {
        $users = $this->userRepository->getAll($request);

        return view('admin.users.users', [
            'users' => $users,
        ]);
    }

    public function edit(User $user): View
    {
        return view('admin.users.partials.update-users', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->service->update(request: $request, user: $user);

        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request, User $user)
    {
        $this->service->destroy(request: $request, user: $user);

        return redirect()->route('admin.products.index');
    }
}
