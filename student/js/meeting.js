$(document).ready(function () {

  load_history();
  function load_history() {
    // load member id from local storage 
    var member_id = localStorage.getItem('user_id');
    member_id = 1;

    $.ajax({
      url: 'action.php',
      type: 'POST',
      data: { query: 'load_user_meeting_history', member_id: member_id },
      success: function (data) {
        console.log('history', data);
        var { result } = JSON.parse(data);
        var resultDiv = '';
        result.map(res => {
          var badge = res.status == "present" ? "info" : (res.status == "absent" ? "danger" : "");
          var status = res.status == "present" ? "present" : (res.status == "absent" ? "Absent" : "no grade");
          resultDiv += `<span><h5>${res.title}</h5>
          <span><b>Started</b>
          ${res.start}
          </span>
          <span>
          <b>Ended: </b>
          ${res.end}
          </span>
          <p>
            <b>Status</b>
            
            <span class="rvt-badge rvt-badge--${badge}">${status}
          </span>
          </p>
          

         
          `;
        });





        $("#get_meeting_history").html(resultDiv);

      }

    })
  }
})