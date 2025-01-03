<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
}


.carousel-inner img {
    height: 500px;
    object-fit: cover;
}

.carousel-caption h5 {
    background: rgba(0, 0, 0, 0.7);
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 1.8rem;
}

.carousel-caption p {
    background: rgba(0, 0, 0, 0.7);
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 1rem;
}


.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
}

.card-text {
    font-size: 1rem;
    color: #555;
}

.btn-primary {
    background-color: #007bff;
    border-color: #0056b3;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}


footer {
    background-color: #343a40;
    color: white;
    padding: 1rem 0;
    font-size: 0.9rem;
}

footer p {
    margin: 0;
}

    </style>
</head>
<body>

<?php include 'menu.php'; ?>
    <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="3.jpg" class="d-block w-100" alt="Promotion 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Smartphone Sale</h5>
                    <p>Get the latest smartphones at amazing prices.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="pexels-pixabay-38544.jpg" class="d-block w-100" alt="Promotion 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5 >Discount on Tablets</h5>
                    <p >Save up to 25% on the latest tablets.</p>
                  
                </div>
            </div>
            <div class="carousel-item">
                <img src="4.jpg" class="d-block w-100" alt="Promotion 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Discount on Laptops</h5>
                    <p>Save up to 20% on high-end laptops.</p>
                  
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <section class="container my-5">
        <h2 class="text-center mb-4">Our Products</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="5.jpg" class="card-img-top" alt="Laptop">
                    <div class="card-body">
                        <h5 class="card-title">High-End Laptop</h5>
                        <p class="card-text">À partir de $649.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="pexels-readymade-4032368.jpg" class="card-img-top" alt="Smartphone">
                    <div class="card-body">
                        <h5 class="card-title">Smartphone</h5>
                        <p class="card-text">À partir de $399.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="2.jpg" class="card-img-top" alt="Headphones">
                    <div class="card-body">
                        <h5 class="card-title">tablets</h5>
                        <p class="card-text">À partir de $189.99</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
  

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 SmartDevices. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
