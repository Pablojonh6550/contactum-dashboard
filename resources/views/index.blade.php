@extends('layouts.app')

@section('title', 'Contactum | Lista de Contatos')

@section('content')
    <section class="w-100 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 mb-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('contact.create') }}" class="btn btn-primary">Adicionar contato</a>
                </div>
                <div class="col-10">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contact->id }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->contact_number }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <a href="{{ route('contact.edit', $contact->id) }}"
                                            class="btn btn-warning">Editar</a>
                                        <a href="{{ route('contact.delete', $contact->id) }}"
                                            class="btn btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
