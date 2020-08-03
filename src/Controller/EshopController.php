<?php

namespace App\Controller;

use App\Message\Command\SignUpSMS;
use App\Message\Query\SearchQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\Command\CreateOrder;

class EshopController extends AbstractController
{
    use HandleTrait;
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/", name="eshop")
     */
    public function index()
    {
        return $this->render('eshop/index.html.twig', [
            'controller_name' => 'EshopController',
        ]);
    }

    /**
     * @Route("/search", name="search")
     */
    public function search()
    {
        $search = 'laptops ';
//        $this->messageBus->dispatch(new SearchQuery($search));
//        or
        $result = $this->handle(new SearchQuery($search));
        return new Response('Your search results for: ' . $search . $result);
    }

    /**
     * @Route("/signup-sms", name="signup-sms")
     */
    public function signUpSms()
    {
        $phoneNumber = '111 222 333 ';

//        $results = $this->handle(new SignUpSMS($phoneNumber));
//        why not like that?
        $this->messageBus->dispatch(new SearchQuery($phoneNumber));
        return new Response('Your phone number successfully singed up to SMS newsletter!' . $phoneNumber);
    }

    /**
     * @Route("/order", name="order")
     */
    public function order()
    {
        $productId = 243;
        $productName = 'product name ';
        $productAmount = 2;
        //save order to DB

        $this->messageBus->dispatch(new CreateOrder($productId, $productAmount));

        return new Response('You successfully ordered your product!' . $productName);
    }
}
