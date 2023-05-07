<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\UploadedFile;
use App\Mail\CompanyMail;

class NewCompanyNotificationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testNewCompanyNotification(): void
    {
        $this->withoutExceptionHandling();

        // Disable exception handling so that any exceptions thrown during the test are not caught and displayed

        Mail::fake();

        // Set up a fake mailer to intercept the sent emails

        $this->post('/companies', [
            'name' => 'Acme Inc.',
            'email' => 'info@acme.com',
            'logo' => UploadedFile::fake()->image('logo.jpg', 100, 100),
            'website' => 'https://www.acme.com',
        ]);

        // Send a POST request to the '/companies' route with the required company data

        Mail::assertSent(CompanyMail::class, function ($mail) {
            // Assert specific properties of the sent email
            return $mail->hasTo('parthi.hi@gmail.com');
        });
    
    }
}
