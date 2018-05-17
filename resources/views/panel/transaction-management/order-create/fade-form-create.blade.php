<div class="fade" style="display: none;">
    @foreach($members as $member)
    <?php
    $status = false;
    foreach($member->divisi as $member_divisi){
        if($member_divisi['sales'][0]['detail'][0]['email'] == $user['email']){
            $status = true;
        }
    }
    ?>
    @if(count($member->divisi) > 0 && $status)
    <div class="divisi-{{$member->id}}">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-original-title="#format: Divisi Name - Sales"></i>
                        </span>
                    </div>
                    <select class="form-control" name="divisi" aria-describedby="divisi-error">
                        <option value=""></option>
                        <?php $i=-1; ?>
                        @foreach($member->divisi as $member_divisi)
                        <?php $i++; ?>
                        @if($member_divisi['sales'][0]['detail'][0]['email'] == $user['email'])
                        <option value="{{$i}}">{{$member_divisi['divisi_name']}} - {{$member_divisi['sales'][0]['name']}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <em id="divisi-error" class="error invalid-feedback"></em>
            </div>
        </div>
    </div>
    @endif
    <div class="shipping-{{$member->id}}">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <select class="form-control shipping-valid" name="shipping" aria-describedby="shipping-error">
                        <option value=""></option>
                        <?php $i=-1; ?>
                        @foreach($member->shipping_address as $member_shipping)
                        <?php $i++; ?>
                        <option value="{{$i}}">{{$member_shipping['address']}}</option>
                        @endforeach
                    </select>
                </div>
                <em id="shipping-error" class="error invalid-feedback"></em>
            </div>
        </div>
    </div>
    <div class="billing-{{$member->id}}">{{$member->billing_address}}</div>
    @endforeach

    <div class="product-order-items">
        <div class="row div-items">
            <input class="arrProduct" type="hidden" name="arrProduct[]" value="1">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-original-title="#format: Product Name - Type"></i>
                            </span>
                        </div>
                        <select class="form-control products" name="product1" aria-describedby="product1-error">
                            <option value=""></option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}} - {{$product->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <em id="product1-error" class="error invalid-feedback products-em"></em>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select class="form-control packages" name="package1" aria-describedby="package1-error">
                        <option value=""></option>
                        <option value="Plastik">Plastik</option>
                        <option value="Aluminium">Aluminium</option>
                        <option value="Jerigen">Jerigen</option>
                        <option value="Drum">Drum</option>
                    </select>
                    <em id="package1-error" class="error invalid-feedback packages-em"></em>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control text-center quantity" type="text" name="quantity1" readonly>
                        <div class="input-group-prepend">
                            <span class="input-group-text">X</span>
                        </div>
                        <select class="form-control weights" name="weight1" aria-describedby="weight1-error" onchange="countTotal($(this))">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <em id="quantity1-error" class="error invalid-feedback quantity-em text-left"></em>
                        </div>
                        <div class="col-md-6">
                            <em id="weight1-error" class="error invalid-feedback weights-em text-right" style="padding-right:5px;"></em>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">=</span>
                        </div>
                        <input type="text" class="form-control text-center totals" name="total1" 
                            placeholder="Total" aria-describedby="total1-error" onchange="countTotal($(this))">
                        <div class="input-group-append">
                            <span class="input-group-text">Kg</span>
                        </div>
                        <em id="total1-error" class="error invalid-feedback totals-em"></em>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group row">
                    <div class="d-none">
                        <div class="input-group">
                            <input type="text" class="form-control text-center realisasi" name="realisasi1" placeholder="Realisasi" aria-describedby="realisasi1-error">
                            <div class="input-group-append">
                                <span class="input-group-text">Kg</span>
                            </div>
                            <em id="realisasi1-error" class="error invalid-feedback realisasi-em"></em>
                        </div><br>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="margin-right:40px;">
                                <button type="button" class="btn btn-danger pull-right" onclick="$(this).closest('.div-items').remove()">
                                <i class="fa fa-remove"></i>
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>