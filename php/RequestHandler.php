<?php
    class RequestHandler {

        private function handleTesti($content) {
            echo $content;
        }

        public function handle($header, $content) {
        
            if (!is_string($header) || !is_string($content)) {

                echo "Input value is not correct!";
            } else {
            
                switch ($header) {
                
                    case 'testi':
                        $this->handleTesti($content);
                        break;
                    default:
                        break;
                }
            }
        }
    }
?>