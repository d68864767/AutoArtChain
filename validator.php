```php
<?php
// Include the configuration file
require_once 'config.php';

class Validator {
    private $rulesPath;

    public function __construct() {
        $this->rulesPath = VALIDATION_RULES_PATH;
    }

    // Function to validate data
    public function validate($data, $rules) {
        $errors = [];

        // Load the validation rules
        $validationRules = json_decode(file_get_contents($this->rulesPath), true);

        // Iterate over each rule
        foreach ($rules as $field => $rule) {
            // If the rule exists in the validation rules
            if (isset($validationRules[$rule])) {
                // If the data does not pass the rule
                if (!$validationRules[$rule]($data[$field])) {
                    // Add an error for this field
                    $errors[$field] = "The $field field is invalid.";
                }
            }
        }

        // If there are any errors
        if (!empty($errors)) {
            // Throw an exception with the errors
            throw new Exception(json_encode($errors));
        }
    }
}

// Create an instance of the Validator class
$validator = new Validator();

// Example usage:
// $data = ['image' => 'path/to/image.jpg'];
// $rules = ['image' => 'imageExists'];
// try {
//     $validator->validate($data, $rules);
// } catch (Exception $e) {
//     // Handle the validation errors
//     echo $e->getMessage();
// }
?>
```
