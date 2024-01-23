<?php

/**
 * Create fake branches and services.
 */
$branches = Branch::factory(3)->create();

$services = Service::factory(3)->create();

$services = $services->shuffle();

foreach ($branches as $branch) {
    $assignedServices = $services->random(2);

    foreach ($assignedServices as $service) {
        BranchService::factory()->create([
            'branch_id' => $branch->id,
            'service_id' => $service->id,
            'price' => rand(70, 150) * 1000,
        ]);
    }
}

/**
 * Create fake teachers.
 */
$teachers = Teacher::factory(10)->create();

$combinations = collect();

foreach ($teachers as $teacher) {
    foreach ($branches as $branch) {
        foreach ($services as $service) {
            $combinations->push([
                'teacher_id' => $teacher->id,
                'branch_id' => $branch->id,
                'service_id' => $service->id,
                'salary' => rand(50, 100) * 1000,
            ]);
        }
    }
}

$combinations = $combinations->shuffle();

$combinations->take(25)->each(function ($combination) {
    TeacherService::factory()->create($combination);
});

/**
 * Create fake clients.
 */
$clients = Client::factory(10)->create();

ClientRelative::factory(20)->recycle($clients)->create();

/**
 * Create fake consultations.
 */
Consultation::factory(8)->recycle($clients)->create();
