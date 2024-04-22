<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;

class IndividualController extends Controller
{
    public function index()
    {
        $individuals = Individual::all();
        return response()->json($individuals);
    }
}

// Definirajte konfiguracijski niz izvan klase kontrolera
$swaggerConfig = [
    'paths' => [
        '/api/individuals' => [
            'get' => [
                'tags' => ['Individuals'],
                'summary' => 'Get list of individuals',
                'description' => 'Returns list of individuals',
                'security' => [['bearerAuth' => []]],
                'responses' => [
                    '200' => [
                        'description' => 'Successful operation',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'array',
                                    'items' => ['$ref' => '#/components/schemas/Individual']
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];

// Prevođenje konfiguracijskog niza u JSON format
$swaggerJson = json_encode($swaggerConfig);

// Prikaz Swagger JSON dokumentacije
echo $swaggerJson;
