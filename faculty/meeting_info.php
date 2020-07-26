<?php
require_once('includes/header.php');
require_once('includes/navbar.php');

$meeting = $_GET['meeting_id'];

$meeting = (int)$meeting;
?>


<div class="rvt-grid">
    <?php require_once('includes/sidebar.php');?>

    <div class="rvt-grid__item">
        <main role="main" id="main-content">
            <div class="rvt-box">
                <div class="rvt-box__header">
                    Meeting Details
                </div>
                <div class="rvt-box__body" id="meeting_info">
                    
                </div>
                
            </div>


            <div class="rvt-box">
                <div class="rvt-box__header">
                    Meeting Participants
                </div>
                <div class="rvt-box__body" id="meeting_participants">
                    
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
       
        <div class="rvt-modal__body " >

                <h1>Was <span data-value=""  id="student_username"></span> available for the meeting?</h1>


        </div>
        <div class="rvt-modal__controls " >
            <button data-value="present"  type="button" class="participation rvt-button">YES</button>

            <button data-value="absent" type="button" class="participation rvt-button">NO</button>

           
        </div>
        <button type="button" class=" rvt-button rvt-modal__close" data-modal-close="modal-example-basic">
            <span class="rvt-sr-only">NO</span>
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                <path fill="currentColor" d="M9.41,8l5.29-5.29a1,1,0,0,0-1.41-1.41L8,6.59,2.71,1.29A1,1,0,0,0,1.29,2.71L6.59,8,1.29,13.29a1,1,0,1,0,1.41,1.41L8,9.41l5.29,5.29a1,1,0,0,0,1.41-1.41Z"/>
            </svg>
        </button>
    </div>
</div>
<script src="js/meeting.js"></script>

<?php
require_once('includes/footer.php');

?>