@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
</div>
<div id="app"></div>
<div id="app--">
    {{-- <create-product :variants="{{ $variants }}">Loading</create-product> --}}
    <section>
        <form id="product-create-form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" placeholder="Product Name" class="form-control" name="title" required/>
                            </div>
                            <div class="form-group">
                                <label for="">Product SKU</label>
                                <input type="text" placeholder="Product Name" class="form-control" name="sku" required/>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="" cols="30" rows="4" class="form-control" name="description" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Media
                            </h6>
                        </div>
                        <div class="card-body border">
                            <!-- dropzone -->
                            <!-- dropzone end -->
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- new varient end -->
                    <div class="card shadow mb-4">
                        <div class="
                                card-header
                                py-3
                                d-flex
                                flex-row
                                align-items-center
                                justify-content-between
                            ">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Variants
                            </h6>
                        </div>
                        <div class="card-body varient-lists-card-box">
                            <!-- variend lists start -->
                            <div class="varient-lists varient-lists-1">
                                <div class="row varient-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Option</label>
                                            <select class="form-control" name="variant[]">
                                                @foreach($variants as $variant)
                                                <option value="{{ $variant->id }}">{{ $variant->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="float-right text-primary" style="cursor: pointer" onclick="javascript:remove_varient_options('varient-lists-1')">Remove</label>
                                            <input type="text" class="form-control" name="varient_price[]" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- varient lists end -->
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" onclick="javascript:add_another_option()">
                                Add another option
                            </button>
                        </div>
                        <div class="card-header text-uppercase">Preview</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Variant</td>
                                            <td>Price</td>
                                            <td>Stock</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="text" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-lg btn-primary">
                Save
            </button>
            <button type="button" class="btn btn-secondary btn-lg">
                Cancel
            </button>
        </form>
    </section>
</div>
<script>
var varientLists = [];
    $(function() {
        @foreach($variants as $key => $value)
        varientLists.push( <?php echo $value; ?> );
        @endforeach
        $("#product-create-form").submit(function(event) {
            event.preventDefault();

            let title = $("input[name=title]").val();
            let sku = $("input[name=sku]").val();
            let description = $("textarea[name=description]").val();

            let _token   = $('meta[name="csrf-token"]').attr('content');
            let variant_lists_data = {};
            $.each($('.varient-lists'), function(index, value){
                variant_lists_data[index] = {
                    'varient_id' : $(this).find('select[name="variant[]"] option:selected').val(),
                    'varient_options_value' : $(this).find('input[name="varient_price[]"]').val()
                };
            });

            $.ajax({
                url: "http://127.0.0.1:8000/product",
                type:"POST",
                dataType: "json",
                data:{
                    title:title,
                    sku:sku,
                    description:description,
                    variant_lists_data:variant_lists_data,
                    _token: _token
                },
                success:function(response){
                if(response && response.isSuccess === true) {
                    alert("product inserted successfully");
                } else {
                    alert("Error while create product");
                }
                },
            });
        });
    });

    function add_another_option() {
        var option_lists = '', counter_html = $('.varient-lists').length;
        $.each(varientLists, function( index, value ) {
            option_lists += '<option value="'+value['id']+'">' + value['title'] + '</option>';
        });
        var appened_html = '<div class="varient-lists varient-lists-'+counter_html+'"><div class="row varient-'+counter_html+'"><div class="col-md-4"><div class="form-group"><label for="">Option</label><select class="form-control" name="variant[]">'+option_lists+'</select></div></div><div class="col-md-8"><div class="form-group"><label class="float-right text-primary" style="cursor: pointer" onclick=javascript:remove_varient_options("varient-lists-'+counter_html+'")>Remove</label><input type="text" class="form-control" name="varient_price[]" required/></div></div></div></div>';
        $( ".varient-lists-card-box" ).append(appened_html);
    }


    function remove_varient_options(remove_class_identity) {
        $('.' + remove_class_identity).remove();
    }

</script>
@endsection
