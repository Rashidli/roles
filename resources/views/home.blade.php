@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ol>
                            @foreach($permissions = auth()->user()->getAllPermissions() as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                            @if(!$permissions->count())
                                <h2>You are not have any permission</h2>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
