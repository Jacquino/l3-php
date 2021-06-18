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
        //$list_product[] = new Product('Lampe', 10);
        //$list_product[] = new Product('Tapis', 100);
        $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

}