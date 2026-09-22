@extends('layouts.app')

@section('title', 'Home - BSIT Alliance')

@section('content')

<div class="card">
    <h1>Welcome to PUPC BSIT Alliance</h1>

    <p>
        Welcome to the PUPC BSIT Alliance website.
        This website demonstrates Laravel routing,
        Blade layouts, components, and directives.
    </p>
</div>

<x-alert
    title="Upcoming Activities"
    message="Check out some of the activities prepared for BSIT students."
/>

<div class="card">
    <h2>Our Activities</h2>

    <ul>
        @foreach ($activities as $activity)
            <li>{{ $activity }}</li>
        @endforeach
    </ul>
</div>

<div class="card">

    @if (count($activities) >= 3)
        <p>
            There are currently several activities prepared
            for BSIT students.
        </p>
    @else
        <p>
            More activities will be announced soon.
        </p>
    @endif

</div>

@endsection