<style>

    .btn-float{
        width: 61.1px;
        height: 61.1px;
        font-size: 1.625rem;
        position: fixed;
        bottom: 35px;
        right: 30px;
        margin-bottom: 0;
        z-index: 99999 ;
        border-radius: 50%;
        min-width: 56px;
    }

    .btn-group > .btn:not(:first-child), .btn-group > .btn-group:not(:first-child) > .btn {

        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)!important;
    }
    /*Hacer disbaled de selectize igual a bootstrap*/
    .selectize-control .selectize-input.disabled {
        background-color: #ecf0f1;
        opacity: 1;
    }
    /*Para textos que sobrepasen el largo*/
    .selectize-input {
        padding-right: 18px;
    }

    /*Legend*/
    legend {
        font-size: 1.3rem;
    }

    /*No edición en controles*/
    .disabledForms {
        opacity: 0.8;
        background-color: #d6d6d6;
        pointer-events: none;
    }
    /*Fondo aplicacion*/
    html{
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -ms-overflow-style: scrollbar;
        -webkit-tap-highlight-color: transparent;
        background-color: #f5f5f5;
    }

    body{
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-weight: 400;
        color: #495057;
        text-align: left;
        background-color: transparent;

        font-size: 0.8875rem;
    }
    .card-body {
        background-color: transparent !important;
    }
    .card {
        background-color: transparent;
    }

    /*Formularios*/
    label {
        margin-top: 0.596rem;
        margin-bottom: 0rem;
    }


    .form-control {
        color: #000 !important;
        border: 1px solid #9E9E9E;
    }
    
    .form-control:focus { 
        -webkit-box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
        box-shadow: 0 0 0 0.2rem #CDDC39;
        font-weight: bold;
        z-index: 1050 ;
    }
    
    /*Tablas */
    table tbody tr{
        cursor: pointer;
        font-size: 0.8rem !important;
        background-color: white;

    }
    table thead tr{
        cursor: pointer;
        background-color: white;
    }

    table tfoot tr{
        cursor: pointer;
        background-color: white;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 0.5px solid #dee2e6;
    }
    table tbody tr:hover {
        background-color: #2C3E50;
        color: #fff !important;
    }

    .table>tbody>tr>td.success,
    .table>tfoot>tr>td.success,
    .table>tbody>tr>th.success,
    .table>tfoot>tr>th.success,
    .table>tbody>tr.success>td,
    .table>tfoot>tr.success>td,
    .table>tbody>tr.success>th,
    .table>tfoot>tr.success>th {
        background-color: #2C3E50 ;
        color: #fff;
    }

    table tbody tr:hover {
        background-color: #2C3E50;
        color: #fff !important;
    }

    /*Hacer todo el texto de los inputs mayusculas*/
    input {
        text-transform: uppercase;
    }
    textarea  {
        text-transform: uppercase;
    }
    ::-webkit-input-placeholder { /* WebKit browsers */
        text-transform: none;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        text-transform: none;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
        text-transform: none;
    }
    :-ms-input-placeholder { /* Internet Explorer 10+ */
        text-transform: none;
    }
    ::placeholder { /* Recent browsers */
        text-transform: none;
    }
    .card {
        background-color: #fff;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)!important;
    }
    .btn:not(.dropdown-toggle):not(.navbar-brand){
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)!important;
    }    
    label{
        font-weight: bold;
    }
</style>