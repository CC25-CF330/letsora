<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function predictFromUser()
    {
        $user = Auth::user()->fresh(); // penting!

        $requiredFields = [
            'age', 'gender_encoded',
            'attendance_percentage', 'mental_health_rating', 'exam_score'
        ];

        foreach ($requiredFields as $field) {
            if (!isset($user->$field) || $user->$field === '' || $user->$field === null) {
                return redirect('/settings')->withErrors([
                    'msg' => 'Silakan lengkapi data diri Anda terlebih dahulu sebelum melakukan prediksi.'
                ]);
            }
        }

        $payload = [
            'age' => $user->age,
            'gender_encoded' => $user->gender_encoded,
            'attendance_percentage' => $user->attendance_percentage,
            'mental_health_rating' => $user->mental_health_rating,
            'exam_score' => $user->exam_score,
        ];

        $response = Http::post('http://127.0.0.1:5000/predict', $payload);

        if ($response->successful()) {
            return view('prediction.result', [
                'result' => $response->json()
            ]);
        }

        return back()->withErrors([
            'msg' => 'Gagal menghubungi server ML.'
        ]);
    }
}
