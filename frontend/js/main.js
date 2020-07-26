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

        // return;

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
          <button  class="add_member rvt-button" meeting_id=${res.id}>Add Participants</button>
          </span>
          <span><button meeting_id=${res.id} class="delete_meeting rvt-button rvt-button--danger">Delete</button></span>
          </span>
          <span><button meeting_id=${res.id} class="delete_meeting rvt-button rvt-button--danger">Meeting Info</button></span>
          </span>
          `;
        });





        $("#meetings_list").html(resultDiv);
        delete_meeting();
        add_participants_to_meeting();
      }
    })
  }



  // on click on add participants modal 

  function add_participants_to_meeting() {


    $(".add_member").on('click', function (e) {
      e.preventDefault();


      $("#modal-example-basic").show();
    })
  }


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


  // choose meeting participants

  function choose_participants() {

    const meeting_id = $(this).attr('meeting_id');

    $.ajax({
      url: 'action.php',
      type: "POST",
      data: { query: 'getAllUsers' },
      success: function (data) {
        var { result } = JSON.parse(data);



        console.log(result);

        var resultDiv = '';


        result.map(res => {
          resultDiv += `
          <p>
          <input class="meeting_participants" type="checkbox" name="checkbox-demo" meeting_id="${meeting_id}" id="${res.id}" username="${res.username}">
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

        $(".choose_participants").html(def);

      }
    })
  }

  choose_participants();



  // on click of confirm meeting members

  $("#confirm_members").on("click", function (e) {
    confirm_participants();
  })

  function confirm_participants() {



    var pObj = document.getElementsByClassName('meeting_participants');

    var query = 'confirm_participants';

    var members = [];
    for (var i = 0; i < pObj.length; i++) {
      var member = pObj[i];
      var member_id = member.getAttribute('id');
      var member_username = member.getAttribute('username');
      var member_checked = member.checked;
      var meeting_id = member.getAttribute('meeting_id');
      if (member_checked == true) {


        members.push({ 'userID': member_id, 'username': member_username, 'meeting_id': 1 });
      }





    }

    console.log('members', members);

    return;
    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: query, members: members },
      success: function (data) {
        console.log('Result', data);
      }
    })
  }



})