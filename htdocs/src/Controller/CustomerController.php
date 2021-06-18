<?php


namespace App\Controller;


use App\Entity\Customer;
use App\Entity\CustomerType;
use App\Repository\CustomerRepository;
use PHPUnit\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer_list")
     */
    public function index(CustomerRepository $customerRepository) : Response{

        $customerList = $customerRepository->findAll();

        return $this-> render("customer.html.twig",[
            'customerList' => $customerList]);
    }

    /**
     * @Route("/customer/form", name="customer_form")
     */
    public function form(Request $request) : Response{

        $customer = new Customer();

        $form = $this->createForm(CustomerType::class, $customer);
        try{
            $form ->handleRequest($request);
        }catch (Exception $e){
            var_dump($e->getMessage());
            die();
        }


        if($form->isSubmitted() && $form->isValid()){
            $customer = $form->getData();
            $entity_manager = $this->getDoctrine()->getManager();

            try{
                $entity_manager->persist($customer);
                $entity_manager->flush();
            }catch (Exception $e){
                var_dump($e->getMessage());
                die();
            }


            return $this->redirectToRoute('customer_list');
        }
        return $this->render('form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}