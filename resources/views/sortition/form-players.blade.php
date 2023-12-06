@extends('app')

@section('header')
@endsection

@section('content')
{{ Form::open(array('method' => 'POST', 'url' => url()->current(), 'autocomplete' => 'off')) }}
{{ Form::token() }}
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div class="col-12">
        <div class="card w-100">
            <div class="card-header">
                <b>Adicionar Jogadores</b>
            </div>
            <div class="card-body">
                @if($players)
                @foreach($players as $player)
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="mb-3">
                            {{ Form::label('name', 'Nome', ['class' => 'form-label']) }}
                            {{ Form::text('edit_name[]', $player->name ?? null, ['class' => 'form-control', 'placeholder' => 'Adicione a quantidade total', 'required' => true]) }}
                            {{ Form::hidden('id[]', $player->id ?? null, ['class' => 'form-control', 'required' => true]) }}
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="mb-3">
                            {{ Form::label('nivel', 'Nível', ['class' => 'form-label']) }}
                            {{ Form::select('edit_nivel[]', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], $player->nivel ?? null, ['class' => 'form-select', 'placeholder' => 'Selecione a Categoria Pai', 'required' => true]) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-4">
                        <label class="form-label">É goleiro</label>
                        <div class="mb-3 radio-custom">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="1" name="edit_goalkeeper_{{ $player->id }}" id="goalkeeper1_{{ $player->id }}" {{ $player->goalkeeper == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="goalkeeper1_{{ $player->id }}">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" name="edit_goalkeeper_{{ $player->id }}" id="goalkeeper2_{{ $player->id }}" {{ $player->goalkeeper == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="goalkeeper2_{{ $player->id }}">
                                    Não
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="getDelete('{{ $player->id }}', '{{ $table_delete }}', '{{ $routeDelete }}')" class="btn-delete btn btn-danger text-white">Remover</button>
                <hr>
                @endforeach
                @endif
                <div id="formTemplate">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                {{ Form::label('name', 'Nome', ['class' => 'form-label']) }}
                                {{ Form::text('name[]', $coupon->name ?? null, ['class' => 'form-control', 'placeholder' => 'Adicione o nome']) }}
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                {{ Form::label('nivel', 'Nível', ['class' => 'form-label']) }}
                                {{ Form::select('nivel[]', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-select', 'placeholder' => 'Selecione o nível']) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-4">
                            <label class="form-label">É goleiro</label>
                            <div class="mb-3 radio-custom">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="1" name="goalkeeper_0" id="goalkeeper1_0">
                                    <label class="form-check-label" for="goalkeeper1_0">
                                        Sim
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="0" name="goalkeeper_0" id="goalkeeper2_0" checked>
                                    <label class="form-check-label" for="goalkeeper2_0">
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="sub-title">Novo jogador</span>
                <hr>
                <div id="formContainer">
                </div>
                <div class="row">
                    <div class="mb-3">
                        <button type="button" id="addFormButton" class="btn btn-info text-white">Adicionar +</button>
                    </div>
                </div>
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