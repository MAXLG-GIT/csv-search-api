<?php

return [
    'estate' => [
        'name' => 'nullable|string',
        'bedrooms' => 'nullable|integer|min:0',
        'bathrooms' => 'nullable|integer|min:0',
        'storeys' => 'nullable|integer|min:0',
        'garages' => 'nullable|integer|min:0',
        'price_min' => 'nullable|integer|min:0',
        'price_max' => 'nullable|integer|min:0',
    ],
];
