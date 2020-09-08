<section id="nav-bar">
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
              <a class="navbar-brand" href="index.php">DOUBLE ONIONS</a>
                <!----style="width:100px;height:70px;"---->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                        
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">PRODUCTS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="clothing.php">CLOTHING</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="prints.php">PRINTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="stickers.php">STICKERS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">CART</a>
                    </li>
                    <li class="nav-item">
                        <?php
                            if(isset($_SESSION['userId'])){
                                echo  '<a class="nav-link" id="logout-tab" href="includes/logout.php">LOGOUT</a>';
                            }
                            else{
                                echo  '<a class="nav-link" id="login-tab" href="login.php">LOGIN</a>';
                            }
                        ?>
                    </li>
                </ul>
                <div class="form-group">
                        <form class="form-inline" action="includes/searchProducts.php" method="POST">
                            <input class="form-control form-control-sm" id="navbar-search" type="text" name="keyword" placeholder="Search items..." >
                            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                            <input type="hidden" name="product-type" value='searchResults'>
                            <input type="submit" style="display: none"/>
                        </form>
                    </div>
              </div>
            </nav>
        </section>