<?php

    // require requesthandler, fatal error if not found
    require("./RequestHandler.php");
    
    // create handler with header and content
    $handler = new RequestHandler();
    $handler->handle($_POST['header'], $_POST['content']);
?>