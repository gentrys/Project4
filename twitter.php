<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="tweetLinkIt.js"></script>

<script>
    function pageComplete(){
    $('.tweet').tweetLinkify();
    }
</script>

<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "913556940-1IhvT3nCwAcS4c7XlsJp25ErmHYSKqh1mqvfgUub",
    'oauth_access_token_secret' => "pMqH1O5iiTcQH2Fqb3NUFlAw39Q057tbywV44IAJX1IsS",
    'consumer_key' => "6nBWQ2v43f1MNwufMh0hzXQlv",
    'consumer_secret' => "WdLresLmyUK49kzvCDw6vIhjVvenrlctStFQ3FFsgSZ6eCb1qz"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = "?q=nfl";

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);

/** Perform a POST request and echo the response **/
//$twitter = new TwitterAPIExchange($settings);
//echo $twitter->buildOauth($url, $requestMethod)
  //           ->setPostfields($postfields)
    //         ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
//$url = 'https://api.twitter.com/1.1/followers/ids.json';
//$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);
             

foreach($string['statuses'] as $items)
{
    echo "<div class='row twitter'>";
    echo "<div class='profile-image'>" . "<img src='", $items['user']['profile_image_url'], "'>" . "</div>" .
    "<div class='name'>" . $items['user']['name']  . "</div>" . "<br/>" .
    "<div class='screen-name'>" . "@" . $items['user']['screen_name'] . "</div>" . "<br/>";
    
    echo "<div class='tweet'>" . $items['text'] . "<br/>" . "</div>";
    echo "</div>";


}

echo "<script>pageComplete();</script>;"

//echo "----------------<br/>";
//echo $twitter->setGetfield($getfield)
  //           ->buildOauth($url, $requestMethod)
    //         ->performRequest();


?>
