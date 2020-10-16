<h2>Name: {{$student->name}}</h2>
<h3>{{$student->registration_number}}</h3>
<p>{{ ($student->date_of_birth)->format('j F Y')}}</p>
<p>{{ $student->gender}}</p>
<p>{{ $student->cnic}}</p>
<p>{{ $student->first_language}}</p>
<p>{{ $student->mobile_number}}</p>
<p>{{ $student->phone_number}}</p>
<p>{{ $student->address}}</p>
<p>{{ $student->city}}</p>
<p>{{ $student->country}}</p>
<p>{{ $student->additional_information}}</p>
