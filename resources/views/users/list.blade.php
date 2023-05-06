@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de usuários') }}</div>

                <div class="card-body">
                    <form action="{{ route('listUsers') }}" method="GET">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name" placeholder="Nome" value="{{ Request::get('name') }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="email" placeholder="email" value="{{ Request::get('email') }}">
                            </div>
                            <div class="col-md-2">
                                <button class="btn" type="submit">Filtrar</button>
                            </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a class="btn btn-info" href="{{ route('editUser', $user->id) }}">Editar</a></td>
                                <td>
                                    <form action="{{ route('changeStatus', $user->id) }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <button class="btn {{ $user->is_active ? 'btn-danger' : 'btn-success' }}" type="submit">{{ $user->is_active ? 'Desativar' : 'Ativar' }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection