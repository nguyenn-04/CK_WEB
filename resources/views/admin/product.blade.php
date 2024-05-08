@extends('layouts.admin')
@section('container-main')
<div class="container-main-product">
    <div class="product-header">
        <div class="ph-search">
            <input type="text" placeholder="Search">
                <i class="fa-solid fa-search"></i>
        </div>
        <div class="ph-createOrder">
            <a href="{{route('createproduct_admin')}}" id="ph-create">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    <p>Add Product</p>
                </button>
            </a>
            <a href="{{route('orderproduct_admin')}}" id="ph-order">
                <button>
                    <i class="fa-solid fa-dolly"></i>
                    <p>Order</p>
                </button>
            </a>
        </div>
    </div>
    <div class="list-product">
        <div class="classify-product">
            <h3>Products</h3>
            <div class="cp-list-classify">
                <div class="cp-sort">
                    <select name="sort" id="sort">
                        <option value="default">Sort By</option>
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <div class="cp-collection">
                    <select name="collection" id="collection">
                        <option value="default">Collection Type</option>
                        <option value="all">All</option>
                        <option value="new">New</option>
                        <option value="sale">Sale</option>
                    </select>
                </div>
                <div class="cp-price">
                    <select name="price" id="price">
                        <option value="default">Price Range</option>
                        <option value="all">All</option>
                        <option value="0-100">0-100</option>
                        <option value="100-200">100-200</option>
                        <option value="200-300">200-300</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="list-product-created">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="check" id="checkAllProduct" >
                        PRODUCT DETAILS
                    </th>
                    <th>CATEGORY</th>
                    <th>COLOR</th>
                    <th>PRICE</th>
                    <th>SIZE</th>
                    <th>CODE</th>
                    <th>ACTION</th>
                </tr>
                <tr> {{--Cho foreach chạy tại đây--}}
                    <td>
                        <div class="lpc-product">
                            <input type="checkbox" name="check" id="check" class="Select-product">
                            <img src="{{asset('images/product-nike.png')}}" alt="nike">
                            <div class="lpc-name-description">
                                <h3>Nike Air Max 270c</h3>
                                <p>Fresh, Comfortable, New item</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="lpc-category">
                            <p>Sneaker</p>
                            <p>Sport</p>
                        </div>
                    </td>
                    <td>
                        <div class="lpc-color">
                            <p>Blue</p>
                            <p>Yellow</p>
                            <p>White</p>
                        </div>
                    </td>
                    <td>
                        <p>199$</p>
                    </td>
                    <td>
                        <p>40</p>
                    </td>
                    <td>
                        <p>UY37494</p>
                    </td>
                    <td>
                        <button type="button" class="edit">Edit</button>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>
</div>
<script>
    // Checkbox for all checkboxes
    let checkbox = document.getElementById('checkAllProduct');
    checkbox.addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.Select-product');
        for (let i of checkboxes) {
            if(checkbox.checked) {
                i.checked = true;
            } else {
                i.checked = false;
            }
        }
    });
</script>
@endsection