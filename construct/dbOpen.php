<?php
	if(!function_exists("ts_debug")) {
		function ts_debug($message) {
				echo "<br><i><strong>Debug info:</strong></i><br>";
				echo "<i>{$message}</i><br><br>";
			}
		}
    $connection = mysqli_connect('localhost', 'root', '', 'documentFlow');
    if($connection){
        #ts_debug("Database running. Processing data.");
}
?>