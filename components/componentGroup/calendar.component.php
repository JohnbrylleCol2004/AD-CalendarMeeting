<div id="calendar"></div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: '/api/getCalendarEvents.php', // hook up your backend
    });
    calendar.render();
  });
</script>
