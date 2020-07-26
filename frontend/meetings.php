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
                    Upcoming Meetings
                </div>
                <div class="rvt-box__body" id="meetings_list">
                    <p class="rvt-m-all-remove">
                          
                    </p>
                </div>
                <div class="rvt-box__footer rvt-text-right">
                </div>
            </div>

            <div class="rvt-box">
                <div class="rvt-box__header">
                    Create New Meeting
                </div>
                <div class="rvt-box__body">
                  <div class="rvt-grid">

                    <div class="rvt-grid__item_8">
                      <label for="demo-1">Meeting Name</label>
                      <input type="text" id="demo-1" aria-describedby="demo-1-note">
                      <small id="demo-1-note" class="rvt-display-block rvt-m-bottom-md">Please Ensure to use a descriptive name.</small>
                    </div>


                    
                  </div>

                <div class="rvt-grid">
                  <div class="rvt-grid__item">
                    <label for="demo-1">Meeting Description</label>

                    <textarea type="text" id="textarea-success-state" class="rvt-validation-success" aria-describedby="essay-message"></textarea>
                  </div>
                </div>

                <div class="rvt-grid">
                  <div class="rvt-grid__item">
                    <label for="demo-1">Choose Time and Date</label>

                    <textarea type="text" id="textarea-success-state" class="rvt-validation-success" aria-describedby="essay-message"></textarea>
                  </div>
                </div>


                <div class="rvt-grid">
                  <div class="rvt-grid__item">
                    <label for="demo-1">Choose Meeting Type</label>

                    <textarea type="text" id="textarea-success-state" class="rvt-validation-success" aria-describedby="essay-message"></textarea>
                  </div>
                </div>



                <div class="rvt-grid">
                  <div class="rvt-grid__item">
                    <label for="demo-1">Select Meeting Participants</label>

                    <textarea type="text" id="textarea-success-state" class="rvt-validation-success" aria-describedby="essay-message"></textarea>
                  </div>
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
            <h1 class="rvt-modal__title" id="modal-example-title">Add Participants</h1>
        </header>
        <div class="rvt-modal__body" >
            <p></p>
        </div>
        <div class="rvt-modal__controls " id="confirm_members">
            <button type="button" id="submit_participants" class="rvt-button">Continue</button>
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
