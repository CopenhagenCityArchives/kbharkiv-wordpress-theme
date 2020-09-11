@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container-fluid">
      <p>
        {{ __('Vi beklager meget, men den side du prøvede at finde, er her ikke.', 'sage') }}
      </p>

      <ul>
        <li>
          {{ __('Prøv i stedet at søge efter siden eller emnet ved at klikke på "Søg" øverst i højre hjørne og bruge søgeboksen "Søg på siden".', 'sage') }}
        </li>
        <li>
          {{ __('Gå til', 'sage') }} <strong><a href="/">{{ __('forsiden', 'sage') }}</a></strong>.
        </li>
        <li>
          {{ __('Find vores', 'sage') }} <strong><a href="/om-os/kontakt/">{{ __('kontaktoplysninger', 'sage') }}</a></strong>.
        </li>
      </ul>
    </div>
  @endif
@endsection
