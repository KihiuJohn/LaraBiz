<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        // Training programs (from previous)
        $leadershipProgram = Program::updateOrCreate(
            ['slug' => 'leadership-development'],
            [
                'title' => 'Leadership Development Program',
                'slug' => 'leadership-development',
                'category' => 'Training',
                'image' => '/placeholder.svg?height=600&width=800',
                'location' => 'Kigali, Rwanda',
                'trainer' => 'Emily Nguyen',
                'duration' => '5 Days (9:00 AM - 4:00 PM)',
                'price' => '$1,800',
                'start_date' => '2025-07-10',
                'short_description' => 'Comprehensive leadership training designed to develop effective leaders at all organizational levels.',
                'long_description' => implode("\n", [
                    'The Leadership Development Program is a comprehensive training initiative designed to develop effective leaders at all organizational levels. This program provides participants with the knowledge, skills, and tools needed to lead teams successfully and drive organizational performance.',
                    'Through a combination of interactive workshops, case studies, role-playing exercises, and personalized feedback, participants will develop a deeper understanding of leadership principles and practices. The program covers various aspects of leadership, including communication, motivation, delegation, conflict resolution, and team building.',
                    'This program is suitable for emerging leaders, middle managers, and senior executives looking to enhance their leadership capabilities. Participants will have the opportunity to assess their leadership styles, identify areas for improvement, and develop personalized action plans for continued growth.',
                ]),
                'key_topics' => [
                    'Leadership styles and their application in different contexts',
                    'Effective communication and active listening',
                    'Building and leading high-performing teams',
                    'Motivation and employee engagement strategies',
                    'Delegation and empowerment techniques',
                    'Conflict resolution and negotiation skills',
                    'Change management and leading through uncertainty',
                    'Emotional intelligence in leadership',
                ],
                'learning_outcomes' => [
                    'Identify and leverage your personal leadership style',
                    'Enhance communication skills to effectively convey vision and expectations',
                    'Develop strategies for building and maintaining high-performing teams',
                    'Improve ability to motivate and engage team members',
                    'Strengthen skills in delegation, feedback, and performance management',
                    'Develop approaches for managing conflict and fostering collaboration',
                    'Create a personal leadership development plan',
                ],
            ]
        );

        // Executive Training programs
        $ceoDevelopment = Program::updateOrCreate(
            ['slug' => 'ceo-development'],
            [
                'title' => 'CEO Professional Development',
                'slug' => 'ceo-development',
                'category' => 'Executive Training',
                'image' => '/placeholder.svg?height=300&width=500',
                'short_description' => 'Comprehensive leadership development program designed specifically for CEOs and senior executives.',
            ]
        );

        Program::updateOrCreate(
            ['slug' => 'strategic-leadership'],
            [
                'parent_id' => $ceoDevelopment->id,
                'title' => 'Strategic Leadership for Executives',
                'slug' => 'strategic-leadership',
                'category' => 'Executive Training',
                'image' => '/placeholder.svg?height=600&width=800',
                'location' => 'Nairobi, Kenya',
                'trainer' => 'Dr. James Wilson',
                'duration' => '3 Days (9:00 AM - 5:00 PM)',
                'price' => '$2,500',
                'start_date' => '2025-06-15',
                'short_description' => 'Develop advanced strategic thinking capabilities and learn how to navigate complex business environments.',
                'long_description' => implode("\n", [
                    'The Strategic Leadership for Executives program is designed to equip senior leaders with the advanced strategic thinking capabilities needed to navigate today\'s complex and rapidly changing business landscape. This intensive program combines theoretical frameworks with practical applications to help executives develop a strategic mindset and enhance their leadership effectiveness.',
                    'Throughout this program, participants will explore various strategic leadership models, analyze real-world case studies, and engage in interactive discussions and exercises. The program focuses on developing a comprehensive understanding of strategic thinking, decision-making, and implementation in the context of organizational leadership.',
                    'Participants will learn how to identify emerging trends, assess competitive landscapes, and develop innovative strategies that drive sustainable growth and organizational success. The program also emphasizes the importance of aligning organizational culture, structure, and resources with strategic objectives.',
                ]),
                'key_topics' => [
                    'Strategic thinking and analysis in complex environments',
                    'Developing and communicating a compelling vision',
                    'Strategic decision-making frameworks and processes',
                    'Leading organizational change and transformation',
                    'Building and leading high-performing executive teams',
                    'Aligning organizational culture with strategic objectives',
                    'Navigating global business challenges and opportunities',
                    'Ethical considerations in strategic leadership',
                ],
                'learning_outcomes' => [
                    'Develop advanced strategic thinking capabilities to navigate complex business environments',
                    'Enhance ability to formulate and implement effective organizational strategies',
                    'Strengthen decision-making skills in uncertain and ambiguous situations',
                    'Improve capacity to lead organizational change and transformation initiatives',
                    'Build skills in aligning teams and resources with strategic objectives',
                    'Develop a personal leadership style that inspires and motivates others',
                    'Create actionable strategic plans for your organization',
                ],
            ]
        );

        Program::updateOrCreate(
            ['slug' => 'executive-decision-making'],
            [
                'parent_id' => $ceoDevelopment->id,
                'title' => 'Executive Decision Making',
                'slug' => 'executive-decision-making',
                'category' => 'Executive Training',
                'image' => '/placeholder.svg?height=600&width=800',
                'location' => 'Lagos, Nigeria',
                'trainer' => 'Dr. Aisha Bello',
                'duration' => '2 Days',
                'price' => '$1,800',
                'start_date' => '2025-07-20',
                'short_description' => 'Enhance decision-making skills for executives in high-stakes environments.',
                'long_description' => 'This program focuses on decision-making frameworks, risk assessment, and strategic thinking for executives.',
                'key_topics' => [
                    'Decision-making under uncertainty',
                    'Risk assessment and mitigation',
                    'Strategic thinking',
                ],
                'learning_outcomes' => [
                    'Improve decision-making in high-stakes situations',
                    'Assess and mitigate risks effectively',
                    'Apply strategic thinking to executive decisions',
                ],
            ]
        );

        Program::updateOrCreate(
            ['slug' => 'corporate-management'],
            [
                'title' => 'Corporate Management',
                'slug' => 'corporate-management',
                'category' => 'Executive Training',
                'image' => '/placeholder.svg?height=300&width=500',
                'short_description' => 'Advanced training in corporate strategy, change management, and organizational leadership.',
            ]
        );

        Program::updateOrCreate(
            ['slug' => 'financial-leadership'],
            [
                'title' => 'Financial Leadership',
                'slug' => 'financial-leadership',
                'category' => 'Executive Training',
                'image' => '/placeholder.svg?height=300&width=500',
                'short_description' => 'Strategic financial management and decision-making for executive financial officers.',
            ]
        );
    }
}