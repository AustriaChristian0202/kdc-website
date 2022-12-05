<x-mail::message>
  # Schedule Reminder
  ## Dear {{ $client['name'] }},

  Your appointment with {{ $client['dentist'] }} for {{ $client['service'] }} was scheduled for tomorrow {{ $client['schedule'] }}.


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