<?php

use App\Etemplate;
use App\GeneralSettings;
use App\Advertisment;
use Mail as Mail;


if (!function_exists('convertBitcoinToUsd')) {

    function convertBitcoinToUsd($usdCost) {
        $url = "https://blockchain.info/stats?format=json";
        $stats = json_decode(file_get_contents($url), true);
        $btcValue = $stats['market_price_usd'];

        $convertedCost = $usdCost / $btcValue;

        return $convertedCost;
    }
    
}

if (!function_exists('convertDcoToBitcoin')) {

    function convertDcoToBitcoin($dcoCost) {
        $url = "https://blockchain.info/stats?format=json";
        $stats = json_decode(file_get_contents($url), true);
        $btcValue = $stats['market_price_usd'];

        $convertedCost = ($dcoCost / $btcValue) / 10;

        return $convertedCost;
    }
    
}

if (!function_exists('convertDco')) {

    function convertDco($dcoAmount, $rate) {
        $convertedCost = ($dcoAmount * $rate);
        return $convertedCost;
    }
    
}

if (!function_exists('getBitcoinRate')) {

    function getBitcoinRate() {
        $url = "https://blockchain.info/stats?format=json";
        $stats = json_decode(file_get_contents($url), true);
        $btcValue = $stats['market_price_usd'];
        return $btcValue;
    }
    
}

if (!function_exists('secondsToTime')) {

    function secondsToTime($seconds) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
    }
    
}

if (!function_exists('randomNumberGenerator')) {

    function randomNumberGenerator() {
      return (float)rand()/(float)getrandmax();
    }
    
}

if (!function_exists('getRandomWeightedElement')) {

        /**
        * getRandomWeightedElement()
        * Utility function for getting random values with weighting.
        * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
        * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
        * The return value is the array key, A, B, or C in this case.  Note that the values assigned
        * do not have to be percentages.  The values are simply relative to each other.  If one value
        * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
        * chance of being selected.  Also note that weights should be integers.
        * 
        * @param array $weightedValues
        */
        function getRandomWeightedElement(array $weightedValues) {
            $rand = mt_rand(1, (int) array_sum($weightedValues));

            foreach ($weightedValues as $key => $value) {
              $rand -= $value;
              if ($rand <= 0) {
                return $key;
              }
            }
        }
}


if (!function_exists('send_email')) {

    function send_email($to, $name, $subject, $message)
    {
        $temp = Etemplate::first();
        $gnl = GeneralSettings::first();
        $template = $temp->emessage;
        $from = $temp->esender;
        if ($gnl->email_notification == 1) {
            $headers = "From: $gnl->title <$from> \r\n";
            $headers .= "Reply-To: $gnl->title <$from> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $mm = str_replace("{{name}}", $name, $template);
            $message = str_replace("{{message}}", $message, $mm);

            if (@mail($to, $subject, $message, $headers)) {
                // echo 'Your message has been sent.';
            } else {
                //echo 'There was a problem sending the email.';
            }
        }
    }
}


if (!function_exists('send_sms')) {

    function send_sms($to, $message)
    {
        $temp = Etemplate::first();
        $gnl = GeneralSettings::first();
        if ($gnl->sms_notification == 1) {
            $sendtext = urlencode($message);
            $appi = $temp->smsapi;
            $appi = str_replace("{{number}}", $to, $appi);
            $appi = str_replace("{{message}}", $sendtext, $appi);
            $result = file_get_contents($appi);
        }
    }
}


if (!function_exists('notify')) {
    function notify($user, $subject, $message)
    {
        send_email($user->email, $user->fname, $subject, $message);
        send_sms($user->mobile, strip_tags($message));
    }
}


if (!function_exists('send_email_verification')) {
    function send_email_verification($to, $name, $subject, $message)
    {
        $temp = Etemplate::first();
        $gnl = GeneralSettings::first();
        $template = $temp->emessage;
        $from = $temp->esender;

        // $headers = "From: $gnl->title <$from> \r\n";
        // $headers .= "Reply-To: $gnl->title <$from> \r\n";
        // $headers .= "MIME-Version: 1.0\r\n";
        // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $template = str_replace("{{image}}", asset('assets/images/logo/logo.png') , $template);
        $mm = str_replace("{{app_name}}", config('app.name') , $template);
        $message = str_replace("{{message}}", $message, $mm);

        try {
            Mail::send(['html' => 'emails.email_scaffolding'], ['text' => $message],
                    function ($message) use ($to, $name, $from, $subject) {
                        $message->to($to)
                        ->from($from)
                        ->subject($subject);
                    }
            );

            return Response::json(['code' => 200, 'msg' => 'Sent successfully']);

        } catch (Exception $ex) {
            return $ex;
        }  
        // if (@mail($to, $subject, $message, $headers)) {
        //     // echo 'Your message has been sent.';
        // } else {
        //     //echo 'There was a problem sending the email.';
        // }
    }
}

if (!function_exists('bladeCompile')) {
    function bladeCompile($value, array $args = array())
    {
        $generated = \Blade::compileString($value);

        ob_start() and extract($args, EXTR_SKIP);

        // We'll include the view contents for parsing within a catcher
        // so we can avoid any WSOD errors. If an exception occurs we
        // will throw it out to the exception handler.
        try
        {
            eval('?>'.$generated);
        }

        // If we caught an exception, we'll silently flush the output
        // buffer so that no partially rendered views get thrown out
        // to the client and confuse the user with junk.
        catch (\Exception $e)
        {
            ob_get_clean(); throw $e;
        }

        $content = ob_get_clean();

        return $content;
    }
}


if (!function_exists('send_sms_verification')) {

    function send_sms_verification($to, $message)
    {
        $temp = Etemplate::first();
        $gnl = GeneralSettings::first();
        if ($gnl->sms_verification == 1) {
            $sendtext = urlencode($message);
            $appi = $temp->smsapi;
            $appi = str_replace("{{number}}", $to, $appi);
            $appi = str_replace("{{message}}", $sendtext, $appi);
            $result = file_get_contents($appi);
        }
    }
}


function show_add($size)
{
    $adds = Advertisment::where('size', $size)->inRandomOrder()->first();

    if ($adds) {
        return view('partials.adds', compact('adds'));
    }
}


if (!function_exists('send_contact')) {

    function send_contact($from, $name, $subject, $message)
    {
        $temp = Etemplate::first();
        $to = $temp->esender;

        $headers = "From: $name <$from> \r\n";
        $headers .= "Reply-To: $name <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mm = "Hi Sir," . "<br><br>";
        $thanks = "Thanks, <br> <strong>$name</strong>";
        $message = $mm . $message . $thanks;

        if (@mail($to, $subject, $message, $headers)) {
            // echo 'Your message has been sent.';
        } else {
            //echo 'There was a problem sending the email.';
        }

    }
}



// For Paytm
if(!function_exists("encrypt_e")) {
    function encrypt_e($input, $ky) {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
        return $data;
    }
}

if(!function_exists("decrypt_e")) {
    function decrypt_e($crypt, $ky) {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
        return $data;
    }
}

if(!function_exists("pkcs5_pad_e")) {
    function pkcs5_pad_e($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
}

if(!function_exists("pkcs5_unpad_e")) {
    function pkcs5_unpad_e($text) {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text))
            return false;
        return substr($text, 0, -1 * $pad);
    }
}

if(!function_exists("generateSalt_e")) {
    function generateSalt_e($length) {
        $random = "";
        srand((double) microtime() * 1000000);

        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";

        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }

        return $random;
    }
}


if(!function_exists("checkString_e")) {
    function checkString_e($value) {
        $myvalue = ltrim($value);
        $myvalue = rtrim($myvalue);
        if ($myvalue == 'null')
            $myvalue = '';
        return $myvalue;
    }
}

if(!function_exists("getChecksumFromArray")) {
    function getChecksumFromArray($arrayList, $key, $sort = 1) {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str         = getArray2Str($arrayList);
        $salt        = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash        = hash("sha256", $finalString);
        $hashString  = $hash . $salt;
        $checksum    = encrypt_e($hashString, $key);
        return $checksum;
    }
}

if(!function_exists("verifychecksum_e")) {
    function verifychecksum_e($arrayList, $key, $checksumvalue) {
        $arrayList = removeCheckSumParam($arrayList);
        ksort($arrayList);
        $str        = getArray2StrForVerify($arrayList);
        $paytm_hash = decrypt_e($checksumvalue, $key);
        $salt       = substr($paytm_hash, -4);

        $finalString = $str . "|" . $salt;

        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;

        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }
}

if(!function_exists("getArray2Str")) {
    function getArray2Str($arrayList) {
        $findme   = 'REFUND';
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pos = strpos($value, $findme);
            $pospipe = strpos($value, $findmepipe);
            if ($pos !== false || $pospipe !== false)
            {
                continue;
            }

            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
}

if(!function_exists("getArray2StrForVerify")) {
    function getArray2StrForVerify($arrayList) {
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
}

if(!function_exists("redirect2PG")) {
    function redirect2PG($paramList, $key) {
        $hashString = getchecksumFromArray($paramList);
        $checksum   = encrypt_e($hashString, $key);
    }
}


if(!function_exists("removeCheckSumParam")) {
    function removeCheckSumParam($arrayList) {
        if (isset($arrayList["CHECKSUMHASH"])) {
            unset($arrayList["CHECKSUMHASH"]);
        }
        return $arrayList;
    }
}

if(!function_exists("getTxnStatus")) {
    function getTxnStatus($requestParamList) {
        return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
    }
}

if(!function_exists("initiateTxnRefund")) {
    function initiateTxnRefund($requestParamList) {
        $CHECKSUM                     = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY, 0);
        $requestParamList["CHECKSUM"] = $CHECKSUM;
        return callAPI(PAYTM_REFUND_URL, $requestParamList);
    }
}

if(!function_exists("callAPI")) {
    function callAPI($apiURL, $requestParamList) {
        $jsonResponse      = "";
        $responseParamList = array();
        $JsonData          = json_encode($requestParamList);
        $postData          = 'JsonData=' . urlencode($JsonData);
        $ch                = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postData)
        ));
        $jsonResponse      = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse, true);
        return $responseParamList;
    }
}

if(!function_exists("sanitizedParam")) {
    function sanitizedParam($param) {
        $pattern[0]     = "%,%";
        $pattern[1]     = "%#%";
        $pattern[2]     = "%\(%";
        $pattern[3]     = "%\)%";
        $pattern[4]     = "%\{%";
        $pattern[5]     = "%\}%";
        $pattern[6]     = "%<%";
        $pattern[7]     = "%>%";
        $pattern[8]     = "%`%";
        $pattern[9]     = "%!%";
        $pattern[10]    = "%\\$%";
        $pattern[11]    = "%\%%";
        $pattern[12]    = "%\^%";
        $pattern[13]    = "%=%";
        $pattern[14]    = "%\+%";
        $pattern[15]    = "%\|%";
        $pattern[16]    = "%\\\%";
        $pattern[17]    = "%:%";
        $pattern[18]    = "%'%";
        $pattern[19]    = "%\"%";
        $pattern[20]    = "%;%";
        $pattern[21]    = "%~%";
        $pattern[22]    = "%\[%";
        $pattern[23]    = "%\]%";
        $pattern[24]    = "%\*%";
        $pattern[25]    = "%&%";
        $sanitizedParam = preg_replace($pattern, "", $param);
        return $sanitizedParam;
    }
}

if(!function_exists("callNewAPI")) {
    function callNewAPI($apiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData))
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }
}
// For Paytm
