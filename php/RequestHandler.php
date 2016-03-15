<?php
    require_once './functions/ServerFunctions.php';

    class RequestHandler
    {
        private function handleTesti($content) {
            echo '<p>' . $content . '</p>';
        }

        public function handle($header, $content) {
        
            if (!is_string($header)) {

                echo "Input value is not correct!";
            } else {
            
                switch ($header) {
                
                    case 'testi':
                        $this->handleTesti($content);
                        break;
                    case 'arrayTest':
                        $dump1 = $_POST['content1'];
                        $dump2 = $_POST['content2'];
                        echo "<p>" . $dump1 . " " . $dump2 . "</p>";
                        break;
                    case 'getMessages':
                        // databasesta viestit
                    default:
                        break;
                }
            }
        }
    }
?>