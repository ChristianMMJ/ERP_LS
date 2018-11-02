<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="<?php print base_url(); ?>img/manifest.json">


        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href=<?php print base_url(); ?>img/favicon/"apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php print base_url(); ?>img/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="<?php print base_url(); ?>img/favicon/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="<?php print base_url(); ?>img/favicon/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="<?php print base_url(); ?>img/favicon/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="<?php print base_url(); ?>img/favicon/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="<?php print base_url(); ?>img/favicon/mstile-310x310.png" />




        <meta name="theme-color" content="#ffffff">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ShoeSystem ERP</title>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php print base_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!--Estilo principal-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-flaty.css">
        <!--Submenu
        <!--
        <link href="<?php print base_url('js/submenu-boostrap4/bootstrap-4-navbar.min.css') ?>" rel="stylesheet">
        -->
        <!--DataTables Plugin-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.css">
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>

        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/JSZip-3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/Buttons-1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
        <!--select2 control-->
        <script src="<?php echo base_url(); ?>js/selectize/js/standalone/selectize.min.js"></script>
        <link href="<?php echo base_url(); ?>js/selectize/css/selectize.bootstrap.css" rel="stylesheet" />

        <!--Third Party-->

        <!-- PivotTable.js libs from ../dist -->
        <script  src="<?php print base_url(); ?>js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="<?php print base_url(); ?>js/pivot/dist/pivot.css">
        <script  src="<?php print base_url(); ?>js/pivot/dist/pivot.js"></script>

        <!--Pace loading and performance for web applications-->
        <script src="<?php print base_url(); ?>js/pace.min.js"></script>
        <link href="<?php print base_url(); ?>css/pace.css" rel="stylesheet" />
        <!--Font Awesome Icons-->
        <script defer src="<?php print base_url(); ?>js/fontawesome-all.js"></script>
        <link rel="stylesheet" href="<?php print base_url(); ?>css/animate.min.css">
        <!--HoldOn Stupid Accions-->
        <link href="<?php print base_url(); ?>css/HoldOn.min.css" rel="stylesheet">
        <script src="<?php print base_url(); ?>js/HoldOn/HoldOn.min.js"></script>
        <!--HoldOn Stupid Accions-->
        <script src="<?php print base_url(); ?>js/touch/jquery.touch.min.js"></script>
        <!--MasekdAll-->
        <script src="<?php print base_url(); ?>js/inputmask/dependencyLibs/inputmask.dependencyLib.jquery.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/jquery.inputmask.bundle.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.numeric.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.date.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.phone.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/jquery.inputmask.min.js"></script>

        <!-- BOOTSTRAP TOUR JS -->
        <link href="<?php echo base_url(); ?>js/bootstrap-tour-master/build/css/bootstrap-tour.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/bootstrap-tour-master/build/js/bootstrap-tour.js"></script>

        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskedinput.min.js"></script>
        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskMoney.min.js"></script>
        <!--Modales simplificados-->
        <script src="<?php print base_url(); ?>js/swal/sweetalert.min.js"></script>

        <!--Notifiers-->
        <script src="<?php echo base_url(); ?>js/notify/bootstrap-notify-3.1.3/bootstrap-notify.min.js"></script>
        <!--jQuery Number Format-->
        <script src="<?php echo base_url(); ?>js/jnumber/jquery.number.min.js"></script>
        <!--JS XLXS API-->
        <script src="<?php echo base_url(); ?>js/js-xlsx/jszip.js"></script>
        <script src="<?php echo base_url(); ?>js/js-xlsx/xlsx.js"></script>
        <!-- Shortcut key -->
        <script src="<?php echo base_url(); ?>js/ShortCut/shortcut.js"></script>

        <!--FancyBoxJS-->
        <link rel="stylesheet" href="<?php echo base_url("js/fancybox/jquery.fancybox.min.css"); ?>" />
        <script src="<?php echo base_url("js/fancybox/jquery.fancybox.min.js"); ?>"></script>

        <!--VegasJS-->
        <link rel="stylesheet" href="<?php echo base_url("js/vegas/vegas.min.css"); ?>" >
        <script src="<?php echo base_url("js/vegas/vegas.min.js"); ?>"></script>

        <!--EasyAutocompleteJS-->
        <!-- JS file -->
        <script src="<?php echo base_url("js/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"); ?>"></script>
        <!-- CSS file -->
        <link rel="stylesheet" href="<?php echo base_url("js/EasyAutocomplete-1.3.5/easy-autocomplete.min.css"); ?>">
        <!-- Additional CSS Themes file - not required--> 
        <link rel="stylesheet" href="<?php echo base_url("js/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css"); ?>">
        <script>
            $.ajax({
                url: "https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js",
                dataType: "script",
                success: function () {
                    particlesJS("particle-container", {
                        "particles": {
                            "number": {
                                "value": 10,
                                "density": {
                                    "enable": true,
                                    "value_area": 800
                                }
                            },
                            "color": {
                                "value": ["#2C3E50", "#2C3E50"]/* "random" = cualquier color*/
                            },
                            "shape": {
                                "type": "image",
                                "image": {
                                    "src": "<?php print base_url('img/LS.png'); ?>", // Set image path.
                                    "width": 1, // Width and height don't decide size.
                                    "height": 1   // They just decide aspect ratio.
                                }
                            },

                            "opacity": {
                                "value": 0.5,
                                "random": false,
                                "anim": {
                                    "enable": false,
                                    "speed": 1,
                                    "opacity_min": 0.1,
                                    "sync": false
                                }
                            },
                            "size": {
                                "value": 50,
                                "random": true,
                                "anim": {
                                    "enable": false,
                                    "speed": 80,
                                    "size_min": 10,
                                    "sync": false
                                }
                            },
                            "line_linked": {
                                "enable": false,
                                "distance": 150,
                                "color": "#ffffff",
                                "opacity": 0.4,
                                "width": 1
                            },
                            "move": {
                                "enable": true,
                                "speed": 1,
                                "direction": "none",
                                "random": false,
                                "straight": false,
                                "out_mode": "out",
                                "bounce": true,
                                "attract": {
                                    "enable": true,
                                    "rotateX": 600,
                                    "rotateY": 1200
                                }
                            }
                        },
                        "interactivity": {
                            "detect_on": "canvas",
                            "events": {
                                "onhover": {
                                    "enable": false,
                                    "mode": "repulse"
                                },
                                "onclick": {
                                    "enable": false,
                                    "mode": "push"
                                },
                                "resize": true
                            },
                            "modes": {
                                "grab": {
                                    "distance": 400,
                                    "line_linked": {
                                        "opacity": 1
                                    }
                                },
                                "bubble": {
                                    "distance": 400,
                                    "size": 40,
                                    "duration": 2,
                                    "opacity": 8,
                                    "speed": 3
                                },
                                "repulse": {
                                    "distance": 200,
                                    "duration": 0.4
                                },
                                "push": {
                                    "particles_nb": 4
                                },
                                "remove": {
                                    "particles_nb": 2
                                }
                            }
                        },
                        "retina_detect": true
                    });
                }
            });
        </script>
        <!--Final Modifiers for CSS-->
<!--        <link href="<?php print base_url(); ?>css/style.css" rel="stylesheet" />-->

<!--        <script src="<?php echo base_url(); ?>js/scripts.js"></script>-->
        <!--Cargar scripts de validacion y configuraciones-->
        <?php $this->load->view('vScripts') ?>
        <?php $this->load->view('vStyle') ?>
    </head>
