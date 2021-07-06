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
                                <input type="text" placeholder="Product Name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Product SKU</label>
                                <input type="text" placeholder="Product Name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="" cols="30" rows="4" class="form-control"></textarea>
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
                        <div class="card-body">
                            <!-- variend lists start -->
                            <div class="varient-lists">
                                <div class="row varient-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Option</label>
                                            <select class="form-control" name="lstVarient">
                                                @foreach($variants as $variant)
                                                <option value="{{ $variant->id }}">{{ $variant->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="float-right text-primary" style="cursor: pointer" onclick="javascript:remove_varient_options('varient-1')">Remove</label>
                                            <input type="text" class="form-control" />
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
            alert("Handler for .submit() called.");
            event.preventDefault();
        });
    });

    function add_another_option() {
        let option_lists = '';
        $.each(varientLists, function( index, value ) {
            option_lists += '<option>' + value['title'] + '</option>';
        });
        //console.log(option_lists);
        var = '<div class="row varient-1"><div class="col-md-4"><div class="form-group"><label for="">Option</label><select class="form-control" name="lstVarient"></select></div></div><div class="col-md-8"><div class="form-group"><label class="float-right text-primary" style="cursor: pointer" onclick="javascript:remove_varient_options('varient-1')">Remove</label><input type="text" class="form-control" /></div></div></div>';
    }

    function remove_varient_options(remove_class_identity) {
        $('.' + remove_class_identity).remove();
    }

</script>
@endsection
