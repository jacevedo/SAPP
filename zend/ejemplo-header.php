<?php
$headers = apache_request_headers();
echo(json_encode($headers));


?>