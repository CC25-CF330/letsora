<x-app-layout>
    <div class="max-w-3xl mx-auto py-6">
        <h2 class="text-2xl font-bold mb-4">Hasil Prediksi</h2>

        <ul class="mb-4 space-y-1">
            <li>🧠 Belajar: {{ $result['predictions']['study_hours_per_day'] }} jam</li>
            <li>😴 Tidur: {{ $result['predictions']['sleep_hours'] }} jam</li>
            <li>📱 Sosial Media: {{ $result['predictions']['social_media_hours'] }} jam</li>
            <li>📺 Netflix: {{ $result['predictions']['netflix_hours'] }} jam</li>
        </ul>

        <div class="mt-6">
            <h3 class="font-semibold text-lg mb-2">Rekomendasi:</h3>
            <ul class="space-y-1">
                @foreach ($result['recommendations'] as $key => $rec)
                    <li>
                        <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong>
                        {{ $rec['advice'] }} ({{ $rec['recommended_hours'] }} jam)
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6 text-sm text-gray-600">
            <p>Status: <strong>{{ $result['insights']['productivity_status'] }}</strong></p>
            <p>Keseimbangan: <strong>{{ $result['insights']['work_life_balance'] }}</strong></p>
        </div>
    </div>
</x-app-layout>
