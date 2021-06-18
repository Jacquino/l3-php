<?php


namespace App\Controller;


class CustomerController extends AbstractController
{
    public function view()
    {
        $list_customer = [];

        $customerRepo = new \App\Entity\Repository\Customer();
        $list_customer = $customerRepo->findAll();
        //var_dump($list_customer);die;
        $this->render('customer/view.phtml', ['customers' => $list_customer]);
    }


}