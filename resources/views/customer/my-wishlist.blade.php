@extends('layouts.master')
@section('content')
<div class="my-account-saction">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('customer.sidebar')
            </div>
            <div class="col-md-9">
                <div class="my-account-right-box">
                    <div class="row">
                        <div class="respnose_wish_list"></div>
                        @if(count($wishlists) >= 1)
                        @foreach($wishlists as $wishlist)
                        <div class="col-md-3">
                            <div class="wishlist-item">
                                <img src="{{ url('public/uploads/products/'.$wishlist->get_wishlist_products->image) }}"
                                    alt="Product Image">
                                <h3>{{ $wishlist->get_wishlist_products->product_name }}</h3>
                                <div class="price">
                                    ${{ number_format($wishlist->get_wishlist_products->product_price, 2, '.', ',') }}
                                </div>
                                <a href="{{ url('product',$wishlist->get_wishlist_products->product_slug) }}"
                                    class="btn add-to-cart">Shop Now</a>
                                <div class="remove-wishlist" data-product_id="{{ $wishlist->product_id }}"
                                    data-user_id="{{ $wishlist->user_id }}">Remove</div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h2>No Product Found</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection