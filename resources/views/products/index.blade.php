@extends('layout')

@section('content')

    <product
        :title="'{{ __('produtos') }}'"
        :button-text="'{{__('novo') . ' ' . __('produto')}}'"
        :headers="'{{ $tableHeaders }}'"
        :get="'{{ route('products.get') }}'"
        :store="'{{ route('products.store') }}'"
        ref="p"
    >

    </product>
@endsection
