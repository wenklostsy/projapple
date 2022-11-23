<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .propaganda {
            background-color: #fff;
            padding: 10px;
            border: none;
            height: 400px;
            position: relative;
            cursor: pointer
        }

        .product-image img {
            position: absolute;
            width: 400px;
            transition: all 0.5s
        }

        .propaganda:hover .product-image img {
            transform: rotate(10deg)
        }

        @media (max-width:770px) {
            .product-image img {
                position: absolute;
                top: 130px;
                right: 10px;
                width: 250px
            }
        }

        @media (max-width:470px) {
            .product-image img {
                position: absolute;
                top: 190px;
                right: 10px;
                width: 150px
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row dd-flex justify-content-center">
            <div class="col-md-8">
                <div class="propaganda px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-row align-items-center">
                                <i class='fa fa-apple fs-1'></i> <span class="fw-bold ms-1 fs-5">Apple</span>
                            </div>
                            <h1 class="fs-1 ms-1 mt-3">Watch Series 4</h1>
                            <div class="ms-1">
                                <span>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </span>
                            </div>
                            <div class="mt-5 radio-buttons">
                                <label class="radio">
                                    <input type="radio" name="code" value="grey" checked> <span></span> 
                                </label> <label class="radio">
                                    <input type="radio" name="code" value="pink"> <span></span> 
                                </label> 
                                <label class="radio">
                                    <input type="radio" name="code" value="black"> <span></span> 
                                </label>
                            </div>
                            <div> <button class="button"> 
                                <span>Order Now</span> 
                                <i class="ms-2 fa fa-long-arrow-right"></i> </button> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-image">
                                <img src="../pp.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>