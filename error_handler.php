```php
<?php
// Include the configuration file
require_once 'config.php';

class ErrorHandler {
    private $logPath;

    public function __construct() {
        $this->logPath = ERROR_LOG_PATH;
    }

    // Function to log errors
    public function logError($errorMessage) {
        // Append the error message to the error log
        file_put_contents($this->logPath, $errorMessage.PHP_EOL , FILE_APPEND);
    }

    // Function to display errors
    public function displayError($errorMessage) {
        // Display the error message
        echo "Error: " . $errorMessage;
    }

    // Function to handle errors
    public function handleError($errorMessage, $displayError = true) {
        // Log the error
        $this->logError($errorMessage);

        // Display the error if $displayError is true
        if ($displayError) {
            $this->displayError($errorMessage);
        }
    }
}

// Create an instance of the ErrorHandler class
$errorHandler = new ErrorHandler();
?>
```
