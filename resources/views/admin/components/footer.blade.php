<script src="/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="/assets/plugins/bootstrap/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="/assets/plugins/blockui/jquery.blockUI.js"></script>
<script src="/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/assets/js/connect.min.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<script src="/assets/plugins/DataTables/datatables.min.js"></script>
<script src="/assets/js/pages/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="/assets/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
@yield('js')
<script>
   $(document).ready(function() {
        $('#summernote').summernote();
    });

  //foto Produk
  $('.addFotoProduk').on('click',function(){
       addFotoProduk();
  });

   function addFotoProduk(){
     var addFotoProduk =`
                <div class="form-group d-flex justify-content-between">
                    <input type="file" name="foto_produk[]" class="form-control">
                    <a class="hapusFoto btn btn-danger btn-sm btn-outline"><i class="fas fa-trash text-red"></i></a>
                </div>

                       `;                        
     $('.fotoProduk').append(addFotoProduk);       
   }

   $(document).on("click", "a.hapusFoto", function () {
           $(this).parent().remove();
   });

</script>