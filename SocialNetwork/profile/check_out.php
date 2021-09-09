<?php
if ((int)$_REQUEST['check'] === 1) {
    mysqli_query($link, "UPDATE msg SET readed_msg = '1' WHERE recipient_id='$user_id'") || die(mysqli_error($link));
}
if ((int)$_REQUEST['check'] === 2) {
    mysqli_query($link, "DELETE FROM msg WHERE recipient_id='$sender_id' and sender_id='$user_id' ||
                                                         recipient_id='$user_id' && sender_id='$sender_id'") ||
    die(mysqli_error($link));
    mysqli_query($link, "UPDATE msg SET readed_msg = '1' WHERE recipient_id='$user_id'") || die(mysqli_error($link));
}
if (isset($_REQUEST['check'])) {
    mysqli_query($link, "DELETE FROM msg WHERE recipient_id='$sender_id' and sender_id='$user_id' ||
                                                         recipient_id='$user_id' and sender_id='$sender_id'") || die(mysqli_error($link));
    mysqli_query($link, "UPDATE msg SET readed_msg = '1' WHERE recipient_id='$user_id'") || die(mysqli_error($link));
}
?>