<x-mail::message>
  Hello {{ $name }},

  Your appointment with {{ $dentist }} for {{ $service }}, scheduled on {{ $schedule }}
  has been **{{ $status }}**. {{ $reason ? 'Because '. $reason . '.' : '' }}

  Thanks,<br>
  {{ config('app.name') }}
  <br>
  <br>
  Contact us
  <br>
  email: kasilagdentalclinic@gmail.com
  <br>
  phone: +63 951 018 4898
</x-mail::message>