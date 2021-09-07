<?php

namespace Api\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->json(['msg' => 'Product::index']);
    }

    public function showAction()
    {
        return $this->json(['msg' => 'Product::show']);
    }

    public function storeAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $parameter = $this->get('product.product_parameter_factory')
                            ->createFromRequest($request);
        $product = $parameter->mapEntity();

        $entityManager->persist($product);
        $entityManager->flush();

        $productDispatcher = $this->get('product.product_created_dispatcher');
        $productDispatcher->dispatch($product);

        return new JsonResponse(['msg' => 'Stored Successfully!', 'product_id' => $product->getId()]);
    }
}
