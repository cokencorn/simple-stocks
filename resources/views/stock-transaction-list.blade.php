@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Stok Hareketleri</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Hareket #</td>
                                <td>Malzeme</td>
                                <td>Miktar</td>
                                <td>Tarih</td>
                                <td>Açıklama</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->getStock()->description . ' (' . $item->getStock()->code  . ')'}}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                    <td>{{ $item->description ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('stock.transaction.delete', $item) }}">
                                            <button class="btn btn-danger">Sil</button>
                                        </a>
                                    </td>
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
