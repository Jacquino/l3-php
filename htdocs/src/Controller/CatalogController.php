<?php


namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    /**
     * @Route("/catalog", name="product_list")
     */
    public function index(ProductRepository $productRepository) : Response{

        $productList = $productRepository->findAll();

        return $this-> render("catalog.html.twig",[
            'productList' => $productList]);
    }

    /**
     * @Route("/product/form", name="product_form")
     */
    public function form(Request $request) : Response{

        $product = new Product();
        $product->setName('object');
        $product->setPrice('0');

        $form = $this->createForm(ProductType::class, $product);

        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();
            $entity_manager = $this->getDoctrine()->getManager();

            $entity_manager->persist($product);
            $entity_manager->flush();

            return $this->redirectToRoute('product_list');
        }
        return $this->render('form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}