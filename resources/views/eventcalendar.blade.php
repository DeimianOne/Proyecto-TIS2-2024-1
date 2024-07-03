@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="row mt-5 pt-5">
        <div class="col-md-8">
            <div id="agenda"></div>
        </div>
        <div class="col-md-4">
            <div id="eventForm" class="card">
                <div class="card-header">
                    <h4>Detalles del evento</h4>
                </div>
                <div class="card-body">
                    <form id="form">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Nombre Evento</label>
                            <input type="text" class="form-control" id="eventTitle" name="title" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Fecha de Inicio</label>
                            <input type="text" class="form-control" id="startDate" name="startDate" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">Fecha de termino</label>
                            <input type="text" class="form-control" id="endDate" name="endDate" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="latitude" class="form-label">Latitud</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="longitude" class="form-label">Longitud</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FullCalendar CSS -->
<link href="{{ asset('js/plugins/fullcalendar/main.css') }}" rel="stylesheet">

<!-- FullCalendar JS -->
<script src="{{ asset('js/plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('js/plugins/fullcalendar/locales-all.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: '/api/events', // URL actualizada para obtener los eventos
        dateClick: function(info) {
            // Limpia los campos cuando se hace clic en una fecha
            document.getElementById('eventTitle').value = '';
            document.getElementById('startDate').value = info.dateStr;
            document.getElementById('endDate').value = '';
            document.getElementById('latitude').value = '';
            document.getElementById('longitude').value = '';
        },
        eventClick: function(info) {
            // Llenar los campos con los datos del evento
            document.getElementById('eventTitle').value = info.event.title;
            document.getElementById('startDate').value = info.event.startStr;
            document.getElementById('endDate').value = info.event.endStr || '';
            document.getElementById('latitude').value = info.event.extendedProps.latitude || '';
            document.getElementById('longitude').value = info.event.extendedProps.longitude || '';
        },
    });
    calendar.render();
});
</script>

@include('layouts.footer')
