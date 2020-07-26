// only admins should be able edit/delete calendar

$(document).ready(function () {
  load_meetings();
  // fullCalendar starts
  let calendar = $('#calendar').fullCalendar({
    editable: true,
    header: {
      left: 'prev, next, today',
      center: 'title',
      right: 'month, agendaWeek, agendaDay'

    },
    events: 'load.php',
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
      var title = prompt("Please Enter Meeting Title");

      if (title === null || title.length < 3) {
        alert('PLease Enter a descriptive meeting name');
        return;
      }

      // alert('title is', title);
      // return;
      if (title) {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");


        var end = $.fullCalendar.formatDate(end, " Y-MM-DD HH:mm:ss");



        $.ajax({
          url: "insert.php",
          type: "POST",
          data: { title: title, start: start, end: end },
          success: function (data) {

            console.log('Result is: ', data);
            calendar.fullCalendar('refetchEvents');
            alert('Added Successfully');
          }
        })
      }
    },
    editable: true,
    eventResize: function (event) {
      console.log('event', event);
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function (data) {
          console.log('update result', data);
          calendar.fullCalendar('refreshEvents');
          alert('Event Update');
        }

      })
    },
    eventDrop: function (event) {
      console.log('event', event);
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

      var title = event.title;
      var id = event.id;

      $.ajax({
        url: "update.php",
        type: "POST",
        data: { title, title, start, start, end: end, id: id },
        success: function (data) {
          console.log('sec update', data);
          calendar.fullCalendar('refetchEvents');
          alert('Event Updated');
        }
      })
    },
    eventClick: function (event) {
      var confirm_delete = confirm('Are you sure you want to delete the meeting?');

      if (confirm_delete) {
        var id = event.id;

        $.ajax({
          url: "delete.php",
          type: "POST",
          data: { id: id },
          success: function (data) {
            console.log(data);
            calendar.fullCalendar('refetchEvents');

            alert("Meeting Deleted");

          }
        })
      }
    }
  });
  // full calendar ends here 


  // load meetings

  function load_meetings() {
    $.ajax({
      url: "action.php",
      type: "POST",
      data: { query: 'getMeetings' },
      success: function (data) {
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          resultDiv += `<span><h5>${res.title}</h5>
          <span>
          ${res.start}
          </span>
          <span>
          ${res.end}
          </span>
          <span>
          <button data-modal-trigger="modal-example-basic"  class="add_members rvt-button" data-title=${res.title} data-id=${res.id}>Add Participants</button>
          </span>
          <span><button meeting_id=${res.id} class="delete_meeting rvt-button rvt-button--danger">Delete</button></span>
          </span>
          <span><a  target="_blank" href="meeting_info.php?meeting_id=${res.id}" class=" rvt-button rvt-button--success">Meeting Info</a></span>
          </span>
          `;
        });





        $("#meetings_list").html(resultDiv);
        delete_meeting();
        load_members();
      }
    })
  }

  // end of load meetings 


  // on click on add participants modal 




  // delete meeting

  function delete_meeting() {
    $(".delete_meeting").on('click', function (e) {
      e.preventDefault();

      const value = $(this).attr('meeting_id');

      $.ajax({
        url: "delete.php",
        type: "POST",
        data: { id: value },
        success: function (data) {
          console.log(data);
          // calendar.fullCalendar('refetchEvents');

          alert("Meeting Deleted");
          window.location.reload();

        }
      })


    })

  }
  // End of delete meeting 

  // choose meeting participants


  function load_members() {
    // return;

    $.ajax({
      url: 'action.php',
      type: "POST",
      data: { query: 'getAllUsers' },
      success: function (data) {
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          resultDiv += `
          <p>
          <input class="meeting_participants" type="checkbox" name="checkbox-demo" data-id="${res.id}" id="${res.id}" username="${res.username}">
            <label for="${res.id}" class="rvt-m-right-sm">${res.username}</label>
          </p>
        `;
        })


        var def = `<form>
        <fieldset>
            <legend class="sr-only">Checkbox list</legend>
              ${resultDiv}
            </legend>
        </fieldset>
            </form > `;



        $(".rvt-modal__body").html(def);

      }
    })
  }




  // on click of confirm meeting members

  $("#confirm_members").on("click", function (e) {
    confirm_participants();
  })


  // pass meeting details to modal 
  $(document).on("click", ".add_members ", function () {
    var meeting_id = $(this).data('id');
    var meeting_title = $(this).data('title');


    localStorage.setItem('meeting_id', meeting_id);
  });

  function confirm_participants() {
    // get meetingid 
    var meeting_id = localStorage.getItem('meeting_id');

    // get the current meeting from localstorage

    var pObj = document.getElementsByClassName('meeting_participants');

    var query = 'confirm_participants';

    var members = [];
    for (var i = 0; i < pObj.length; i++) {
      var member = pObj[i];
      var member_id = member.getAttribute('id');
      var member_username = member.getAttribute('username');
      var member_checked = member.checked;
      if (member_checked == true) {


        members.push({ 'userID': member_id, 'username': member_username, 'meeting_id': 1 });
      }





    }

    console.log('members', members);

    // return;
    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: query, members: members, meeting: meeting_id },
      success: function (data) {
        console.log('Result', data);
      }
    })
  }



})