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
                <div class="rvt-box__body">
                    <h4>Meeting Title: </h4>
                    <h4>Participants</h4>
                    <div id="get_meeting_members">

                    <?php


                    ?>
                    </div>
                </div>
                <div class="rvt-box__footer rvt-text-right">
                    Footer text
                </div>
            </div>
        </main>

    </div>
</div>

  

<?php
require_once('includes/footer.php');

?>