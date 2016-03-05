<?php
session_start();
ob_start();
if ( !isset($_SESSION['login']) ) {
    header('Location: /admin/login.php');
}


if ( isset($_GET['logout']) ) {
    session_destroy();
    header('Location: /admin/login.php');

}

require 'templates/header.php';

?>
    <?php
    if(isset($_SESSION['success'])) {
    ?>
    <div class="response-msg success ui-corner-all">
        <span>Thông báo thành công</span>
        <?php echo $_SESSION['success'];?>
    </div>
    <?php
        unset($_SESSION['success']);
    }
    ?>

    <?php
    if ( isset($_SESSION['error']) ) {
    ?>
    <div class="response-msg error ui-corner-all">
        <span>Thông báo thất bại</span>
        <?php echo $_SESSION['error']?>
    </div>
    <?php
        unset($_SESSION['error']);
    }
    ?>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.response-msg').fadeOut();
            }, 2000)
        });
    </script>
<?php
require 'core/content.php';


require 'templates/footer.php';

