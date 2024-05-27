<?php
	require 'vendor/autoload.php';

    use Aws\Exception\AwsException;
    use Aws\Sns\SnsClient;


    $SnSclient = new SnsClient([
        'profile' => 'default',
        'region' => 'us-east-1',
        'version' => '2010-03-31'
    ]);

    $protocol = 'sms';
    $endpoint = '+527292304369';
    $topic = 'arn:aws:sns:us-east-2:533267265993:snsTest.fifo';

    $message = 'This message is sent from a Amazon SNS code sample.';
    $phone = '+527292304369';

    try {
        $result = $SnSclient->publish([
            'Message' => $message,
            'PhoneNumber' => $phone,
        ]);
        var_dump($result);
        echo "Message sent successfully."
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
        echo "Message failed to send."
    }
?>
