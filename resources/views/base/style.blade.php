<style type="text/css">
    :root {
        --sidebar-width: 270px;
        --sidebar-wrapper-margin: -270px;
        --sidebar-link-hover-color: #F8F3FB;
        --sidebar-link-color: #221730;
        --sidebar-link-active-color: #724C9F;
        --doctor-button-bg-primary-color: #724C9F;
        --doctor-button-bg-secondary-color: #F1EDF5;
        --doctor-button-primary-color: #724C9F;
        --doctor-black-color: #221730;
        --doctor-white-color: #FFFFFF;
        --doctor-date-bg-color: #F4EAFC;
    }

    @media (max-width:900px) {
        :root {
            --sidebar-width: 240px;
            --sidebar-wrapper-margin: -240px;
        }
    }

    body {
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
    }

    /* Toggle Styles */

    #wrapper {
        padding-left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled {
        padding-left: var(--sidebar-width);
    }

    #wrapper .sidebar-logout {
        position: fixed;
        bottom: 0;
        padding-bottom: 30px;
    }

    #wrapper.toggled .sidebar-logout {
        display: block;
    }

    #wrapper .sidebar-logout {
        display: none;
    }

    #sidebar-wrapper {
        z-index: 1030;
        position: fixed;
        left: var(--sidebar-width);
        top: 0;
        width: 0;
        height: 100%;
        margin-left: var(--sidebar-wrapper-margin);
        overflow-y: auto;
        overflow-x: hidden;
        background: #fff;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
        border: 1px solid #E8DCF1;
    }

    #sidebar-wrapper .sidebar-inner-wrapper {
        /*display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex-direction:column;*/
    }

    #wrapper.toggled #sidebar-wrapper {
        width: var(--sidebar-width);
    }

    #page-content-wrapper {
        width: 100%;
        padding: 10px;
    }

    /* Sidebar Styles */

    .sidebar-nav {
        /*position: absolute;
        top: 0;*/
        width: var(--sidebar-width);
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .sidebar-nav li {
        text-indent: 20px;
        line-height: 40px;
    }

    .sidebar-nav li .sidebar-logout-link,
    .sidebar-nav li .sidebar-link {
        display: block;
        text-decoration: none;
        color: var(--sidebar-link-color);
        font-weight: 500;
        font-size: 15px;
        padding-left: 10px;
    }


    .sidebar-nav li .sidebar-link:hover,
    .sidebar-nav li .sidebar-link.active {


        text-decoration: none;
        color: var(--sidebar-link-active-color);
        background: var(--sidebar-link-hover-color);
    }

    .sidebar-nav li .sidebar-logout-link:hover {
        background: transparent;
    }

    .sidebar-nav li .sidebar-logout-link:active,
    .sidebar-nav li .sidebar-link:active,
    .sidebar-nav li .sidebar-logout-link:focus,
    .sidebar-nav li .sidebar-link:focus {
        text-decoration: none;
    }

    .sidebar-nav>.sidebar-brand {
        height: 65px;
        font-size: 18px;
        line-height: 60px;
    }

    .sidebar-nav>.sidebar-brand a {
        color: #999999;
    }

    .sidebar-nav>.sidebar-brand a:hover {
        color: #fff;
        background: none;
    }

    .sidebar-nav>li {
        transition: color 0.2s ease, background-color 0.2s ease;
        text-indent: unset;
        line-height: 40px;
        padding: 0 12px;
    }


    .sidebar-nav>li:hover {
        border-radius: 2px;
        background: rgba(138, 79, 186, 0.10);
    }

    .sidebar-nav>li.active {
        background: rgba(138, 79, 186, 0.10);
    }

    .sidebar-nav>li>a:hover {
        background: transparent;
    }

    .sidebar-nav li .sidebar-logout-link,
    .sidebar-nav li .sidebar-link {
        display: inline-block;
    }

    .sidebar-nav li a:hover {
        background: transparent !important;

    }

    .sidebar-nav li .sidebar-link.active {
        background: rgba(138, 79, 186, 0.10) !important;

    }

    @media (min-width: 992px) span,
    ol,
    ul,
    pre,
    div {
        scrollbar-width: thin;
        scrollbar-color: #EFF2F5 transparent;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    /* .sidebar-nav li {
    text-indent: unset;
    line-height: unset;
} */

    .sidebar-toggle {
        visibility: hidden;
        opacity: 0;
    }



    @media(max-width:767px) {
        #wrapper {
            /* padding-left: var(--sidebar-width);*/
        }

        #wrapper.toggled {
            padding-left: 0;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: var(--sidebar-width);
        }

        #wrapper.toggled #sidebar-wrapper {
            /* width: 0;*/
        }

        #page-content-wrapper {
            padding: 10px;
            position: relative;
        }

        #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-right: 0;
        }

        .sidebar-toggle {
            visibility: visible;
            opacity: 1;
        }
    }

    @media(min-width:767px) {
        #wrapper {
            padding-left: var(--sidebar-width);
        }

        #sidebar-wrapper {
            width: var(--sidebar-width);
        }

        #wrapper .sidebar-logout {
            display: block;
        }
    }



    .doctor-home {
        background: #724C9F;
        color: white;
    }

    .color-white {
        color: white;
    }

    .color-primary {
        color: var(--doctor-button-primary-color);
    }

    .doctor-home-baby {
        margin: 0 auto;
        text-align: center;
        /* position: absolutex;*/
        /* top: -50px;*/
        width: 120px;
    }

    .doctor-patinet-border {
        border: 2px solid #E8DCF1;
        border-radius: 10px;
    }

    .doctor-patinet-app-list-color {
        color: #979FAC;
        text-transform: capitalize;
    }

    .doctor-today-appointment a.link {
        vertical-align: middle;
        color: #724C9F;
    }

    .doctor-all-appointment .nav-link {
        width: 200px;
    }

    .doctor-all-appointment .nav-link.active {
        background: var(--doctor-button-bg-primary-color);
        color: var(--doctor-white-color);
    }

    .doctor-all-appointment .nav-link {
        background: var(--doctor-button-bg-secondary-color);
        color: var(--doctor-black-color);
    }

    .doctor-all-appointment .date-back-drop {
        background: #F4EAFC;
        text-align: center;
        padding: 10px;
    }

    .doctor-color-main,
    a.doctor-color-main:hover {
        color: var(--doctor-button-bg-primary-color);
    }

    .doctor-color-black {
        color: var(--doctor-black-color) !important;
    }

    .doctor-font-bold {
        font-weight: bold;
    }

    .form-control-food {
        border: none;
        border-bottom: 1px solid;
    }

    .form-control-food:focus-visible {
        border: none;
        border-bottom: 1px solid;
        outline-offset: none;

    }

    .pediatric-form-fields label {
        color: #724C9F;
    }

    table.pediatric-form-fields-tables thead td {
        text-align: center;
    }

    table.pediatric-form-fields-tables input[type='checkbox'] {
        scale: 1.5;
    }

    table.pediatric-form-fields-tables td,
    table.pediatric-form-fields-tables th {
        color: var(--doctor-button-primary-color);
    }

    table.pediatric-form-fields-tables th {
        font-weight: bold;
        min-width: 200px;
    }

    table.pediatric-form-fields-tables {
        /* border:1px solid;*/
    }

    .dental-form .leftOption,
    .dental-form .rightOption {
        color: var(--doctor-button-primary-color);
        font-weight: bold;
    }

    .dental-form .leftOption input[type='checkbox'],
    .dental-form .rightOption input[type='checkbox'] {
        scale: 1.5;
    }

    ul.dental_teeth_checkbox {}

    ul.dental_teeth_checkbox li {
        display: initial;
        font-size: 9px;
    }

    ul.dental_teeth_checkbox li,
    ul.dental_teeth_checkbox li input,
    ul.dental_teeth_checkbox li label {
        padding: 0;
        margin: 0;
        font-size: 14px;
    }

    ul.dental_teeth_checkbox li input {
        /* outline: 1px solid var(--doctor-button-primary-color);*/
        border: 2px solid var(--doctor-button-primary-color) !important;
    }

    ul.dental_teeth_checkbox li label {
        color: var(--doctor-button-primary-color) !important;
    }

    .btn-cancel {
        border: 1 px sold var(--doctor-button-primary-color) !important;
    }

    .prescriptionForm label.form-label {
        font-size: 18px;
    }

    .btn-cancel {
        border: 1 px sold var(--doctor-button-primary-color) !important;
        background: white;
    }

    .btn-medicine-tag {
        color: white;
        background: #724C9F;
        border-radius: 20px;
        margin: 5px;
    }

    .btn-medicine-tag:hover,
    .btn-medicine-tag.medicine-selected {
        color: var(--doctor-button-primary-color);
        background: white;
        border: 1px solid var(--doctor-button-primary-color) !important;
    }

    .medicine-selected {
        pointer-events: none;
    }

    label.medician-check-label {
        border: 1px solid #80808073;
        padding: 7px;
        cursor: pointer;
    }

    input.medician-check-inp:checked+label.medician-check-label {
        color: #fff;
        background-color: var(--doctor-button-primary-color);
    }

    .doctor-main-four span {
        color: #221730;
        font-weight: bold;
    }

    .doctor-all-appointment .btn-appoinment {
        background: var(--doctor-button-bg-primary-color);
        color: var(--doctor-white-color);
    }

    .backdrop-patient {
        background: #F4EAFC;
        text-align: center;
        padding: 20px;
        min-height: 50px;
        color: var(--doctor-button-bg-primary-color);
        border-radius: 50%;
        width: 80px;
        height: 80px;
    }

    .addNotesSection {
        position: fixed;

        position: fixed;
        bottom: 95px;
        right: -100px;
        width: 300px;
    }

    .addNotesSection .fa {
        font-size: 65px;
        color: rebeccapurple;
    }
</style>

<style>
    .baby-shadow {
        border-radius: 8px;
        border: 1px solid rgba(138, 79, 186, 0.10);
        background: #FFF;
        box-shadow: 0px 1px 20px 0px rgba(102, 112, 133, 0.08);
    }

    .patient-img {
        height: 110px;
        width: 110px;
        border-radius: 100px;
        background: rgba(148, 107, 238, 0.10);
    }


    .patient-img .name {
        color: #8A4FBA;
        text-align: center;
        /* font-family: Inter; */
        font-size: 40px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .patient-info p {
        color: #667085;
        /* font-family: Inter; */
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 18px;
        margin-bottom: 4px;
    }

    .patient-info p.name {
        color: #1D2939;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
    }

    .btn-outline-primary {
        border-radius: 4px;
        border: 1px solid #8A4FBA;
        background: #FFF;
        color: #8A4FBA;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 150%;
        letter-spacing: -0.154px;
        padding: 10px 16px;
        min-width: 200px;
        display: inline-block;
        text-align: center;
    }

    .btn-outline-primary:hover {
        color: #FFF !important;
        background: #8A4FBA;
        border: 1px solid #8A4FBA;

    }

    .p-service {
        /* width: 200px; */
        min-height: 130px;
        padding: 20px;
        display: flex;
        /* justify-content: center; */
        align-items: center;
        flex-direction: column;
        transition: all 250ms ease;
        border-radius: 14px;
        position: relative;
        height: 100%;
    }

    .p-service:hover {

        background: #8A4FBA;
    }

    .p-service svg path {
        fill: #8A4FBA;
        /* stroke: #8A4FBA; */
    }

    .p-service:hover svg path {
        fill: #ffffff;
        /* stroke: #ffffff; */
    }

    .p-service.clinical svg path {
        fill: none;
        stroke: #8A4FBA;
    }

    .p-service.clinical:hover svg path {
        fill: none;
        stroke: #ffffff;
    }



    .p-service .service-name {
        color: #2A2A2A;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.154px;
        text-align: center;
    }

    .p-service:hover .service-name {

        color: #ffffff;
    }

    .p-service .service-link::before {
        content: '';
        position: absolute;
        inset: 0;
    }

    /*  */

    .summary {
        max-width: 600px;
    }

    .summary .question {
        color: #8A4FBA;
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
    }

    .summary .answer {
        border-radius: 5px;
        border: 1px solid #E8DCF1;
        background: #FFF;
        color: #808080;
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
        padding: 20px;
    }

    .clinical-note .summary .question {
        color: #1D2939;
        text-transform: capitalize;
        font-weight: 500;
    }

    .clinical-note .summary .answer {
        padding: 14px;
        min-height:60px;
    }

    .bg-color-v1 {
        background: #F9FAFB;
    }

    .prescription-table .table thead tr th {
        color: #667085;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        background: #F9FAFB;
        text-align: center;

    }

    .baby-border {
        border: 1px solid #EAECF0;
        border-radius: 10px;
    }

    .clinical-note {
        padding: 18px;
    }

    .clinical-note .date {
        color: #808080;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.4;
        letter-spacing: -0.132px;
    }

    .baby-add-new-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #8A4FBA;
        position: fixed;
        bottom: 7%;
        right: 4%;
        transition: all 250ms ease-in-out;
        z-index: 20;
    }

    .baby-add-new-btn:hover {
        box-shadow: 0px 1px 20px 0px rgba(102, 112, 133, 0.08);
    }

    .prescription-table .table thead tr th:nth-child(2) {
        min-width: 200px;
    }

    .prescription-table .table tr {
        border-bottom: 1px solid #EAECF0 !important;
    }

    .prescription-table .table tbody tr:last-child {
        border-bottom: 1px solid #EAECF0 !important;
    }

    .prescription-table .table tfoot tr:last-child {}

    .prescription-table .table tbody tr th,
    .prescription-table .table tbody tr td {
        color: #667085;
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
    }

    @media only screen and (min-width: 992px) {
        .clinical-note {
            padding: 26px;
        }
    }
</style>
<style>
    .doc-name {
        color: #1D2939;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        line-height: 1.4;
    }

    .baby-primary-btn,
    .baby-secondary-btn {
        border-radius: 5.191px;
        transition: box-shadow 0.3s ease;
        padding: 10px 12px;
        cursor: pointer;
        display: inline-block;
        min-width: 120px;
    }

    input[type="number"] {
        -moz-appearance: textfield;
        appearance: textfield;
    }

    input:disabled {
        background-color: #fff !important;
    }

    .baby-primary-btn {
        border-radius: 5.191px;
        border: 0.433px solid #8A4FBA;
        background-color: #8A4FBA;
        color: #FFFFFF;
    }

    .baby-secondary-btn {
        border-radius: 5.191px;
        border: 0.433px solid #8A4FBA;
        color: #8A4FBA;
        background-color: #FFFFFF;
    }

    .baby-primary-btn:hover {
        color: #FFFFFF;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
    }

    .baby-secondary-btn:hover {
        color: #8A4FBA;
        background-color: #FFFFFF;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
    }

    .disabled-link {
        pointer-events: none;
        opacity: 0.6;
        text-decoration: none;
    }

    .btn-info-bar {
        background: transparent;
        padding: 8px 10px;
        font-size: 12px;
        user-select: none;
        color: #e67e22;
    }

    .aside-enabled.aside-fixed.header-fixed .header{
        box-shadow: rgba(17, 17, 26, 0.1) 0px 2px 2px;
    }

    .dental-form label span{
        margin:0 3px;
    }

    .dental-form label {
        margin:6px 12px;
    }
    .form-control-food:focus{
        outline: none;
    }

    .prescription-field-area label {
        color: #1D2939;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.4;
        letter-spacing: -0.154px;
        text-transform: capitalize;
        margin-bottom: 0.9rem;

    }

    textarea {
        border-radius: 5.191px;
        border: 1px solid #E8DCF1;
        color: #808080;
        resize: vertical;
        min-height: 50px;
    }


    /* width */
    textarea::-webkit-scrollbar {
        display: none;
        width: 6px;
    }

    /* Track */
    textarea::-webkit-scrollbar-track {
        background: #808080;
    }

    /* Handle */
    textarea::-webkit-scrollbar-thumb {
        background: #E8DCF1;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        /* background: #555; */
        /* Color when hovering over the scrollbar handle */
    }

    /* Medicine Blage */
    .med-search-container .med-search {
        display: flex;
        justify-content: start;
        align-items: center;
        border-radius: 18px;
        border: 1px solid #EAECF0;
        padding: 0px 6px;
        width: max-content;
        max-width: 100%;
        min-width: 20rem;
    }

    .med-search-container .med-search .search-icon {
        padding: 9px;
    }

    .med-search-container .med-search .search-field-wrap input[type="search"] {
        border: none;
        padding: 4px 4px;
        color: #7B7A7C;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.3;
        min-width: 20rem;

    }

    .med-search-container .med-search-result .med-items {
        display: flex;
        flex-wrap: wrap;
        align-content: center;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
        max-height: 400px;
        overflow-y: scroll;
    }

    .med-search-container .med-search-result .med-items .med-item {
        border-radius: 6px;
        border: 1px solid #EAECF0;
        width: max-content;
        max-width: 100%;
        padding: 6px 12px;
        cursor: pointer;
        transition: all 250ms ease-in-out;
    }

    .med-search-container .med-search-result .med-items .med-item:hover {

        border: 0.433px solid #8A4FBA;
        background: #8A4FBA;
        color: white;
    }

    .bmed-search-container .med-search-result .med-items .med-item .medicine {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4px;
        color: #808080;
        text-align: center;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.4;
        min-width: 10rem;
        max-width: 100%;
        user-select: none;
    }

    .select-chk {
        position: relative;
    }

    .select-chk input[type="checkbox"],
    .select-chk input[type="radio"] {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .select-chk label {
        padding: 10px;
        border-radius: 1px;
        border: 1px solid #E5E5E5;
        transition: all 250ms ease-in-out;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }

    .select-chk:hover label {
        border: 1px solid #8A4FBA;
        background: #FFF;
        color: #8A4FBA;
    }

    .select-chk input[type="checkbox"]:checked+label,
    .select-chk input[type="radio"]:checked+label {
        border: 1px solid #8A4FBA;
        Color: #FFF;
        background: #8A4FBA;
    }

    .med-data-modal .med-name {
        color: #8A4FBA;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.4;
        text-transform: capitalize;
    }

    .med-data-modal .modal-dialog .modal-content {
        border-radius: 4px;
        border: 1px solid #E8DCF1;
        background: #FFF;
    }

    .med-data-modal .modal-dialog .modal-content .med-prop {
        color: #1D2939;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.5;
        text-transform: capitalize;
        /* position: relative; */
    }

    .med-data-modal .modal-dialog .modal-content .med-prop::after {
        content: ':';
        padding: 0 2px;
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        color: #1D2939;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.5;
        text-transform: capitalize;
    }

    .action-btn {
        border: none;
        width: 24px;
        height: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        background: transparent;
    }

    /* pediatrics Record form */

    input[type="checkbox"] {
        position: relative;
        cursor: pointer;
    }

    input[type="checkbox"]::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 4px;
        border: 1px solid #B2BAC6;
        background: #fff;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 80%;
        scale: 1.4;

    }

    input[type="checkbox"]:checked::before {
        border-color: #8A4FBA;
        background-color: #8A4FBA;
        background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path fill="%23ffffff" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>');
    }

    .checkbox-list input[type="checkbox"] {
        margin-right: 9px;
    }

    .style-one:focus-visible {
        outline: none;
    }

    .checkbox-list label {
        color: #8A4FBA;
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
        margin: 0;
        padding: 6px 2px;
        cursor: pointer;
    }

    .pediatric-form-fields .form-field:focus-visible {
        outline: none;
    }

    .pediatric-form-fields label {
        color: #8A4FBA;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom 1rem;
    }

    .color-primary {
        color: #8A4FBA;
    }

    span {
        font-weight: 400;
    }

    .style-one,
    .field-with-suffix {
        display: flex;
        flex-wrap: wrap;
        align-items: center;

    }

    .style-one .form-label,
    .style-one .form-field,
    {
    min-width: 150px;
    }

    .style-one .form-label {
        padding-right: 14px;
    }

    .style-one .form-field {
        margin-bottom: 0;
    }

    .style-one .form-field,
    .field-with-suffix .form-field {
        border-color: transparent;
        border-width: 1px;
        border-bottom-color: #8A4FBA;
        padding: 1px 12px;
    }

    .style-one .form-field:focus-visible {
        outline: none;
    }

    .field-with-suffix .form-label {
        min-width: 200px;
    }

    .field-with-suffix .form-field {
        min-width: 100px;
    }

    .field-with-suffix span {
        color: #8A4FBA;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 1.4;
        margin-bottom 1rem;
    }

    table.pediatric-form-fields-tables input[type='checkbox'] {
        scale: 1.15;
    }

    .table-style-one {
        padding: 0 !important;
    }

    .table-style-one table {
        border: 2px solid #E4E6EF;
        padding: 0px 12px;
    }

    .table-style-one .table thead {
        background: transparent;
    }

    .table-style-one .table thead {
        border-bottom: 1px solid #E4E6EF;
    }

    .table-style-one .table thead *,
    .table-style-one .table tbody td {
        background: transparent;
        color: #8A4FBA;
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 22px;
    }

    .table-style-one .table thead *,
    .table-style-one .table tbody td input {
        background: transparent;
        font-size: 16px;
        font-weight: 500;
        line-height: 22px;
        border-bottom-color: rgba(138, 79, 186, 0.3);
    }

    .table-style-one .table tbody tr:hover {
        background: rgba(138, 79, 186, 0.1);
    }

    .table-style-one .table tr:not(:last-child),
    .table-style-one .table th:not(:last-child),
    .table-style-one .table td:not(:last-child) {
        border-right: 1px solid #E4E6EF;
    }

    .table-style-one .table tr:first-child,
    .table-style-one .table th:first-child,
    .table-style-one .table td:first-child {
        padding-left: 12px !important;
        max-width: 140px;
    }

    .table-style-one .table tr:last-child,
    .table-style-one .table th:last-child,
    .table-style-one .table td:last-child {
        padding-right: 12px !important;
    }

    /* Input with check field */
    .input-with-checkbox {
        display: flex;
        align-items: center;
    }

    .input-with-checkbox .input-lbl,
    .input-with-checkbox .input-fld .checkbox span {
        background: transparent;
        color: #8A4FBA;
        font-size: 16px;
        font-weight: 500;
        line-height: 22px;
        min-width: 175px;
    }

    .input-with-checkbox {
        flex-wrap: wrap;
        gap: 10px;
    }

    .input-with-checkbox .input-fld .checkbox {
        user-select: none;
        cursor: pointer;
    }

    .input-with-checkbox .input-fld .checkbox span {
        margin: 0 6px;
    }

    .input-with-checkbox .input-fld input[type="checkbox"] {
        margin: 4px;
    }

    .input-with-checkbox .input-fld {
        padding: 0 12px;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
    }

    .input-with-checkbox .input-fld .form-field {
        border-color: transparent;
        border-width: 1px;
        border-bottom-color: #8A4FBA;
        padding: 1px 12px;
    }

    .input-with-checkbox .input-fld .form-field:focus-visible {
        outline: none;
    }

    .table-style-one.procedure-table .table th:last-child,
    .table-style-one.procedure-table .table td:last-child {
        max-width: 3rem;
    }

    .doctor-home-baby {
        width: 100%;
        height: auto;
        max-width: 250px;
        transform: rotate(0deg);
        object-fit: contain;
    }

    .opener {
        display: block;
        position: fixed;
        top: 15px;
        right: 20px;
        z-index: 1040;
    }

    .closer {
        display: none;
    }

    .toggled .opener {
        display: none;
    }

    .toggled .closer {
        display: block;
    }

    input[type="date"] {
        cursor: pointer;
    }

    /* Investigation report */
    .reports-gallery {}

    .reports-gallery .report {
        border-radius: 4px;
        border: 1px solid #D0D5DD;
    }

    .reports-gallery .report .report-thumbnail {
        background: #F2F2F2;
        transition: all 250ms ease-in;
        position: relative;
    }




    .reports-gallery .report .report-thumbnail .trigger-modal {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 5px 14px;
        border-radius: 4px;
        background: #8A4FBA;
        color: #ffffff;
        opacity: 0;
        visibility: hidden;
        transition: opacity 250ms ease-in;
        z-index: 2;
        cursor: pointer;
    }

    .reports-gallery .report .report-thumbnail.active img {
        width: auto;
        height: auto;
        object-fit: contain;
        max-width: 90vw;
    }

    .reports-gallery .report .report-thumbnail.active:hover img {
        transform: unset;
    }

    .reports-gallery .report .report-thumbnail.active:hover::before {
        content: none;
    }

    .reports-gallery .report .report-thumbnail .trigger-close {
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 4px;
        font-size: 24px;
        font-weight: 500;
        position: absolute;
        top: 5%;
        right: 5%;
        opacity: 0;
        visibility: hidden;
        background: red;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .reports-gallery .report .report-thumbnail:hover::before {
        content: '';
        display: block;
        position: absolute;
        inset: 0;
        z-index: 1;
        background: rgba(0, 0, 0, 0.3);
    }

    .reports-gallery .report .report-thumbnail:hover .trigger-modal {
        opacity: 1;
        visibility: visible;
        user-select: none;
    }

    .reports-gallery .report .report-thumbnail img {
        object-fit: contain;
        width: 100%;
        height: 120px;
        transition: all 250ms ease-in;

    }

    .reports-gallery .report .report-thumbnail.active .trigger-close {
        opacity: 1;
        visibility: visible;
        z-index: 2001;
        cursor: pointer;
        user-select: none;
    }

    .reports-gallery .report .report-thumbnail.active {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 2000;
        width: 100vw;
        height: 100vh;
        overflow: scroll;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(6px);
    }

    .reports-gallery .report .report-thumbnail.active .trigger-modal,
    .reports-gallery .report .report-thumbnail.active .report-info {
        display: none;
    }

    .reports-gallery .report .report-thumbnail.active .report-thumbnail:hover img {
        height: auto;
    }

    .reports-gallery .report .report-thumbnail:hover img {
        transform: scale(1.1);
    }

    .reports-gallery .report .report-info {}

    .reports-gallery .report .report-info .r-name {
        color: #1D2939;
        font-size: 13px;
        font-weight: 500;
    }

    .form-fld {
        min-width: 165px;
        max-width: 170px;
    }

    min .selec-file {
        position: relative;
    }

    .selec-file input[type="file"] {
        position: absolute;
        inset: 0;
        visibility: hidden;
    }

    .selec-file .btn-select-file {
        border-radius: 4px;
        background: #8A4FBA;
        height: 45px;
        width: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        cursor: pointer;
    }

    .dental-form label {
        font-weight: 500;
    }

    .form-control-food {
        border-color: #8A4FBA;
    }
    .sort-btn{
        min-width: unset;
        border: 1px solid #8A4FBA;
    }
</style>
