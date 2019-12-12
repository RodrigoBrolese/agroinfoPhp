@extends('layout')

@section('content')

    <product
        :title="'{{ __('produtos') }}'"
        :button-text="'{{__('novo') . ' ' . __('produto')}}'"
        :headers="'{{ $tableHeaders }}'"
        :get="'{{ route('getProducts') }}'"
        :store="'{{ route('storeProducts') }}'"
        ref="p"
    >

    </product>
@endsection
