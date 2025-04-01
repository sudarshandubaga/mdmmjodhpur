<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'label' => 'FAQ',
            'icon'  => 'bx bx-question-mark',
        ]);

        $this->addRow([
            'label' => 'Create New FAQ',
            'route_name' => 'admin.faq.create',
        ], true);

        $this->addRow([
            'label' => 'View FAQs',
            'route_name' => 'admin.faq.index',
        ], true);

        $this->addRow([
            'label' => 'Blog',
            'icon'  => 'bx bx-pin',
        ]);

        $this->addRow([
            'label' => 'Create New Blog',
            'route_name' => 'admin.blog.create',
        ], true);

        $this->addRow([
            'label' => 'View Blogs',
            'route_name' => 'admin.blog.index',
        ], true);

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
            'label' => 'Enquiry',
            'icon'  => 'bx bx-phone',
            'route_name' => 'admin.enquiry.index',
        ]);

        AdminMenu::insert($this->data);
    }

    protected function addRow($data, $hasParent = false)
    {
        $data['id'] = count($this->data) + 1;
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
