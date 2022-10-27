<x-mail::message>
  # Schedule Reminder
  ## Dear {{ $client['name'] }},

  Your appointment with {{ $client['dentist'] }} for {{ $client['service'] }} was scheduled for tomorrow {{ $client['schedule'] }}.


  Thanks,<br>
  {{ config('app.name') }}
</x-mail::message>