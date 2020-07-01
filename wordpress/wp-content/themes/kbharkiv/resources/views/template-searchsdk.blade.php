{{--
  Template Name: Søg person
--}}

@extends('layouts.app')

@php
  wp_enqueue_style('sdk.css', 'https://kildetaster.kbharkiv.dk/sdk.css');
  wp_enqueue_script('sdk.js', 'https://kildetaster.kbharkiv.dk/sdk.js', [], null);
@endphp

@section('content')
  <!-- SDK START -->
  <div id="search-app-simple-search-text" ng-cloak>
    @if (get_field('sdksearch_simple-search-text'))
      {!! get_field('sdksearch_simple-search-text') !!}
    @endif
    {{-- Søg på tværs af flere kilder fx begravelser, politiets registerblade og politiets efterretninger. --}}
  </div>
  <div id="search-app-upper-text" ng-cloak>
    @if (get_field('sdksearch_upper-text'))
      {!! get_field('sdksearch_upper-text') !!}
    @endif
    {{-- <p><strong>1) Vælg først den eller de kilder du vil søge i:</strong></p> --}}
  </div>
  <div id="search-app-lower-text" ng-cloak>
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
  <div id="search-app-advanced-search-lower" ng-cloak>
    @if (get_field('sdksearch_advanced-search-lower'))
      {!! get_field('sdksearch_advanced-search-lower') !!}
    @endif
    {{-- <p>Søg specifikt i en enkelt eller flere kilder - på en eller flere definerede søgefelter.</p> --}}
  </div>
  <div id="search-app-error" ng-cloak>
    @if (get_field('sdksearch_error'))
      {!! get_field('sdksearch_error') !!}
    @endif
    {{-- <h2>Der opstod en fejl</h2>
    Vi beklager!

    <a href="index.php?option=com_content&amp;view=article&amp;id=632:vejledning-sogning-i-indtastede-kilder&amp;catid=97">Få tips til din søgning i denne vejledning</a>

    Eller skriv til os, hvis fejlen ikke forsvinder.

    <a class="arrow" href="index.php?option=com_content&amp;view=article&amp;id=8:kontakt&amp;catid=16:om-os">Find kontaktoplysninger</a> --}}
  </div>
  <div id="search-app-no-results" ng-cloak>
    @if (get_field('sdksearch_no-results'))
      {!! get_field('sdksearch_no-results') !!}
    @endif

    {{-- <h2>Ingen resultater</h2>
    <p>Din søgning gav desværre ikke nogen resultater</p>
    <p><a href="index.php?option=com_content&amp;view=article&amp;id=632:vejledning-sogning-i-indtastede-kilder&amp;catid=97">Få tips til din søgning i denne vejledning</a></p> --}}
  </div>

  <div id="search-app-help-text" ng-cloak>
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
