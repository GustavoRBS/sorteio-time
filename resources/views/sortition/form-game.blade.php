@extends('app')

@section('header')
@endsection

@section('content')
{{ Form::open(array('method' => 'POST', 'url' => url()->current(), 'autocomplete' => 'off')) }}
{{ Form::token() }}
<div class="row">
    <div class="col-12 d-flex">
        <div class="card w-100">
            <div class="card-header">
                <b>Confirmação</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            {{ Form::label('number', 'Jogadores por time', ['class' => 'form-label']) }}
                            {{ Form::select('number', array_combine(range(2, 15), range(2, 15)), null, ['class' => 'form-control','placeholder' => 'Selecione a quantidade por time','required' => true,'id' => 'number']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-2">
                        <div class="mb-3">
                            <a href="{{ route('players.new') }}"><button type="button" class="btn btn-info text-white">Adicionar Jogadores</button></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($players->isNotEmpty())
                    <div class="title mb-3">
                        Jogadores
                    </div>
                    @endif
                    @foreach ($players as $item)
                    <div class="col-12 col-md-12 col-lg-3">
                        <div class="mb-3">
                            {{ Form::label('name', 'Nome', ['class' => 'form-label']) }}
                            {{ Form::text('name[]', $item->name ?? null, ['class' => 'form-control', 'placeholder' => 'Adicione a quantidade total', 'required' => true, 'id'=>'name', 'readonly' => true]) }}
                            {{ Form::hidden('id[]', $item->id ?? null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-3">
                        <label class="form-label">Presença confirmada</label>
                        <div class="mb-3 radio-custom">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="1" name="goalkeeper_{{__($item['id']) }}" id="goalkeeper1_{{__($item['id']) }}" checked>
                                <label class="form-check-label" for="goalkeeper1_{{__($item['id']) }}">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" name="goalkeeper_{{__($item['id']) }}" id="goalkeeper2_{{__($item['id']) }}">
                                <label class="form-check-label" for="goalkeeper2_{{__($item['id']) }}">
                                    Não
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="mb-3 mt-3">
            <div class="d-flex justify-content-end">
                <div><button type="submit" class="btn btn-success text-white ms-3">Sortear</button></div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection

@section('script')
<script src="/assets/js/sortition/form.js"></script>
@endsection