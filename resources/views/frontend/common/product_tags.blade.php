@php
$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_ger = App\Models\Product::groupBy('product_tags_ger')->select('product_tags_ger')->get();
@endphp




<div class="sidebar-widget product-tag wow fadeInUp">
@if(session()->get('language') == 'english') 
    <h3 class="section-title">Product tags</h3>
    @else
    <h3 class="section-title">Produkt tags</h3>
    @endif
    <div class="sidebar-widget-body outer-top-xs">

        <div class="tag-list">

            @if(session()->get('language') == 'german')

            @foreach($tags_ger as $tag)
            <a class="item active" title="" href="{{ url('product/tag/'.$tag->product_tags_ger) }}">
                {{ str_replace(',',' ',$tag->product_tags_ger)  }}</a>
            @endforeach

            @else

            @foreach($tags_en as $tag)
            <a class="item active" title="" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
                {{ str_replace(',',' ',$tag->product_tags_en)  }}</a>
            @endforeach

            @endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->