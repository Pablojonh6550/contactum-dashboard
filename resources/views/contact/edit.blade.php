@extends('layouts.app')

@section('title', 'Contactum | Editar Contatos')

@section('content')
    <section class="w-100 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <h4>Novo Contato</h4>
                    <form method="POST" action="{{ route('contact.update', ['id' => $contact->id]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $contact->name }}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contato</label>
                            <input type="number" min="0" class="form-control" id="contact" name="contact_number"
                                value="{{ $contact->contact_number }}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $contact->email }}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
