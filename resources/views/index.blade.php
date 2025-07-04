@extends('layouts.app')

@section('title', 'Contactum | Lista de Contatos')

@section('content')
    <section class="w-100 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 mb-4 d-flex justify-content-between align-items-center">
                    <h4>Lista de Contatos</h4>
                    @if (Auth::check())
                        <div>
                            <a href="{{ route('contact.create') }}" class="btn btn-primary">Adicionar contato</a>
                            <a href="{{ route('contact.getDelete') }}" class="btn btn-danger ms-2">Deletados</a>
                            <a href="{{ route('auth.logout') }}" class="btn btn-secondary ms-2">Logout</a>
                        </div>
                    @else
                        <a href="{{ route('auth.login') }}" class="btn btn-primary">Login</a>
                    @endif
                </div>
                <div class="col-10">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Email</th>
                                @if (Auth::check())
                                    <th scope="col">Ações</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contact->id }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->contact_number }}</td>
                                    <td>{{ $contact->email }}</td>
                                    @if (Auth::check())
                                        <td>
                                            <a href="{{ route('contact.detail', $contact->id) }}"
                                                class="btn btn-info">Detalhes</a>
                                            <a href="{{ route('contact.edit', $contact->id) }}"
                                                class="btn btn-warning">Editar</a>
                                            <a href="{{ route('contact.delete', $contact->id) }}"
                                                class="btn btn-danger">Excluir</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
