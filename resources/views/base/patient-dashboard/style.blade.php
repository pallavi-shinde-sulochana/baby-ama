<style type="text/css">
	:root{
		--sidebar-width:270px;
		--sidebar-wrapper-margin:-270px;
		--sidebar-link-hover-color : #F8F3FB;
		--sidebar-link-color : #221730;
		--sidebar-link-active-color : #724C9F;
		--doctor-button-bg-primary-color : #724C9F;
		--doctor-button-bg-secondary-color : #F1EDF5;
		--doctor-button-primary-color : #724C9F;
		--doctor-black-color : #221730;
		--doctor-white-color : #FFFFFF;
		--doctor-date-bg-color : #F4EAFC;
	}
	@media (max-width:900px){
		:root{
			--sidebar-width:240px;
			--sidebar-wrapper-margin:-240px;
		}
	}
	body {
		overflow-x: hidden;
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
	#wrapper .sidebar-logout{
		position: fixed;
		bottom: 0;
		padding-bottom:30px;
	}
	#wrapper.toggled .sidebar-logout{
		display:block;
	}
	#wrapper .sidebar-logout{
		display:none;
	}

	#sidebar-wrapper {
		z-index: 1030;
		position: fixed;
		left: var(--sidebar-width);
		top:0;
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
	#sidebar-wrapper .sidebar-inner-wrapper{
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
		font-weight:500;
		font-size:15px;
		padding-left:10px;
	}


	.sidebar-nav li .sidebar-link:hover, .sidebar-nav li .sidebar-link.active{
 
	 
		text-decoration: none;
		color: var(--sidebar-link-active-color);
		background: var(--sidebar-link-hover-color);
	}
	.sidebar-nav li .sidebar-logout-link:hover{
		background:transparent;
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
	.sidebar-toggle{
		visibility:hidden;
		opacity: 0;
	}

	@media(max-width:767px) {
		#wrapper {
/*			padding-left: var(--sidebar-width);*/
		}

		#wrapper.toggled {
			padding-left: 0;
		}

		#wrapper.toggled #sidebar-wrapper {
			width: var(--sidebar-width);
		}

		#wrapper.toggled #sidebar-wrapper {
/*			width: 0;*/
		}

		#page-content-wrapper {
			padding: 10px;
			position: relative;
		}

		#wrapper.toggled #page-content-wrapper {
			position: relative;
			margin-right: 0;
		}
		.sidebar-toggle{
			visibility:visible;
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
		#wrapper .sidebar-logout{
			display:block;
		}
	}
 


	.doctor-home{
		background:#724C9F;
		color:white;
	}
	.color-white{
		color:white;
	}
	.color-primary{
		color:var(--doctor-button-primary-color);
	}
	.doctor-home-baby{
		margin: 0 auto;
    	text-align: center;
/*	    position: absolutex;*/
/*	    top: -50px;*/
		width:120px;
	}
	.doctor-patinet-border{
		border:2px solid #E8DCF1;
		border-radius:10px;
	}
	.doctor-patinet-app-list-color{
		color:#979FAC;
		text-transform:capitalize;
	}
	.doctor-today-appointment a.link{
		vertical-align: middle;
		color:#724C9F;
	}
	.doctor-all-appointment .nav-link{
		width:200px;
	}
	.doctor-all-appointment .nav-link.active{
		background:var(--doctor-button-bg-primary-color);
		color:var(--doctor-white-color);
	}
	.doctor-all-appointment .nav-link{
		background:var(--doctor-button-bg-secondary-color);
		color:var(--doctor-black-color);
	}
	.doctor-all-appointment .date-back-drop {
	    background: #F4EAFC;
	    text-align: center;
	    padding: 10px;
	}

	.doctor-color-main , a.doctor-color-main:hover{
		color:var(--doctor-button-bg-primary-color);
	}

	.doctor-color-black {
		color:var(--doctor-black-color)!important;
	}
	.doctor-font-bold{
		font-weight:bold;
	}
	.form-control-food{
		border:none;
		border-bottom:1px solid;
	}
	 .form-control-food:focus-visible{
	 	border:none;
		border-bottom:1px solid;
		    outline-offset: none;

	 }

	.pediatric-form-fields label{
	 	color:#724C9F;
	 }

	 table.pediatric-form-fields-tables thead td {
	 	text-align:center;
	 }
	 table.pediatric-form-fields-tables input[type='checkbox']{
	 	scale:1.5;
	 }
	 table.pediatric-form-fields-tables td,table.pediatric-form-fields-tables th {
	 	color:var(--doctor-button-primary-color);
	 }
	 table.pediatric-form-fields-tables th{
	 	font-weight:bold;
	 	min-width: 200px;
	 }
	 table.pediatric-form-fields-tables{
/*	 	border:1px solid;*/
	 }

	 .dental-form .leftOption,  .dental-form .rightOption{
	 	color:var(--doctor-button-primary-color);
	 	font-weight:bold;
	 }
	 .dental-form .leftOption input[type='checkbox'], .dental-form .rightOption input[type='checkbox']{
	 	scale:1.5;
	 }

	 ul.dental_teeth_checkbox {

	 }
	ul.dental_teeth_checkbox li {
	    display: initial;
	    font-size: 9px;
	}
	ul.dental_teeth_checkbox li, ul.dental_teeth_checkbox li input, ul.dental_teeth_checkbox li label {
    	padding: 0;
    	margin: 0;
    	font-size:14px;
    }
    ul.dental_teeth_checkbox li input{
/*    	outline: 1px solid var(--doctor-button-primary-color);*/
    	border: 2px solid var(--doctor-button-primary-color)!important;
    }
    ul.dental_teeth_checkbox li label{
    	color:var(--doctor-button-primary-color)!important;
    }
    .btn-cancel{
    	border:1 px sold var(--doctor-button-primary-color)!important;
    }

    .prescriptionForm label.form-label{
    	font-size:18px;
    }
     .btn-cancel{
    	border:1 px sold var(--doctor-button-primary-color)!important;
    	background:white;	
    }

    .btn-medicine-tag{
    	color:white;
    	background: #724C9F;
    	border-radius:20px;
    	margin:5px;
    }
    .btn-medicine-tag:hover{
    	color:var(--doctor-button-primary-color);
    	background: white;
    	border:1px solid var(--doctor-button-primary-color)!important;
    }
    label.medician-check-label{
    	border:1px solid #80808073;
    	padding:7px;
    	cursor:pointer;
    }
    input.medician-check-inp:checked + label.medician-check-label{
    	color:#fff;
    	background-color:var(--doctor-button-primary-color);
    }


.patient-home .nav-line-tabs .nav-item .nav-link{
	padding:10px;
	margin:0;
}
.patient-home .nav-item{
	
    margin-right:15px;
}
.patient-home .nav-item a{
	color:black!important;
	text-align:center;
}
.patient-home .nav-line-tabs .nav-item .nav-link{
/*	border: 1px solid;*/
/*    border-radius: 20%;*/
    background:#F1EDF5;
    color:black;
    text-align:center;
}
.patient-home .nav-line-tabs .nav-item .nav-link.active{
/*	border-bottom:none;*/
	color:#fff!important;
	background-color:var(--doctor-button-primary-color);
}

    /*Mobile CSS*/
@media only screen and (max-width: 600px) {
   .patient-home-baby{
    	position: absolute;
	    top: -35px;
	    z-index: 99999;
	    /* left: 5px; */
	    right: 5px;
	    width: 44%;
    }
}

.patinet-book{
	background-color:var(--doctor-button-primary-color);
	color:white;
}

.patinet-book-plain{
	background-color:white;
	color:var(--doctor-button-primary-color);
	border-color:var(--doctor-button-primary-color);
	border: 1px solid!important;

}


	.patient-all-appointment .nav-link{
		width:130px;
	}
	.patient-all-appointment .nav-link.active{
		background:var(--doctor-button-bg-primary-color);
		color:var(--doctor-white-color);
	}
	.patient-all-appointment .nav-link{
		background:var(--doctor-button-bg-secondary-color);
		color:var(--doctor-black-color);
	}
	.patient-all-appointment .date-back-drop {
	    background: #F4EAFC;
	    text-align: center;
	    padding: 10px;
	}



.patient-all-appointment .date-back-drop h1,.patient-all-appointment .date-back-drop h3, .patient-all-appointment .date-back-drop h2,.patient-all-appointment .date-back-drop h6 {
    color: black;
}


.color-light-grey {
	color: #979FAC;
}


/**
 * Custom css for babayama web app
*/
.web-book-date-scroll .swiper-slide{
    width: auto;
}
.web-book-check label.web-book-check-label{
    padding: 5px 12px;
    width: 65px;
    border: 1px solid #B2BAC6;
    box-sizing: border-box;
    border-radius: 5px;
    cursor: pointer;
}

.web-book-check .web-book-check-text{
    text-align: center;
    display: block;
    color: #B2BAC6;
}
.web-book-check-radio:checked + label.web-book-check-label{
    border: 1px solid #724C9F;
    background-color: #724C9F;
}
.web-book-check-radio:checked + label.web-book-check-label .web-book-check-text{
    color: white;
}
.web-book-success-img{
    width: 100px;
}
.web-book-wrapper{
    display: none;
}

.swiper-button-next, .swiper-button-prev{
	top:30px;
}

.swiper-wrapper{
	max-height:120px;
}
    
</style>