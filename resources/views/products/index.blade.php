@extends('layout')

@section('style')

@endsection
@section('content')
    @forelse($products as $product)
        <div>{{$product->id}}</div>
    @empty
        <div></div>
    @endforelse
@endsection

@section('script')

@endsection