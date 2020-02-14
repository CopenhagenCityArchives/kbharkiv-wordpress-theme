{{--
  Template Name: Cookie declaration
--}}

@extends('layouts.app')


@section('content')

  @include('partials.page-header')

  <section class="module module-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 offset-sm-1 col-xl-8 offset-xl-2">
          <div class="entry-content mb-5">
            <script data-culture="{{pll_current_language()}}" id="CookieDeclaration" src="https://consent.cookiebot.com/401abcfd-34f0-41ec-88b9-ed1d801490a1/cd.js" type="text/javascript" async></script>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
