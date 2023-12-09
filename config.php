```php
<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'autoartchain');

// OpenSea API configuration
define('OPENSEA_API_KEY', 'your_opensea_api_key_here');

// Social media API configuration
define('TWITTER_API_KEY', 'your_twitter_api_key_here');
define('TWITTER_API_SECRET_KEY', 'your_twitter_api_secret_key_here');
define('TWITTER_ACCESS_TOKEN', 'your_twitter_access_token_here');
define('TWITTER_ACCESS_TOKEN_SECRET', 'your_twitter_access_token_secret_here');

// AI Model configuration
define('AI_MODEL_PATH', '/path/to/your/ai/model');

// Error handling configuration
define('ERROR_LOG_PATH', '/path/to/your/error/log');

// Image generation configuration
define('IMAGE_OUTPUT_PATH', '/path/to/your/generated/images');

// Validation configuration
define('VALIDATION_RULES_PATH', '/path/to/your/validation/rules');

// Ensure errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
```
