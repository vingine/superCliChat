<?php

    // require requesthandler, fatal error if not found
    require("./RequestHandler.php");
    
    // TODO: decode url

    // create handler with header and content
    $handler = new RequestHandler();
    $handler->handle($_POST['header']);
?>