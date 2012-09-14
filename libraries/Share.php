<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Share {

  protected $CI;
  public function __construct($rules = array())
  {
    $this->CI =& get_instance();
  }



  public function twitter_post( $post, $config, $user)
  {
    $text = empty($post['text']) ? 'Join me on Clicbye' : $post['text'] ;
    $url = empty($post['url']) ? base_url('/') : $post['url'] ;
    $hashtag = empty($post['hashtag']) ? 'clicbye' : $post['hashtag'] ;

    $this->CI->load->spark('oauth/0.3.1');
    $consumer = $this->CI->oauth->consumer($config);
    $provider = $this->CI->oauth->provider('twitter');
    $token = OAuth_Token::forge('request', $user);
    $request = OAuth_Request::forge('resource', 'POST', 'http://api.twitter.com/1/statuses/update.json', array(
      'oauth_consumer_key' => $consumer->key,
      'oauth_token' => $token->access_token,
      'status' => $text.' '.$url.' #'.$hashtag,
    ));

    // Sign the request using the consumer and token
    $request->sign($provider->signature, $consumer, $token);

    try 
    {
      $request->execute();
    }
    catch (Exception $e)
    {
      app_debug($e);
      $msg = $e->getMessage();
      return array('error' => "Twitter error: ".preg_replace('/".*/', '', preg_replace('/.*error":"/', '', $msg)) , 'e' => $e);
    }
    return array('error' =>  FALSE);

  }



  public function facebook_post( $post, $config, $user)
  {
    $text = empty($post['text']) ? 'Join me on Clicbye' : $post['text'] ;
    $url = empty($post['url']) ? base_url('/') : $post['url'] ;
    $heading = empty($post['heading']) ? 'Join me on Clicbye' : $post['heading'] ;
    $description = empty($post['description']) ? 'Clicbye is an upcoming local advertisement network' : $post['description'] ;

    $attachment =  array(
      'access_token' => $user['access_token'],
      'message' => $text,
      'name' => $heading,
      'link' => $url,
      'description' => $description,
    );

    try 
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,'https://graph.facebook.com/'.$user['uid'].'/feed');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $attachment);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output 
      $result = json_decode(curl_exec($ch), true);
      curl_close ($ch);
    }
    catch (Exception $e)
    {
      $msg = $e->getMessage();
      return array('error' => "Error: ".preg_replace('/".*/', '', preg_replace('/.*error":"/', '', $msg)) , 'e' => $e);
    }
    $res = array('error' =>  FALSE);
    if(isset($result['error'])) 
    {
      app_debug($result);
      $res = array('error'=> 'Facebook error: Posting to facebook failed. Try again.');
     if($result['error'] && $result['error']['message'])
      return array('error' =>  "Facebook error: ".preg_replace('/\(\#\d*\)/','',$result->error->message));
    }
    return $res;

  }

}

