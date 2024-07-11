<?php

namespace App\Http\Controllers\Providerss;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\Providers;
use App\Services\ProviderService;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public $providerService;

    public function __construct(private ProviderService $providersService)
    {
    }

    public function add(Request $request)
    {
        return $this->providerService->add($request->all());
    }

    public function all()
    {
        return $this->providerService->all();
    }

    public function show(Provider $Providers)
    {
        return $this->providerService->show($Providers->internal_reference);
    }

    public function update(Provider $Providers, Request $request)
    {
        $input = $request->all();
        return $this->providerService->update($Providers->internal_reference, $input);
    }

    public function delete(Provider $Providers)
    {
        return $this->providerService->delete($Providers->internal_reference);
    }
}
