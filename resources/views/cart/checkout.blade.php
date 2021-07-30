@extends("layout")
@section("page_title","Checkout")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Checkout</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="#" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Customer Telephone</label>
                            <input type="tel" name="customer_tel" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Customer Address</label>
                            <textarea name="customer_address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control">
                                <option value="hn">Ha Noi</option>
                                <option value="sg">TP Ho Chi Minh</option>
                                <option value="dn">Da Nang</option>
                            </select>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-outline-danger" type="submit">Checkout</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Cart Qty</th>
                                <th>City</th>

                                <th>Total</th>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->cart_qty}}</td>
{{--                                    <td>{{$item->city}}--}}
                                    <td>  <select name="city">
                                            <option value="0">Choose city</option>
                                            <option value="hn">Ha Noi</option>
                                            <option value="sg">TP Ho Chi Minh</option>
                                            <option value="dn">Da Nang</option>
                                        </select>
                                    </td>
                                    <td>{{$item->cart_qty * $item->qty}}</td>

                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>

                            <tr>
                                <td colspan="5">Grand Total</td>
                                <td>{{$grandTotal}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
<script>
    import Button from "../../js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
