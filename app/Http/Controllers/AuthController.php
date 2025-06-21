<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{

    public function __construct(private AuthService $authService) {}

    public function login(): View
    {
        return view('login');
    }

    public function authenticate(AuthRequest $request): View|RedirectResponse
    {
        try {
            $result = $this->authService->authenticate(['name' => $request->validated('name'), 'password' => $request->validated('password')]);
            return redirect()->route('index');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar logar', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function logout(): RedirectResponse
    {
        try {
            $this->authService->logout();
            return redirect()->route('index');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar deslogar', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }
}
