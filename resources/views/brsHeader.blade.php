<style>
/* Navigation */
.navbar{
    box-shadow: 0px 3px 6px 4px rgb(0, 0, 0, 0.5);
    background-color: #e5e5e5;
}
.navbar .logo-icon{
    font-size: 35px;
    /* padding: 20px 30px; */
    width: 60px;
    height: 60px;
    margin-right: 5px;
    border-radius: 50%;
    color: #e5e5e5;
    border: 2px solid  #ff6400;
    background-color: #ff6400;
    display: flex;
    justify-content: center;
    align-items: center;
}
.navbar .logo-text{
    color: #ff6400;
    font-size: 35px;
    font-weight: 900;
    display: flex;
    align-items: center;
}
.navbar .nav .sign-in,
.navbar .nav .create{
    border-radius: 90px;
    font-size: 20px;
    padding: 5px 30px;
    outline: none;
    border: 2px solid #ff6400;
    margin: 0 10px;
}
.navbar .nav .sign-in{
   background-color: #e5e5e5;
   color: #ff6400;
  
}
.navbar .nav .sign-in:hover{
    transform: scale(1.1);
 }
.navbar .nav .create{
    background-color: #ff6400;
    color: #e5e5e5;
}
.navbar .nav .create:hover{
    transform: scale(1.1);
  
}
</style>
<nav class="navbar navbar-light bg-white">
  <div class="container">
        <a class="navbar-brand d-flex justify-content-center" href="#">
            <div class="logo-icon"><i class="fa fa-bus" aria-hidden="true"></i></div>
            <div class="logo-text fw-bold h1">Bus Reservation System</div>
        </a>
        <ul class="nav d-flex justify-content-end">
            <li class="nav-item">
                <button class="sign-in" type="button">Sign In</button>
            </li>
            <li class="nav-item">
                <button class="create" type="button">Create Account</button>
            </li>
        </ul>
    </div>
</nav>