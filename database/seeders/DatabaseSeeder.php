<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TrainingCourse;
use App\Models\CourseCurriculum;
use App\Models\SalonTreatment;
use App\Models\SingleSalonTreatment;
use App\Models\FrontPageImages;
use App\Models\Enquires;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'joanna',
            'email' => 'joanna@jojos.co.uk',
            'password' => bcrypt('123456'),
            'email_verified_at' => now()
        ]);

        User::create([
            'name' => 'Paul Robson',
            'email' => 'blakepablo24@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now()
        ]);

        TrainingCourse::create([
            'title' => 'Acrylic Nail Course',
            'image' => 'acylic-nail-course.jpg',
            'duration' => '2 Days',
            'start_time' => '10am',
            'end_time' => '4pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '350',
            'extras' => 'The price also includes a free 2 hour workshop 1-2 weeks after the course for troubleshooting.'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Health & Safety'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Hygiene'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Client consultation'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Manicure'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Product knowledge'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Sculptured nails'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Tip Application'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Mixed ratio'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Product application'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Infills: rebalancing'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Infills: removal'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Marketing'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(1)->id,
            'course_curriculum_item' => 'Legislation'
        ]);



        TrainingCourse::create([
            'title' => 'Gel Polish Course',
            'image' => 'gel-polish-course.jpg',
            'duration' => 'Half Day',
            'start_time' => '10am',
            'end_time' => '1pm',
            'teacher_student_ratio' => 'upto One-to-Three',
            'price' => '95',
            'extras' => ''
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Health & Safety'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Client consultation'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Contra-indications'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Contra-actions'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Preparation of the natural nail'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Filing of the natural nail'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Use of files'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Gel polish application'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Lamps'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Aftercare'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Product removal'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(2)->id,
            'course_curriculum_item' => 'Home care'
        ]);


        TrainingCourse::create([
            'title' => 'Manicure & Pedicure Course',
            'image' => 'gel-polish-course.jpg',
            'duration' => '1 Day',
            'start_time' => '10am',
            'end_time' => '4pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '135',
            'extras' => ''
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Health & Safety in the salon'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Contra-indications to the treatment (nail diseases and disorders)'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Anatomy and physiology of the nails'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Client consultation'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Cuticle work'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Filing and shaping'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Treatments in manicure and pedicure'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Massage of the hand and foot'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Application of polish and French'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(3)->id,
            'course_curriculum_item' => 'Client aftercare'
        ]);


        TrainingCourse::create([
            'title' => 'Nail Art Course',
            'image' => 'nail-art-course.png',
            'duration' => 'Half Day',
            'start_time' => '10am',
            'end_time' => '1pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '95',
            'extras' => ''
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(4)->id,
            'course_curriculum_item' => 'Using Nail Art Brushes'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(4)->id,
            'course_curriculum_item' => 'Different Brush Strokes'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(4)->id,
            'course_curriculum_item' => 'Design Ideas'
        ]);

        TrainingCourse::create([
            'title' => 'Massage Course',
            'image' => 'massage-course.jpg',
            'duration' => '1 Day',
            'start_time' => '10am',
            'end_time' => '4pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '180',
            'extras' => 'Students must have a certificate in anatomy and physiology to enroll on this course.'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Health & Safety plus hygiene'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Anatomy and physiology (review)'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Skin, skeletal and muscular structure'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Skin diseases'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Preparation of treatment area'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Contra-indications'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Contra-actions'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Client consultation'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Benefits of massage'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Oils and massage mediums'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Practical'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(5)->id,
            'course_curriculum_item' => 'Aftercare'
        ]);

        TrainingCourse::create([
            'title' => 'Waxing Course',
            'image' => 'waxing-course.jpg',
            'duration' => '1 Day',
            'start_time' => '10am',
            'end_time' => '4pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '150',
            'extras' => ''
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Health & Safety plus hygiene'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Structure of skin, hair, hair growth and skin diseases'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Equipment'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Preparation of treatment area and client'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Contra-indications'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Contra-actions'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Consultation'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Other methods of hair removal'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Benefits of waxing'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(6)->id,
            'course_curriculum_item' => 'Safe operation of tools and equipment'
        ]);

        TrainingCourse::create([
            'title' => 'Dermaplaning Course',
            'image' => 'dermaplaning-course.jpg',
            'duration' => '5 Day',
            'start_time' => '10am',
            'end_time' => '4pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '495',
            'extras' => 'The Price includes kit and covers'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Dehydrated skin'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Dull complexion'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Acne'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Rosacea'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Sensitive skin'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Ageing skin'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Pigmentation'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Photodamaged skin'
        ]);
        
        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Tuition'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Health and safety'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'Contra indications'
        ]);

        CourseCurriculum::create([
            'course' => TrainingCourse::find(7)->id,
            'course_curriculum_item' => 'The benefits of Dermaplaning and more'
        ]);

        TrainingCourse::create([
            'title' => 'Microneedling Course',
            'image' => 'microneedling-course.jpg',
            'duration' => '3 Day',
            'start_time' => '10am',
            'end_time' => '4pm',
            'teacher_student_ratio' => 'One-to-One',
            'price' => '125',
            'extras' => ''
        ]);

        SalonTreatment::create([
            'title' => 'Eyelash Extensions',
            'image' => 'browes.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(1)->id,
            'title' => 'Full Set',
            'image' => '',
            'duration' => '180',
            'price' => 55,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(1)->id,
            'title' => 'Half Set',
            'image' => '',
            'duration' => '60',
            'price' => 30,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(1)->id,
            'title' => 'Infills 3 weekly',
            'image' => '',
            'duration' => '30',
            'price' => 30,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(1)->id,
            'title' => 'Cluster Lashes',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SalonTreatment::create([
            'title' => 'Facial Treatments',
            'image' => 'browes.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(2)->id,
            'title' => 'Dermaplaning Facial',
            'image' => '',
            'duration' => '30',
            'price' => 35,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(2)->id,
            'title' => 'Red Carpet Facial (derma planning and led mask)',
            'image' => '',
            'duration' => '60',
            'price' => 60,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(2)->id,
            'title' => 'Basic Facial (Cleanse, tone, exfoliate, mask & Massage)',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(2)->id,
            'title' => 'Facial with steam & pore cleansing mask',
            'image' => '',
            'duration' => '30',
            'price' => 30,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SalonTreatment::create([
            'title' => 'Holistics',
            'image' => 'back_massage.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(3)->id,
            'title' => 'Back, neck and shoulder and scalp massage',
            'image' => '',
            'duration' => '25',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(3)->id,
            'title' => 'Full Body Swedish Massage',
            'image' => '',
            'duration' => '30',
            'price' => 35,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(3)->id,
            'title' => 'Hopi ear candle',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(3)->id,
            'title' => 'Indian head massage',
            'image' => '',
            'duration' => '25',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(3)->id,
            'title' => 'Reflexology',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(3)->id,
            'title' => 'Full body scrub and massage',
            'image' => '',
            'duration' => '60',
            'price' => 50,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SalonTreatment::create([
            'title' => 'Microblading',
            'image' => 'microneedling.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(4)->id,
            'title' => 'Microblading (Inc Top Up)',
            'image' => '',
            'duration' => '120',
            'price' => 180,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(4)->id,
            'title' => 'Yearly top up',
            'image' => '',
            'duration' => '60',
            'price' => 80,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SalonTreatment::create([
            'title' => 'Nails',
            'image' => 'nails.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Full Set Acrylics',
            'image' => 'full_set.jpg',
            'duration' => '30',
            'price' => 30,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Acrylic Overlay',
            'image' => 'acrylic2.png',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Infills',
            'image' => '',
            'duration' => '30',
            'price' => 20,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Single Nail Repair',
            'image' => '',
            'duration' => '10',
            'price' => 3.50,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Shellac or Gel Polish on Natural Nails',
            'image' => 'gel-nails3.png',
            'duration' => '25',
            'price' => 20,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Shellac or Gel Polish on Toes',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Acrylic Toe Extensions (big toes)',
            'image' => '',
            'duration' => '15',
            'price' => 12,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(5)->id,
            'title' => 'Acrylic Toe Extensions (full set)',
            'image' => '',
            'duration' => '40',
            'price' => 30,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);
        
        SalonTreatment::create([
            'title' => 'Pedicures',
            'image' => 'pedicures.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(6)->id,
            'title' => 'Basic Pedicure',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(6)->id,
            'title' => 'Basic Pedicure with Gel Polish',
            'image' => '',
            'duration' => '45',
            'price' => 40,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(6)->id,
            'title' => 'Luxury Pedicure',
            'image' => '',
            'duration' => '45',
            'price' => 40,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(6)->id,
            'title' => 'Luxury Pedicure with Gel Polish',
            'image' => '',
            'duration' => '60',
            'price' => 45,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SalonTreatment::create([
            'title' => 'Tints & Shapes',
            'image' => 'browes.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(7)->id,
            'title' => 'Eyebrow tint',
            'image' => '',
            'duration' => '10',
            'price' => 10,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(7)->id,
            'title' => 'Lash tint',
            'image' => '',
            'duration' => '10',
            'price' => 10,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(7)->id,
            'title' => 'Definitions Brows, shaped tinted and waxed',
            'image' => '',
            'duration' => '30',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(7)->id,
            'title' => 'Lash Lift (inc tint)',
            'image' => '',
            'duration' => '45',
            'price' => 45,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SalonTreatment::create([
            'title' => 'Waxing',
            'image' => 'waxing.jpg',
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Underarm',
            'image' => '',
            'duration' => '15',
            'price' => 10,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Forearm',
            'image' => '',
            'duration' => '15',
            'price' => 10,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Back',
            'image' => '',
            'duration' => '30',
            'price' => 20,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Full Leg',
            'image' => '',
            'duration' => '20',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Half Leg',
            'image' => '',
            'duration' => '15',
            'price' => 15,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Bikini Line',
            'image' => '',
            'duration' => '10',
            'price' => 10,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Hollywood',
            'image' => '',
            'duration' => '20',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Brazillian',
            'image' => '',
            'duration' => '20',
            'price' => 20,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Lip',
            'image' => '',
            'duration' => '5',
            'price' => 5,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Chin',
            'image' => '',
            'duration' => '10',
            'price' => 5,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Eyebrow',
            'image' => '',
            'duration' => '10',
            'price' => 7.50,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);

        SingleSalonTreatment::create([
            'category' => SalonTreatment::find(8)->id,
            'title' => 'Full Face',
            'image' => '',
            'duration' => '20',
            'price' => 25,
            'description' => 'Blah, Blah, Blah. Joanne to fill this in'
        ]);
        
        FrontPageImages::create([
            'image' => '01.jpg',
        ]);

        FrontPageImages::create([
            'image' => '02.jpg',
        ]);

        FrontPageImages::create([
            'image' => '03.jpg',
        ]);

        FrontPageImages::create([
            'image' => '04.jpg',
        ]);

        FrontPageImages::create([
            'image' => '05.jpg',
        ]);

        Enquires::create([
            'type' => "ST",
            'enquires' => 0
        ]);

        Enquires::create([
            'type' => "TC",
            'enquires' => 0
        ]);

        Enquires::create([
            'type' => "Vouchers",
            'enquires' => 0
        ]);
    }
}