<?php
if (!class_exists('cyn_sms')) {

  class cyn_sms
  {
    private const username = "09106762079";
    private const password = "12345678";
    private const from = "3000505";
    private const verification_pattern = "42d3urtbfhm6p8g";

    function __construct()
    {
    }

    public function cyn_send_verification($to, $code)
    {
      $input_data = array(
        'verification-code' => $code
      );
      $url = 'https://ippanel.com/patterns/pattern?';
      $url .= 'username='      . self::username;
      $url .= '&password='     . urlencode(self::password);
      $url .= '&from='         . self::from;
      $url .= '&to='           . json_encode($to);
      $url .= '&input_data='   . urlencode(json_encode($input_data));
      $url .= '&pattern_code=' . self::verification_pattern;

      $handler = curl_init($url);
      curl_setopt($handler, CURLOPT_CUSTOMREQUEST, 'POST');
      curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
      curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($handler);

      return $response;
    }
  }
}