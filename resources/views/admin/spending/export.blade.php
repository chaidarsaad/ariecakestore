<!DOCTYPE html>
<html lang="en">
<head>
    <link href="admin/css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Desikripsi</th>
                                    <th>Tanggal</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($spendings as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>Rp {{ number_format($item->total_spending) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Total Pengeluaran</td>
                                    <td class="">Rp {{ number_format($total) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>