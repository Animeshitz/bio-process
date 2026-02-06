<?php 

/**

 * Template Name:  Submit Sketch 2

 */

get_header();?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<style>
    /*.sfx-canvas {
        z-index: 0;
        width: 0px;
        height: 50px;
        margin-top: -133px;
    }*/
    .error{
        color:red;
    }
    .error-space {
        height: 20px; 
    }
    .error-space span.error {
        display: none;
    }
</style>
<!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/product-banner.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7 col-12">
                        <div class="tp-breadcrumb">
                            <h2 class="tp-breadcrumb__title">Submit a Sketch </h2>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    <!-- checkout-area start -->
    <section class="checkout-area wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contactform wow fadeInRight p-both" data-wow-delay=".4s">
                        <p>Feel as though your idea would be better communicated through a visual aide? Use the below application to draw out your design idea. 
                            Add as much detail as you care to and our team will contact you to turn it into a Bioprocess Supplies technical draft. We’ll help you 
                            pick parts and optimize the design based on your needs.</p>
                        <h3 class="contactform__title mb-35">Submit a Sketch:</h3>
                       
                        <div class="contactform__list mb-60">
                            
                            <!-- <form method="POST" action="" enctype="multipart/form-data" id="form_submit"> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contactform__input mb-30">
                                            <input type="text" name="username" id="username" placeholder="Enter your name *" >
                                            <p class="error-space"><sapn class="error" id="errorUsername"></sapn></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contactform__input mb-30">
                                            <input type="email" name="email" id="email" placeholder="Enter your mail *" >
                                            <p class="error-space"><sapn class="error" id="errorEmail"></sapn></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contactform__input mb-30">
                                            <input type="text" name="phone" id="phone" placeholder="Enter your phone no. *" >
                                            <p class="error-space"><sapn class="error" id="errorPhone"></sapn></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contactform__input mb-30">
                                            <input type="text" name="company" id="company" placeholder="Enter your company name">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="contactform__input mb-30">
                                            <label>Draw your sketch</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="drawr-container3" style="width:100%;height:50vh;">
                                            <canvas class="demo-canvas drawr-test1" id="canvas" ></canvas>
                                        </div>
                                        <input type="file" id="file-picker" style="display:none;">
                                        <p class="error-space"><sapn class="error" id="errorDrawer"></sapn></p>
                                    </div>
                                    
                                    <div class="col-lg-12" style="margin-top: 20px;">
                                        <div class="contactform__input mb-30-btn">
                                            <button class="tp-btn" name="submit" id="submitSketch">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            <!-- </form> -->
                            <div id="sketchMessage"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-area end -->
</main>

<?php get_footer(); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/jquery.drawr.combined.js"></script>

<script type="text/javascript">
    $("#drawr-container3 .demo-canvas").drawr({ "enable_transparency" : true, enable_transparency_image: true });

    $("#drawr-container3 .demo-canvas").drawr("start");
    
    //add custom save button.
    var buttoncollection = $("#drawr-container3 .demo-canvas").drawr("button", {
        "icon":"mdi mdi-folder-open mdi-24px"
    }).on("touchstart mousedown",function(){
        //alert("demo of a custom button with your own functionality!");
        $("#file-picker").click();
    });
    var buttoncollection = $("#drawr-container3 .demo-canvas").drawr("button", {
        "icon":"mdi mdi-content-save mdi-24px"
    }).on("touchstart mousedown",function(){
        var imagedata = $("#drawr-container3 .demo-canvas").drawr("export","image/png");
        var element = document.createElement('a');
        element.setAttribute('href', imagedata);
        element.setAttribute('download', "test.png");
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
    });

    $("#submitSketch").click( function () {
        event.preventDefault();
        const blank = isCanvasBlank(document.getElementById('canvas'));
        var imagedata = $("#drawr-container3 .demo-canvas").drawr("export","image/png");
        var element = document.createElement('a');
        element.setAttribute('href', imagedata);
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
        

        $('.error').html('');
        var username = true;
        var email = true;
        var phone= true;

        if($('#username').val().trim() == '')
        {
            var username = false;
            $('#errorUsername').html('Please fill out this field.');
        }
        
        if($('#email').val().trim() == '')
        {
            var username = false;
            $('#errorEmail').html('Please fill out this field.');
        }

        if($('#phone').val().trim() == '')
        {
            var username = false;
            $('#errorPhone').html('Please fill out this field.');
        }
        

        if(blank == false && username== true)
        {
            var usrnm= $("#username").val();
            var emailid = $("#email").val();
            var phoneno = $("#phone").val();
            var cmpny = $("#company").val();
            var data = new FormData();
            data.append("username",usrnm);
            data.append("email",emailid);
            data.append("phone",phoneno);
            data.append("company",cmpny);
            data.append("image",imagedata);
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST','<?php echo admin_url('ajax-sketch-submit.php'); ?>', true)
            xhttp.send(data);
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == XMLHttpRequest.DONE) {
                    if (xhttp.status === 200) {
                        // Handle the response from the server
                        var response = JSON.parse(xhttp.responseText);
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        }
                    } 
                    //document.getElementById('sketchMessage').innerHTML = this.responseText;
                }
            }
        }

        if(blank== true)
        {
            //alert("Please draw anything");
            $('#errorDrawer').html('Please fill out this field.');
        }

    });
    // var form=document.getElementById('form_submit');
    // form.onsubmit = function(event){
        
    $("#file-picker")[0].onchange = function(){
        var file = $("#file-picker")[0].files[0];
        if (!file.type.startsWith('image/')){ return }
        var reader = new FileReader();
        reader.onload = function(e) { 
            $("#drawr-container3 .demo-canvas").drawr("load",e.target.result);
        };
        reader.readAsDataURL(file);
    };

    function isCanvasBlank(canvas) {
        const context = canvas.getContext('2d');
        const pixelBuffer = new Uint32Array(
            context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
        );
        return !pixelBuffer.some(color => color !== 0);
    }
</script>
<?php get_footer() ;?>