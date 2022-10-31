@include('inc.nav-index')
                <!-- End of Topbar -->
                <style>
                    .list-img {
                        display: flex;
                        -webkit-box-pack: start;
                        justify-content: flex-start;
                        gap: 0.5rem;
                    }
                    .img-onlist {
                        border-radius: 4px;
                        border: 1px solid transparent;
                        position: relative;
                        cursor: pointer;
                        width: 50px;
                        height: 50px;
                        overflow: hidden;
                        border-color: #97969181; 
                    }
                    .img-detail{
                        position: relative;
                        display: inline-block;
                        overflow: hidden;
                        border-radius: 4px;
                        height: 50px;
                        width: 50px;
                        transition: transform 0.3s ease 0s;
                    } 
                </style>
                <script>
                   function hover(x)
                    {
                        x.style="border-color:  blue;";      
                    }
                    function normal(x){
                        x.style="border-color: #97969181; ";
                    }
                </script>
                <div style="margin-top: 100px">
                    <div class="container" id="df">
                         @foreach ($products as $product)
                         <h5 class="row"> <a href="/" style="color: gray" >Homepage </a> <p> \ </p><a style="color: gray" href="/firm-{{$product->firm['name']}}">{{$product->firm['name']}}</a></h5>
                            <div class="row">
                            <div class="col-6" >
                                <a href=""></a>
                            <img id="poster" src="backend/img/{{$product->poster}}" width="100%" height="100%">
                        </div>
                        <div class="col-6">
                                <h4>{{$product->name}}</h4>
                                <div class="row">
                                    
                                <div style="width:96%;white-space:nowrap;overflow:hidden" class="col-3">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" size="16" color="#fdd836" style="color:#fdd836" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" size="16" color="#fdd836" style="color:#fdd836" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" size="16" color="#fdd836" style="color:#fdd836" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" size="16" color="#fdd836" style="color:#fdd836" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" size="16" color="#fdd836" style="color:#fdd836" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    </div> <p class="col-4"> (Đánh giá sản phẩm)</p> 
                                </div>     
                                <h3>{{$product->price}}$</h3>
                                <div class="list-img">
                                    <div class="img-onlist" onmouseover="hover(this)"  onmouseout="normal(this)">
                                        <div class="img-detail">
                                            <img src="backend/img/{{$product->poster}}" onmouseover="document.getElementById('poster').src='backend/img/{{$product->poster}}'" width="100%" height="100%">
                                        </div>
                                    </div> 
                                    @foreach ( $images as $image)
                                        <div class="img-onlist" onmouseover="hover(this)" onmouseout="normal(this)" >
                                            <div class="img-detail">
                                                <img src="backend/img/{{$image->image}}" onmouseover="document.getElementById('poster').src='backend/img/{{$image->image}}'" width="100%" height="100%">
                                            </div>
                                        </div> 
                                    @endforeach
                                    
                                </div>
                        <div style="margin-top: 50px">
                            <button class="btn btn-primary" >Mua ngay</button>
                            <button class="btn btn-outline-primary" >Thêm vào giỏ hàng</button>
                        </div>
                        </div>
                        </div>
                        
                        
                        <h2><b>Giới Thiệu Laptop</b> </h2>
                        @php
                          echo  $product["Description"]
                        @endphp
                        @endforeach
                        
                      
                       
                        
                       
                        <!-- Page Heading -->                                  
                <!-- /.container-fluid -->
                </div>           
                <!-- Begin Page Content -->
                
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            
            </div>
            <!-- End of Content Wrapper -->
            
        </div>
            <!-- End of Page Wrapper -->
            
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
            </a>
            
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout">Logout</a>
                </div>
            </div>
            </div>
            </div>
                </div>
                    
            
            <!-- Bootstrap core JavaScript-->
            <script src="{{('frontend/vendor/jquery/jquery.min.js')}}"></script>
            <script src="{{('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            
            <!-- Core plugin JavaScript-->
            <script src="{{('frontend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
            
            <!-- Custom scripts for all pages-->
            <script src="{{('frontend/js/sb-admin-2.min.js')}}"></script>
            
            <!-- Page level plugins -->
           {{-- <script src="{{('frontend/vendor/chart.js/Chart.min.js')}}"></script> --}}
            
            <!-- Page level custom scripts -->
            {{-- <script src="{{('frontend/js/demo/chart-area-demo.js')}}"></script> --}}

            </body>
            
    </html>