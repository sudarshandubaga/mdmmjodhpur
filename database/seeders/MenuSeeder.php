<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\MenuLocation;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MenuLocation::truncate();
        MenuItem::truncate();
        Page::truncate();
        Schema::enableForeignKeyConstraints();

        // Insert pages
        $pages = [
            ['id' => Str::uuid(), 'title' => 'Home', 'slug' => 'home', 'template' => 'home'],
            ['id' => Str::uuid(), 'title' => 'About Us', 'slug' => 'about-us', 'template' => 'about'],
            ['id' => Str::uuid(), 'title' => 'Contact Us', 'slug' => 'contact-us', 'template' => 'contact'],
            ['id' => Str::uuid(), 'title' => 'FAQ', 'slug' => 'faq', 'template' => 'faq'],
            ['id' => Str::uuid(), 'title' => 'News', 'slug' => 'news', 'template' => 'news'],
            ['id' => Str::uuid(), 'title' => 'History', 'slug' => 'history', 'template' => 'page'],
            ['id' => Str::uuid(), 'title' => 'Members', 'slug' => 'members', 'template' => 'member'],
            ['id' => Str::uuid(), 'title' => 'Publications', 'slug' => 'publications', 'template' => 'publication'],
            ['id' => Str::uuid(), 'title' => 'Infrastructure', 'slug' => 'infrastructure', 'template' => 'infrastructure'],
            ['id' => Str::uuid(), 'title' => 'Documents', 'slug' => 'documents', 'template' => 'document'],
            ['id' => Str::uuid(), 'title' => 'Academics', 'slug' => 'academics', 'template' => 'academics'],
            ['id' => Str::uuid(), 'title' => 'News & Notice', 'slug' => 'news-and-notice', 'template' => 'news'],
            ['id' => Str::uuid(), 'title' => 'Calendar', 'slug' => 'calendar', 'template' => 'calendar'],
            ['id' => Str::uuid(), 'title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'template' => 'page'],
            ['id' => Str::uuid(), 'title' => 'Terms & Conditions', 'slug' => 'terms-and-conditions', 'template' => 'page'],
            ['id' => Str::uuid(), 'title' => 'Gallery', 'slug' => 'gallery', 'template' => 'gallery'],
        ];

        Page::insert($pages);

        // Insert menu locations
        $locations = [
            [
                'id' => Str::uuid(),
                'name' => 'Header',
                'menu_items' => [
                    [
                        'id' => Str::uuid(),
                        'label' => 'Home',
                        'sort_by' => 0,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'History',
                        'sort_by' => 1,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'Members',
                        'sort_by' => 2,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'Publications',
                        'sort_by' => 3,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'Infrastructure',
                        'sort_by' => 4,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'Documents',
                        'sort_by' => 5,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'Academics',
                        'sort_by' => 6,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'News & Notice',
                        'sort_by' => 7,
                    ],
                    [
                        'id' => Str::uuid(),
                        'label' => 'Calendar',
                        'sort_by' => 8,
                    ],
                ]
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Footer 1',
                'menu_items' => [
                    ['id' => Str::uuid(), 'label' => 'Home', 'sort_by' => 0],
                    ['id' => Str::uuid(), 'label' => 'About Us', 'sort_by' => 1],
                    ['id' => Str::uuid(), 'label' => 'Documents', 'sort_by' => 2],
                    ['id' => Str::uuid(), 'label' => 'Publications', 'sort_by' => 3],
                    ['id' => Str::uuid(), 'label' => 'Members', 'sort_by' => 4],
                    ['id' => Str::uuid(), 'label' => 'Gallery', 'sort_by' => 5],
                ]
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Footer 2',
                'menu_items' => [
                    ['id' => Str::uuid(), 'label' => 'History', 'sort_by' => 0],
                    ['id' => Str::uuid(), 'label' => 'Academics', 'sort_by' => 1],
                    ['id' => Str::uuid(), 'label' => 'Infrastructure', 'sort_by' => 2],
                    ['id' => Str::uuid(), 'label' => 'Calendar', 'sort_by' => 3],
                    ['id' => Str::uuid(), 'label' => 'News & Notice', 'sort_by' => 4],
                    ['id' => Str::uuid(), 'label' => 'Contact Us', 'sort_by' => 5],
                ]
            ],
        ];

        foreach ($locations as $loc) {
            $menuItems = $loc['menu_items'];
            unset($loc['menu_items']);
            $menuLocation = MenuLocation::create($loc);

            foreach ($menuItems as $key => $mItem) {
                $page = Page::where('title', $mItem['label'])->first();

                $menuItems[$key]['page_id'] = $page?->id;
                $menuItems[$key]['menu_location_id'] = $menuLocation->id;
            }
            MenuItem::insert($menuItems);
        }
    }
}
