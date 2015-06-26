<?php

renderNotification(INFO_NOTIFICATION_SESSION_KEY, 'alert-success');
renderNotification(ERROR_NOTIFICATION_SESSION_KEY, 'alert-danger');

function renderNotification($notificationKey, $cssClass) {
    if (isset($_SESSION[$notificationKey]) && count($_SESSION[$notificationKey]) > 0) {
        echo '<div class="alert alert-dismissible ' . $cssClass . '">';
        echo '<button type="button" class="close" data-dismiss="alert">×</button>';
        foreach ($_SESSION[$notificationKey] as $msg) {
            echo htmlspecialchars($msg);
        }
        echo '</div>';
    }
    $_SESSION[$notificationKey] = [];
}