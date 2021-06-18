<?php

namespace App\Controller;

use App\Entity\Product;

class CatalogController extends AbstractController
{

    public function view()
    {
        $list_product = [];

        $productRepo = new \App\Entity\Repository\Product();
        $list_product = $productRepo->findAll();
        //var_dump($list_product);die;
        //$list_product = $productRepo->find(0);
        //$list_product[] = new Product('Lampe', 10);
        //$list_product[] = new Product('Tapis', 100);
        $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

}