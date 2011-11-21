<?php

namespace Freegli\Bundle\APNSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Freegli\Component\APNs\Notification;

class TestController extends Controller
{
    public function notificationAction()
    {
        //get tokens
        $tokens = array(
            1 => '43a3526ff2e8b19730cab08c7a14f8b59e80aed473e06d6a2faa95bd82c3556e',
            2 => '43c3526ff2e8b19730cab08b7a14f8b59e80aed473e06d6b2faa95bd82c3556e',
            3 => '4333526ff2e8b19730cab08c7a1af8b50e80aed473e06d6a2faa95bd82c3556e'
        );

        //create notification
        $notification = new Notification();
        $notification->setExpiry(new \DateTime('2010-01-13 00:00:00'));
        $notification->setPayload(array(
            'aps' => array(
                'alert' => 'Alert!'
            )
        ));

        //get service
        $nh = $this->get('freegli.apns.notification_handler');

        //send notifications
        foreach ($tokens as $id => $token) {
            $notification->setIdentifier($id);
            $notification->setDeviceToken($token);

            $retry = 2;
            while ($retry) {
                try {
                    $results[$id] = $nh->send($notification);
                    break;
                } catch (ExceptionInterface $e) {
                    $retry--;
                }
            }
        }

        return $this->render('FreegliAPNSBundle::notification.html.twig', array(
            'tokens'  => $tokens,
            'results' => $results,
            'errors'  => $nh->getErrors(),
        ));
    }
}
