<?php

namespace App\Sms;

/**
 * ReceiveMessageByLastId File Restful API PHP Sample Codes
 *
 * PHP version 5.6.23 | 7.2.12
 *
 * @category  PHPSampleCodes
 * @package   SampleCodes

 * @copyright 2018 The Ide Pardazan (ipe.ir) PHP Group. All rights reserved.
 * @license   https://sms.ir/ ipe license

 * @version   IPE: 2.0
 * @link      https://sms.ir/ Documentation of sms.ir Restful API PHP Sample Codes.
 */

/**
 * ReceiveMessageByLastId Class Restful API PHP Sample Codes
 *
 * @category  PHPSampleCodesClass
 * @package   SampleCodesClass

 * @copyright 2018 The Ide Pardazan (ipe.ir) PHP Group. All rights reserved.
 * @license   https://sms.ir/ ipe license
 * @link      https://sms.ir/ Documentation of sms.ir
 */
class SmsIR_SendMessage
{

    /**
     * Gets API Message Send Url.
     *
     * @return string Indicates the Url
     */
    protected function getAPIMessageSendUrl()
    {
        return "api/MessageSend";
    }

    /**
     * Gets Api Token Url.
     *
     * @return string Indicates the Url
     */
    protected function getApiTokenUrl()
    {
        return "api/Token";
    }

    /**
     * Gets config parameters for sending request.
     *
     * @param string $APIKey     API Key
     * @param string $SecretKey  Secret Key
     * @param string $APIURL     API URL

     *
     * @return void
     */
    public function __construct($APIKey, $SecretKey, $APIURL)
    {
        $this->APIKey = $APIKey;
        $this->SecretKey = $SecretKey;
        $this->APIURL = $APIURL;
    }

    /**
     * Send sms.
     *
     * @param MobileNumbers[] $MobileNumbers array structure of mobile numbers
     * @param Messages[]      $Messages      array structure of messages
     * @param string          $SendDateTime  Send Date Time

     *
     * @return string Indicates the sent sms result
     */

    public function sendMessage($data)
    {
        $token = $this->_getToken($this->APIKey, $this->SecretKey);

        if ($token != false) {
            $postData = $data;;

            $url = $this->APIURL.$this->getAPIMessageSendUrl();
            $SendMessage = $this->_execute($url, $token, $postData);

            $object = json_decode($SendMessage);

            $result = false;
            if (is_object($object)) {
                $result = $object->Message;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }


    /**
     * Gets Sent Message Response By Date.
     *
     * @param string $Shamsi_FromDate Shamsi From Date
     * @param string $Shamsi_ToDate Shamsi To Date
     * @param string $RowsPerPage Rows Per Page
     * @param string $RequestedPageNumber Requested Page Number
     * @return string Indicates the sent sms result
     */
    public function SentMessageResponseByDate($Shamsi_FromDate, $Shamsi_ToDate, $RowsPerPage, $RequestedPageNumber) {

        $token = $this->_getToken($this->APIKey, $this->SecretKey);
        if($token != false){

            $url = $this->APIURL . $this->getAPIMessageSendUrl() . "?Shamsi_FromDate=" . $Shamsi_FromDate . "&Shamsi_ToDate=" . $Shamsi_ToDate . "&RowsPerPage=" . $RowsPerPage . "&RequestedPageNumber=" . $RequestedPageNumber;
            $SentMessageResponseByDate = $this->_execute($url, $token);


            $object = json_decode($SentMessageResponseByDate);

            if(is_object($object)){
                $array = get_object_vars($object);
                if(is_array($array)){
                    if($array['IsSuccessful'] == true){
                        $result = $array['Messages'];
                    } else {
                        $result = $array['Message'];
                    }
                } else {
                    $result = false;
                }

            } else {
                $result = false;
            }

        } else {
            $result = false;
        }
        return $result;
    }


    /**
     * Gets token key for all web service requests.
     *
     * @return string Indicates the token key
     */
    private function _getToken()
    {
        $postData = array(
            'UserApiKey' => $this->APIKey,
            'SecretKey' => $this->SecretKey,
            'System' => 'php_rest_v_2_0'
        );
        $postString = json_encode($postData);

        $ch = curl_init($this->APIURL.$this->getApiTokenUrl());
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);

        $resp = false;
        $IsSuccessful = '';
        $TokenKey = '';
        if (is_object($response)) {
            $IsSuccessful = $response->IsSuccessful;
            if ($IsSuccessful == true) {
                $TokenKey = $response->TokenKey;
                $resp = $TokenKey;
            } else {
                $resp = false;
            }
        }
        return $resp;
    }

    /**
     * Executes the main method.
     *
     * @param postData[] $postData array of json data
     * @param string     $url      url
     * @param string     $token    token string
     *
     * @return string Indicates the curl execute result
     */
    private function _execute($url, $token, $postData = null)
    {
        $ch = curl_init($url);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-sms-ir-secure-token: '.$token
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if ($postData != null) {
            $postString = json_encode($postData);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

?>

