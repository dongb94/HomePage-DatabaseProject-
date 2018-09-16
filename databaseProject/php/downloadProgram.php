
<?php
    //FTP에 접속하여 다운로드 받는 소스, 사용하지 않음    
    $ftp_user_name="superuser";
    $ftp_user_pass="team1";

    $ftp = ftp_connect("dongb94.ddns.net",21);
    $ftplogin = ftp_login($ftp, "$ftp_user_name", "$ftp_user_pass");

    $download = ftp_get($ftp, "C:\meat_cheiser.jar", "calendar.jar",1);

    ftp_quit ($ftp);

    //PHP파일의 절대경로를 알아내는 방법
    $file_server_path = realpath(_);
    echo ($path);
    
    $path = str_replace(basename(__FILE__), "", $file_server_path);
    echo ($path);
?>
<script>
    history.back();
</script>
