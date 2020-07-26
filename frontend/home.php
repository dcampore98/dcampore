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
                    Welcome dcampore
                </div>
                <div class="rvt-box__body">
                    <h1>Upcoming Meetings</h1>
                    <div id='calendar'></div>

                </div>
                
            </div>
        </main>

    </div>
</div>

  

<?php
require_once('includes/footer.php');

?>