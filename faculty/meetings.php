<?php
session_start();

var_dump($_SESSION);
require_once('includes/header.php');
require_once('includes/navbar.php');

?>


<div class="rvt-grid">
    <?php require_once('includes/sidebar.php');?>

    <div class="rvt-grid__item">
        <main role="main" id="main-content">
            <div class="rvt-box">
                <div class="rvt-box__header">
                    Scheduled Meetings
                </div>
                <div class="rvt-box__body" id="meetings_list">
                    <p class="rvt-m-all-remove">
                          
                    </p>
                </div>
                <div class="rvt-box__footer rvt-text-right">
                </div>
            </div>

            

            
        </main>

    </div>
</div>



<div class="rvt-modal"
     id="modal-example-basic"
     role="dialog"
     aria-labelledby="modal-example-title"
     aria-hidden="true"
     tabindex=-1>
     <div class="rvt-modal__inner">
        <header class="rvt-modal__header">
            <h1 class="rvt-modal__title" id="modal-example-title">Edit Meeting<span id="" data-id=""></span></h1>
        </header>
        <div class="rvt-modal__body " >
        <input type="hidden" id="edit_meeting_id" value="">
          <label for="demo-1">Meeting Title</label>
          <input type="text" id="edit_meeting_title" aria-describedby="demo-1-note">
          <small id="demo-1-note" class="rvt-display-block rvt-m-bottom-md">This is a note about this field.</small>

          <label for="demo-1">Start Date</label>
          <input type="datetime-local" id="edit_meeting_start"  value="">


          <label for="demo-1">End Date</label>
          <input type="datetime-local" id="edit_meeting_end"  value="">


          <label for="textarea-info-state" class="rvt-m-top-md">Meeting Notes</label>


          <textarea type="text" id="textarea-info-state" class="rvt-validation-info" aria-describedby="message-message"></textarea>       



        </div>
        <div class="rvt-modal__controls " >
            <button id="edit_meeting_submit" type="button" class="rvt-button">Save</button>
            <button type="button" class="rvt-button rvt-button--secondary" data-modal-close="modal-example-basic">Cancel</button>
        </div>
        <button type="button" class="rvt-button rvt-modal__close" data-modal-close="modal-example-basic">
            <span class="rvt-sr-only">Close</span>
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                <path fill="currentColor" d="M9.41,8l5.29-5.29a1,1,0,0,0-1.41-1.41L8,6.59,2.71,1.29A1,1,0,0,0,1.29,2.71L6.59,8,1.29,13.29a1,1,0,1,0,1.41,1.41L8,9.41l5.29,5.29a1,1,0,0,0,1.41-1.41Z"/>
            </svg>
        </button>
    </div>
</div>
  

<?php
require_once('includes/footer.php');

?>
