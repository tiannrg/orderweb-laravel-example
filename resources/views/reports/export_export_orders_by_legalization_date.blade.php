<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Órdenes por Legalización</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        h2, p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h2>Órdenes legalizadas entre {{ $startDate }} y {{ $endDate }}</h2>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Causal</th>
                <th>Observación</th>
                <th>Fecha Legalización</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->description }}</td>
                    <td>{{ $order->causal }}</td>
                    <td>{{ $order->observation }}</td>
                    <td>{{ $order->legalization_date }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No se encontraron órdenes en el rango de fechas seleccionado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
