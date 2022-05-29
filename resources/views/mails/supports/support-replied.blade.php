@component('mail::message')
# Introduction

Sua dúvida foi respondido!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
