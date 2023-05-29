@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kétlépcsős azonosítás') }}</div>
                    <form class="d-inline" method="POST" action="{{ route('2fa.post') }}">
                        @csrf
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-warning" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            Teszt kód: {{$code->code}}
                            <!-- Ez a kód jelenleg azért van, hogy tesztelni lehessen a létrehozott random felhasználó 2FA azonosítását! -->
                            Teszt kód: {{$code->code}}
                            <!-- Itt a vége!-->
                            <label for="code" class="col-md-3 col-form-label text-md-right">Írd be a kódot</label>
                            <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-9">
                                <a class="btn-link" href="{{ route('2fa.resend') }}">Kód újra küldése</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            Ellenőrzés
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
