@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de usuários') }}</div>

                <div class="card-body">
                    @foreach ($users as $user)
                    <div class="row">
                        <span>ID: {{$user->id}} | {{ $user->name }} | <a href="">Editar</a> | <a href="">{{ $user->is_active ? 'Desativar' : 'Ativar' }}</a></span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection