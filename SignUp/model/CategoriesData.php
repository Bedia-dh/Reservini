<?php
// Load Translations
require_once(__DIR__ . '/../Config/URLconf.php'); 
class CategoriesData {
    public static function getInspirationData() {
        return [
            [
                'image' => 'https://images.unsplash.com/photo-1449034446853-66c86144b0ad?w=900',
                'title' => '5 of the best hotels in Los Angeles',
                'description' => 'From Hollywood to Beverly Hills discover 5 of the best hotels in Los Angeles for your stay',
                'link' => '#'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1597534458220-9fb4969f2df5?w=900',
                'title' => 'The 6 best Orlando hotels for families',
                'description' => 'Discover the best Orlando hotels for families for your vacation.',
                'link' => '#'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1548919973-5cef591cdbc9?w=900',
                'title' => '5 best ski towns around the world',
                'description' => 'Discover a winter wonderland in these charming ski destinations.',
                'link' => '#'
            ]
        ];
    }

    public static function getAllCategories() {
        // Define the categories and their respective content
        return [
            'restaurants' => [
                // First 2 existing restaurants remain unchanged
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Restaurant 1', 
                    'location' => 'Paris', 
                    'price' => '$150/night', 
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Restaurant 2', 
                    'location' => 'New York', 
                    'price' => '$120/night', 
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Restaurant 3',
                    'location' => 'Tokyo',
                    'price' => '$180/night',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Restaurant 4',
                    'location' => 'London',
                    'price' => '$160/night',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Restaurant 5',
                    'location' => 'Rome',
                    'price' => '$140/night',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Restaurant 6',
                    'location' => 'Barcelona',
                    'price' => '$130/night',
                    'link' => '#'
                ]
            ],
            'hotels' => [
                // First 2 existing hotels remain unchanged
                [
                    'images' =>[
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Hotel 1', 
                    'location' => 'Dubai', 
                    'price' => '$200/night', 
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Hotel 2', 
                    'location' => 'Dubai', 
                    'price' => '$200/night', 
                    'link' => '#'
                ],
                // Adding 4 new hotels
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],            'name' => 'Hotel 3',
                    'location' => 'Singapore',
                    'price' => '$250/night',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Hotel 4',
                    'location' => 'Maldives',
                    'price' => '$300/night',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Hotel 5',
                    'location' => 'Sydney',
                    'price' => '$220/night',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Hotel 6',
                    'location' => 'Bangkok',
                    'price' => '$180/night',
                    'link' => '#'
                ]
            ],
            'meeting-rooms' => [
                // First 3 existing meeting rooms remain unchanged
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Meeting Room 1', 
                    'location' => 'Berlin', 
                    'price' => '$300/day', 
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Meeting Room 2', 
                    'location' => 'Berlin', 
                    'price' => '$300/day', 
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Meeting Room 3', 
                    'location' => 'Berlin', 
                    'price' => '$300/day', 
                    'link' => '#'
                ],
                // Adding 3 new meeting rooms
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Meeting Room 4',
                    'location' => 'Amsterdam',
                    'price' => '$280/day',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Meeting Room 5',
                    'location' => 'Vienna',
                    'price' => '$320/day',
                    'link' => '#'
                ],
                [
                    'images' => [
                        'https://plus.unsplash.com/premium_photo-1675745329954-9639d3b74bbf?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8fDA%3D',
                        'https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'
                    ],
                    'name' => 'Meeting Room 6',
                    'location' => 'Stockholm',
                    'price' => '$290/day',
                    'link' => '#'
                ]
            ]
        ];
    }

    public static function getBestDeals($category){
        $deals = [
            'restaurants' => [
                ['name' => 'Restaurant A', 'location' => 'City Center', 'price' => '$50', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
                ['name' => 'Restaurant B', 'location' => 'Downtown', 'price' => '$40', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
                ['name' => 'Restaurant B', 'location' => 'Downtown', 'price' => '$40', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
                ['name' => 'Restaurant B', 'location' => 'Downtown', 'price' => '$40', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
                ['name' => 'Restaurant B', 'location' => 'Downtown', 'price' => '$40', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
                ['name' => 'Restaurant B', 'location' => 'Downtown', 'price' => '$40', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
                ['name' => 'Restaurant B', 'location' => 'Downtown', 'price' => '$40', 'image' => 'https://plus.unsplash.com/premium_photo-1661883237884-263e8de8869b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHx8MA%3D%3D', 'link' => '#'],
            ],
            'hotels' => [
                ['name' => 'Hotel A', 'location' => 'Beachside', 'price' => '$100/night', 'image' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'link' => '#'],
                ['name' => 'Hotel B', 'location' => 'City Center', 'price' => '$80/night', 'image' =>'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'link' => '#'],
                ['name' => 'Hotel A', 'location' => 'Beachside', 'price' => '$100/night', 'image' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'link' => '#'],
                ['name' => 'Hotel B', 'location' => 'City Center', 'price' => '$80/night', 'image' =>'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'link' => '#'],
                ['name' => 'Hotel A', 'location' => 'Beachside', 'price' => '$100/night', 'image' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'link' => '#'],
                ['name' => 'Hotel B', 'location' => 'City Center', 'price' => '$80/night', 'image' =>'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'link' => '#'],
            ],
            'meeting-rooms' => [
                ['name' => 'Meeting Room A', 'location' => 'Business District', 'price' => '$200/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room B', 'location' => 'Downtown', 'price' => '$150/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room A', 'location' => 'Business District', 'price' => '$200/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room B', 'location' => 'Downtown', 'price' => '$150/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room A', 'location' => 'Business District', 'price' => '$200/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room B', 'location' => 'Downtown', 'price' => '$150/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room A', 'location' => 'Business District', 'price' => '$200/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
                ['name' => 'Meeting Room B', 'location' => 'Downtown', 'price' => '$150/day', 'image' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg', 'link' => '#'],
            ],
        ];

        return $deals[$category] ?? [];
    }
}
?>
