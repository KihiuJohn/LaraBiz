<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run()
    {
        // Training page (already included)
        Page::updateOrCreate(
            ['slug' => 'training'],
            [
                'page_title' => 'Training Programs | Expro Consulting',
                'page_description' => 'Explore our comprehensive training programs designed to enhance skills and drive professional growth.',
                'main_heading' => 'Training Programs',
                'main_content' => 'At Expro Consulting, we offer a wide range of training programs to help individuals and organizations achieve their goals.',
                'is_published' => true,
            ]
        );

        // Executive Training page (already included)
        Page::updateOrCreate(
            ['slug' => 'executive-training'],
            [
                'page_title' => 'Executive Training Programs | Expro MS',
                'page_description' => 'Specialized training programs designed for executives and senior leadership.',
                'hero_title' => 'Transform Your Leadership',
                'hero_subtitle' => 'Exclusive programs designed for C-suite executives and senior leadership teams',
                'hero_image' => '/images/executive-training-hero.jpg',
                'meta_title' => 'Executive Training Programs | Expro MS',
                'meta_description' => 'Specialized training programs for executives and senior leadership teams. Enhance strategic thinking and leadership capabilities.',
                'is_published' => true,
            ]
        );

        // Consulting page (newly added)
        Page::updateOrCreate(
            ['slug' => 'consulting'],
            [
                'page_title' => 'Consulting Services | Expro MS',
                'page_description' => 'Expert consulting services to drive strategic growth and organizational success.',
                'hero_title' => 'Expert Consulting Solutions',
                'hero_subtitle' => 'Drive strategic growth with our tailored consulting services',
                'hero_image' => '/images/consulting-hero.jpg',
                'meta_title' => 'Consulting Services | Expro MS',
                'meta_description' => 'Expert consulting services to help organizations achieve strategic goals and operational excellence.',
                'is_published' => true,
            ]
        );
    }
}
