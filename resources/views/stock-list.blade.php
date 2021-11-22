@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Malzemeler</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>KOD</td>
                                <td>Barkod</td>
                                <td>Açıklama</td>
                                <td>Stok Miktarı</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->barcode ?? '-' }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->getCurrentStock() }}</td>
                                    <td>
                                        <a href="{{ route('stock.delete', $item) }}">
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
