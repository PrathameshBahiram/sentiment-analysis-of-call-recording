

<?php 
include('vendor/autoload.php');
use Sentiment\Analyzer;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Create a new analyzer object
  $analyzer = new Analyzer();

  // Get the input text from the form
  $text = $_POST['text'] ?? '';

  // Analyze the sentiment of the input text
  $output = $analyzer->getSentiment($text);

  // Store the different parts of the result in an array
  $result = array(
    'neutral' => $output['neu'] ?? null,
    'positive' => $output['pos'] ?? null,
    'negative' => $output['neg'] ?? null,

  );

  // Loop through the array and display the contents
  foreach ($result as $key => $value) {
    echo $key . ': ';
    if (is_array($value)) {
      echo implode(', ', $value) . PHP_EOL;
    } else {
      echo $value . PHP_EOL;
    }
  }

  // Find the highest sentiment value and its corresponding label
  $highest_sentiment = max($result);
  if ($highest_sentiment == $result['neutral']) {
    $sentiment_label = 'Neutral';
  } elseif ($highest_sentiment == $result['positive']) {
    $sentiment_label = 'Positive';
  } elseif ($highest_sentiment == $result['negative']) {
    $sentiment_label = 'Negative';
  }

  echo 'Highest sentiment value: ' . $highest_sentiment . PHP_EOL;
  echo 'Sentiment recognised : ' . $sentiment_label . PHP_EOL;
}
?>


