@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Yeni Stok Hareketi</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stock.transaction.create') }}">
                            @csrf
                            <div class="custom-control custom-radio">
                                <input type="radio" value="add" checked class="custom-control-input" id="customControlValidation2" name="type" required>
                                <label class="custom-control-label" for="customControlValidation2">Giriş</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" value="remove" class="custom-control-input" id="customControlValidation3" name="type" required>
                                <label class="custom-control-label" for="customControlValidation3">Çıkış</label>
                            </div>
                            <div class="form-group">
                                <label>Malzeme</label>
                                {{ Form::select('stock_id', \App\Models\Stock::pluck('description', 'id'), null, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Miktar</label>
                                {{ Form::number('amount', null, ['min' => 1, 'class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Tarih</label>
                                {{ Form::date('date', date('Y-m-d'), ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Açıklaması</label>
                                {{ Form::text('description', null, ['class' => 'form-control']) }}
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Malzeme Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
