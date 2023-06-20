<?php
   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thông tin</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading2">
   <!-- <h3>Giới thiệu</h3>
   <p> <a href="home.php">Trang chủ</a> / Giới thiệu </p> -->
</div>

<section class="container">
  <div class="box-quote-motivation">
    <div class="slideQuotes d-flex">
      <div class="slide-item active">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">Bill Gates 1</h3>
            <p>
              "Giá trị của sự cần mẫn nằm ở chỗ nó tích tụ mầm mống
              cho những điều may mắn. Càng chăm chỉ bao nhiêu, tôi
              càng được may mắn bấy nhiêu."
            </p>
          </div>
        </div>
      </div>

      <div class="slide-item">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">Reed Hastings 2</h3>
            <p>
              "Thời đại đồ đá. Thời đại đồ đông. Thời đại đồ sắt.
              Chúng ta xác định toàn bộ sử thi của nhân loại bằng
              công nghệ mà họ sử dụng."
            </p>
          </div>
        </div>
      </div>

      <div class="slide-item">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">Reed Hastings 3</h3>
            <p>
              "Thời đại đồ đá. Thời đại đồ đông. Thời đại đồ sắt.
              Chúng ta xác định toàn bộ sử thi của nhân loại bằng
              công nghệ mà họ sử dụng."
            </p>
          </div>
        </div>
      </div>

      <div class="slide-item">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">Reed Hastings 4</h3>
            <p>
              "Thời đại đồ đá. Thời đại đồ đông. Thời đại đồ sắt.
              Chúng ta xác định toàn bộ sử thi của nhân loại bằng
              công nghệ mà họ sử dụng."
            </p>
          </div>
        </div>
      </div>

      <div class="slide-item">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">ViT Lụm</h3>
            <p>
              "Forgive your younger self, believe in your current
              self, create your future self."
            </p>
          </div>
        </div>
      </div>

      <div class="slide-item">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">Reed Hastings 6</h3>
            <p>
              "Thời đại đồ đá. Thời đại đồ đông. Thời đại đồ sắt.
              Chúng ta xác định toàn bộ sử thi của nhân loại bằng
              công nghệ mà họ sử dụng."
            </p>
          </div>
        </div>
      </div>

      <div class="slide-item">
        <div class="d-flex quote-item">
          <img src="img/artist1.jpg" class="col-lg-4" alt="..." />
          <div>
            <h3 class="author">Reed Hastings 7</h3>
            <p>
              "Thời đại đồ đá. Thời đại đồ đông. Thời đại đồ sắt.
              Chúng ta xác định toàn bộ sử thi của nhân loại bằng
              công nghệ mà họ sử dụng."
            </p>
          </div>
        </div>
      </div>

      <button class="btn btn-prev bg-transparent text-dark">
        <i class="fa-solid fa-angle-left"></i>
      </button>
      <button class="btn btn-next bg-transparent text-dark">
        <i class="fa-solid fa-angle-right"></i>
      </button>
    </div>
  </div>
  <div class="tab">
    <span class="tab-item active"></span>
    <span class="tab-item"></span>
    <span class="tab-item"></span>
    <span class="tab-item"></span>
    <span class="tab-item"></span>
    <span class="tab-item"></span>
    <span class="tab-item"></span>
  </div>
   
</section>

<section class="container customer-review">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-xl-8 text-center">
      <h3 class="mb-4">Nhận xét từ khách hàng</h3>
      <p class="mb-4 pb-2 mb-md-5 pb-md-0">
      Bookworm xin cảm ơn những góp ý chân thành từ các bạn, chúng mình sẽ cố gắng hoàn thiện hơn để đem đến những đầu sách mới, những đầu sách hay và đem lại trải nghiệm tốt nhất đến tay khách hàng.
      </p>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://img5.thuthuatphanmem.vn/uploads/2021/11/30/anh-meo-cute-chibi-ngau-nhat_095451444.jpg"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">Maria Smantha</h5>
      <h6 class="text-primary mb-3">Web Developer</h6>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star-half-alt fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://img5.thuthuatphanmem.vn/uploads/2021/11/30/anh-meo-cute-chibi-ngau-nhat_095451444.jpg"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">Lisa Cudrow</h5>
      <h6 class="text-primary mb-3">Graphic Designer</h6>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://img5.thuthuatphanmem.vn/uploads/2021/11/30/anh-meo-cute-chibi-ngau-nhat_095451444.jpg"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">John Smith</h5>
      <h6 class="text-primary mb-3">Marketing Specialist</h6>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="far fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-0 mt-4">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://img5.thuthuatphanmem.vn/uploads/2021/11/30/anh-meo-cute-chibi-ngau-nhat_095451444.jpg"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">John Smith</h5>
      <h6 class="text-primary mb-3">Marketing Specialist</h6>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="far fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-0  mt-4">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://img5.thuthuatphanmem.vn/uploads/2021/11/30/anh-meo-cute-chibi-ngau-nhat_095451444.jpg"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">John Smith</h5>
      <h6 class="text-primary mb-3">Marketing Specialist</h6>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="far fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-0  mt-4">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://img5.thuthuatphanmem.vn/uploads/2021/11/30/anh-meo-cute-chibi-ngau-nhat_095451444.jpg"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">John Smith</h5>
      <h6 class="text-primary mb-3">Marketing Specialist</h6>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="far fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- <section class="reviews">

   <h1 class="title">Phản hồi</h1>

   
   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Hoàng Văn Hải</h3>
      </div>

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nguyễn Thị Bích</h3>
      </div>

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Đào Văn Mạnh</h3>
      </div>

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Vũ Thùy Dương</h3>
      </div>

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lê Anh Thiện</h3>
      </div>

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Cảm ơn Bookworm. đã giúp mình tìm mua được quyển truyện yêu thích của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Bùi Anh Thư</h3>
      </div>

   </div>

</section> -->

<section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<h1 class="title">Thành viên của Bookworm.</h1>

<div class="container bootdey">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-mb-4 pb-2">
                    <h4 class="mb-4">Our Business Minds</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Build responsive, mobile-first projects on the web with the world's most popular front-end component library.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/kda.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" style="width: 200px;
  height: 200px;
  object-fit: cover;" alt="">
                    <div class="content mt-3">
                        <h4 class="mb-0">Kiều Đức Anh</h4>
                        <small class="text-muted">Founder</small>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/ntd.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" style="width: 200px;
  height: 200px;
  object-fit: cover;" alt="">
                    <div class="content mt-3">
                        <h4 class="mb-0">Nguyễn Tiến Đạt</h4>
                        <small class="text-muted">C.E.O.</small>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/ntl.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" style="width: 200px;
  height: 200px;
  object-fit: cover;" alt="">
                    <div class="content mt-3">
                        <h4 class="mb-0">Nguyễn Thành Lâm</h4>
                        <small class="text-muted">Manager</small>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 ml-16p">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/tdn.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" style="width: 200px;
  height: 200px;
  object-fit: cover;" alt="">
                    <div class="content mt-3">
                        <h4 class="mb-0">Tạ Đức Nghĩa</h4>
                        <small class="text-muted">Manager</small>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/nvv.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" style="width: 200px;
  height: 200px;
  object-fit: cover;" alt="">
                    <div class="content mt-3">
                        <h4 class="mb-0">Nguyễn Văn Việt</h4>
                        <small class="text-muted">Accountant</small>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</section>

<?php include 'footer.php'; ?>

<script src="js/info.js"></script>
<script src="js/script.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  -->

</body>
</html>