var calendarEl = $('#calendar')[0];
var idHash = $(calendarEl).data('hash');
var dataJadwal = $(calendarEl).data('jadwal');

var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    events: '../../frontend/ajax-load/jadwal-proyek?id_proyek=' + idHash,
    selectable: true,
    locale: 'id',
    dayMaxEventRows: 2,
    views: {
        dayGridMonth: {
            moreLinkText: "Lainnya"
        }
    },
    headerToolbar: {
        left: 'prev,next',
        center: '', 
        right: 'title'
    },
    eventDidMount: function (info) {
        var eventId = info.event.id;
        $el = $(info.el);
        $el.attr("role", "modal-remote");
        $el.attr("href", `/proyek/proyek-jadwal/jadwal-detail?id=${eventId}&id_proyek=${idHash}`);

    }
});

calendar.render();

$(document).on('pjax:success', function (event, data, status, xhr, options) {
    calendar.refetchEvents();
});
