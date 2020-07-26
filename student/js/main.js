// only admins should be able edit/delete calendar

$(document).ready(function () {
  load_my_meetings();
  load_all_meetings();


  loadTeam();

  // fullCalendar starts
  let calendar = $('#calendar').fullCalendar({
    editable: false,
    header: {
      left: 'prev, next, today',
      center: 'title',
      right: 'month, agendaWeek, agendaDay'

    },
    events: 'load.php',
    selectable: false,
    selectHelper: false,



  });
  // full calendar ends here 


  // load meetings

  function load_my_meetings() {
    $.ajax({
      url: "action.php",
      type: "POST",
      data: { query: 'loadMyMeetings' },
      success: function (data) {
        console.log('res', data);
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          resultDiv += `<span><h5>${res.title}</h5>
          <span>
          <b>Starts:</b>
          ${moment(res.start)}
          </span>
          <span>
          <b>Ends:</b>

          ${moment(res.end)}
          </span>
          
          
          <span><a  target="_blank" href="meeting_info.php?meeting_id=${res.id}" class=" rvt-button rvt-button--success">Meeting Info</a></span>
          </span>

          <span><a  target="_blank" href="meeting.php?meeting_id=${res.id}" class=" rvt-button rvt-button">Join Meeting</a></span>
          </span>
          `;
        });





        $("#meetings_list").html(resultDiv);

      }
    })
  }

  // end of load meetings 


  // on click on add participants modal 




  function load_all_meetings() {
    $.ajax({
      url: "action.php",
      type: "POST",
      data: { query: 'getAllMeetings' },
      success: function (data) {
        console.log('res', data);
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          resultDiv += `<span><h5>${res.title}</h5>
          <span><b>Starts: </b>
          ${res.start}
          </span>
          <span>
          <b>Ends: </b>
          ${res.end}
          </span>
          
          
          <span><a  target="_blank" href="meeting_sign.php?meeting_id=${res.id}" class=" rvt-button rvt-button--success">Meeting Info</a></span>
          </span>

          <span><a  id="confirm_members" data-id=${res.id} data-title="${res.title}" data-modal-trigger="modal-example-basic-all" class=" rvt-button rvt-button">SignUp</a></span>
          </span>
          `;
        });





        $("#all_meetings_list").html(resultDiv);

      }
    })
  }










  // pass meeting id to modal 
  $(document).on("click", ".add_team ", function () {
    var meeting_id = $(this).data('id');
    var meeting_title = $(this).data('title');


    localStorage.setItem('meeting_id', meeting_id);
  });

  // function confirm_participants() {
  //   // get meetingid 
  //   var meeting_id = localStorage.getItem('meeting_id');

  //   // get the current meeting from localstorage

  //   var pObj = document.getElementsByClassName('meeting_participants');

  //   var query = 'confirm_participants';

  //   var members = [];
  //   for (var i = 0; i < pObj.length; i++) {
  //     var member = pObj[i];
  //     var member_id = member.getAttribute('id');
  //     var member_username = member.getAttribute('username');
  //     var member_checked = member.checked;
  //     if (member_checked == true) {


  //       members.push({ 'userID': member_id, 'username': member_username, 'meeting_id': 1 });
  //     }





  //   }

  //   console.log('members', members);

  //   // return;
  //   $.ajax({
  //     url: 'action.php',
  //     type: 'POST',
  //     data: { query: query, members: members, meeting: meeting_id },
  //     success: function (data) {
  //       console.log('Result', data);
  //     }
  //   })
  // }


  // load team members 



  //save student data in local storage 





  function loadTeam() {

    // get student team from local storage

    var get = $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: 'loadTeam' },
      success: function (data) {
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          resultDiv += `
          <p>
          <input class="meeting_participants" type="checkbox" checked   readonly >
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



  $("#confirm_meeting").on("click", function (e) {

    e.preventDefault();
    console.log('clciked');

    var meeting_id = $("#meeting_title_id").data("value");
    console.log('meeting_id', meeting_id);

    // submit meeting creation
    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: {
        query: 'createMeeting',
        meeting_id: meeting_id
      },
      success: function (data) {
        console.log(data);



        $("#modal-example-basic-all > .rvt-modal__inner > .choose_participants").html("<h1>saved</h1>");


      }
    })
  })




  // pass meeting details to modal 

  $(document).on("click", "#confirm_members", function () {
    var meeting_id = $(this).data('id');
    var meeting_title = $(this).data('title');


    // localStorage.setItem('meeting_id', meeting_id);
    // localStorage.setItem('meeting_title', meeting_title);


    console.log('meeting_id', meeting_id);
    console.log('meeting_title', meeting_title);


    $("#meeting_title").html(meeting_title);
    meeting_title_id

    $("#meeting_title_id").attr('data-value', meeting_id);

  });

  // 

})