@extends('app')

@section('header')
@endsection

@section('content')
{{ Form::open(array('method' => 'POST', 'url' => url()->current(), 'autocomplete' => 'off')) }}
{{ Form::token() }}
<div class="row">
    <div class="col-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-header">
                <b>Resultado</b>
            </div>
            <div class="card-body">
                @foreach($times as $key => $time)
                <div class="row mb-3">
                    <div class="title">
                        {{ $key }}
                    </div>
                    @foreach($time as $item)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card card-player mb-3">
                            <div class="row g-0">
                                <div class="col-12 col-md-12 col-lg-4 mt-2 d-flex align-items-center justify-content-center">
                                    <img src="/assets/images/jogador{{ ($loop->iteration % 4) + 1 }}.svg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['name'] }}</h5>
                                        <p class="card-text">Nivel: {{ $item['nivel'] }}</p>
                                        <p class="card-text">Goleiro: {{ $item['goalkeeper'] == 0 ? 'Não' : 'Sim' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="mb-3 mt-3">
            <div class="d-flex justify-content-end">
                <div><button type="submit" class="btn btn-success text-white ms-3">Salvar</button></div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection

@section('script')
<script src="/assets/js/sortition/form.js"></script>
@endsection