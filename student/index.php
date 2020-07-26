<?php
require_once('includes/header.php');
require_once('includes/navbar.php');

?>


<div class="rvt-grid">

    <?php require_once('includes/sidebar.php');?>

    <div class="rvt-grid__item">
        <main role="main" id="main-content">

            <div class="rvt-box">
                <div class="rvt-box__header">
                    Welcome dcampore
                </div>
                <div class="rvt-box__body">
                <div id='calendar'></div>

                </div>
                <div class="rvt-box__footer rvt-text-right">
                </div>
            </div>
        </main>

    </div>
</div>

  

<?php
require_once('includes/footer.php');

?>


<!-- 
<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'UTC',
    initialView: 'resourceTimelineDay',
    aspectRatio: 1.5,
    headerToolbar: {
      left: 'prev,next',
      center: 'title',
      right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
    },
    editable: true,
    resourceAreaHeaderContent: 'Meetings',
    resources: 'https://fullcalendar.io/demo-resources.json?with-nesting&with-colors',
    events: 'https://fullcalendar.io/demo-events.json?single-day&for-resource-timeline'
  });

  calendar.render();
});



</script> -->