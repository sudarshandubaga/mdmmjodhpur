<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminMenuSeeder extends Seeder
{

    protected $data = [];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminMenu::truncate();

        $this->addRow([
            'label' => 'Dashboard',
            'icon'  => 'bx bxs-dashboard',
            'route_name' => 'admin.dashboard',
        ]);

        $this->addRow([
            'label' => 'Slider',
            'icon'  => 'bx bxs-carousel',
            'route_name' => 'admin.slider.index',
        ]);

        $this->addRow([
            'label' => 'Pages',
            'icon'  => 'bx bx-notepad',
            'route_name' => 'admin.page.index'
        ]);

        $this->addRow([
            'label' => 'Gallery',
            'icon'  => 'bx bx-image',
            'route_name' => 'admin.gallery.index'
        ]);

        $this->addRow([
            'label' => 'Documents',
            'icon'  => 'bx bx-file',
            'route_name' => 'admin.document.index'
        ]);

        $this->addRow([
            'label' => 'News & Notice',
            'icon'  => 'bx bx-news',
            'route_name' => 'admin.news.index'
        ]);

        $this->addRow([
            'label' => 'Team',
            'icon'  => 'bx bx-group',
        ]);

        $this->addRow([
            'label' => 'Create New Team',
            'route_name' => 'admin.team.create',
        ], true);

        $this->addRow([
            'label' => 'View Teams',
            'route_name' => 'admin.team.index',
        ], true);

        $this->addRow([
            'label' => 'Course',
            'icon'  => 'bx bx-group',
        ]);

        $this->addRow([
            'label' => 'Create New Course',
            'route_name' => 'admin.course.create',
        ], true);

        $this->addRow([
            'label' => 'View Courses',
            'route_name' => 'admin.course.index',
        ], true);

        $this->addRow([
            'label' => 'Academic',
            'icon'  => 'bx bx-group',
        ]);

        $this->addRow([
            'label' => 'Create New Academic',
            'route_name' => 'admin.academic.create',
        ], true);

        $this->addRow([
            'label' => 'View Academics',
            'route_name' => 'admin.academic.index',
        ], true);

        $this->addRow([
            'label' => 'Publication',
            'icon'  => 'bx bx-pin',
        ]);

        $this->addRow([
            'label' => 'Create New Publication',
            'route_name' => 'admin.blog.create',
        ], true);

        $this->addRow([
            'label' => 'View Publications',
            'route_name' => 'admin.blog.index',
        ], true);

        $this->addRow([
            'label' => 'Infrastructure',
            'icon'  => 'bx bx-pin',
        ]);

        $this->addRow([
            'label' => 'Create New Infrastructure',
            'route_name' => 'admin.infrastructure.create',
        ], true);

        $this->addRow([
            'label' => 'View Infrastructures',
            'route_name' => 'admin.infrastructure.index',
        ], true);

        $this->addRow([
            'label' => 'Enquiry',
            'icon'  => 'bx bx-phone',
            'route_name' => 'admin.enquiry.index',
        ]);

        AdminMenu::insert($this->data);
    }

    protected function addRow($data, $hasParent = false)
    {
        $data['id'] = Str::uuid();
        $data['admin_menu_id'] = $hasParent ? $this->getParent() : null;
        if (empty($data['icon'])) {
            $data['icon'] = null;
        }
        if (empty($data['route_name'])) {
            $data['route_name'] = null;
        }
        if (empty($data['params'])) {
            $data['params'] = [];
        }
        $data['params'] = json_encode($data['params']);
        $data['sort_by'] = count($this->data);
        $this->data[] = $data;
    }

    protected function getParent()
    {
        $parents = array_filter($this->data, function ($data) {
            return empty($data['admin_menu_id']);
        });

        $parents = array_values($parents);

        $lastParent = end($parents);

        return !empty($lastParent) ? $lastParent['id'] : null;
    }
}
