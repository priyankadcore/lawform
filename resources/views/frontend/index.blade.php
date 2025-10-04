@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    @foreach($pageSections as $section)
        @php
            $sectionType = $section->sectionType->type;
            $styleVariant = strtolower(str_replace(' ', '-', $section->sectionTemplate->style_variant));
            $fields = $section->fields_data; // Fields data
            
            // Debug ke liye
            // if($sectionType == 'faq' ) {
            //     echo "<pre>";
            //     print_r($fields);
            //     echo "</pre>";
            // }
        @endphp
        
        @includeIf("frontend.{$sectionType}.{$styleVariant}", [
            'section' => $section,
            'fields' => $fields
        ])
        
    @endforeach
@endsection