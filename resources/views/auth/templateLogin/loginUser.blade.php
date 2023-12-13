<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf

                        <div class="row mb-3 mt-3">
                            <label for="id_desa" class="col-md-4 col-form-label text-md-end">{{ __('Id Desa') }}</label>

                            <div class="col-md-6">
                                <input id="id_desa" type="id_desa"
                                    class="form-control @error('id_desa') is-invalid @enderror" name="id_desa"
                                    value="{{ old('id_desa') }}" required autocomplete="id_desa" autofocus>

                                @error('id_desa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <input id="password" type="hidden"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" value="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 38px">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Masuk') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
