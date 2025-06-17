<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecaptchaRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Debug: Log input values
        Log::info('RecaptchaRule Debug:', [
            'value' => $value,
            'secret_key' => config('services.recaptcha.secret_key'),
            'ip' => request()->ip()
        ]);

        // Jika tidak ada response dari reCAPTCHA, return false
        if (empty($value)) {
            Log::info('RecaptchaRule: Empty value');
            return false;
        }

        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]);

            $result = $response->json();
            
            // Debug: Log Google's response
            Log::info('Google reCAPTCHA Response:', $result);

            return $result['success'] ?? false;
            
        } catch (\Exception $e) {
            Log::error('RecaptchaRule Exception:', ['error' => $e->getMessage()]);
            return false;
        }
    }

    public function message()
    {
        return 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.';
    }
}