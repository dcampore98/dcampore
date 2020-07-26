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
                    Meetings History
                </div>
                <div class="rvt-box__body">
                    
                    <div id="get_meeting_history">

                   
                    </div>
                </div>
                
            </div>
        </main>

    </div>
</div>

<script src="js/meeting.js"></script>

<?php
require_once('includes/footer.php');

?>