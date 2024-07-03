@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Reporte de Vistas de Productos</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div id="container" style="width:100%; height:400px;"></div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    const products = @json($products);
    const data = products.map(product => ({
        name: product.name,
        y: product.visualizations
    }));

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Vistas por Producto'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de Vistas'
            }
        },
        series: [{
            name: 'Vistas',
            colorByPoint: true,
            data: data
        }]
    });
});
</script>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: "Buen trabajo!",
        text: "{{ session('success') }}",
        icon: "success"
    });
});
</script>
@endif
@endsection
