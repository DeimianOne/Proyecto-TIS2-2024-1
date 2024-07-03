@extends('layouts.backend')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Reporte de Vistas de Productos e Ingresos Totales</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-12 col-md-6">
                <figure class="highcharts-figure">
                    <div id="container-views"></div>
                </figure>
            </div>
            <div class="col-12 col-md-6">
                <figure class="highcharts-figure">
                    <div id="container-income"></div>
                </figure>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    Highcharts.setOptions({
        lang: {
            contextButtonTitle: "Menú contextual",
            decimalPoint: ",",
            downloadCSV: "Descargar CSV",
            downloadJPEG: "Descargar JPEG",
            downloadPDF: "Descargar PDF",
            downloadPNG: "Descargar PNG",
            downloadSVG: "Descargar SVG",
            downloadXLS: "Descargar XLS",
            drillUpText: "Volver a {series.name}",
            loading: "Cargando...",
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            noData: "No hay datos para mostrar",
            numericSymbols: ['k', 'M', 'G', 'T', 'P', 'E'],
            printChart: "Imprimir gráfico",
            resetZoom: "Restablecer zoom",
            resetZoomTitle: "Restablecer zoom a 1:1",
            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            thousandsSep: ".",
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
        }
    });

    // Gráfico de Vistas por Producto
    const productos = @json($productos);
    const dataViews = productos.map(producto => ({
        name: producto.name,
        y: producto.visualizations
    }));

    Highcharts.chart('container-views', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Vistas por Producto'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: ''
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    connectorColor: 'rgba(128,128,128,0.5)'
                }
            }
        },
        series: [{
            name: 'Vistas',
            colorByPoint: true,
            data: dataViews
        }]
    });

    // Gráfico de Líneas de Ingresos Totales a lo Largo del Tiempo
    const sales = @json($sales);
    const dataIncome = sales.map(sale => ({
        date: sale.date,
        total: parseFloat(sale.total)
    }));

    Highcharts.chart('container-income', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Ingresos Totales a lo Largo del Tiempo',
            align: 'left'
        },
        xAxis: {
            type: 'datetime',
            accessibility: {
                rangeDescription: 'Rango: desde el primer hasta el último punto de datos'
            }
        },
        yAxis: {
            title: {
                text: 'Ingresos Totales'
            }
        },
        tooltip: {
            pointFormat: 'Ingresos: <b>{point.y}</b>'
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: Date.UTC(2021, 0, 1), // Ajusta esto según el rango de tus datos
                marker: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Ingresos',
            data: dataIncome.map(item => [Date.parse(item.date), item.total])
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
});
</script>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: "¡Buen trabajo!",
        text: "{{ session('success') }}",
        icon: "success"
    });
});
</script>
@endif

@endsection
