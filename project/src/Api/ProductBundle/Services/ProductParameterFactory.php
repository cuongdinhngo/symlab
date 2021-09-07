<?php

namespace Api\ProductBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use Api\ProductBundle\Objects\ProductParameter;

class ProductParameterFactory
{
   /**
    * @param Request $request
    *
    * @return OfferCountQueryParameter
    *
    * @throws MissingProviderParameterException
    */
    public function createFromRequest(Request $request): ProductParameter
    {
        $requestArr = json_decode($request->getContent(), true);
        return new ProductParameter(
            $this->extractName($requestArr),
            $this->extractDescription($requestArr)
        );
    }

    public function extractName(array $request)
    {
        if (isset($request['name'])) {
            return $request['name'];
        }
        throw new \Exception("Please enter Name field!");
    }

    public function extractDescription(array $request)
    {
        if (isset($request['description'])) {
            return $request['description'];
        }
        throw new \Exception("Please enter Description field!");
    }

}
