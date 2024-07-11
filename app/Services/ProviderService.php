<?php

namespace App\Services;

use App\Models\Provider;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ProviderService
{
    public function add($input)
    {
        try {

            $data = customValidation($input, Provider::$rules);
            $Provider = Provider::create($data);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json($errors);
        }

        return respJson(Response::HTTP_CREATED, "Created", $Provider);
    }

    public function show($ref)
    {
        $Provider = Provider::where('internal_reference', $ref)->first();

        if (empty($Provider)) {
            return notFound();
        }

        return respJson(
            Response::HTTP_OK,
            "Details",
            $Provider
        );
    }

    public function update($ref, $input)
    {
        $Provider = Provider::where('internal_reference', $ref)->first();

        if (empty($Provider)) {
            return notFound();
        }

        $Provider->update($input);

        return respJson(
            Response::HTTP_OK,
            "Update",
            $Provider
        );
    }

    public function delete($id)
    {
        $Provider = Provider::where(['internal_reference' => $id])->first();

        if (empty($Provider)) {
            return notFound();
        }

        $Provider->delete();

        return respJson(
            Response::HTTP_NO_CONTENT,
            "Deleted",
            $Provider
        );
    }

    public function all()
    {
        $Providers = Provider::latest();

        return respJson(
            Response::HTTP_OK,
            "All",
            $Providers
        );
    }
}
