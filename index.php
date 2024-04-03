<?php
$when = time();
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazing Groceries</title>
  <link rel="stylesheet" href="./css/foundation.css">
  <link rel="stylesheet" type="text/css" href="./css/slick.css" />
  <link rel="stylesheet" type="text/css" href="./css/slick-theme.css" />
  <link rel="stylesheet" href="./css/app.css?id=<?php echo"$when"?>">
</head>

<body>


<div class="reveal" id="cart-container" data-reveal>
  
  <div class="cart1 hideallcart">
  <h1>My Cart</h1>
  <div class="cart-info"></div>
  <input type="button" id="next-shipping" value="Next">
  </div>

  <div class="cart2 hideallcart">
  <h1>Shipping</h1>
  <div class="shipping-info">
  <label for="">First Name:</label>
    <input type="text" id="name_first" value=""><br>
    <label for="">Last Name:</label>
    <input type="text" id="name_last" value=""><br>
    
  </div>
  <input type="button" id="next-payment" value="Next">
  </div>


  <div class="cart3 hideallcart">
  <h1>Payment</h1>
  <div class="payment-info">
Name on Credit card<br>
Card Number<br>
Month<br>
Year<br>
CVV<br>

  </div>
  <input type="button" id="next-confirm" value="Next">
  </div>

  <div class="cart4 hideallcart">
  <h1>Confirm</h1>
  <div class="confirm-info">
 get the list of items again but not delete, + or -
 when sent
 add invoice
 
  </div>
  <input type="button" id="next-thank-you" value="Next">
  </div>

  <div class="cart5 hideallcart">
  <h1>Thank You!</h1>
  <div class="thank-you-info"></div>
  <input type="button" id="next-close" value="Close">
  </div>

  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
  
</div>

<div class="reveal" id="login-container" data-reveal>
  <h1>Login</h1>
  
  <form>
            <div>
                <label for="email">Email:</label><br>
                <input type="text" id="email" value="">
            </div>

            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" value="">
            </div>

            <div>
                <input type="button" id="loginAccount" value="Login">
            </div>
        </form>

  
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



  <main>
    <header>
      <div class="navigation">

        <div class="logo">
          <img src="./assets/images/bm-logo.png" alt="">
        </div>

          <div class="topSection">

              <div class="search-link">
              <input type="text" name="search" class="search-bar" id="search" placeholder="Search by Product">
              </div>

          </div>

        <div class="right-nav">

      <div class="login-container">
        <div>
          <input type="button" value="Create Account" id="" class="crtAcnt">
          <a class="login-link" data-open="login-container">
            <img id="user-pic" src="./assets/images/user.png" alt="">
          </a>
        </div>

      </div>

      <div class="department-link">
            <a href="" class="department">Departments &nbsp
              <span class="icon_more"></span>
            </a>
            <div>
              <ul class="department-list-container"></ul>
            </div>
          </div>

        <div class="cart">
          <a class="cart-link" data-open="cart-container">
            <img id="cart-pic" src="./assets/images/shopping-cart.png" />
            <div id="cart-link-value">0</div>
          </a>
        </div>

        </div>

      </div>
      </div>
    </header>

  </main>

  <div class="searchBar">
    <main class="grid-container">
      <div class="grid-x grid-margin-x">
<!-- 
        <div class="large-2 small-2 cell department">
          <div class="department-link">
            <a href="" class="department">Departments &nbsp
              <span class="icon_more"></span>
            </a>
            <div>
              <ul class="department-list-container"></ul>
            </div>
          </div>
        </div> -->
        <div class="large-1 small-2 cell">

        </div>
        <div class="large-7 small-6 cell search">
          <!-- <div class="search-link">
            <input type="text" name="search" id="search" placeholder="Search by Prodect">
          </div> -->

        </div>
        <div class="large-2 small-2 cell">
        </div>
      </div>
    </main>
  </div>

  <!-- <div class="department-link">Departments</div>
        <div class="search-link">Search</div>
        <div class="cart-link">Cart</div> -->
  <!-- <div class="checkout-link">Checkout</div> -->

  <div class="poster-container splash-page hideAll">
    <main class="grid-container">
      <section class="splash-page hideAll">
        <div class="grid-x grid-margin-x">
          <article class="large-12 small-12 cell">
            <div class="cell large-12 small-12">
              <div class="featured-infobox">
                <h3>Fresh Canadian Produce</h3>
                <h4>Save more when shopping locally on fresh canadian produce!</h4>
                <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/Produce"><button>Learn More</button></a<
              </div>
            </div>
          </article>
        </div>
      </section>
    </main>
  </div>

  <div class="grid-container">

    <section class="splash-page hideAll">

      <article class="grid-x grid-margin-x">
        <div class="cell large-12 ">
          <h5>This Weeks Deals &nbsp<a class="moreProduce"> Shop more produce</a></h5>
        </div>
      </article>

      <article class="grid-x grid-margin-x">
        <div class="cell large-3 small-12 gray-1 produce">
          <div class="card">
            <img src="./images/1360/13609017805.jpg">
            <div class="card-section">
              <p class="brand">Just Desserts</p>
              <h6>Cupcake, Red Velvet</h6>
              <p class="origin">Produce of Canada</p>
              <div class="priceSection">
                <div>
                  <span class="price">$2.25 ea</span>
                </div>
                <div>
                  <button class="reduce reduce-main do-minus" data-id="989"> - </button>
                  <span id="quantity_989" class="quantity"> 1 </span>
                  <button class="plus do-plus" data-id="989"> + </button>
                </div>
              </div>
              <div class="addSection">
                <div>
                  <a href="" class="details">View Product Details</a>

                </div>
                <div>
                  <button class="add do-add" data-id="989"> Add</button>
                </div>
              </div>
            </div>


          </div>
        </div>


        <div class="cell large-3 small-12 gray-1 produce">
          <div class="card">
            <img src="./images/1300/13000009614.jpg">
            <div class="card-section">
              <p class="brand">Jack Daniel's</p>
              <h6>Barbecue Sauce, Original No. 7 Recipe</h6>
              <p class="origin">Produce of Canada</p>
              <div class="priceSection">
                <div>
                  <span class="price">$1.25 ea</span>
                </div>
                <div>
                  <button class="reduce reduce-main do-minus" data-id="607"> - </button>
                  <span id="quantity_607" class="quantity"> 1 </span>
                  <button class="plus do-plus" data-id="607"> + </button>
                </div>
              </div>
              <div class="addSection">
                <div>
                  <a href="" class="details">View Product Details</a>

                </div>
                <div>
                  <button class="add do-add" data-id="607"> Add</button>
                </div>
              </div>
            </div>


          </div>
        </div>

        
        <div class="cell large-3 small-6 gray-1 produce">
          <div class="card">
            <img src="./assets/images/banane-large.jpg">
            <div class="card-section">
              <h6>Bananas</h6>
              <p class="origin">Produce of Canada</p>
              <div class="priceSection">
                <p>
                  <span class="price">$1.99</span>
                  <button class="reduce"> - </button>
                  <span class="quantity"> 1 </span>
                  <button class="plus"> + </button>
                </p>
              </div>

              <div class="addSection">
                <div>
                  <a href="" class="details">View Product Details</a>

                </div>
                <div>
                  <button class="add do-add" data-id="607"> Add</button>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="cell large-3 small-6 gray-1 produce">
          <div class="card">
            <img src="./assets/images/grape_229112122.jpg">
            <div class="card-section">
              <h6>Grapes</h6>
              <p class="origin">Produce of Canada</p>
              <div class="priceSection">
                <p>
                  <span class="price">$1.99</span>
                  <button class="reduce"> - </button>
                  <span class="quantity"> 1 </span>
                  <button class="plus"> + </button>
                </p>
              </div>
              <div class="addSection">
                <div>
                  <a href="" class="details">View Product Details</a>

                </div>
                <div>
                  <button class="add do-add" data-id="607"> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <article class="grid-x grid-margin-x">
        <div class="aisle-title">
          <h5>Shop Polular Grocery Aisles</h5>
          <p>Most Popular Departments</p>
        </div>
      </article>



      <article class="grid-x grid-margin-x">

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/Produce"> <div class="card">
            <img src="assets/images/produce.jpeg">
            <div class="card-divider card-title">
              <h7>Produce</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/Deli"> <div class="card">
            <img src="assets/images/deli.jpeg">
            <div class="card-divider card-title">
              <h7>Deli</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/MilkAndDairy"> <div class="card">
            <img src="assets/images/dairy.webp">
            <div class="card-divider card-title">
              <h7>Dairy</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/Bakery"> <div class="card">
            <img src="assets/images/bakery.avif">
            <div class="card-divider card-title">
              <h7>Bakery</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/DrinksandSnacks"> <div class="card">
            <img src="assets/images/snacks.avif">
            <div class="card-divider card-title">
              <h7>Snacks</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/Cereal"> <div class="card">
            <img src="assets/images/cereal.webp">
            <div class="card-divider card-title">
              <h7>Cereal</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/BabyFoodAndSupplies"> <div class="card">
            <img src="assets/images/babies.webp">
            <div class="card-divider card-title">
              <h7>Baby Supplies</h7>
            </div>
          </div></a>
        </div>

        <div class="cell large-3 small-6 gray-1 department-link produce">
          <a href="https://dca.durhamcollege.ca/~rhynoldaustin/easy_groceries/dynamic_site/index.php#/department/DrinksandSnacks"> <div class="card">
            <img src="assets/images/beverages.webp">
            <div class="card-divider card-title">
              <h7>Beverages</h7>
            </div>
          </div></a>
        </div>

      </article>


    </section>



    <section class="main-page hideAll">
      <div class="grid-x grid-margin-x">
        <div class="large-12 cell">
          <article class="grid-x grid-margin-x">
            <div class="cell large-12 small-12 cookie-trail">
              <!-- <h6 class="trail-end">hhhh</h6> -->
            </div>  
          </article>

          <article class="grid-x grid-margin-x main-page-container">

            <div class="cell large-3 small-12 gray-1 produce">
              <div class="card">
                <img src="./assets/images/grapefruit.jpg">
                <div class="card-section">
                  <p class="brand">FARMER'S MARKET</p>
                  <h6>Grapefruit, large Red</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$1.99 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <input value="1">
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>

            <div class="cell large-3 small-12 gray-1 produce">
              <div class="card">
                <img src="./assets/images/brocoli.jpg">
                <div class="card-section">
                  <p class="brand">FARMER'S MARKET</p>
                  <h6>Broccoli Stalks</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$2.47 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/banane-large.jpg">
                <div class="card-section">
                  <p class="brand">AMAZING MARKET</p>
                  <h6>Bananas,Organic</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$0.30 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/grape_229112122.jpg">
                <div class="card-section">
                  <p class="brand">AMAZING ORGANIC</p>
                  <h6>Grapes, Red Seedless</h6>
                  <p class="origin">Produce of US</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$1.99 kg</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product5.jpg">
                <div class="card-section">
                  <p class="brand">AMAZING MARKET</p>
                  <h6>Cantaloupe</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$3.99 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product6.jpg">
                <div class="card-section">
                  <p class="brand">BOB'S MARKET</p>
                  <h6>Apple, Gala</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$0.79 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product7.jpg">
                <div class="card-section">
                  <p class="brand">AMAZING MARKET</p>
                  <h6>Strawberries 1lb</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$4.99 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product8.jpg">
                <div class="card-section">
                  <p class="brand">SUNSHINE</p>
                  <h6>Pepper, Rainbow Bell</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$3.99 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product9.jpg">
                <div class="card-section">
                  <p class="brand">FARMER'S MARKET</p>
                  <h6>Lettuce Blend</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$4.79 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product10.jpg">
                <div class="card-section">
                  <p class="brand">FARMER'S MARKET</p>
                  <h6>Spinach Mix Blend</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$3.97 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product11.jpg">
                <div class="card-section">
                  <p class="brand">FARMER'S MARKET</p>
                  <h6>Tomato, Roma</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$0.79 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="cell large-3 small-6 gray-1 produce">
              <div class="card">
                <img src="./assets/images/product12.jpg">
                <div class="card-section">
                  <p class="brand">BOB'S MARKET</p>
                  <h6>Apple, Honeycrisp</h6>
                  <p class="origin">Produce of Canada</p>
                  <div class="priceSection">
                    <div>
                      <span class="price">$0.79 ea</span>
                    </div>
                    <div>
                      <button class="reduce reduce-main"> - </button>
                      <span class="quantity"> 1 </span>
                      <button class="plus"> + </button>
                    </div>
                  </div>
                  <div class="addSection">
                    <div>
                      <a href="" class="details">View Product Details</a>

                    </div>
                    <div>
                      <button class="add"> Add</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>

          </article>
        </div>
      </div>
    </section>

    <section class="cart-page hideAll">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell gray-1">
          <h1>Your Cart</h1>

          <div class="grid-x">
            <div class="large-1 cell">
              Item
            </div>
            <div class="large-4 cell">
              Product
            </div>
            <div class="large-2 cell">
              Quantity
            </div>
            <div class="large-2 cell">
              Price
            </div>
            <div class="large-2 cell">
              Extended Price
            </div>
            <div class="large-1 cell">
              Delete
            </div>
          </div>

          <div class="grid-x cart-items-contatiner">
            <div class="large-1 cell">
              1
            </div>
            <div class="large-1 cell">
              <img src="" alt="">
            </div>
            <div class="large-3 cell">
              <p>Product</p>
              <p>Brand</p>
              <p>UPC</p>
            </div>
            <div class="large-2 cell">
              <input type="button" value="-">
              <span>2</span>
              <input type="button" value="+">
            </div>
            <div class="large-2 cell">
              $1.25
            </div>
            <div class="large-2 cell">
              $2.50
            </div>
            <div class="large-1 cell">
              <input type="checkbox" name="" id="">
            </div>
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              Sub-Total:
            </div>
            <div class="large-2 cell cart-subtotal">
              $2.50
            </div>
            <div class="large-1 cell">
            </div>
          </div>
          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              HST:
            </div>
            <div class="large-2 cell  cart-hst">
              $0.33
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              Total:
            </div>
            <div class="large-2 cell  cart-total">
              $2.83
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              
            </div>
            <div class="large-2 cell">
              <input type="button" value="Checkout" id="" class="button small checkout-link">
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div>
            
          </div>

        </div>
      </div>
    </section>

    <section class="checkout-page hideAll">
      <div class="grid-x grid-padding-x">
          

          <div class="large-12 cell gray-1">
          <h1>Checkout Content</h1>
          <label for="email-checkout">Email:</label>
          <input type="text" id="email-checkout" placeholder="Email">
          <label for="checkout-email">Email Again:</label>
          <input type="text" id="checkout-email" placeholder="Confirm Email">
          
        </div>
        <div class="large-6 cell gray-1">
          <h1>Billing Information</h1>
          <label for="first-name-checkout">First Name:</label>
          <input type="text" id="first-name-checkout" placeholder="First Name">
          <label for="last-name-checkout">Last Name:</label>
          <input type="text" id="last-name-checkout" placeholder="Last Name">
        </div>
        <div class="large-6 cell gray-1">
          <h1>Shipping Information</h1>
          <label for="shipping-first_name">First Name:</label>
          <input type="text" id="shipping-first_name" placeholder="First Name">
          <label for="shipping-last_name">Last Name:</label>
          <input type="text" id="shipping-last_name" placeholder="Last Name">
        </div>

          <div class="large-6 cell gray-1">
            <input type="button" value="Login" id="" class="button small login-link">
            <input type="button" value="Create Account" id="" class="button small signUp-link">
            <input type="button" value="Payment" id="" class="button small payment-link">
          </div>

       
      </div>

    </section>

    <section class="login-page hideAll">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell gray-1">
          <h1>Login</h1>
          <div>
            <label for="email-login">Email:</label>
            <input type="text" id="email-login" placeholder="Email" value="ray@netmarks.ca">
          
            <label for="password-login">Password:</label>
            <input type="password" id="password-login" placeholder="Password" value="abc">
          
          
            <input type="button" value="Login" id="" class="button small go-login">
            <input type="button" value="Createa Account" id="" class="button small createaccount-link">

          </div>

        </div>
      </div>

    </section>

    <section class="signup-page hideAll">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell gray-1">
          <h1>Create Account</h1>
          <label for="email-signup">Email:</label>
          <input type="text" id="email-signup" placeholder="Email">
          <label for="confirm-email">Email Again:</label>
          <input type="text" id="confirm-email" placeholder="Confirm Email">
          <label for="password">Password:</label>
          <input type="text" id="password" placeholder="Password">
        </div>
        <div class="large-6 cell gray-1">
          <h1>Billing Information</h1>
          <label for="first_name">First Name:</label>
          <input type="text" id="first_name" placeholder="First Name">
          <label for="last_name">Last Name:</label>
          <input type="text" id="last_name" placeholder="Last Name">
        </div>
        <div class="large-6 cell gray-1">
          <h1>Shipping Information</h1>
          <label for="shipping-first_name">First Name:</label>
          <input type="text" id="shipping-first_name" placeholder="First Name">
          <label for="shipping-last_name">Last Name:</label>
          <input type="text" id="shipping-last_name" placeholder="Last Name">
        </div>
        <div class="large-12 cell gray-1">
          <input type="button" value="Create Account" id="" class="button small createaccount">
        </div>

      </div>

    </section>

    <section class="createaccount-page hideAll">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell gray-1">
          <h1>Create Account Content</h1>
          <div>
            <input type="button" value="create account" id="" class="button small createaccount-link">
          </div>

        </div>
      </div>

    </section>

    <section class="payment-page hideAll">
      <div class="grid-x grid-padding-x">
        
      
     
        
        
        <div class="large-12 cell gray-1">
          <h1>Payment Content</h1>

          <label for="payment-name">Name on Card:</label>
          <input type="text" id="payment-name" placeholder="Name on Card">

          <label for="payment-number">Card Number:</label>
          <input type="text" id="payment-number" placeholder="Card Number">

          <label for="payment-month">Month:</label>
          <select id="payment-month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>

          <label for="payment-year">Year:</label>
          <select id="payment-year">
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
          </select>


          <label for="payment-cvv">CVV:</label>
          <input type="text" id="payment-cvv" placeholder="CVV">


          <div>
            <input type="button" value="Back" id="" class="button small back-link">
            <input type="button" value="Continue to Confirm" id="" class="button small confirmed-link">

          </div>

        </div>
      </div>

    </section>

    <section class="confirm-page hideAll">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell gray-1">
          <h1>Confirm Order</h1>

          <div class="grid-x">
            <div class="large-1 cell">
              Item
            </div>
            <div class="large-4 cell">
              Product
            </div>
            <div class="large-2 cell">
              Quantity
            </div>
            <div class="large-2 cell">
              Price
            </div>
            <div class="large-2 cell">
              Extended Price
            </div>
            <div class="large-1 cell">
              &nbsp;
            </div>
          </div>

          <div class="grid-x confirn-items-container">
            
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              Sub-Total:
            </div>
            <div class="large-2 cell confirm-subtotal">
              $2.50
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              HST:
            </div>
            <div class="large-2 cell  confirm-hst">
              $0.33
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              Total:
            </div>
            <div class="large-2 cell  confirm-total">
              $2.83
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div class="grid-x">
            <div class="large-8 cell">
            </div>
            <div class="large-1 cell">
              
            </div>
            <div class="large-2 cell">
              <input type="button" value="Back" id="" class="button small back-link">
              <input type="button" value="Complete Order" id="" class="button small complete-link">
            </div>
            <div class="large-1 cell">
            </div>
          </div>

          <div>
            
          </div>

        </div>
      </div>

    </section>

    <section class="complete-page hideAll">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell gray-1">
          <h1>Order Complete</h1>
          <h2>Thank you</h2>
          <h3>Your order number is <span class="order-number">123</span> </h3>
          <input type="button" value="Back to Main page" id="" class="button small back-main">

        </div>
      </div>

    </section>

  </div>




  <div class="footer-container">
    <footer class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="large-12 cell">
          <div class="footer1">
            <ul>
              <li class="bold">Help</li>
              <br />
              <li>Help center</li>
              <li>FAQs</li>
              <li>Privacy policy</li>
              <li>Cookie policy</li>
              <li>Terms of use</li>
            </ul>
            <ul>
              <li class="bold">About us</li>
              <br />
              <li>PointsMAX</li>
              <li>Careers</li>
              <li>Press</li>
              <li>Blog</li>
            </ul>
            <ul>
              <li class="bold">Partner with us</li>
              <br />
              <li>YCS partner portal</li>
              <li>Partner Hub</li>
              <li>Advertise on Agoda</li>
              <li>Affiliates</li>
              <li>Connectivity partners</li>
            </ul>
            <ul>
              <li class="bold">Get the app</li>
              <br />
              <li>iOS app</li>
              <li>Android app</li>
            </ul>
          </div>

        </div>
      </div>
    </footer>
  </div>
  <div class="footer-container">
    <div class="footer2">
      <p>Copyright @ 2024 Bag Mart All Rights Reserved</p>

    </div>
  </div>



  <script src="./js/vendor/jquery.js"></script>
  <script src="./js/vendor/what-input.js"></script>
  <script src="./js/vendor/foundation.js"></script>

  <script src="./js/sammy.min.js" type="text/javascript"></script>
  <script src="./js/sammy.template.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"
    integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./js/slick.min.js"></script>

  <script src="./js/app.js?id=<?php echo"$when"?>"></script>
</body>

</html>