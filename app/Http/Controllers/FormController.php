<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\SubmitCallbackRequest;
    use Illuminate\Http\Request;
    use App\Models\Callback;
    use Illuminate\Support\Facades\Http;

    class FormController extends Controller
    {
        public function submitCallback(SubmitCallbackRequest $request)
        {
            $recaptchaSecret = env('CAPTCHA_PRIVATE');
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $recaptchaSecret,
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            $recaptchaData = $response->json();

            if (!$recaptchaData['success']) {
                return response()->json(['message' => 'CAPTCHA validation failed'], 422);
            }

            Callback::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
            ]);

            return ['message' => 'Заявка успішно відправлена'];
        }
    }
