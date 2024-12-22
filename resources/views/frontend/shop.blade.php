@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')


 <livewire:shop :type="request('type')" :id="request('id')" :title="request('title')" wire:lazy/>
   
@endsection
