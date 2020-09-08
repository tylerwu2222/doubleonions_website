<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style type="text/css">
/*----Global----*/
*{
    margin:0;
    padding:0;
}
html, body {
    height: 100%;
}
body{
    background-color:#3d3b3b !important;
    color: whitesmoke !important;
    display: flex;
    flex-direction: column;
}
#main-div{
    flex: 1 0 auto;
}
img {
    max-width: 500px;
    display: block;
}
p{
    text-align: center;
}
a:link {
    text-decoration: none;
}
a:visited {
    text-decoration: none;
}
select{
    font-weight: 100;
}
form{
    text-align: center !important;
}
table{
    width:80%; 
    margin-left:10%; 
    margin-right:10%;
    border: none;
    padding: 30px;
    text-align: left;
}
.container{
    padding-top: 20px!important;
    padding-bottom: 20px!important;
}

/*--footer--*/
.footer{
    margin-top: auto;
    flex-shrink: 0;
    background-color: #222222 !important;
}
.footer p{
    color: whitesmoke !important;
}
.fa-2x{
    color: #819ec7!important;
    text-decoration: none;
    margin-left:10px;
}

.fa-2x:hover {
    color: #9baec9!important;
    text-decoration: none;
}
.footer-form{
    margin-top:auto;
    margin-bottom:auto;
}
form.newsletter-form button {
    padding:2px;
    float: right;
    width: 20%;
    background: #2196F3;
    color: white;
    border: none;
    cursor: pointer;
}
form.newsletter-form button:hover {
  background: #0b7dda;
}

/*--index--*/
.jumbotron{
    background-color: #424242;
    padding-top: 25px;
    padding-bottom: 20px;
}
.voting-img{
    width: 60%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.survey-desc{
    margin-top: 10px;
    color:#e0e0e0;
    font-size: 17px;
    font-weight: 100;
}
[type=checkbox]{
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}
[type=checkbox] + img {
  cursor: pointer;
}
[type=checkbox]:checked + img {
  outline: 8px solid #807e7e;
}
#header-padding{
    padding-top: 60px;
}

/*-----NavBar-----*/

.navbar{
    background-color: #222222 !important;
}
.navbar-form{
    display: block!important;
}
.dropdown-menu{
    background-color: #222222 !important;
}
.navbar-brand{
    color: #88c2eb!important;
    font-weight: 300;
    padding-left: 20px;
}

.navbar-nav li{
    padding: 0 10px;   
}

.navbar-nav ul{
    margin:0;
}

#nav-bar ul li a:hover{
    color: #ad8200!important;
    background-color: #424242!important;
}
.navbar{
    background: #fff;
}
.navbar-toggler{
    border:none!important;
}
.nav-link{   
    color: #88c2eb!important;
    font-weight: 400;
    font-size: 19px;
}
.form-group{
    margin-bottom: 0!important;
}
#login-tab{
    font-weight:400;
    font-size:16px;
    padding-top:12px;
}
#logout-tab{
    font-weight:400;
    font-size:16px;
    padding-top:12px;
}
.fa-search{
    background-color: #222222 !important;
    color: #88c2eb;
    display: block;
    padding-left:4px;
    padding-right:4px;
    margin-left: auto; 
    margin-right: auto;
    border:0;
}
.search-button{
    background-color: #222222 !important;
    border:0;
}
/*-----Product Table-----*/
#main-div{
    overflow-x:auto;
}
.product-search{
    max-width: 300px;
    margin: 0 auto;
    margin-left: auto;
    margin-right: auto;
}
.product-type{
    padding-top: 40px;
    text-align: center;
    color: #88c2eb;
    font-weight: 100;
    font-size: 30px;
}
.thumbnail-title{
    text-align: center;
    color: #88c2eb!important;
    font-size: 22px;
    font-weight: 100;
    margin-top: 10px;
}
.thumbnail-photo{
    border: 2px solid white;
    max-width: 200px;
    max-height: auto;
    text-align: center;
    margin-top: 20px;
    margin-left: auto;
    margin-right: auto;
    
}
.thumbnail-price{
    text-align: center;
    margin-top: 0px;
    color: #88c2eb!important;
    font-size:20px;
    font-weight: 100;
}
.product-table{
    padding-top:10px;
}
.product-table .row{
    padding:2px;
    margin: 5px;
}
.product-table .col-md-3{
    padding:6px;
    margin-left:6px;
    margin-right:6px;
}
.product-table .col-md-3:hover{
    background-color: #4f4d4d!important;
}
/*--indiv product--*/

.product-title{
    text-align: center;
    color: #e0e0e0;
    font-size: 30px;
    font-weight: 100;
    margin-top: 40px;
}
.product-image{
    border: 3px solid white;
    width: 95%;
    height: auto;
    text-align: center;
    display: block!important;
    margin-left: auto!important;
    margin-right: auto!important;
}
.product-price{
    text-align: center;
    color: #e0ab09;
    font-size: 22px;
    font-weight: 100;
    margin-top: 10px;
}
.product-text{
    text-align: center;
    color: #e0e0e0;
    font-size: 22px;
    font-weight: 100;
    margin-top: 10px;
}
.product-small-text{
    text-align: center;
    color: #e0e0e0;
    font-size: 18px;
    font-weight: 100;
    margin-top: 10px;
}
.product-stock{
    color: #77d43d;
}
.product-stock-low{
    color: #e6ae2c;
}
.product-stock-out{
    color: #eb5252;
}
.text-danger{
    padding-top:12px;
}
#add-to-cart-button{
    display: block;
    margin-left: auto; 
    margin-right: auto;
    background-color: #b1d0e6;
    border:none;
}
#go-to-login-button{
    display: block;
    margin-left: auto; 
    margin-right: auto;
    background-color: #dae4eb;
    border:none;
}
.reminder-text{
    margin-top: 10px;
    color:#e0e0e0;
    font-size: 17px;
    font-weight: 100;
}
.tags{
    color: #85b7ff!important;
    text-decoration: none;
}

.tags:hover {
    color: #bdd8ff!important;
    text-decoration: none;
}
/*--contact--*/
.contact-col{
}
#contact-title{
    padding-top: 40px;
    text-align: center;
    font-weight: 400;
    font-size: 22px;
}
.contact-content{
    margin-bottom:2px;
    text-align: center;
    color: #88c2eb;
}

.contact-content a{
    color: #819ec7!important;
    text-decoration: none;
}

.contact-content a:hover {
    color: #9baec9!important;
    text-decoration: none;
}
.text-box{
    background-color:#f2f7ff;
    width:100%;
    margin-top: 0px;
    height: auto;
    resize: none;
}
#submit-button{
    background-color: #b1d0e6;
    display: block;
    padding-left:4px;
    padding-right:4px;
    margin-left: auto; 
    margin-right: auto;
    border:none;
}

/*--cart--*/
.cart_prod_image{
    border: 2px solid white;
    max-width: 150px;
    max-height: auto;
    text-align: left;
    margin-top: 20px;
    margin-left: 100px;
    margin-right: auto;
}
.cart_prod_name{
    padding-top: 7px;
}
.cart-col{
    background-color: #4f4d4d;
}
#update-button{
    display: block;
    background-color: #dae4eb;
    border:none;
    margin-top: 15px;
    padding-left:4px;
    padding-right:4px;
    vertical-align: middle;
    margin-left: auto;
    margin-right: auto;
}
#checkout-button{
    display: block;
    background-color: #b1d0e6;
    border:none;
    margin-top: 30px;
    padding-left:4px;
    padding-right:4px;
    margin-bottom: 15px;
    margin-left: auto;
    margin-right: auto;
}

/*--order--*/
#order-summary{
    text-align: center;
    color: #e0e0e0;
    font-size: 22px;
    font-weight: 100;
    margin-top: 10px;
}
.order-col{
    background-color: #4f4d4d;
    padding-bottom:15px;
}
.order-form{
    padding-top: 15px;
    padding-bottom: 15px;
    color:#f3f3f3;
    width: 90%;
}
#order-btn{
    margin-top: 10px;
    margin-bottom: 5px;
    padding-left:4px;
    padding-right:4px;
}
#back-to-cart-btn{
    background-color: #dae4eb;
    border:none;
    margin-top: 30px;
    margin-bottom: 15px;
    padding-left:4px;
    padding-right:4px;
    margin-left: auto;
    margin-right: auto;
}
.states-dropdown{
    font-family: segoe UI;
}
.shipping-dropdown{
    font-family: segoe UI;
}

/*--order confirm--*/
.order-confirm-msg a{
    color: #819ec7!important;
    text-decoration: none;
}

.order-confirm-msg a:hover {
    color: #9baec9!important;
    text-decoration: none;
}

/*--accounts--*/
#signup-link{
     color: #819ec7!important;
     text-align: center;
}
.input-field{
    margin-top: 5px;
    margin-bottom: 5px;
}
#login-div{
    margin: 0;
    position: relative;
}
.login-col{
    padding-top: 15px;
    padding-bottom: 10px;
    background-color: #545353;
}
#signup-div{
    margin: 0;
    position: relative;
}
.signup-col{
    padding-top: 15px;
    padding-bottom: 10px;
    background-color: #545353;
}
.account-button{
    margin-top: 15px;
    margin-bottom: 15px;
}
</style>