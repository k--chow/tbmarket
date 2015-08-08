
<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';


use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphNodes\GraphUser;
use Facebook\FacebookRequestException;




$fb = new Facebook\Facebook([
  'app_id' => '471108896405092',
  'app_secret' => '43e60542a8cefce4275e3556cd9c8963',
  'default_graph_version' => 'v2.3',
  //'default_access_token => isset($_SESSION['facebook_access_token']) ?'
  ]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  $previous = $e->getPrevious();
  echo $previous;
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No cookie set or no OAuth data could be obtained from cookie.';
  exit;
}
$response = $fb->get('/me?fields=id,name', $accessToken);
$user = $response->getGraphUser();

// Logged in
#echo '<h3>Access Token</h3>';
#var_dump($accessToken->getValue());

$_SESSION['fb_access_token'] = (string) $accessToken;



// User is logged in!
// You can redirect them to a members-only page.
//header('Location: https://localhost/textbookexchange/dash.php');
?>

