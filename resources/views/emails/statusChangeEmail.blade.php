<x-mail::message>
  Hello {{ $name }},

  Your appointment with {{ $dentist }} for {{ $service }}, scheduled on {{ $schedule }}
  has been **{{ $status }}**.

  Thanks,<br>
  {{ config('app.name') }}
</x-mail::message>