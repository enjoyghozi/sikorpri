(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });


    // <!-- select2 -->
  
    $(document).ready(function() {
        $('.select2').select2();
    });
  //  <!-- end datatable -->

    // <!-- datatable -->
   
        $(document).ready( function () {
            $('#myTable').DataTable( {
                responsive: true,
            });
        } );

        
    // <!-- end datatable -->

    // <!-- delete sweetalert -->
        $ ('.delete-unit').click( function (){
            var unitid = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Anda yakin ingin menghapus "+unitid+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window. location = "/delete-unit/"+unitid+" "
                    swal("Berhasil menghapus unit!", {
                    icon: "success",
                    });
                } else {
                    swal("Unit masih tersimpan!");
                }
                });
        });

        $ ('.delete-anggota').click( function (){
            var anggotaid = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Anda yakin ingin menghapus "+anggotaid+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window. location = "/delete-anggota/"+anggotaid+" "
                    swal("Berhasil menghapus anggota!", {
                    icon: "success",
                    });
                } else {
                    swal("Anggota masih tersimpan");
                }
                });
        });

        $ ('.delete-user').click( function (){
          var userid = $(this).attr('data-id');
          swal({
              title: "Are you sure?",
              text: "Anda yakin ingin menghapus "+userid+" ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {
                  window. location = "/delete-user/"+userid+" "
                  swal("Berhasil menghapus user!", {
                  icon: "success",
                  });
              } else {
                  swal("user masih tersimpan");
              }
              });
      });

      // taliasih
      $ ('.delete-taliasih').click( function (){
        var taliasihid = $(this).attr('data-id');
          swal({
              title: "Are you sure?",
              text: "Anda yakin ingin menghapus "+taliasihid+" ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {
                  window. location = "/delete-taliasih/"+taliasihid+" "
                  swal("Berhasil menghapus transaksi!", {
                  icon: "success",
                  });
              } else {
                  swal("Transaksi masih tersimpan");
              }
              });
      });

      $ ('.delete-transaksi').click( function (){
        var transaksiid = $(this).attr('data-id');
          swal({
              title: "Are you sure?",
              text: "Anda yakin ingin menghapus "+transaksiid+" ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {
                  window. location = "/delete-transaksi/"+transaksiid+" "
                  swal("Berhasil menghapus transaksi!", {
                  icon: "success",
                  });
              } else {
                  swal("Transaksi masih tersimpan");
              }
              });
      });
      
    // <!-- endsweetalert -->


    // <!-- format nominal -->
        document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
            element.addEventListener('keyup', function(e) {
            let cursorPostion = this.selectionStart;
                let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                let originalLenght = this.value.length;
                if (isNaN(value)) {
                this.value = "";
                } else {    
                this.value = value.toLocaleString('id-ID', {
                    currency: 'IDR',
                    style: 'currency',
                    minimumFractionDigits: 0
                });
                cursorPostion = this.value.length - originalLenght + cursorPostion;
                this.setSelectionRange(cursorPostion, cursorPostion);
                }
            });
        });


        var jumlah = document.getElementById("jumlah");
        var iuran = document.getElementById("iuran");
        var total = document.getElementById("total");
        var val1, val2;

        jumlah.oninput = iuran.oninput = change;

        function change(e)
        {
          if(e.target.id == 'jumlah')
          {
            val1 = Number(e.target.value);
          }
          else if(e.target.id == 'iuran')
          {
            val2 = Number(e.target.value);
          }
          
          if(!isNaN(val1) && !isNaN(val2))
          {
            total.value = val1 * val2;
          }
          else if(isNaN(val1) && !isNaN(val2))
          {
            total.value = val2;
          }
          else if(!isNaN(val1) && isNaN(val2))
          {
            total.value = val1;
          }
        }

        
        window.cleave = new Cleave('#iuran', {
          numeral: true,
          numeralThousandsGroupStyle: 'thousand'
      });
  
      window.cleave = new Cleave('#total', {
          numeral: true,
          numeralThousandsGroupStyle: 'thousand'
      });
})(jQuery); // End of use strict
