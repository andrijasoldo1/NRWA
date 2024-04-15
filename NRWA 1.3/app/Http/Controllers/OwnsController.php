<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owns;

class OwnsController extends Controller
{
    /**
     * Get list of ownerships
     * 
     * Returns list of ownerships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owns = Owns::all();
        return response()->json($owns, 200);
    }
}

// Definirajte konfiguracijski niz izvan klase kontrolera
$swaggerConfig = [
    'openapi' => '3.0.0',
    'info' => [
        'title' => 'API Documentation',
        'version' => '1.0.0',
        'description' => 'Documentation for API endpoints.'
    ],
    'paths' => [
        '/api/owns' => [
            'get' => [
                'tags' => ['Ownerships'],
                'summary' => 'Get list of ownerships',
                'description' => 'Returns list of ownerships',
                'security' => [['bearerAuth' => []]],
                'responses' => [
                    '200' => [
                        'description' => 'Successful operation',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'array',
                                    'items' => ['$ref' => '#/components/schemas/Owns']
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'components' => [
        'schemas' => [
            'Owns' => [
                'type' => 'object',
                'properties' => [
                    'id' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'description' => 'The ID of the ownership'
                    ],
                    'owner_id' => [
                        'type' => 'integer',
                        'description' => 'The ID of the owner'
                    ],
                    'vehicle_id' => [
                        'type' => 'integer',
                        'description' => 'The ID of the vehicle'
                    ],
                    // Define other properties of the Owns schema here
                ]
            ]
        ]
    ]
];

// Prevođenje konfiguracijskog niza u JSON format
$swaggerJson = json_encode($swaggerConfig, JSON_PRETTY_PRINT);

// Prikaz Swagger JSON dokumentacije
echo $swaggerJson;
