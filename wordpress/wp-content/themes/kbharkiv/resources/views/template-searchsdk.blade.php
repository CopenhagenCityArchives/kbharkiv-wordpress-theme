{{--
  Template Name: Søg person
--}}

@extends('layouts.app')

@php
  wp_enqueue_style('sdk.css', 'https://kildetaster.kbharkiv.dk/sdk.css');
  wp_enqueue_script('sdk.js', 'https://kildetaster.kbharkiv.dk/sdk.js', [], null);
@endphp

@section('content')
  <!-- Header and breadcrumb that are ng-cloaked so it will be hidden when SDK is loaded -->
  <header class="page-header darken-on-scroll ng-scope" style="background-color: rgb(255, 238, 204);" ng-cloak>
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
      <h1>Søg i indtastede kilder</h1>
    </div>
    </div>
    </div>
  </header>

  <nav class="breadcrumb-wrapper container-fluid ng-scope" aria-label="Brødkrummesti" ng-cloak>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/">
        <svg aria-hidden="true" class="feather" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
          <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        <span class="sr-only">Hjem</span>
      </a>
    </li>
    <li class="breadcrumb-item"><a href="#">Søg</a></li>
    <li class="breadcrumb-item active" aria-current="page">Søg person</li>
  </ol>
  </nav>

  <!-- SDK START -->
  <div id="search-app-simple-search-text" class="d-none">
    @if (get_field('sdksearch_simple-search-text'))
      {!! get_field('sdksearch_simple-search-text') !!}
    @endif
    {{-- Søg på tværs af flere kilder fx begravelser, politiets registerblade og politiets efterretninger. --}}
  </div>
  <div id="search-app-upper-text" class="d-none">
    @if (get_field('sdksearch_upper-text'))
      {!! get_field('sdksearch_upper-text') !!}
    @endif
    {{-- <p><strong>1) Vælg først den eller de kilder du vil søge i:</strong></p> --}}
  </div>
  <div id="search-app-lower-text" class="d-none">
    @if (get_field('sdksearch_lower-text'))
      {!! get_field('sdksearch_lower-text') !!}
    @endif
    {{-- <p><span style="color: #808080;">Tip: Vælger du alle kilder kan du kun søge i de felter, der er fælles for alle kilder</span></p>
    <p><span style="color: #808080;">Tip: Vælger du kun 1 kilde kan du søge i alle felter for den pågældende kilde</span></p>
    <p>&nbsp;</p>
    <p><strong>2) Definer dernæst dine søgefelter:</strong></p>
    <p>Tilføj flere felter om nødvendigt. Præciser ved at vælge operator.</p>
    <p><span style="color: #808080;">Tip: Søg på flere ord i en bestemt rækkefølge ved at sætte " " omkring ordene, fx "Adelgade 3"</span></p> --}}
  </div>
  <div id="search-app-advanced-search-lower" class="d-none">
    @if (get_field('sdksearch_advanced-search-lower'))
      {!! get_field('sdksearch_advanced-search-lower') !!}
    @endif
    {{-- <p>Søg specifikt i en enkelt eller flere kilder - på en eller flere definerede søgefelter.</p> --}}
  </div>
  <div id="search-app-error" class="d-none">
    @if (get_field('sdksearch_error'))
      {!! get_field('sdksearch_error') !!}
    @endif
    {{-- <h2>Der opstod en fejl</h2>
    Vi beklager!

    <a href="index.php?option=com_content&amp;view=article&amp;id=632:vejledning-sogning-i-indtastede-kilder&amp;catid=97">Få tips til din søgning i denne vejledning</a>

    Eller skriv til os, hvis fejlen ikke forsvinder.

    <a class="arrow" href="index.php?option=com_content&amp;view=article&amp;id=8:kontakt&amp;catid=16:om-os">Find kontaktoplysninger</a> --}}
  </div>
  <div id="search-app-no-results" class="d-none">
    @if (get_field('sdksearch_no-results'))
      {!! get_field('sdksearch_no-results') !!}
    @endif

    {{-- <h2>Ingen resultater</h2>
    <p>Din søgning gav desværre ikke nogen resultater</p>
    <p><a href="index.php?option=com_content&amp;view=article&amp;id=632:vejledning-sogning-i-indtastede-kilder&amp;catid=97">Få tips til din søgning i denne vejledning</a></p> --}}
  </div>

  <div id="search-app-help-text" class="d-none">
    @if (get_field('sdksearch_help-text'))
      {!! get_field('sdksearch_help-text') !!}
    @endif
  </div>

  <div class="sdk-search" data-sdk-app>
    <div ui-view="">&nbsp;</div>
  </div>
  <!-- SDK END -->

  {!! pagination() !!}
@endsection
