@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tarih Bazlı Stok Raporu</div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('stock.report') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-5 col-6">
                                    <label>Başlangıç Tarihi</label>
                                    {{ Form::date('start_date', date('Y-m-d'), ['class' => 'form-control', 'required']) }}
                                </div>
                                <div class="form-group col-md-5 col-6">
                                    <label>Bitiş Tarihi</label>
                                    {{ Form::date('end_date', date('Y-m-d'), ['class' => 'form-control', 'required']) }}
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="text-white">.</label>
                                    <button type="submit" class="btn btn-block btn-primary">Oluştur</button>
                                </div>
                            </div>
                        </form>
                        <hr class="pb-2"/>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Kod</td>
                                <td>Barkod</td>
                                <td>Açıklama</td>
                                <td>Stok Miktarı</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $id => $stock)
                                <tr>
                                    <td>{{ $stock['stock']->code }}</td>
                                    <td>{{ $stock['stock']->barcode ?? '-' }}</td>
                                    <td>{{ $stock['stock']->description }}</td>
                                    <td>{{ $stock['amount'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
@endsection
