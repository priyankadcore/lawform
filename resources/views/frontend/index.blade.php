@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if($pageSections->isNotEmpty())
        @foreach($pageSections as $section)
            @php
                $sectionType = $section->sectionType->type ?? null;
                $styleVariant = strtolower(str_replace(' ', '-', $section->sectionTemplate->style_variant ?? ''));
                $fields = $section->fields_data ?? [];
            @endphp

            @includeIf("frontend.{$sectionType}.{$styleVariant}", [
                'section' => $section,
                'fields' => $fields
            ])
        @endforeach
    @else
        <div style="text-align:center; padding:170px 100px;">
            <h2 style="color:#444; font-weight:600;">This page section not found</h2>
            <p style="color:#777;">We’re working on adding content to this page soon.</p>
        </div>
    @endif
@endsection
