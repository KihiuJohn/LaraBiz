<?php

  namespace Database\Seeders;

  use Illuminate\Database\Seeder;
  use App\Models\ConsultingService;

  class ConsultingServiceSeeder extends Seeder
  {
      public function run()
      {
          $strategicConsulting = ConsultingService::updateOrCreate(
              ['slug' => 'strategic-consulting'],
              [
                  'title' => 'Strategic Consulting',
                  'slug' => 'strategic-consulting',
                  'category' => 'Consulting',
                  'image' => '/placeholder.svg?height=300&width=500',
                  'short_description' => 'Expert consulting to drive strategic growth and organizational success.',
                  'long_description' => 'Our Strategic Consulting service helps organizations develop and implement strategies that drive sustainable growth and competitive advantage.',
              ]
          );

          ConsultingService::updateOrCreate(
              ['slug' => 'organizational-transformation'],
              [
                  'parent_id' => $strategicConsulting->id,
                  'title' => 'Organizational Transformation',
                  'slug' => 'organizational-transformation',
                  'category' => 'Consulting',
                  'image' => '/placeholder.svg?height=600&width=800',
                  'short_description' => 'Support for large-scale organizational change and transformation initiatives.',
                  'long_description' => 'We guide organizations through complex transformations, ensuring alignment of culture, processes, and strategy.',
              ]
          );

          ConsultingService::updateOrCreate(
              ['slug' => 'operational-excellence'],
              [
                  'title' => 'Operational Excellence',
                  'slug' => 'operational-excellence',
                  'category' => 'Consulting',
                  'image' => '/placeholder.svg?height=300&width=500',
                  'short_description' => 'Optimize operations for efficiency and performance.',
                  'long_description' => 'Our Operational Excellence service focuses on streamlining processes, reducing costs, and improving overall performance.',
              ]
          );
      }
  }