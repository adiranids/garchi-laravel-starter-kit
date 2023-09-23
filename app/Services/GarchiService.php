<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GarchiService
{
    private $garchiAPIRequest, $GARCHI_API_URL;

    public function __construct()
    {
        // create a new Http client instance
        $this->garchiAPIRequest = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            "Authorization" => "Bearer " . env('GARCHI_API_KEY')
        ]);

        $this->GARCHI_API_URL = env('GARCHI_API_URL');
    }

    // demonstration of using Garchi Page API (POST method)
    public function getGarchiPage(string $spaceUID, string $mode, string $slug = "/")
    {
        if (!in_array($mode, ['draft', 'live'], true)) {
            throw new \InvalidArgumentException('The mode must be either "draft" or "live".');
        }

        $response = $this->garchiAPIRequest->post($this->GARCHI_API_URL."/page", [
            "space_uid" => $spaceUID,
            "mode" => $mode,
            "slug" => $slug
        ]);

        return $response->json();
    }

    // demonstration of using Garchi Asset API (GET method)
    public function getGarchiAsset(string $spaceUID, string $assetName)
    {
        $response = $this->garchiAPIRequest->get(
            "{$this->GARCHI_API_URL}/space/assets/${assetName}?space_uid=${spaceUID}"
        );

        return $response->json();
    }

   
}