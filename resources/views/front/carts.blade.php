@extends('layouts.front')
@section('contant')
<div class="container my-5 py-5">
      <h3 class="text-center py-3">Shopping Carts</h3>
      <div class="table-responable">
       <table class="table table-border">
         <thead>
            <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Item Image</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>

        </tbody id="tbody">

       </table>
      </div>
</div>
@endsection