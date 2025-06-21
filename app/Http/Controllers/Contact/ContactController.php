<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Services\Contact\ContactService;
use App\Http\Requests\{StoreContactRequest, UpdateContactRequest};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService) {}

    public function index(): RedirectResponse|View
    {
        try {

            $contacts = $this->contactService->all();
            return view('index', compact('contacts'));
        } catch (\Exception $e) {
            Log::error('Erro ao tentar carregar usuários', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function create(): View|RedirectResponse
    {
        try {
            return view('contact.create');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar renderizar view', [
                'view' => 'contact.create',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        try {
            $result = $this->contactService->create($request->validated());
            if ($result)
                return redirect()->route('index')->with('success', 'Usuário criado com sucesso');

            return back()->with('error', 'Erro ao tentar criar usuário');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar criar usuário', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(int $id): RedirectResponse|View
    {
        try {
            $contact = $this->contactService->findById($id);
            if ($contact)
                return view("contact.edit", compact('contact'));
            return back()->with('error', 'Usuário não encontrado');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar carregar usuário', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function update(int $id, UpdateContactRequest $request): RedirectResponse
    {
        try {
            $result = $this->contactService->update($id, $request->validated());
            if ($result)
                return redirect()->route('index')->with('success', 'Usuário atualizado com sucesso');
            return back()->with('error', 'Usuário nao encontrado');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar atualizar usuário', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }
    public function delete(int $id): RedirectResponse
    {
        try {
            $result = $this->contactService->delete($id);
            if ($result)
                return redirect()->route('index')->with('success', 'Usuário deletado com sucesso');
            return back()->with('error', 'Usuário nao encontrado');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar deletar usuário', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function getDelete(): RedirectResponse|View
    {
        try {
            $contacts = $this->contactService->getDeleted();
            return view('contact.trash', compact('contacts'));
        } catch (\Exception $e) {
            Log::error('Erro ao tentar carregar usuários', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function restore(int $id): RedirectResponse
    {
        try {
            $result = $this->contactService->restore($id);
            if ($result)
                return redirect("index")->with('success', 'Usuário restaurado com sucesso');
            return back()->with('error', 'Usuário nao encontrado');
        } catch (\Exception $e) {
            Log::error('Erro ao tentar restaurar usuário', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }
}
