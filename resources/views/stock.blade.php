@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Yeni Malzeme</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stock.create') }}">
                            @csrf
                            <div class="form-group">
                                <label>Malzeme Açıklaması</label>
                                {{ Form::text('description', null, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Malzeme Kodu</label>
                                {{ Form::text('code', null, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Malzeme Barkodu</label>
                                {{ Form::text('barcode', null, ['class' => 'form-control']) }}
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Malzeme Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
