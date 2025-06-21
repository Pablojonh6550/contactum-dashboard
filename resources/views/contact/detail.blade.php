@extends('layouts.app')

@section('title', 'Contactum | Lista de Contatos')

@section('content')
    <section class="w-100 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <h4>Dados do Contato</h4>

                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}"
                            disabled>

                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contato</label>
                        <input type="number" min="0" class="form-control" id="contact" name="contact_number"
                            disabled value="{{ $contact->contact_number }}">

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" disabled
                            value="{{ $contact->email }}">

                        <a href="{{ route('index') }}" class="btn btn-secondary mt-4 w-100">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
