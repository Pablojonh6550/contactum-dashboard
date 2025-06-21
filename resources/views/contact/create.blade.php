@extends('layouts.app')

@section('title', 'Contactum | Adicionar Contato')

@section('content')
    <section class="w-100 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <h4>Novo Contato</h4>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contato</label>
                            <input type="number" min="0" class="form-control" id="contact" name="contact_number">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Salvar</button>
                    </form>
                    <a href="{{ route('index') }}" class="btn btn-secondary mt-2 w-100">Voltar</a>
                </div>
            </div>
        </div>
    </section>
@endsection
