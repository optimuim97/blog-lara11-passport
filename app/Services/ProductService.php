<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ProductService
{
    public function add($input)
    {
        try {

            $data = customValidation($input, Product::$rules);
            $product = Product::create($data);

        } catch (ValidationException $e) {

            $errors = $e->validator->errors()->all();
            return response()->json($errors);

        }

        return respJson(Response::HTTP_CREATED, "Created", $product);
    }

    public function show($ref)
    {
        $product = Product::where('internal_reference', $ref)->first();

        if (empty($product)) {
            return notFound();
        }

        return respJson(
            Response::HTTP_OK,
            "Details",
            $product
        );
    }

    public function update($ref, $input)
    {
        $product = Product::where('internal_reference', $ref)->first();

        if (empty($product)) {
            return notFound();
        }

        $product->update($input);

        return respJson(
            Response::HTTP_OK,
            "Update",
            $product
        );
    }

    public function delete($id)
    {
        $product = Product::where(['internal_reference' => $id])->first();

        if (empty($product)) {
            return notFound();
        }

        $product->delete();

        return respJson(
            Response::HTTP_NO_CONTENT,
            "Deleted",
            $product
        );
    }

    public function all()
    {
        $products = Product::latest();

        return respJson(
            Response::HTTP_OK,
            "All",
            $products
        );
    }
}
