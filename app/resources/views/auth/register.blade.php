<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app') <!-- Assurez-vous d'avoir un layout de base, si utilisé -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="mail_compte" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="mail_compte" type="email" class="form-control @error('mail_compte') is-invalid @enderror  mb-2" name="mail_compte" value="{{ old('mail_compte') }}" required autocomplete="mail_compte">

                                    @error('mail_compte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mdp_compte" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="mdp_compte" type="password" class="form-control @error('mdp_compte') is-invalid @enderror  mb-2" name="mdp_compte" required autocomplete="new-password">

                                    @error('mdp_compte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mdp_compte_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="mdp_compte_confirmation" type="password" class="form-control" name="mdp_compte_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom_compte" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="nom_compte" type="text" class="form-control @error('nom_compte') is-invalid @enderror  mb-2" name="nom_compte" value="{{ old('nom_compte') }}" required autocomplete="nom_compte">

                                    @error('nom_compte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prenom_compte" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom_compte" type="text" class="form-control @error('prenom_compte') is-invalid @enderror  mb-2" name="prenom_compte" value="{{ old('prenom_compte') }}" required autocomplete="prenom_compte">

                                    @error('prenom_compte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
