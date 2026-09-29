<?php

namespace Tests\Feature;

use App\Models\Student;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_student_can_login_using_nis_and_password(): void
    {
        $student = Student::where('nis', '12309510')->first();
        $this->assertNotNull($student);
        $this->assertNotNull($student->user);

        $response = $this->post(route('admin.login.process'), [
            'login' => '12309510',
            'password' => '12309510',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($student->user);
    }

    public function test_student_cannot_login_with_wrong_password(): void
    {
        $response = $this->post(route('admin.login.process'), [
            'login' => '12309510',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors(['login']);
        $this->assertGuest();
    }

    public function test_student_directory_page_loads_successfully(): void
    {
        $response = $this->get(route('students'));

        $response->assertStatus(200);
        $response->assertSee('Direktori');
        $response->assertSee('Kelas 11');
        $response->assertSee('Kelas 12');
        $response->assertSee('Alumni');
    }
}
