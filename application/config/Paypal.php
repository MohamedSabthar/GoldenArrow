<?php
/** set your paypal credential **/

$config['client_id'] = 'ASkEuMxN2iq_OqcThVQnUQX04NWZEz5pk9RgxN14pVuFnHbfarTNzte_3HTR462hem6ae-I_DtZuErjx';
$config['secret'] = 'EKjS4U969u_AzHAeyeIUfyx_Nw17t3dShT-mg5Enqy_sqdktMw0kjzPm1zMWZaCpksK7RsQSSRlO7AZh';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);