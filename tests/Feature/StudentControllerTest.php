<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_form_is_displayed(): void
    {
        $response = $this->get(route('students.create'));

        $response->assertOk()
            ->assertViewIs('students.create')
            ->assertSee('Student Name')
            ->assertSee('Student Email')
            ->assertSee('name="_token"', false);
    }

    public function test_student_listing_shows_an_empty_state(): void
    {
        $response = $this->get(route('students.index'));

        $response->assertOk()
            ->assertViewIs('students.index')
            ->assertSee('No students have been added yet.');
    }

    public function test_dashboard_shows_student_count_and_recent_records(): void
    {
        $student = Student::create([
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertViewIs('home')
            ->assertViewHas('studentCount', 1)
            ->assertSee('TOTAL RECORDS')
            ->assertSee('Taylor Student')
            ->assertSee('taylor@example.com')
            ->assertSee(route('students.show', $student), false);
    }

    public function test_valid_submission_creates_a_student_and_redirects_to_the_listing(): void
    {
        $response = $this->post(route('students.store'), [
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $response->assertRedirect(route('students.index'))
            ->assertSessionHas('success', 'Student added successfully.');

        $this->assertDatabaseHas('students', [
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $this->get(route('students.index'))
            ->assertOk()
            ->assertSee('Taylor Student')
            ->assertSee('taylor@example.com')
            ->assertSee('Student added successfully.');
    }

    public function test_invalid_submission_shows_errors_and_preserves_valid_input(): void
    {
        $response = $this->from(route('students.create'))
            ->followingRedirects()
            ->post(route('students.store'), [
                'name' => 'Taylor Student',
                'email' => 'not-an-email',
            ]);

        $response->assertOk()
            ->assertViewIs('students.create')
            ->assertSee('value="Taylor Student"', false)
            ->assertSee('The email field must be a valid email address.');

        $this->assertDatabaseCount('students', 0);
    }

    public function test_duplicate_email_is_rejected_with_a_validation_error(): void
    {
        Student::create([
            'name' => 'Existing Student',
            'email' => 'existing@example.com',
        ]);

        $response = $this->from(route('students.create'))
            ->post(route('students.store'), [
                'name' => 'Another Student',
                'email' => 'existing@example.com',
            ]);

        $response->assertRedirect(route('students.create'))
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseCount('students', 1);
    }

    public function test_student_details_page_shows_the_selected_record(): void
    {
        $student = Student::create([
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $this->get(route('students.show', $student))
            ->assertOk()
            ->assertViewIs('students.show')
            ->assertSee('Taylor Student')
            ->assertSee('taylor@example.com');
    }

    public function test_edit_form_shows_the_current_student_values_and_put_method(): void
    {
        $student = Student::create([
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $this->get(route('students.edit', $student))
            ->assertOk()
            ->assertViewIs('students.edit')
            ->assertSee('value="Taylor Student"', false)
            ->assertSee('value="taylor@example.com"', false)
            ->assertSee('name="_method" value="PUT"', false);
    }

    public function test_valid_update_changes_the_student_and_redirects_to_details(): void
    {
        $student = Student::create([
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $response = $this->put(route('students.update', $student), [
            'name' => 'Taylor Updated',
            'email' => 'taylor@example.com',
        ]);

        $response->assertRedirect(route('students.show', $student))
            ->assertSessionHas('success', 'Student updated successfully.');

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Taylor Updated',
            'email' => 'taylor@example.com',
        ]);
    }

    public function test_update_rejects_an_email_used_by_another_student(): void
    {
        $student = Student::create([
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);
        Student::create([
            'name' => 'Another Student',
            'email' => 'another@example.com',
        ]);

        $response = $this->from(route('students.edit', $student))
            ->put(route('students.update', $student), [
                'name' => 'Taylor Updated',
                'email' => 'another@example.com',
            ]);

        $response->assertRedirect(route('students.edit', $student))
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);
    }

    public function test_delete_requires_a_delete_method_and_removes_the_student(): void
    {
        $student = Student::create([
            'name' => 'Taylor Student',
            'email' => 'taylor@example.com',
        ]);

        $this->get(route('students.index'))
            ->assertOk()
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee('Are you sure you want to delete this student?', false);

        $response = $this->delete(route('students.destroy', $student));

        $response->assertRedirect(route('students.index'))
            ->assertSessionHas('success', 'Student deleted successfully.');

        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }

    public function test_missing_student_details_return_not_found(): void
    {
        $this->get(route('students.show', 999))
            ->assertNotFound();
    }

    public function test_student_listing_escapes_student_supplied_output(): void
    {
        Student::create([
            'name' => '<script>alert("x")</script>',
            'email' => 'safe@example.com',
        ]);

        $this->get(route('students.index'))
            ->assertOk()
            ->assertSee('&lt;script&gt;alert(&quot;x&quot;)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert("x")</script>', false);
    }
}
