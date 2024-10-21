@extends('layouts.master')
@section('content')

@if (!Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('redeem-center') }}";
   </script>
@endif

<div class="shop-saction-all">
<div class="container">
   <div class="row">
      <div class="col-md-3">
         <div class="shop-saction-left">
            <div class="price-box-left">
               <span>Price</span>
               <div class="range-slider flat" style='--min:0; --max:5000; --value-a:0; --value-b:5000;'>
                  <input type="range" id="min_price_slider" min="0" max="5000" value="0" oninput="updateValue(this, 'output-a', 'min_price_slider', 'max_price_slider')" class="is_price">
                  <output id="output-a">$60</output>
                  <input type="range" id="max_price_slider" min="0" max="5000" value="5000" oninput="updateValue(this, 'output-b', 'min_price_slider', 'max_price_slider')" class="is_price">
                  <output id="output-b">$5000</output>
                  <div class='range-slider__progress'></div>
               </div>
            </div>
            <div class="featured-products-box">
               <div class="form-group">
                  <input type="checkbox" name="is_featured_products" value="Yes" id="is_featured_products" class="is_featured_products">
                  <label for="is_featured_products">Featured Products</label>
               </div>
            </div>
            <div class="featured-products-box">
               <div class="form-group">
                  <input type="checkbox" name="is_in_stock" value="Yes" id="is_in_stock" class="is_in_stock">
                  <label for="is_in_stock">In stock</label>
               </div>
            </div>
            @if(count($all_categories) >= 1)
            <div class="categories-box">
               <span>Categories</span>
               <div class="side-menu">
                  <ul>
                     @foreach($all_categories as $category)
                        @if($category->parent_category == 0)
                              @php
                                 $subcategories = $all_categories->where('parent_category', $category->id);
                              @endphp
                              <li>
                                 @if($subcategories->isNotEmpty())
                                    <a href="javascript:void(0)" class="dropdown-btn is_category" style="<?= $category->slug == $main_cat_slug ? 'color:#F39519;' : '' ?>" data-main_category_slug="{{ $category->slug }}" data-category_slug="{{ $category->slug }}">{{ $category->name }}<span class="arrow">&#9662;</span></a>
                                    <ul class="dropdown-container" style="<?= $category->slug == $main_cat_slug ? 'display:block;' : '' ?>">
                                          @foreach($subcategories as $subcategory)
                                             <li><a href="javascript:void(0)" class="is_category" style="<?= $subcategory->slug == $product_cat ? 'color:#F39519;' : '' ?>"  data-main_category_slug="{{ $category->slug }}" data-category_slug="{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>
                                          @endforeach
                                    </ul>
                                 @else
                                    <a href="javascript:void(0)" class="is_category" data-main_category_slug="{{ $category->slug }}" data-category_slug="{{ $category->slug }}">{{ $category->name }}</a>
                                 @endif
                              </li>
                        @endif
                     @endforeach
                  </ul>
               </div>
            </div>
            @endif
         </div>
      </div>
      <div class="col-md-9">
         <div class="shop-saction-right">
            <h2>Shop</h2>
            <div class="selecttd-drop-down">
               <div class="slect-box">
                  <select name="select" class="product-type-search form-control" id="select-option">
                     <option value="recent_product">Recent Products</option>
                     <option value="featured_product">Featured Products</option>
                     <option value="random">Random Products</option>
                  </select>
               </div>
               <div class="slect-box">
                  <select name="select" class="product-orderby-search form-control" id="select-option">
                     <option value="">Sort by price:</option>
                     <option value="date">Sort by latest</option>
                     <option value="price"> Sort by price: low to high</option>
                     <option value="price-desc">Sort by price: high to low</option>
                  </select>
               </div>
            </div>
            @if(count($all_products) >= 1)
            <div class="product-all-box">
               <div class="row">
                  @foreach($all_products as $key => $product_detail)
                     <div class="col-md-3">
                        <div class="product-inner-box">
                           <div class="product-image"><img src="{{ url('public/uploads/products/'.$product_detail->image) }}" alt="{{ $product_detail->image }}"></div>
                           <div class="{{  $product_detail->wishlist_product->count() > 0 ? 'item_already_added remove-wishlist' : 'wsilist-box add_to_wishlist' }}" 
                              data-product_id="{{ $product_detail->id }}"><i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h3><a href="{{ url('product',$product_detail->product_slug) }}">{{ $product_detail->product_name }}</a></h3>
                           <div class="star-rew"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <span>0</span></div>
                           <div class="price">${{ number_format($product_detail->product_price, 2, '.', ',') }}                           </div>
                           <div class="shop-now"><a href="{{ url('product',$product_detail->product_slug) }}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Shop Now</a></div>
                        </div>
                     </div>
                  @endforeach
               </div>
               <div class="paginaction">
               {{ $all_products->appends(request()->query())->links() }}
               </div>
            </div>
            @else
            <div class="product-all-box">
                <div class="row">
                    <p> No Product Found
                </div>        
            </div>        
            @endif
         </div>
      </div>
   </div>
</div>
<script>
   /*document.body.insertAdjacentHTML('afterbegin', ``)
   
   // These slider range component was used in my other component:
   // https://github.com/yairEO/color-picker
   
   var settings = {
     visible: 1, 
     theme: {
       background: "rgba(0,0,0,.9)",
     },
     CSSVarTarget: document.querySelector('.range-slider'),
     knobs: [
       {
         label: '<h2>These Are Some of The Variables:</h2>',
         render: ' ',
       },
       "Thumb",
       {
         cssVar: ['thumb-size', 'px'],
         label: 'thumb-size',
         type: 'range',
         min: 6, max: 33 //  value: 16,
       },
       {
         cssVar: ['thumb-color'], // alias for the CSS variable
         label: 'thumb-color',
         type: 'color',
       },
       "Value",
       {
         cssVar: ['value-active-color'], // alias for the CSS variable
         label: 'value active color',
         type: 'color',
         value: 'white'
       },
       {
         cssVar: ['value-background'], // alias for the CSS variable
         label: 'value-background',
         type: 'color',
       },
       {
         cssVar: ['value-background-hover'], // alias for the CSS variable
         label: 'value-background-hover',
         type: 'color',
       },
       {
         cssVar: ['primary-color'], // alias for the CSS variable
         label: 'primary-color',
         type: 'color',
       },
       // {
       //   cssVar: ['value-offset-y', 'px'],
       //   label: 'value-offset-y',
       //   type: 'range', value: 5, min: -10, max: 20
       // },
       "Track",
       {
         cssVar: ['track-height', 'px'],
         label: 'track-height',
         type: 'range', value: 8, min: 6, max: 33
       },
       {
         cssVar: ['progress-radius', 'px'],
         label: 'progress-radius',
         type: 'range', value: 20, min: 0, max: 33
       },
       {
         cssVar: ['progress-background'], // alias for the CSS variable
         label: 'progress-background',
         type: 'color',
         value: '#EEEEEE'
       },
       {
         cssVar: ['fill-color'], // alias for the CSS variable
         label: 'fill-color',
         type: 'color',
         value: '#0366D6'
       },
       "Ticks",
       {
         cssVar: ['show-min-max'],
         label: 'hide min max',
         type: 'checkbox',
         value: 'none'
       },
       {
         cssVar: ['ticks-thickness', 'px'],
         label: 'ticks-thickness',
         type: 'range',
         value: 1, min: 0, max: 10
       },
       {
         cssVar: ['ticks-height', 'px'],
         label: 'ticks-height',
         type: 'range',
         value: 5, min: 0, max: 15
       },
       {
         cssVar: ['ticks-gap', 'px'],
         label: 'ticks-gap',
         type: 'range',
         value: 5, min: 0, max: 15
       },
       {
         cssVar: ['min-max-x-offset', '%'],
         label: 'min-max-x-offset',
         type: 'range',
         value: 10, step: 1, min: 0, max: 100
       },
       {
         cssVar: ['min-max-opacity'],
         label: 'min-max-opacity',
         type: 'range', value: .5, step: .1, min: 0, max: 1
       },
       {
         cssVar: ['ticks-color'], // alias for the CSS variable
         label: 'ticks-color',
         type: 'color',
         value: '#AAAAAA'
       },
     ]
   }
   
   new Knobs(settings)*/
</script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       var dropdowns = document.querySelectorAll('.dropdown-btn');
   
       dropdowns.forEach(function (dropdown) {
           dropdown.addEventListener('click', function (event) {
               // Prevent the default anchor tag action
               event.preventDefault();
   
               var dropdownContent = this.nextElementSibling;
               var arrow = this.querySelector('.arrow');
               var isOpen = dropdownContent.style.display === 'block';
   
               // Close all dropdowns
               dropdowns.forEach(function (item) {
                   var content = item.nextElementSibling;
                   var itemArrow = item.querySelector('.arrow');
                   content.style.display = 'none';
                   itemArrow.classList.remove('rotate');
               });
   
               // Toggle the clicked dropdown
               if (!isOpen) {
                   dropdownContent.style.display = 'block';
                   arrow.classList.add('rotate');
               }
           });
       });
   });
</script>
@endsection
