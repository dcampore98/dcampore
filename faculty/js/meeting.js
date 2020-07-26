$(document).ready(function () {





  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }


  var test = getParameterByName("meeting_id");

  getDetails(test);

  getParticipants(test);





  // get all information about the meeting 

  // get meeting details such as name start date and end date 

  function getDetails(val) {

    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: 'get_meeting_details', meeting_id: val },
      success: function (data) {

        var { result } = JSON.parse(data);
        console.log('meeting details', result);
        var resultDiv = '';

        result.map(res => {
          resultDiv += `<div class="rvt-panel rvt-panel--light">
          <p class="rvt-m-all-remove"><b>Title:</b>${res.title}</p>
          <p class="rvt-m-all-remove"><b>Start:</b>${res.start}</p>
          <p class="rvt-m-all-remove"><b>End:</b>${res.end}</p>
          <p class="rvt-m-all-remove"><b>NOTES:<textarea disabled>${res.description}</textarea>  </div>`;
        });





        $("#meeting_info").html(resultDiv);



      }

    })
  }


  function getParticipants(val) {


    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: 'get_meeting_participants', meeting_id: val },
      success: function (data) {

        console.log('participants', data);
        var { result } = JSON.parse(data);
        console.log('meeting details', result.length);
        var resultDiv = '';

        if (result.length > 0) {
          result.map(res => {
            var badge = res.status == "present" ? "info" : (res.status == "absent" ? "danger" : "");
            var status = res.status == "present" ? "present" : (res.status == "absent" ? "Absent" : "no grade");
            resultDiv += `<div class="rvt-panel rvt-panel--light">
            
           
            <p class="rvt-m-all-remove"><b>Student ID:</b>${res.student_id}</p>
            <p class="rvt-m-all-remove"><b>Student Name:</b>${res.username}</p>
  
            <p class="rvt-m-all-remove"><b>Student Status:</b>
            <span class="rvt-badge rvt-badge--${badge}">${status}</span>
  
            <span>
            <button class="grade_student" data-id=${res.student_id} data-username=${res.username} 
            data-meeting=${res.meeting_id}
            data-modal-trigger="modal-example-basic" >Grade Student</button>
            </span>
  
            </p>
  
  
  
            </div>`;
          });
        }
        else {
          resultDiv = `<h2 class="rvt-ts-32
          rvt-ts-lg">No Team For This Day</h2>`;
        }






        $("#meeting_participants").html(resultDiv);



      }

    })

  }



  // grade student participation

  //  check meeting status 


  // load history


  load_history();
  function load_history() {


    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: 'load_meeting_history' },
      success: function (data) {
        console.log('history', data);
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          var badge = res.status == "present" ? "info" : (res.status == "absent" ? "danger" : "");
          var status = res.status == "present" ? "present" : (res.status == "absent" ? "Absent" : "no grade");
          resultDiv += `
          <div class="rvt-box">
            <div class="rvt-box__body">
          <span><h5>${res.title}</h5>
          <span><b>Started</b>
          ${res.start}
          </span>
          <span>
          <b>Ended: </b>
          ${res.end}
          </span>

          <span>
          <a class="rvt-button rvt-button--small" href="history_details.php?meeting_id=${res.id}" >View Details</a>
          </span>
          </div>
          </div>

          
          

         
          `;
        });





        $("#get_meeting_history").html(resultDiv);

      }

    })
  }


  // alert();

  // record student participation

  // pass the student id to the modal


  $(document).on("click", ".grade_student", function () {

    var student_id = $(this).data('id');

    var student_username = $(this).data('username');
    var meeting_id = $(this).data('meeting');



    $("#student_username").html(student_username);
    $("#student_username").attr('data-value', student_id);
    $("#student_username").attr('data-meeting', meeting_id);


  })

  $(".participation").on("click", function () {

    var result = $(this).data('value');
    var student_id = $("#student_username").data('value');
    var meeting_id = test;





    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: 'grade_student', result: result, student_id: student_id, meeting_id: meeting_id },
      success: function (data) {
        console.log('participation', data);
      }
    })


  })
})


