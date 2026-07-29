<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class KhaltiService
{
    protected string $baseUrl;
    protected string $secretKey;

    public function __construct()
    {
        $this->baseUrl   = env("KHALTI_URL");
        $this->secretKey = env("KHALTI_SECRET_KEY");
    }


    public function initiate(array $payload): array
    {
        // dd($payload);
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $this->secretKey,
        ])->post($this->baseUrl . 'initiate/', $payload);
        // dd($response);
        if ($response->failed()) {
            throw new RuntimeException(
                'Khalti initiate failed: ' . $response->body()
            );
        }

        return $response->json();
    }

 
    public function lookup(string $pidx): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $this->secretKey,
        ])->post($this->baseUrl . 'lookup/', ['pidx' => $pidx]);

        if ($response->failed()) {
            throw new RuntimeException(
                'Khalti lookup failed: ' . $response->body()
            );
        }

        return $response->json();
    }
}
