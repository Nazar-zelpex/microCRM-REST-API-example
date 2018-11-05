<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    public $bigProject
        = [
            'name'        => 'Very big project',
            'description' => 'Here must be some description for our very big project (VBP)',
            'status'      => 'planned',
        ];

    public $smallProject
        = [
            'name'        => 'Very small project',
            'description' => 'Here must be some description for our VMP ',
            'status'      => 'running',
        ];

    public function testCanGetOneProject()
    {
        $bigProject = factory(Project::class)->create($this->bigProject);
        $this->json('GET', '/api/projects/'.$bigProject->id, [])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'status',
                'created_at',
                'updated_at',
            ])
            ->assertJson([
                'id'          => $bigProject->id,
                'name'        => 'Very big project',
                'description' => 'Here must be some description for our very big project (VBP)',
                'status'      => 'planned',
            ]);
    }

    public function testCanGetAllProjects()
    {
        factory(Project::class)->create($this->bigProject);
        factory(Project::class)->create($this->smallProject);

        $this->json('GET', '/api/projects', [])
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'description',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ])
            ->assertJson([$this->bigProject, $this->smallProject]);
    }

    public function testCanCreateProject()
    {
        $this->json('POST', '/api/project', $this->bigProject)
            ->assertStatus(201)
            ->assertJson([
                'name'        => 'Very big project',
                'description' => 'Here must be some description for our very big project (VBP)',
                'status'      => 'planned',
            ]);
    }

    public function testCanUpdateProject()
    {
        $bigProject = factory(Project::class)->create($this->bigProject);
        $data = [
            'name'        => 'VBP',
            'description' => 'Time for starting our VBP',
            'status'      => 'running',
        ];

        $this->json('PUT', '/api/project/' . $bigProject->id, $data)
            ->assertStatus(200)
            ->assertJson([
                'id'          => $bigProject->id,
                'name'        => 'VBP',
                'description' => 'Time for starting our VBP',
                'status'      => 'running',
            ]);
    }

    public function testCanDeleteProject()
    {
        $bigProject = factory(Project::class)->create($this->bigProject);
        $this->json('DELETE', '/api/project/' . $bigProject->id, [])
            ->assertStatus(204);
    }
}
