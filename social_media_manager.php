```php
<?php
// Include the configuration file
require_once 'config.php';

// Include TwitterOAuth library
require_once 'TwitterOAuth.php';

class SocialMediaManager {
    private $twitter;

    public function __construct() {
        // Create a new TwitterOAuth instance
        $this->twitter = new TwitterOAuth(TWITTER_API_KEY, TWITTER_API_SECRET_KEY, TWITTER_ACCESS_TOKEN, TWITTER_ACCESS_TOKEN_SECRET);
    }

    // Function to post a tweet
    public function postTweet($message, $imagePath) {
        // Upload the image to Twitter
        $media = $this->twitter->upload('media/upload', ['media' => $imagePath]);

        // Post the tweet with the uploaded image
        $parameters = [
            'status' => $message,
            'media_ids' => $media->media_id_string,
        ];
        $result = $this->twitter->post('statuses/update', $parameters);

        // Check if there were any errors
        if ($this->twitter->getLastHttpCode() != 200) {
            // Handle error
            $error = 'Error posting tweet: ' . $result->errors[0]->message;
            file_put_contents(ERROR_LOG_PATH, $error.PHP_EOL , FILE_APPEND);
            return false;
        }

        return true;
    }

    // Function to promote an image on social media
    public function promoteImage($imagePath, $description) {
        // Create a message for the tweet
        $message = $description . ' Check it out on OpenSea: ' . OPENSEA_API_KEY . '/' . $imagePath;

        // Post the tweet
        return $this->postTweet($message, $imagePath);
    }
}
?>
```
